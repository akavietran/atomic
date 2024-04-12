<?php

namespace App\Repositories;

use App\Models\Project;
use App\Models\Person;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;
class ProjectRepository
{
    public function isValidPersonId($personId): bool
    {
        return Person::where('id', $personId)->exists();
    }
    public function getAll()
    {
        return Project::all();
    }

    public function getPersonCompany()
    {
        $loggedInUser = Auth::user();
        $roleNames = $loggedInUser->roles->pluck('role')->toArray();
        $person = Person::where('user_id', $loggedInUser->id)->first();
        $company = Company::with('person')
        ->whereHas('person', function ($query) use ($person) {
            $query->where('id', $person->id);
        })
        ->first();
        if (in_array('admin', $roleNames)) {
            $projects = Project::with('company', 'persons')->paginate(3);
        } else {
            $projects = Project::with('company', 'persons')
                ->where('company_id', $company->id)
                ->whereHas('persons', function ($query) use ($person) {
                    $query->where('id', $person->id);
                })
                ->paginate(3);
        }

        $projects->getCollection()->transform(function ($project) {
            $personNames = $project->persons->pluck('full_name')->implode(', ');
            $companyName = $project->company->name;
            $project = $project->toArray();
            $project['persons'] = $personNames;
            $project['company'] = $companyName;
            return $project;
        });
        return $projects;
    }
    public function GetCompany()
    {
        return Company::all();
    }
    public function getPersons($companyId)
    {
        return Person::where('company_id', $companyId)->get();
    }

    public function getById($id)
    {
        return Project::findOrFail($id);
    }
    public function getByCompanyId($id)
    {
        return Company::findOrFail($id);
    }
    public function generateNewProjectId()
    {
        $lastProjectId = Project::latest()->value('id');

        $newProjectId = $lastProjectId + 1;

        return $newProjectId;
    }

    public function create(array $data)
    {
        try {
            unset($data['_token']);
            $project = new Project();
            $project->code = $data['code'];
            $project->name = $data['name'];
            $project->description = $data['description'];
            $project->company_id = $data['company_id'];
            $project->save();
            if (isset($data['persons'])) {
                $project->persons()->syncWithoutDetaching($data['persons']);
            }

            return $project;
        } catch (\Exception $e) {
            throw new \Exception('Failed to create Project. Please check the information again.');
        }
    }

    public function update($id, $data)
    {
        try {
            $project = Project::findOrFail($id);

            $project->update([
                'code' => $data['code'],
                'name' => $data['name'],
                'description' => $data['description'],
                'company_id' => $data['company_id'],
            ]);

            if (isset($data['persons'])) {
                $project->persons()->sync($data['persons']);
            }

            return $project;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function delete($id)
    {
        try {
            $project = Project::findOrFail($id);

            if ($project) {
                return $project->delete();
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}

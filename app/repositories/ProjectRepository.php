<?php

namespace App\Repositories;

use App\Models\Project;
use App\Models\Person;
use App\Models\Company;

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
    public function generateNewProjectId() {
    
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

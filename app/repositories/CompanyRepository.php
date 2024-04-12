<?php

namespace App\Repositories;

use App\Models\Company;
use App\Models\Department;
use Illuminate\Support\Arr;

class CompanyRepository
{
    public function getAll()
    {
        return Company::paginate(3, ['*'], 'company');
    }

    public function getById($id)
    {
        return Company::findOrFail($id);
    }
    public function updateDepartment($company_id)
    {
        $department = Department::whereHas('company', function ($query) use ($company_id) {
            $query->where('company_id', $company_id);
        })->get();
        if (!empty($departmentIds)) {
            $department = $department->filter(function ($dept) use ($departmentIds) {
                return in_array($dept->id, $departmentIds);
            });
        }

        return $department;
    }

    public function create($data)
    {
        try {
            return Company::create($data);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function update($id, $data)
    {
        try {
            $company = Company::findOrFail($id);

            if (isset($data['department'])) {
                $departmentIds = $data['department'];
                $departments = Department::whereIn('id', $data['department'])->get();
                $company->update(Arr::except($data, 'department'));

                foreach ($departments as $department) {
                    $department->update(['company_id' => $company->id]);
                }

                Department::whereNotIn('id', $departmentIds)
                    ->where('company_id', $company->id)
                    ->update(['company_id' => null]);
            } else {
                Department::where('company_id', $company->id)->update(['company_id' => null]);

                $company->update($data);
            }

            return $company;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function delete($id)
    {
        try {
            $company = Company::findOrFail($id);

            if ($company) {
                return $company->delete();
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}

<?php

namespace App\Repositories;

use App\Models\Department;
use App\Models\Company;

class DepartmentRepository
{
    public function getAll()
    {
        return Department::with('parent', 'company')->paginate(3, ['*'], 'department');
    }
    public function getDepartment()
    {
        return Department::all();
    }
    public function getById($id)
    {
        return Department::findOrFail($id);
    }
    public function getCompany()
    {
        return Company::all();
    }

    public function getParent()
    {

        return Department::whereNull('parent_id')->get();
    }
    public function checkValidParentId($parentId)
    {
       if($parentId){
        return Department::find($parentId);
       }
       return true;
    }
    public function create($data)
    {
        try {
             $valid = $this->checkValidParentId($data['parent_id']);
            if($valid){
                return Department::create($data);
            }
        } catch (\Exception $th) {
            throw new \Exception('Failed to create Department. Please check the information again.');
        }
    }

    public function update($id, $data)
    {
        try {
            $valid = $this->checkValidParentId($data['parent_id']);
            if($valid){
            $department = Department::findOrFail($id);
            return $department->update($data);
            }
        } catch (\Throwable $th) {
            throw new \Exception('Failed to update Department. Please check the information again.');
        }
    }

    public function delete($id)
    {
        try {
            $department = Department::findOrFail($id);

            if ($department) {
                return $department->delete();
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}

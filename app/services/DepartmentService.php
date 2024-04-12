<?php

namespace App\Services;

use App\Repositories\DepartmentRepository;

class DepartmentService
{
    protected $departmentRepository;

    public function __construct(DepartmentRepository $departmentRepository)
    {
        $this->departmentRepository = $departmentRepository;
    }

    public function getAll()
    {
        return $this->departmentRepository->getAll();
    }
    public function getDepartment()
    {
        return $this->departmentRepository->getDepartment();
    }
    
    public function getCompany()
    {
        return $this->departmentRepository->getCompany();
    }
    public function getParent()
    {
        return $this->departmentRepository->getParent();
    } public function getById($id)
    {
        return $this->departmentRepository->getById($id);
    }

    public function create($data)
    {
        try {
            return $this->departmentRepository->create($data);
        } catch (\Exception $th) {
            throw new \Exception('Failed to create department.');
        }
    }

    public function update($id, $data)
    {
        try {
            //code...
            return $this->departmentRepository->update($id, $data);
        } catch (\Exception $th) {
            throw new \Exception('Failed to update department. Please try again later.');
        }
    }

    public function delete($id)
    {
        try {
            //code...
            return $this->departmentRepository->delete($id);
        } catch (\Exception $th) {
            throw new \Exception('Failed to destroy department. Please try again later.');
        }
    }
}

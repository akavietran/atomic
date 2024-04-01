<?php

namespace App\Services;

use App\Repositories\RoleRepository;

class RoleService
{
    protected $roleRepository;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function getAll()
    {
        return $this->roleRepository->getAll();
    }

    public function getById($id)
    {
        return $this->roleRepository->getById($id);
    }

    public function create($data)
    {
        try {
            //code...
            return $this->roleRepository->create($data);
        } catch (\Throwable $th) {
            throw $th;
        }
        
    }

    public function update($id, $data)
    {
        try {
            //code...
            return $this->roleRepository->update($id, $data);
        } catch (\Throwable $th) {
            throw $th;
        }
        
    }

    public function delete($id)
    {
        try {
            //code...
            return $this->roleRepository->delete($id);;
        } catch (\Throwable $th) {
            throw $th;
        }
        
    }
}


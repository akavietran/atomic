<?php

namespace App\Repositories;

use App\Models\Role;

class RoleRepository
{
    public function getAll()
    {
        return Role::all();
    }

    public function getById($id)
    {
        return Role::findOrFail($id);
    }

    public function create($data)
    {
        try {
           

            return Role::create($data);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function update($id, $data)
    {
        try {
            $role = Role::findOrFail($id);
            return $role->update($data);
           
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function delete($id)
    {
        try {
            $role = Role::findOrFail($id);

            if ($role) {
                return $role->delete();
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}

<?php

namespace App\Repositories;

use App\Models\Atomictest;

class AtomicRepository
{
    public function getAll()
    {
        return Atomictest::all();
    }

    public function getById($id)
    {
        return Atomictest::findOrFail($id);
    }

    public function create($data)
    {
        try {
                       
            return Atomictest::create($data);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function update($id, $data)
    {
        try {
            $Atomictest = Atomictest::findOrFail($id);
            return $Atomictest->update($data);
           
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function delete($id)
    {
        try {
            $Atomictest = Atomictest::findOrFail($id);

            if ($Atomictest) {
                return $Atomictest->delete();
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}

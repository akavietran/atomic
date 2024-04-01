<?php

namespace App\Services;

use App\Repositories\AtomicRepository;

class AtomicService
{
    protected $AtomicRepository;

    public function __construct(AtomicRepository $atomicRepository)
    {
        $this->atomicRepository = $atomicRepository;
    }

    public function getAll()
    {
        return $this->atomicRepository->getAll();
    }

    public function getById($id)
    {
        return $this->atomicRepository->getById($id);
    }

    public function create($data)
    {
        try {
            return $this->atomicRepository->create($data);
        } catch (\Throwable $th) {
            throw $th;
        }
        
    }

    public function update($id, $data)
    {
        try {
            //code...
            return $this->atomicRepository->update($id, $data);
        } catch (\Throwable $th) {
            throw $th;
        }
        
    }

    public function delete($id)
    {
        try {
            //code...
            return $this->atomicRepository->delete($id);
        } catch (\Throwable $th) {
            throw $th;
        }
        
    }
}


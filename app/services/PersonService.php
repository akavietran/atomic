<?php

namespace App\Services;

use App\Repositories\PersonRepository;

class PersonService
{
    protected $personRepository;

    public function __construct(PersonRepository $personRepository)
    {
        $this->personRepository = $personRepository;
    }

    public function getAll()
    {
        return $this->personRepository->getAll();
    }
    public function getCompany()
    {
        return $this->personRepository->getCompany();
    }

    public function getById($id)
    {
        return $this->personRepository->getById($id);
    }

    public function create($data)
    {
        try {
            return $this->personRepository->create($data);
        } catch (\Exception $th) {
              
             throw new \Exception('Failed to create user. Please try again later.');
        
        }
    }

    public function update($id, $data)
    {
        try {
            //code...
            return $this->personRepository->update($id, $data);
        } catch (\Throwable $th) {
            throw $th;
        }
        
    }

    public function delete($id)
    {
        try {
            //code...
            return $this->personRepository->delete($id);;
        } catch (\Throwable $th) {
            throw $th;
        }
        
    }
}


<?php

namespace App\Services;

use App\Repositories\CountryRepository;

class CountryService
{
    protected $countryRepository;

    public function __construct(CountryRepository $countryRepository)
    {
        $this->countryRepository = $countryRepository;
    }

    public function getAll()
    {
        return $this->countryRepository->getAll();
    }

    public function getById($id)
    {
        return $this->countryRepository->getById($id);
    }

    public function create($data)
    {
        try {
            //code...
            return $this->countryRepository->create($data);
        } catch (\Throwable $th) {
            throw $th;
        }
        
    }

    public function update($id, $data)
    {
        try {
            //code...
            return $this->countryRepository->update($id, $data);
        } catch (\Throwable $th) {
            throw $th;
        }
        
    }

    public function delete($id)
    {
        try {
            //code...
            return $this->countryRepository->delete($id);;
        } catch (\Throwable $th) {
            throw $th;
        }
        
    }
}


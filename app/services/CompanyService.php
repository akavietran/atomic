<?php

namespace App\Services;

use App\Repositories\CompanyRepository;

class CompanyService
{
    protected $companyRepository;

    public function __construct(CompanyRepository $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    public function getAll()
    {
        return $this->companyRepository->getAll();
    }

    public function getById($id)
    {
        return $this->companyRepository->getById($id);
    }

    public function create($data)
    {
        try {
            return $this->companyRepository->create($data);
        } catch (\Throwable $th) {
            throw $th;
        }
        
    }

    public function update($id, $data)
    {
        try {
            //code...
            return $this->companyRepository->update($id, $data);
        } catch (\Throwable $th) {
            throw $th;
        }
        
    }

    public function delete($id)
    {
        try {
            //code...
            return $this->companyRepository->delete($id);;
        } catch (\Throwable $th) {
            throw $th;
        }
        
    }
}


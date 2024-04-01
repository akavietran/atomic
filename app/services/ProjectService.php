<?php

namespace App\Services;

use App\Repositories\ProjectRepository;

class ProjectService
{
    protected $projectRepository;

    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function getAll()
    {
        return $this->projectRepository->getAll();
    }
    public function getCompany()
    {
        return $this->projectRepository->getCompany();
    }
    public function getPersons($companyId)
    {
        return $this->projectRepository->getPersons($companyId);
    }
    // public function getSpecific($request)
    // {
    //     return$this->projectRepository->getSpecific($request);
    // }

    public function getById($id)
    {
        return $this->projectRepository->getById($id);
    }
    public function getByCompanyId($id)
    {
        return $this->projectRepository->getByCompanyId($id);
    }

    public function generateNewProjectId()
    {
        return $this->projectRepository->generateNewProjectId();
    }

    public function create(array $data)
    {
        try {
            return $this->projectRepository->create($data);
        } catch (\Exception $th) {
             throw new \Exception('Failed to create user. Please try again later.');
        }
    }

    public function update($id, $data)
    {
        try {
            //code...
            return $this->projectRepository->update($id, $data);
        } catch (\Throwable $th) {
            throw $th;
        }
        
    }

    public function delete($id)
    {
        try {
            //code...
            return $this->projectRepository->delete($id);;
        } catch (\Throwable $th) {
            throw $th;
        }
        
    }
}


<?php

namespace App\Services;

use App\Repositories\TaskRepository;

class TaskService
{
    protected $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }
    
    public function getLoginUser()
    {
        return $this->taskRepository->getLoginUser();
    }
    public function getAll()
    {
        return $this->taskRepository->getAll();
    }
    public function getProject()
    {
        return $this->taskRepository->getProject();
    }
    public function getAllPerson()
    {
        return $this->taskRepository->getAllPerson();
    }
    public function getPersons($projectId)
    {
        return $this->taskRepository->getPersons($projectId);
    }
    public function getAllWithRelations()
    {
        return $this->taskRepository->getAllWithRelations();
    }
    public function exportTasks($tasks)
    {
        return $this->taskRepository->exportTasks($tasks);
    }
    
    public function Search($searchTerm)
    {
        return $this->taskRepository->Search($searchTerm);
    }

    public function getById($id)
    {
        return $this->taskRepository->getById($id);
    }
    

    public function create(array $data)
    {
        try {
            return $this->taskRepository->create($data);
        } catch (\Exception $th) {
              
             throw new \Exception('Failed to create user. Please try again later.');
        
        }
    }

    public function update($id, $data)
    {
        try {
            //code...
            return $this->taskRepository->update($id, $data);
        } catch (\Throwable $th) {
            throw $th;
        }
        
    }

    public function delete($id)
    {
        try {
            //code...
            return $this->taskRepository->delete($id);;
        } catch (\Throwable $th) {
            throw $th;
        }
        
    }
}


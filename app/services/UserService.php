<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAll()
    {
        return $this->userRepository->getAll();
    }
    public function getLoginUser()
    {
        return $this->userRepository->getLoginUser();
    }
    
    public function getRole()
    {
        return $this->userRepository->getRole();
    }
    public function getPagination($pagination)
    {
        return $this->userRepository->getPagination($pagination);
    }
    public function getRoleUser()
    {
        return $this->userRepository->getRoleUser();
    }

    public function getById($id)
    {
        return $this->userRepository->getById($id);
    }

    public function create(array $data)
    {
        try {
            return $this->userRepository->create($data);
        } catch (\Exception $th) {
            throw new \Exception('Failed to create user. Please try again later.');
        }
    }

    public function update($id, $data)
    {
        try {
            //code...
            return $this->userRepository->update($id, $data);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function delete($id)
    {
        try {
            //code...
            return $this->userRepository->delete($id);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}

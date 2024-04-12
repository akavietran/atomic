<?php

namespace App\Services;

use App\Repositories\LoginRepository;

class LoginService
{
    protected $loginRepository;

    public function __construct(LoginRepository $loginRepository)
    {
        $this->loginRepository = $loginRepository;
    }

    public function authenticate($credentials)
    {
        return $this->loginRepository->authenticate($credentials);
        
    }
    public function logout()
    {
        return $this->loginRepository->logout();
        
    }
    

}


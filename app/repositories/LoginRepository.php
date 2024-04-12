<?php

namespace App\Repositories;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Session;
class LoginRepository
{
    
    public function authenticate($credentials)
    {
        $user = User::where('email', $credentials['email'])->first();

        if ($credentials['password'] === decrypt($user->plain_password)) {
            $roles = $user->roles->pluck('role')->toArray();
            Auth::login($user);
            session(['roles' => $roles]);
            return true;
        }

        return false;
    }
    public function logout()
    {
        Auth::logout();
        Session::flush();
    }
}

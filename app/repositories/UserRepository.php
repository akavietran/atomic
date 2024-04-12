<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Person;
use App\Models\Role;
use Illuminate\Support\Facades\Crypt;
class UserRepository
{
    public function isValidPersonId($personId): bool
    {
        return Person::where('id', $personId)->exists();
    }
    
    public function getAll()
    {
        return User::with('roles');
    }
    public function GetRole()
    {
        return Role::all();
    }
    public function getRoleUser()
    {
        $users = User::with('roles')->paginate(3);

        $users->getCollection()->transform(function ($user) {
            $roleNames = $user->roles->pluck('role')->implode(',');
            $user = $user->toArray();
            $user['roles'] = $roleNames;
            return $user;
        });

        return $users;
    }

    public function getById($id)
    {
        return User::findOrFail($id);
    }

    public function create(array $data)
    {
        try {
            $user = new User();
            $user->email = $data['email'];
            $user->password = $data['password'];
            $user->plain_password = Crypt::encrypt($data['password']);
            $user->save();
            if (isset($data['roles'])) {
                $user->roles()->attach($data['roles']);
            }

            return $user;
        } catch (\Exception $th) {
            throw new \Exception('Failed to create user. Please check the information again.');
        }
    }

    public function update($id, $data)
    {
        try {
            $user = User::findOrFail($id);
            if (isset($data['password'])) {
                $data['plain_password'] = Crypt::encrypt($data['password']);
            }
            $user->update([
                'email' => $data['email'],
                'password' => $data['password'] ,
                'plain_password'=>  $data['plain_password']
            ]);
            if (isset($data['roles'])) {
                $roles = Role::whereIn('id', $data['roles'])->get();
                $user->roles()->sync($roles);
            }

            return $user;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function delete($id)
    {
        try {
            $user = User::findOrFail($id);

            if ($user) {
                return $user->delete();
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}

<?php

namespace App\Repositories;

use App\Contract\UserRepositoryInterface;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class UserRepository implements UserRepositoryInterface 
{
    public function getAllUsers() 
    {



        $users = User::find(6);
        $per = $users->getAllPermissions();
       
        return User::all();
    }

    public function getUserById(User $user) 
    {
        return $user;
    }

    public function deleteUser(User $user) 
    {
        $user->delete();
    }

    public function createUser(array $attributes) 
    {
        return User::create($attributes);
    }

    public function updateUser(User $user, array $attributes) 
    {
        return $user->update($attributes);
    }
}
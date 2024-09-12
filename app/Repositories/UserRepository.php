<?php

namespace App\Repositories;

use App\Contract\UserRepositoryInterface;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Activitylog\Models\Activity;
use DB;

class UserRepository implements UserRepositoryInterface 
{
    public function getAllUsers() 
    {
       
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

    public function addNewUser($name,$email, $mobile_no,$active)
    {
        $userId = DB::table('users')->insertGetId([
            'name' => $name,
            'email' => $email,
            'mobile_no' => $mobile_no,
            'active' => $active,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        return $userId;
    }
}
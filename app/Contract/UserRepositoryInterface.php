<?php

namespace App\Contract;

use App\Models\User;

interface UserRepositoryInterface 
{
    public function getAllUsers();
    public function getUserById(User $user);
    public function deleteUser(User $user);
    public function createUser(array $attributes);
    public function updateUser(User $user, array $attributes);
    public function addNewUser($id1,$id2,$id3,$id4);
}

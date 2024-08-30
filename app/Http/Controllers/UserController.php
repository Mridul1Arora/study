<?php

namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use App\Contract\UserRepositoryInterface;


class UserController extends Controller
{
    public function __construct(
        private UserRepositoryInterface $repository
     ) 
     {
        $this->repository = $repository;
     }
   

    public function index() 
    {
        return response()->json([
            'data' => $this->repository->getAllUsers()
        ]);
    }

}

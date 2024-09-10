<?php

namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use App\Contract\UserRepositoryInterface;
use Yajra\DataTables\DataTables;


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
        $data = $this->repository->getAllUsers();
        return view('users.index', compact('data'));
     
    }

    public function getUsers(Request $request)
    {
        $users = User::select(['id', 'name', 'email', 'created_at', 'mobile_no', 'active']);
        return DataTables::of($users)
            ->addColumn('action', function($row) {
                return '<a href="#">Edit</a>'; // Customize the action buttons
            })
            ->make(true);
    }
}

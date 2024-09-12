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

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'date' => 'required|date',
            'mobile_no' => 'required|string|max:15',
            'active' => 'required|boolean',
        ]);

        User::create($validated);

        return redirect()->route('users.index')->with('success', 'User added successfully.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'date' => 'required|date',
            'mobile_no' => 'required|string|max:15',
            'active' => 'required|boolean',
        ]);

        $user = User::findOrFail($id);
        $user->update($validated);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json(['success' => 'User deleted successfully.']);
    }

    public function addNewUser()
    {
        return view('users.add-user');
    }

    public function createNewUser(Request $request)
    {
        if(!empty($request->all())){
            $name = $request->all()['name'];
            $email = $request->all()['email'];
            $mobile_no = $request->all()['mobile_no'];
            $active = $request->all()['active'];

            $userId = $this->repository->addNewUser($name,$email, $mobile_no,$active);
            if($userId) {
                return $userId;
            }
        }
    }

}

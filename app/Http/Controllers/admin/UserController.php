<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(15);

        return view('admin.users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();

        return view('admin.users.create' , ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RegisterRequest $request)
    {
        $data = $request->validated();

        $data['is_active'] = $request->has('is_active');

        if($request->has('email_verified')){
            $data['email_verified_at'] = now();
        }

        User::create($data);

        return redirect()->route('admin.users.index')->with('message', 'User ' .$data['username']. ' created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', ['user' => $user, 'roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->validated();

        $data['is_active'] = $request->has('is_active');

        if($request->has('email_verified')){
            $data['email_verified_at'] = now();
        }
        else {
            $data['email_verified_at'] = null;
        }

        if(!empty($request->has('password'))){
            $data['password'] = Hash::make($data['password']);
        }
        else {
            unset($data['password']);
        }

        $user->update($data);
        $user->save();

        return redirect()->route('admin.users.index')->with('message','User updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $userInfo = 'ID: '.$user->id. ' | Username: '. $user->username. ' | Email: ' . $user->email;
        $user->delete();

        return redirect()->route('admin.users.index')->with('message','User: '. $userInfo .' deleted successfully!');
    }
}

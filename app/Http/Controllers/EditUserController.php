<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EditUserController extends Controller
{
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->validated();

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');

            $fileName = time() . '_'. Str::uuid() . $file->getClientOriginalName();
            $path = $file->storeAs('avatars', $fileName, 'public');
            $extension = $file->getClientOriginalExtension();
            $size = $file->getSize();

            $user->avatars()->update(['is_active' => false]);

            $user->avatars()->create([
                'path' => $path,
                'type' => $extension,
                'size' => $size,
                'is_active' => true,
            ]);
        }

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        } else {
            unset($data['password']);
        }

        unset($data['avatar']);
        $user->update($data);

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}

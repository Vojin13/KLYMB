<div class="space-y-6">
    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="block text-xs font-bold uppercase text-gray-500 mb-1">First Name</label>
            <input type="text" name="first_name" value="{{ old('first_name', $user->first_name ?? '') }}" class="w-full border-gray-300 p-2 text-sm" required>
        </div>
        <div>
            <label class="block text-xs font-bold uppercase text-gray-500 mb-1">Last Name</label>
            <input type="text" name="last_name" value="{{ old('last_name', $user->last_name ?? '') }}" class="w-full border-gray-300 p-2 text-sm" required>
        </div>
    </div>

    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="block text-xs font-bold uppercase text-gray-500 mb-1">Username</label>
            <input type="text" name="username" value="{{ old('username', $user->username ?? '') }}" class="w-full border-gray-300 p-2 text-sm" required>
        </div>
        <div>
            <label class="block text-xs font-bold uppercase text-gray-500 mb-1">Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email ?? '') }}" class="w-full border-gray-300 p-2 text-sm" required>
        </div>
    </div>

    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="block text-xs font-bold uppercase text-gray-500 mb-1">
                Password {{ isset($user) ? '(leave blank to keep current)' : '' }}
            </label>
            <input type="password" name="password" class="w-full border-gray-300 p-2 text-sm" {{ isset($user) ? '' : 'required' }}>
        </div>
        <div>
            <label class="block text-xs font-bold uppercase text-gray-500 mb-1">Confirm Password</label>
            <input type="password" name="password_confirmation" class="w-full border-gray-300 p-2 text-sm" {{ isset($user) ? '' : 'required' }}>
        </div>
    </div>

    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="block text-xs font-bold uppercase text-gray-500 mb-1">Date of Birth</label>
            <input type="date" name="date_of_birth" value="{{ old('date_of_birth', $user->date_of_birth ?? '') }}" class="w-full border-gray-300 p-2 text-sm">
        </div>
        <div>
            <label class="block text-xs font-bold uppercase text-gray-500 mb-1">Role</label>
            <select name="role_id" class="w-full border-gray-300 p-2 text-sm uppercase font-bold">
                @foreach($roles as $role)
                    <option value="{{ $role->id }}"
                        @selected(old('role_id', $user->role_id ?? null) == $role->id)>
                        {{ strtoupper($role->name) }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="flex gap-8">
        <label class="flex items-center gap-2 text-sm font-bold uppercase">
            <input type="checkbox" name="is_active" value="1" {{ old('is_active', $user->is_active ?? false) ? 'checked' : '' }} class="accent-black"> Active
        </label>
        <label class="flex items-center gap-2 text-sm font-bold uppercase">
            <input type="checkbox" name="email_verified" {{ old('email_verified', isset($user) && $user->email_verified_at ? 'checked' : '') }} class="accent-black"> Email Verified
        </label>
    </div>
</div>

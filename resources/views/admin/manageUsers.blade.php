@extends('layouts.admin')

@section('content')
    <div class="space-y-8">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-black uppercase tracking-tighter text-gray-900">User Management</h1>
                <p class="text-gray-500 font-bold uppercase tracking-widest text-xs mt-1">Manage platform users</p>
            </div>
            <a href="#" class="bg-black text-white px-6 py-3 font-black uppercase tracking-widest hover:bg-red-600 transition text-xs">
                + Add New User
            </a>
        </div>

        <div class="flex justify-start mb-4">
            <p class="text-gray-500 font-bold text-sm uppercase">
                Showing
                <span class="text-black">{{ $users->firstItem() ?? 0 }}</span>
                to
                <span class="text-black">{{ $users->lastItem() ?? 0 }}</span>
                of
                <span class="text-black">{{ $users->total() }}</span>
                users
            </p>
        </div>

        <div class="bg-white border border-gray-200 shadow-sm overflow-hidden">
            <table class="w-full text-left text-base">
                <thead>
                <tr class="bg-gray-50 border-b border-gray-200 text-gray-500">
                    <th class="p-6 font-bold uppercase tracking-wider text-sm">#</th>
                    <th class="p-6 font-bold uppercase tracking-wider text-sm">Name</th>
                    <th class="p-6 font-bold uppercase tracking-wider text-sm">Email</th>
                    <th class="p-6 font-bold uppercase tracking-wider text-sm">Username</th>
                    <th class="p-6 font-bold uppercase tracking-wider text-sm">Email verified</th>
                    <th class="p-6 font-bold uppercase tracking-wider text-sm">Is active</th>
                    <th class="p-6 font-bold uppercase tracking-wider text-sm">Created at</th>
                    <th class="p-6 font-bold uppercase tracking-wider text-sm text-right">Actions</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                @foreach($users as $u)

                    <tr class="{{ $loop->iteration % 2 == 0 ? 'bg-white' : 'bg-gray-50'}} hover:bg-gray-100 transition-colors">
                        <td class="p-6">{{ $loop->iteration + $users->firstItem() - 1 }}</td>
                        <td class="p-6">{{ $u->first_name. ' ' . $u->last_name }}</td>
                        <td class="p-6">{{ $u->email }}</td>
                        <td class="p-6">{{ $u->username }}</td>
                        <td class="p-6 text-center text-xl">
                            {{ $u->email_verified_at ? '✅' : '❌' }}
                        </td>
                        <td class="p-6 text-center text-lg font-mono">
                            {{ $u->is_active ? '✅' : '❌' }}
                        </td>
                        <td class="p-6 text-gray-600">{{ $u->created_at->format('d. M. Y. H:i:s') }}</td>
                        <td class="p-6 text-right space-x-4">
                            <button class="text-blue-600 font-bold hover:text-blue-800 transition cursor-pointer">Edit</button>
                            <form action="" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-600 font-bold hover:text-red-800 transition cursor-pointer">Delete</button>
                            </form>
                        </td>
                    </tr>

                @endforeach
                </tbody>

            </table>
        </div>
        {{ $users->links() }}
    </div>
@endsection

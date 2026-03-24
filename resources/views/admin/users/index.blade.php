@extends('layouts.admin')

@section('content')
    <div class="space-y-8">
        @if(session('message'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 border border-green-200">
                {{ session('message') }}
            </div>
        @endif
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-black uppercase tracking-tighter text-gray-900">User Management</h1>
                <p class="text-gray-500 font-bold uppercase tracking-widest text-xs mt-1">Manage platform users</p>
            </div>
            <a href="{{ route('admin.users.create') }}" class="bg-black text-white px-6 py-3 font-black uppercase tracking-widest hover:bg-red-600 transition text-xs">
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
                        <td class="p-6 text-right">
                            <button id="dropdownDefaultButton-{{ $u->id }}"
                                    data-dropdown-toggle="dropdown-{{ $u->id }}"
                                    class="inline-flex items-center text-base text-red-500 transition hover:text-red-600 cursor-pointer"
                                    type="button">
                                Take Action
                                <svg class="ml-2 h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>

                            <div id="dropdown-{{ $u->id }}"
                                 class="z-50 hidden w-40 border border-gray-200 bg-white text-left shadow-xl">
                                <ul class="text-base text-gray-600">
                                    <li>
                                        <a href="{{ route('admin.users.edit', $u) }}" class="block px-4 py-2 text-blue-500 hover:bg-gray-50 hover:text-blue-600">Edit</a>
                                    </li>
                                    <li>
                                        <form action="{{ route('admin.users.ban', $u->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')

                                            @if($u->is_active)
                                                <button type="submit" class="block w-full text-left px-4 py-2 text-yellow-600 hover:bg-gray-50 hover:text-yellow-700 transition cursor-pointer font-medium">
                                                    Ban
                                                </button>
                                            @else
                                                <button type="submit" class="block w-full text-left px-4 py-2 text-green-600 hover:bg-gray-50 hover:text-green-700 transition cursor-pointer font-medium">
                                                    Unban
                                                </button>
                                            @endif
                                        </form>

                                    </li>
                                    <li class="border-t border-gray-100">
                                        <form action="{{ route('admin.users.destroy', $u) }}" method="POST">
                                            @csrf @method('DELETE')
                                            <button type="submit"
                                                    onclick="return confirm('Are you sure?')"
                                                    class="block w-full px-4 py-2 text-red-500 cursor-pointer text-left hover:bg-red-50 hover:text-red-600">
                                                Delete
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>

                @endforeach
                </tbody>

            </table>
        </div>
        {{ $users->links() }}
    </div>
@endsection

@extends('layouts.admin')

@section('content')
    <div class="space-y-8">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-black uppercase tracking-tighter text-gray-900">Brands</h1>
                <p class="text-gray-500 font-bold uppercase tracking-widest text-xs mt-1">Manage product organization</p>
            </div>
            <a href="{{ route('admin.brands.create') }}" class="bg-black text-white px-6 py-3 font-black uppercase tracking-widest hover:bg-red-600 transition text-xs">
                + Add New Brand
            </a>
        </div>

        @if(session('success'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 border border-green-200">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 border border-red-200">
                {{ session('error') }}
            </div>
        @endif

        <div class="flex justify-start mb-4">
            <p class="text-gray-500 font-bold text-sm uppercase tracking-widest">
                Showing
                <span class="text-black">{{ $brands->firstItem() ?? 0 }}</span>
                to
                <span class="text-black">{{ $brands->lastItem() ?? 0 }}</span>
                of
                <span class="text-black">{{ $brands->total() }}</span>
                brands
            </p>
        </div>

        <div class="bg-white border border-gray-200 shadow-sm overflow-hidden rounded-sm">
            <table class="w-full text-left text-base">
                <thead>
                <tr class="bg-gray-50 border-b border-gray-200 text-gray-500">
                    <th class="p-6 font-bold uppercase tracking-wider text-sm">#</th>
                    <th class="p-6 font-bold uppercase tracking-wider text-sm">Name</th>
                    <th class="p-6 font-bold uppercase tracking-wider text-sm">Slug</th>
                    <th class="p-6 font-bold uppercase tracking-wider text-sm">Website</th>
                    <th class="p-6 font-bold uppercase tracking-wider text-sm">Description</th>
                    <th class="p-6 font-bold uppercase tracking-wider text-sm">Date</th>
                    <th class="p-6 font-bold uppercase tracking-wider text-sm text-right">Actions</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                @if($brands->total() > 0)
                    @foreach($brands as $b)
                        <tr class="{{ $loop->iteration % 2 == 0 ? 'bg-white' : 'bg-gray-50'}} hover:bg-gray-100 transition-colors">
                            <td class="p-6 font-mono text-sm text-gray-400">#{{ $loop->iteration }}</td>
                            <td class="p-6 font-bold text-gray-900">{{ $b->name }}</td>
                            <td class="p-6 text-blue-500 text-sm italic font-medium">/{{ $b->slug }}</td>
                            <td class="p-6 text-gray-900"><a href="{{ $b->website }}" target="_blank">{{ $b->website }}</a></td>
                            <td class="p-6 text-gray-600 text-sm">
                                {{ Str::limit($b->description, 40) ?? 'No description' }}
                            </td>
                            <td class="p-6 text-gray-600 text-sm">{{ $b->created_at->format('d. M. Y.') }}</td>
                            <td class="p-6 text-right">
                                <button id="dropdownDefaultButton-{{ $b->id }}"
                                        data-dropdown-toggle="dropdown-{{ $b->id }}"
                                        class="inline-flex items-center text-base text-red-600 hover:text-red-700 transition cursor-pointer"
                                        type="button">
                                    Take Action
                                    <svg class="w-3 h-3 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>

                                <div id="dropdown-{{ $b->id }}"
                                     class="z-50 hidden bg-white border border-gray-200 shadow-xl w-40 text-left">
                                    <ul class="text-base">
                                        <li>
                                            <a href="{{ route('admin.brands.edit', $b) }}" class="block px-4 py-2 text-blue-500 hover:bg-gray-50 hover:text-blue-600">Edit</a>
                                        </li>
                                        <li>
                                            <form action="{{ route('admin.brands.destroy', $b) }}" method="POST">
                                                @csrf @method('DELETE')
                                                <button type="submit"
                                                        class="block w-full cursor-pointer text-red-500 text-left px-4 py-2 hover:bg-red-50 hover:text-red-600">
                                                    Delete
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6" class="p-12 text-center text-gray-400 font-black uppercase tracking-widest">No brands found.</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>

        <div class="py-4">
            {{ $brands->links() }}
        </div>
    </div>
@endsection

@extends('layouts.admin')

@section('content')
    <div class="max-w-2xl mx-auto space-y-8">
        <div>
            <h1 class="text-3xl font-black uppercase tracking-tighter text-gray-900">Add New Category</h1>
            <p class="text-gray-500 font-bold uppercase tracking-widest text-xs mt-1">
                Create a new product classification
            </p>
        </div>

        <div class="bg-white border border-gray-200 shadow-sm p-8">
            <form action="{{ route('admin.categories.store') }}" method="POST">
                @csrf

                <div class="space-y-6">
                    @if ($errors->any())
                        <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6 rounded-r-lg shadow-sm">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-sm font-bold text-red-800">
                                        Error: ({{ $errors->count() }}):
                                    </h3>
                                    <div class="mt-2 text-sm text-red-700">
                                        <ul class="list-disc pl-5 space-y-1">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold uppercase text-gray-500 mb-1">Name</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="w-full border-gray-300 p-2 text-sm" required placeholder="e.g. T-Shirts">
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase text-gray-500 mb-1">Slug</label>
                            <input type="text" name="slug" value="{{ old('slug') }}" class="w-full border-gray-300 p-2 text-sm" required placeholder="e.g. t-shirts">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase text-gray-500 mb-1">Description</label>
                        <textarea name="description" rows="5" class="w-full border-gray-300 p-2 text-sm" placeholder="Describe the category...">{{ old('description') }}</textarea>
                    </div>
                </div>

                <div class="mt-8 flex justify-end space-x-4">
                    <a href="{{ route('admin.categories.index') }}" class="text-gray-500 font-bold uppercase tracking-widest text-xs hover:text-black transition py-3">
                        Cancel
                    </a>
                    <button type="submit" class="cursor-pointer bg-black text-white px-8 py-3 font-black uppercase tracking-widest hover:bg-red-600 transition text-xs">
                        Create Category
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

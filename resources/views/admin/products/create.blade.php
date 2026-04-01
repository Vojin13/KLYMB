@extends('layouts.admin')

@section('title', 'Add New Product | KLYMB')

@section('content')
    <div class="max-w-5xl mx-auto">
        <div class="mb-8">
            <h1 class="text-3xl font-black uppercase tracking-tighter text-gray-900">Add New <span class="text-red-600">Product</span></h1>
            <p class="text-gray-500 font-bold uppercase tracking-widest text-xs mt-1">Fill in the details to list a new item in the shop</p>
        </div>

        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
            @csrf

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <div class="lg:col-span-2 space-y-6">
                    <div class="bg-white border border-gray-200 p-8 shadow-sm rounded-sm">
                        <h3 class="text-xs font-black uppercase tracking-widest text-gray-400 mb-6 border-b pb-2">Product Specifications</h3>

                        <div class="space-y-4">
                            <div>
                                <label class="block text-[10px] font-black uppercase text-gray-400 mb-1">Product Name</label>
                                <input type="text" name="name" value="{{ old('name') }}" required
                                       class="w-full border-gray-200 focus:border-black focus:ring-0 text-sm font-bold tracking-tight p-3 bg-gray-50">
                            </div>

                            <div>
                                <label class="block text-[10px] font-black uppercase text-gray-400 mb-1">Description</label>
                                <textarea name="description" rows="5" required
                                          class="w-full border-gray-200 focus:border-black focus:ring-0 text-sm p-3 bg-gray-50">{{ old('description') }}</textarea>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-[10px] font-black uppercase text-gray-400 mb-1">Brand</label>
                                    <select name="brand_id" required class="w-full border-gray-200 focus:border-black focus:ring-0 text-xs font-bold uppercase p-3 bg-gray-50">
                                        <option value="">Select Brand</option>
                                        @foreach($brands as $brand)
                                            <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label class="block text-[10px] font-black uppercase text-gray-400 mb-1">Category</label>
                                    <select name="category_id" required class="w-full border-gray-200 focus:border-black focus:ring-0 text-xs font-bold uppercase p-3 bg-gray-50">
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label class="block text-[10px] font-black uppercase text-gray-400 mb-1">Badge</label>
                                    <select name="badge_id" class="w-full border-gray-200 focus:border-black focus:ring-0 text-xs font-bold uppercase p-3 bg-gray-50">
                                        <option value="">No Badge</option>
                                        @foreach($badges as $badge)
                                            <option value="{{ $badge->id }}" {{ old('badge_id') == $badge->id ? 'selected' : '' }}>{{ $badge->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label class="block text-[10px] font-black uppercase text-gray-400 mb-1">Price (EUR)</label>
                                    <input type="number" name="price" step="0.01" min="0" value="{{ old('price') }}" required
                                           class="w-full border-gray-200 focus:border-black focus:ring-0 text-sm font-bold p-3 bg-gray-50"
                                           placeholder="0.00">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-1 space-y-6">
                    <div class="bg-white border border-gray-200 p-8 shadow-sm rounded-sm">
                        <h3 class="text-xs font-black uppercase tracking-widest text-gray-400 mb-6 border-b pb-2">Product Images</h3>

                        <div class="space-y-6">
                            <div id="image-upload-container" class="space-y-4">
                                <div class="image-row p-4 border border-dashed border-gray-200 bg-gray-50 relative group">
                                    <div class="flex justify-between items-center mb-2">
                                        <label class="block text-[10px] font-black uppercase text-gray-500">Image #1</label>
                                    </div>
                                    <input type="file" name="images[]" class="text-xs mb-3 block w-full" required>

                                    <div class="flex items-center gap-4">
                                        <label class="flex items-center gap-2 cursor-pointer">
                                            <input type="radio" name="primary_image_index" value="0" checked class="text-black focus:ring-0">
                                            <span class="text-[10px] font-black uppercase">Main Cover</span>
                                        </label>
                                        <input type="number" name="positions[]" placeholder="Pos" value="1"
                                               class="w-16 border-gray-200 text-[10px] font-bold p-1 focus:ring-0 text-center">
                                    </div>
                                </div>
                            </div>

                            <button type="button" onclick="addImageRow()"
                                    class="cursor-pointer w-full py-2 border-2 border-black text-black text-[10px] font-black uppercase tracking-widest hover:bg-black hover:text-white transition shadow-sm">
                                + Add More Images
                            </button>
                        </div>
                    </div>

                    <div class="flex flex-col gap-3">
                        <button type="submit" class="w-full bg-black text-white px-8 py-4 font-black uppercase text-xs hover:bg-red-600 transition shadow-lg cursor-pointer">
                            Save Product
                        </button>
                        <a href="{{ route('admin.products.index') }}" class="text-center text-[10px] font-black uppercase text-gray-400 hover:text-black transition tracking-widest">
                            Cancel and go back
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        let rowCount = 1;
        function addImageRow() {
            const container = document.getElementById('image-upload-container');
            const newRow = document.createElement('div');
            const currentIndex = rowCount;

            newRow.className = 'image-row p-4 border border-dashed border-gray-200 bg-gray-50 mt-4 relative group';
            newRow.innerHTML = `
                <div class="flex justify-between items-center mb-2">
                    <label class="block text-[10px] font-black uppercase text-gray-500">Image #${currentIndex + 1}</label>
                    <button type="button" onclick="this.closest('.image-row').remove()" class="text-red-600 text-[10px] font-black uppercase hover:text-black transition cursor-pointer">
                        [ Remove ]
                    </button>
                </div>
                <input type="file" name="images[]" class="text-xs mb-3 block w-full" required>
                <div class="flex items-center gap-4">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="primary_image_index" value="${currentIndex}" class="text-black focus:ring-0">
                        <span class="text-[10px] font-black uppercase">Main Cover</span>
                    </label>
                    <input type="number" name="positions[]" placeholder="Pos" value="${currentIndex + 1}"
                           class="w-16 border-gray-200 text-[10px] font-bold p-1 focus:ring-0 text-center">
                </div>
            `;
            container.appendChild(newRow);
            rowCount++;
        }
    </script>
@endsection

@extends('layouts.admin')

@section('content')
    <div class="max-w-2xl mx-auto space-y-8">
        <div>
            <h1 class="text-3xl font-black uppercase tracking-tighter text-gray-900">Edit Badge</h1>
            <p class="text-gray-500 font-bold uppercase tracking-widest text-xs mt-1">
                Updating: {{ $badge->name }}
            </p>
        </div>

        <div class="bg-gray-50 border border-dashed border-gray-300 p-6 flex flex-col items-center justify-center space-y-2">
            <span class="text-[10px] font-black uppercase tracking-widest text-gray-400">Live Preview</span>
            <span id="badge-preview"
                  class="rounded px-3 py-1 text-sm font-bold uppercase tracking-wider shadow-sm transition-all"
                  style="background-color: {{ $badge->bg_color }}; color: {{ $badge->text_color }};">
                {{ $badge->name }}
            </span>
        </div>

        <div class="bg-white border border-gray-200 shadow-sm p-8">
            <form action="{{ route('admin.badges.update', $badge) }}" method="POST">
                @csrf
                @method('PATCH')

                <div class="space-y-6">
                    @if ($errors->any())
                        <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6 rounded-r-lg shadow-sm">
                            <div class="flex">
                                <div class="ml-3">
                                    <h3 class="text-sm font-bold text-red-800">Error ({{ $errors->count() }}):</h3>
                                    <ul class="list-disc pl-5 mt-2 text-sm text-red-700">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div>
                        <label class="block text-xs font-bold uppercase text-gray-500 mb-1">Badge Name</label>
                        <input type="text" id="badge-name-input" name="name"
                               value="{{ old('name', $badge->name) }}"
                               class="w-full border-gray-300 p-2.5 text-sm focus:ring-black focus:border-black" required>
                    </div>

                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label for="bg_color" class="block text-xs font-bold uppercase text-gray-500 mb-1">Background Color</label>
                            <div class="flex items-center gap-2">
                                <input type="color" id="bg_color" name="bg_color"
                                       value="{{ old('bg_color', $badge->bg_color) }}"
                                       class="p-1 h-10 w-14 block bg-white border border-gray-200 cursor-pointer rounded-lg disabled:opacity-50 disabled:pointer-events-none">
                                <input type="text" id="bg_hex" class="w-full border-gray-300 p-2 text-sm font-mono uppercase" value="{{ $badge->bg_color }}" readonly>
                            </div>
                        </div>

                        <div>
                            <label for="text_color" class="block text-xs font-bold uppercase text-gray-500 mb-1">Text Color</label>
                            <div class="flex items-center gap-2">
                                <input type="color" id="text_color" name="text_color"
                                       value="{{ old('text_color', $badge->text_color) }}"
                                       class="p-1 h-10 w-14 block bg-white border border-gray-200 cursor-pointer rounded-lg disabled:opacity-50 disabled:pointer-events-none">
                                <input type="text" id="text_hex" class="w-full border-gray-300 p-2 text-sm font-mono uppercase" value="{{ $badge->text_color }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-8 flex justify-end space-x-4">
                    <a href="{{ route('admin.badges.index') }}" class="text-gray-500 font-bold uppercase tracking-widest text-xs hover:text-black transition py-3">
                        Cancel
                    </a>
                    <button type="submit" class="cursor-pointer bg-black text-white px-8 py-3 font-black uppercase tracking-widest hover:bg-red-600 transition text-xs">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- JS za Live Preview --}}
    <script>
        const bgInput = document.getElementById('bg_color');
        const textInput = document.getElementById('text_color');
        const nameInput = document.getElementById('badge-name-input');
        const preview = document.getElementById('badge-preview');

        const bgHex = document.getElementById('bg_hex');
        const textHex = document.getElementById('text_hex');

        bgInput.addEventListener('input', (e) => {
            preview.style.backgroundColor = e.target.value;
            bgHex.value = e.target.value.toUpperCase();
        });

        textInput.addEventListener('input', (e) => {
            preview.style.color = e.target.value;
            textHex.value = e.target.value.toUpperCase();
        });

        nameInput.addEventListener('input', (e) => {
            preview.innerText = e.target.value || 'Preview';
        });
    </script>
@endsection

<x-app-layout>
    <x-slot name='slot'>
        <div class="px-4 md:px-10 mx-auto w-full -m-24">
            <div class="flex flex-wrap mt-4">
                <div class="w-full mb-12 px-4">
                    <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white">
                        <div class="block w-full overflow-x-auto">
                            <div class="md:mt-0 md:col-span-2">
                                <form action="{{ route('admin.products.update', $product->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <div class="my-12 rounded-md">
                                        <div class="px-4 py-5 bg-gray sm:p-6">
                                            <div class="grid grid-cols-8 gap-6">
                                                <div class="col-span-6 sm:col-span-4">
                                                    <label for="name"
                                                        class="block text-sm font-medium text-gray-700">
                                                        {{ __('common.name') }}
                                                    </label>
                                                    <input type="text" name="name" id="name"
                                                        autocomplete="given-name" value="{{ $product->name }}"
                                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                    @error('name')
                                                        <p class="text-red-500">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="col-span-6 sm:col-span-4">
                                                    <label for="category"
                                                        class="block text-sm font-medium text-gray-700">{{ __('common.category') }}</label>
                                                    <select id="category" name="category_id" autocomplete="category"
                                                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}"
                                                                @if ($product->category->id === $category->id) selected @endif>
                                                                {{ $category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('category_id')
                                                        <p class="text-red-500">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="col-span-8 gap-2 flex items-end justify-between">
                                                    <div class="parent sm:col-span-8 w-full">
                                                        @foreach ($product->productAttributes as $attr)
                                                            <div class="flex flex-wrap gap-6 sm:col-span-8 w-full mb-5">
                                                                <div
                                                                    class="w-1/5 col-span-6 sm:col-span-6 lg:col-span-2">
                                                                    <label for="quantity"
                                                                        class="block text-sm font-medium text-gray-700">
                                                                        {{ __('common.quantity') }}
                                                                    </label>
                                                                    <input type="number" name="quantity[]"
                                                                        id="quantity" value="{{ $attr->quantity }}"
                                                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                                    @error('quantity')
                                                                        <p class="text-red-500">{{ $message }}</p>
                                                                    @enderror
                                                                </div>
                                                                <div
                                                                    class="w-1/5 col-span-6 sm:col-span-6 lg:col-span-2">
                                                                    <label for="color"
                                                                        class="block text-sm font-medium text-gray-700">
                                                                        {{ __('common.color') }}
                                                                    </label>
                                                                    <select id="color" name="color_id[]"
                                                                        autocomplete="color"
                                                                        class="mt-1 block col-span-8 w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                                        @foreach ($colors as $color)
                                                                            <option
                                                                                style="background: {{ $color->name }}"
                                                                                value="{{ $color->id }}"
                                                                                @if ($color->id == $attr->color_id) selected @endif>
                                                                                {{ $color->name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('color_id')
                                                                        <p class="text-red-500">{{ $message }}</p>
                                                                    @enderror
                                                                </div>
                                                                <div
                                                                    class="w-1/5 col-span-6 sm:col-span-3 lg:col-span-2">
                                                                    <label for="memory"
                                                                        class="block text-sm font-medium text-gray-700">{{ __('common.memory') }}</label>
                                                                    <select id="memory" name="memory_id[]"
                                                                        autocomplete="memory"
                                                                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                                        @foreach ($memories as $memory)
                                                                            <option value="{{ $memory->id }}"
                                                                                @if ($attr->memory_id == $memory->id) selected @endif>
                                                                                {{ $memory->rom }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('memory_id')
                                                                        <p class="text-red-500">{{ $message }}</p>
                                                                    @enderror
                                                                </div>
                                                                <div
                                                                    class="w-1/5 col-span-6 sm:col-span-3 lg:col-span-2">
                                                                    <label for="price"
                                                                        class="block text-sm font-medium text-gray-700">{{ __('common.price') }}</label>
                                                                    <input type="number" name="price[]" id="price"
                                                                        autocomplete="postal-code"
                                                                        value="{{ $attr->price }}"
                                                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                                    @error('price')
                                                                        <p class="text-red-500">{{ $message }}</p>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <div class="flex items-center gap-2 sm:col-span-8">
                                                        <p id="add"
                                                            class="items-center gap-2 bg-pink-500 hover:bg-pink-700 ml-5 cursor-pointer inline-flex justify-cente py-1 px-3 border border-transparent shadow-sm text-sm font-bold rounded-md text-white focus:outline-none focus:ring-0 focus:ring-offset-0">
                                                            <i class="fas fa-plus-circle"></i>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-span-8 sm:col-span-8">
                                                    <label for="content"
                                                        class="block text-sm font-medium text-gray-700">{{ __('common.content') }}</label>
                                                    <textarea cols="30" rows="5" name="content" id="content"
                                                        class="mt-1 block w-full shadow-sm border-gray-300 rounded-md resize-none">{{ $product->content }}</textarea>
                                                    @error('content')
                                                        <p class="text-red-500">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="col-span-8 sm:col-span-8">
                                                    <label for="specifications"
                                                        class="block text-sm font-medium text-gray-700">{{ __('common.specifications') }}</label>
                                                    <textarea cols="30" rows="5" name="specifications" id="specifications"
                                                        class="mt-1 block w-full shadow-sm border-gray-300 rounded-md resize-none">{{ $product->specifications }}</textarea>
                                                </div>
                                                <div class="col-span-8 sm:col-span-8">
                                                    <label for="files"
                                                        class="block text-sm font-medium text-gray-700">{{ __('common.image') }}</label>
                                                    <input type="file" id="image" name="images[]" multiple />
                                                    @error('files')
                                                        <p class="text-red-500">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex justify-between bg-gray-100 text-right sm:px-6">
                                        <a href="{{ route('admin.products.index') }}"
                                            class="items-center gap-2 bg-pink-500 hover:bg-pink-700 ml-5 cursor-pointer inline-flex justify-center my-5 py-1 px-3 border border-transparent shadow-sm text-sm font-bold rounded-md text-white focus:outline-none focus:ring-0 focus:ring-offset-0">
                                            <i class="fas fa-arrow-circle-left"></i>
                                            {{ __('common.back') }}
                                        </a>
                                        <button type="submit"
                                            class="items-center gap-2 bg-pink-500 hover:bg-pink-700 ml-5 cursor-pointer inline-flex justify-center my-5 py-1 px-3 border border-transparent shadow-sm text-sm font-bold rounded-md text-white focus:outline-none focus:ring-0 focus:ring-offset-0">
                                            {{ __('common.save') }}
                                            <i class="fas fa-check-circle"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
    @section('js')
        <script type="text/javascript">
            window.colors = {!! $colors !!};
            window.memories = {!! $memories !!};
        </script>
    @endsection
</x-app-layout>

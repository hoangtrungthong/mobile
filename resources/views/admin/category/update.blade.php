<x-app-layout>
    <x-slot name="slot">
        <div class="px-4 md:px-10 mx-auto w-full -m-24">
            <div class="flex flex-wrap mt-4">
                <div class="w-full mb-12 px-4">
                    <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white">
                        <div class="block w-full overflow-x-auto">
                            <div class="mt-10">
                                <div class="md:grid md:gap-6">
                                    <div class="mt-5 md:mt-0 md:col-span-2">
                                        <form action="{{ route('admin.categories.update', $category->slug) }}"
                                            method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <div class="shadow overflow-hidden sm:rounded-md">
                                                <div class="px-4 py-5 bg-white sm:p-6">
                                                    <div class="grid grid-cols-1 gap-6">
                                                        <div class="col-span-6 sm:col-span-3">
                                                            <label for="name"
                                                                class="block text-sm font-medium text-gray-700">{{ __('common.name') }}</label>
                                                            <input type="text" name="name"
                                                                value="{{ $category->name }}" id="name"
                                                                autocomplete="given-name"
                                                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        </div>
                                                        @error('name')
                                                            <p class="text-red-500">{{ $message }}</p>
                                                        @enderror
                                                        <div class="col-span-6 sm:col-span-3">
                                                            <label for="country"
                                                                class="block text-sm font-medium text-gray-700">{{ __('category.current') }}</label>
                                                            <select id="country" name="parent" autocomplete="country"
                                                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                                <option value="0">{{ __('category.parent') }}
                                                                </option>
                                                                @foreach ($categories as $category)
                                                                    @include('admin.category.category', [
                                                                        'category' => $category,
                                                                        'text' => '',
                                                                    ])
                                                                @endforeach
                                                            </select>
                                                            @error('parent')
                                                                <p class="text-red-500">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="flex justify-between bg-gray-100 text-right sm:px-6">
                                                    <a href="{{ route('admin.categories.index') }}"
                                                        class="items-center gap-2 bg-pink-500 hover:bg-pink-700 ml-5 cursor-pointer inline-flex justify-center my-5 py-1 px-3 border border-transparent shadow-sm text-sm font-bold rounded-md text-white focus:outline-none focus:ring-0 focus:ring-offset-0">
                                                        <i class="fas fa-arrow-circle-left"></i>
                                                        {{ __('common.back') }}
                                                    </a>
                                                    <button type="submit"
                                                        class="items-center gap-2 bg-pink-500 hover:bg-pink-700 ml-5 cursor-pointer inline-flex justify-center my-5 py-1 px-3 border border-transparent shadow-sm text-sm font-bold rounded-md text-white focus:outline-none focus:ring-0 focus:ring-offset-0">
                                                        {{ __('common.save') }}
                                                        <i class="fas fa-check"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>

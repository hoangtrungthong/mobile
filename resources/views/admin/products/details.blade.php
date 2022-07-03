<x-app-layout>
    <x-slot name="slot">
        <div class="md:flex md:items-center mt-12 shadow-2xl bg-white rounded-xl p-6">
            <div class="flex justify-between flex-wrap gap-28 w-full">
                <div class="max-w-full">
                    <div class="grid grid-cols-4">
                        @foreach ($product->productImages as $img)
                            <img class="col-span-2 max-w-full h-60 p-6 rounded-md object-cover max-w-lg mx-auto"
                                src="{{ Storage::url($img->path) }}" alt="Image">
                        @endforeach
                    </div>
                    <hr class="my-3">
                    <div>
                        <p>{{ $product->content }}</p>
                    </div>
                </div>
            </div>
            <div class="w-full max-w-lg mx-auto mt-5 md:ml-8 md:mt-0 md:w-1/2">
                <h3 class="text-gray-700 uppercase text-lg">{{ $product->name }}</h3>
                <hr class="my-3">
                <div class="mt-3">
                    <div class="grid grid-cols-8 justify-between mt-1">
                        <label class="col-span-2 text-gray-700 text-sm underline italic"
                            for="count">{{ __('common.color') }} </label>
                        <label class="col-span-2 text-gray-700 text-sm underline italic"
                            for="count">{{ __('common.memory') }} </label>
                        <label class="col-span-2 text-gray-700 text-sm underline italic ml-4"
                            for="count">{{ __('common.price') }}</label>
                        <label class="col-span-2 text-gray-700 text-sm underline italic"
                            for="count">{{ __('common.quantity') }}</label>
                    </div>
                    <div class="mt-1 bg-gray-200 p-1 rounded">
                        @foreach ($product->productAttributes as $attr)
                            <div class="grid grid-cols-8 mt-1">
                                @foreach ($attr->colors as $color)
                                    <p style="background-color: {{ $color->name }}"
                                        class="col-span-2 h-5 w-5 rounded-full ml-4 focus:outline-none">
                                    </p>
                                @endforeach
                                @foreach ($attr->memories as $memory)
                                    <p class="col-span-2 h-5 w-5 rounded-full focus:outline-none">
                                        {{ $memory->rom }}
                                    </p>
                                @endforeach
                                <p class="col-span-2 ml-2">{{ $attr->price }}</p>
                                <p class="col-span-2 ml-4">{{ $attr->quantity }}</p>
                            </div>
                        @endforeach
                    </div>
                    <hr class="my-3">
                    <div>
                        <label class="col-span-2 text-gray-700 text-sm text-info underline uppercase italic"
                            for="count">{{ __('common.specifications') }} </label>
                        <p>{{ $product->specifications }}</p>
                    </div>
                </div>
            </div>
        </div>
        <a href="{{ route('admin.products.index') }}"
            class="inline-block bg-indigo-500 hover:bg-indigo-700 text-white text-center py-2 px-4 my-9 rounded">&laquo;
            {{ __('common.back') }}
        </a>
    </x-slot>
</x-app-layout>

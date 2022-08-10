<x-app-layout>
    <x-slot name="slot">
        <div class="px-4 md:px-10 mx-auto w-full -m-24">
            <div class="flex flex-wrap mt-4">
                <div class="w-full mb-12 px-4">
                    <div class="block w-full overflow-x-auto">
                        <div class="md:flex md:items-center mt-12 bg-white rounded-xl p-6">
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
                                    <div class="flex flex-wrap mt-4">
                                        <div
                                            class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white">
                                            <div class="block w-full overflow-x-auto">
                                                <table
                                                    class="items-center w-full bg-transparent border-collapse  bg-gray-200">
                                                    <thead>
                                                        <tr>
                                                            <th
                                                                class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                                                {{ __('common.color') }}
                                                            </th>
                                                            <th
                                                                class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                                                {{ __('common.memory') }}
                                                            </th>
                                                            <th
                                                                class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                                                {{ __('common.import_price') }}
                                                            </th>
                                                            <th
                                                                class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                                                {{ __('common.export_price') }}
                                                            </th>
                                                            <th
                                                                class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                                                {{ __('common.quantity') }}
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $num = 1;
                                                        @endphp
                                                        @foreach ($product->productAttributes as $attr)
                                                            <tr>
                                                                @foreach ($attr->colors as $color)
                                                                    <td
                                                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left flex items-center">
                                                                        <p style="background-color: {{ $color->name }}"
                                                                            class="col-span-2 h-5 w-5 rounded-full focus:outline-none">
                                                                        </p>
                                                                        <span class="ml-3 font-bold text-blueGray-600">
                                                                            {{ $color->name }}
                                                                        </span>
                                                                    </td>
                                                                @endforeach
                                                                @foreach ($attr->memories as $memory)
                                                                    <td
                                                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                                        {{ $memory->rom }}
                                                                    </td>
                                                                @endforeach
                                                                <td
                                                                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                                    {{ $attr->price }}
                                                                </td>
                                                                <td
                                                                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                                    {{ $attr->export_price }}
                                                                </td>
                                                                <td
                                                                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                                    {{ $attr->quantity }}
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-3">
                                    <div>
                                        <label
                                            class="col-span-2 text-gray-700 text-sm text-info underline uppercase italic"
                                            for="count">{{ __('common.specifications') }} </label>
                                        <p>{{ $product->specifications }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('admin.products.index') }}"
                            class="items-center gap-2 bg-pink-500 hover:bg-pink-700 ml-5 cursor-pointer inline-flex justify-center my-5 py-1 px-3 border border-transparent shadow-sm text-sm font-bold rounded-md text-white focus:outline-none focus:ring-0 focus:ring-offset-0">
                            <i class="fas fa-arrow-circle-left"></i>
                            {{ __('common.back') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>

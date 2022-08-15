<x-app-layout>
    <x-slot name="slot">
        <div class="px-4 md:px-10 mx-auto w-full -m-24">
            <div class="flex flex-wrap mt-4">
                <div class="w-full mb-12 px-4">
                    <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white">
                        <div class="block w-full overflow-x-auto">
                            <table class="items-center w-full bg-transparent border-collapse">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                            {{ __('#') }}
                                        </th>
                                        <th
                                            class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                            {{ __('common.name') }}
                                        </th>
                                        <th
                                            class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                            {{ __('common.category') }}
                                        </th>
                                        <th
                                            class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                            {{ __('common.quantity') }}
                                        </th>
                                        <th
                                            class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                            {{ __('common.discount') }} (%)
                                        </th>
                                        {{-- <th
                                            class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                        </th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $num = 1;
                                    @endphp
                                    @if (count($products))
                                        @foreach ($products as $product)
                                            <form action="{{ route('admin.discount', $product->id) }}" method="post"
                                                class="form-discount-{{ $product->id }}">
                                                @csrf
                                                @method('PATCH')
                                                <tr>
                                                    <td
                                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                                                        <span class="font-bold text-blueGray-600">
                                                            {{ $num++ }}
                                                        </span>
                                                    </td>
                                                    <td
                                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left flex items-center">
                                                        <img src="{{ Storage::url($product->productImages[0]->path ?? '') }}"
                                                            class="h-12 w-12 bg-white rounded-full border"
                                                            alt="..." />
                                                        <span class="ml-3 font-bold text-blueGray-600">
                                                            {{ $product->name }}
                                                        </span>
                                                    </td>
                                                    <td
                                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                        {{ $product->category->name }}
                                                    </td>
                                                    <td
                                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                        {{ $product->productAttributes->sum('quantity') }}
                                                    </td>
                                                    <td data-discount="{{ $product->discount }}"
                                                        class="edit-discount-{{ $product->id }} border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                        <input
                                                        class="px-2 py-1 w-1/3 border-2 border-blue-600 text-blue-600 font-medium text-xs leading-tight uppercase rounded transition duration-150 ease-in-out"
                                                        type="text" name="discount" min="0" max="100"
                                                        value="{{ $product->discount }}">
                                                        <button type="submit">
                                                        </button>
                                                        {{-- <p>{{ $product->discount . '%' }}</p> --}}
                                                    </td>
                                                    {{-- <td class="px-6 whitespace-nowrap text-left text-sm font-medium">
                                                        <div class="flex items-center gap-2">
                                                            <a data-id="{{ $product->id }}"
                                                                class="btn-edit-discount discount-{{ $product->id }} inline-block bg-yellow-500 hover:bg-yellow-700 text-white text-center py-1 px-3 rounded">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            <a data-id="{{ $product->id }}"
                                                                class="hidden btn-update-discount update-discount-{{ $product->id }} inline-block bg-green-500 hover:bg-green-700 text-white text-center py-1 px-3 rounded">
                                                                <i class="fas fa-check"></i>
                                                            </a>
                                                            <div data-id="{{ $product->id }}"
                                                                id="btn-cancel-discount-{{ $product->id }}"
                                                                class="btn-cancel-discount"></div>
                                                        </div>
                                                    </td> --}}
                                                </tr>
                                            </form>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="7"
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-center">
                                                <span class="font-bold text-blueGray-600">
                                                    {{ __('common.emptyCommon') }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            @if ($products->hasPages())
                                <hr class="my-4 md:min-w-full">
                                <div class="px-6 pb-6">
                                    {{ $products->links() }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>

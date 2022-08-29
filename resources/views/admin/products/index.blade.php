<x-app-layout>
    <x-slot name="slot">
        <div class="px-4 md:px-10 mx-auto w-full -m-24">
            <div class="flex flex-wrap mt-4">
                <div class="w-full mb-12 px-4">
                    <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white">
                        <div class="block w-full">
                            <a href="{{ route('admin.products.create') }}" class="bg-pink-500 hover:bg-pink-700 ml-5 cursor-pointer inline-flex justify-center my-5 py-1 px-3 border border-transparent shadow-sm text-sm font-bold rounded-md text-white focus:outline-none focus:ring-0 focus:ring-offset-0">
                                {{ __('common.new') }}
                            </a>
                            <table id="manage-products" class="items-center w-full bg-transparent border-collapse">
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
                                            {{ __('common.time') }}
                                        </th>
                                        <th
                                            class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $num = 1;    
                                    @endphp
                                    @if (count($products))
                                        @foreach ($products as $product)
                                            <tr>
                                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                                                    <span class="font-bold text-blueGray-600">
                                                        {{ $num++ }}
                                                    </span>
                                                </td>
                                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left flex items-center">
                                                    <img src="{{ Storage::url($product->productImages[0]->path ?? '') }}"
                                                        class="h-12 w-12 bg-white rounded-full border" alt="..." />
                                                    <span class="ml-3 font-bold text-blueGray-600">
                                                        {{ $product->name }}
                                                    </span>
                                                </td>
                                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                    {{ $product->category->name }}
                                                </td>
                                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                    {{ $product->productAttributes->sum('quantity') }}
                                                </td>
                                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                    {{ $product->updated_at }}
                                                </td>
                                                <td class="px-6 whitespace-nowrap text-left text-sm font-medium">
                                                   {{-- <form action="{{ route('admin.products.destroy', $product->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE') --}}
                                                        <a href="{{ route('admin.continueAdd', $product->slug) }}" class="inline-block bg-indigo-500 hover:bg-indigo-700 text-white text-center py-1 px-3 rounded">
                                                            <i class="fa fa-plus"></i>
                                                        </a>
                                                        <a href="{{ route('admin.products.show', $product->slug) }}" class="inline-block bg-indigo-500 hover:bg-indigo-700 text-white text-center py-1 px-3 rounded">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        <a href="{{ route('admin.products.edit', $product->slug) }}" class="inline-block bg-yellow-500 hover:bg-yellow-700 text-white text-center py-1 px-3 rounded">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <a data-id="{{$product->id}}" data-name="{{$product->name}}" class="btn-delete-product bg-red-500 hover:bg-red-700 text-white text-center py-1 px-3 rounded">
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                    {{-- </form> --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="7" class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-center">
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
    @section('js')
        <script src="{{ asset('js/product.js') }}" defer></script>
        window.deleteProduct = {!! session()->has("deleteProduct") ?? "" !!}
    @endsection
</x-app-layout>

<x-app-layout>
    <x-slot name="slot">
        {{-- <div class="flex flex-col my-12">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        @if (count($products))
                            <div class="capitalize">
                                {{ __('common.found') . ' ' . count($products) . ' ' . __('common.product') }}
                            </div>
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class=" px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{ __('#') }}
                                        </th>
                                        <th scope="col"
                                            class=" px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{ __('common.image') }}
                                        </th>
                                        <th scope="col"
                                            class=" px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{ __('common.name') }}
                                        </th>
                                        <th scope="col"
                                            class=" px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{ __('common.category') }}
                                        </th>
                                        <th scope="col"
                                            class=" px-6  py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{ __('common.quantity') }}
                                        </th>
                                        <th scope="col"
                                            class=" px-6  py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{ __('common.time') }}
                                        </th>
                                        <th scope="col" class="relative px-6 py-3">
                                            <span class="sr-only">{{ __('common.edit') }}</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($products as $product)
                                        <tr>
                                            <td class="p-3 text-center whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $num++ }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="p-3 text-center whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <img src="{{ Storage::url($product->productImages[0]->path ?? '') }}"
                                                        alt="Image">
                                                </div>
                                            </td>
                                            <td class="p-3 text-center whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $product->name }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="p-3 text-center whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <p
                                                        class="px-4 py-1 border-2 border-blue-600 text-blue-600 font-medium text-xs leading-tight uppercase rounded transition duration-150 ease-in-out">
                                                        {{ $product->category->name ?? '' }}
                                                    </p>
                                                </div>
                                            </td>
                                            <td class="p-3 text-center whitespace-nowrap">
                                                <div class="text-sm text-gray-500">
                                                    {{ $product->productAttributes->sum('quantity') }}
                                                </div>
                                            </td>
                                            <td class="p-3 text-center whitespace-nowrap">
                                                <div class="text-sm text-gray-500">
                                                    {{ $product->created_at }}
                                                </div>
                                            </td>
                                            <td class=" px-6 py-3 whitespace-nowrap text-right text-sm font-medium">
                                                <form action="{{ route('admin.products.destroy', $product->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('admin.products.show', $product->slug) }}"
                                                        class="inline-block bg-indigo-500 hover:bg-indigo-700 text-white text-center py-1 px-3 rounded">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('admin.products.edit', $product->slug) }}"
                                                        class="inline-block bg-yellow-500 hover:bg-yellow-700 text-white text-center py-1 px-3 rounded">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <button type="submit"
                                                        class="bg-red-500 hover:bg-red-700 text-white text-center py-1 px-3 rounded"
                                                        onclick="return confirm('Are you sure to remove this products ?')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div>
                                <p class="text-center px-6 py-3 text-sm font-medium text-white-500 whitespace-nowrap"
                                    colspan="7">
                                    {{ __('common.fail_search') }}
                                </p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="px-4 md:px-10 mx-auto w-full -m-24">
            <div class="flex flex-wrap mt-4">
                <div class="w-full mb-12 px-4">
                    <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white">
                        <div class="block w-full overflow-x-auto">
                            <p class="ml-5 cursor-pointer inline-flex justify-center my-5 py-1 px-3 border border-transparent text-sm font-bold rounded-md text-black focus:outline-none focus:ring-0 focus:ring-offset-0">
                                {{ __('common.found') . ' ' . count($products) . ' ' . __('common.product') }}
                            </p>
                            @if (count($products))
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
                                        @foreach ($products as $product)
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
                                                        class="h-12 w-12 bg-white rounded-full border" alt="..." />
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
                                                <td
                                                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                    {{ $product->updated_at }}
                                                </td>
                                                <td class="px-6 whitespace-nowrap text-left text-sm font-medium">
                                                    <form action="{{ route('admin.products.destroy', $product->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a href="{{ route('admin.continueAdd', $product->slug) }}"
                                                            class="inline-block bg-indigo-500 hover:bg-indigo-700 text-white text-center py-1 px-3 rounded">
                                                            <i class="fa fa-plus"></i>
                                                        </a>
                                                        <a href="{{ route('admin.products.show', $product->slug) }}"
                                                            class="inline-block bg-indigo-500 hover:bg-indigo-700 text-white text-center py-1 px-3 rounded">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        <a href="{{ route('admin.products.edit', $product->slug) }}"
                                                            class="inline-block bg-yellow-500 hover:bg-yellow-700 text-white text-center py-1 px-3 rounded">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <button type="submit"
                                                            class="bg-red-500 hover:bg-red-700 text-white text-center py-1 px-3 rounded"
                                                            onclick="return confirm('Are you sure to remove this products ?')">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div class="bg-white flex justify-center items-center py-20 px-20 w-full mx-auto">
                                    <img src="{{ asset('images/notFound.png') }}" alt="" srcset="">
                                    <p class="text-black w-1/5">
                                        {{ __('common.fail_search') }}
                                    </p>
                                </div>
                            @endif
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

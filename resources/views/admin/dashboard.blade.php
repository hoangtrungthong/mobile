<x-app-layout>
    <div id="root">
        <div class="relative bg-blueGray-50" style="top: -230px">
            <!-- Header -->
            <div class="relative bg-pink-600 md:pt-32 pb-32">
                <div class="px-4 md:px-10 mx-auto w-full">
                    <div>
                        <!-- Card stats -->
                        <div class="flex flex-wrap">
                            <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
                                <div
                                    class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                                    <div class="flex-auto p-4">
                                        <div class="flex flex-wrap">
                                            <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                                <h5 class="text-blueGray-400 uppercase font-bold text-xs">
                                                    {{ __('common.sale_values_month') }}
                                                </h5>
                                                <span class="font-semibold text-xl text-blueGray-700">
                                                    {{ number_format($salesThisMonth) . 'đ' }}
                                                </span>
                                            </div>
                                            <div class="relative w-auto pl-4 flex-initial"
                                                style="top: -40px;left: 125px;">
                                                <div
                                                    class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-red-500">
                                                    <i class="far fa-chart-bar"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="text-xs text-blueGray-400" style="margin-top: -28px">
                                            <span
                                                class="{{ $salesThisMonth >= $salesBeforeMonth ? 'text-emerald-500' : 'text-red-500' }} mr-2">
                                                <i
                                                    class="fas {{ $salesThisMonth >= $salesBeforeMonth ? 'fa-arrow-up' : 'fa-arrow-down' }}"></i>
                                                {{ (!is_int($percentageSales) ? number_format($percentageSales, 0, ',', '') : $percentageSales) . '%' }}
                                            </span>
                                            <span class="whitespace-nowrap">
                                                {{ __('common.since_last_month') }}
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
                                <div
                                    class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                                    <div class="flex-auto p-4">
                                        <div class="flex flex-wrap">
                                            <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                                <h5 class="text-blueGray-400 uppercase font-bold text-xs">
                                                    {{ __('common.order') }}
                                                </h5>
                                                <span class="font-semibold text-xl text-blueGray-700">
                                                    {{ $totalOrderThisMonth }}
                                                </span>
                                            </div>
                                            <div class="relative w-auto pl-4 flex-initial">
                                                <div
                                                    class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-orange-500">
                                                    <i class="fas fa-chart-pie"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="text-xs text-blueGray-400 mt-4">
                                            <span
                                                class="{{ $totalOrderThisMonth >= $totalOrderBeforeMonth ? 'text-emerald-500' : 'text-red-500' }} mr-2">
                                                <i
                                                    class="fas {{ $totalOrderThisMonth >= $totalOrderBeforeMonth ? 'fa-arrow-up' : 'fa-arrow-down' }}"></i>
                                                {{ (is_int($percentageOrders) ? $percentageOrders : number_format($percentageOrders, 0, ',', '')) . '%' }}
                                            </span>
                                            <span class="whitespace-nowrap">
                                                {{ __('common.since_last_month') }}
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
                                <div
                                    class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                                    <div class="flex-auto p-4">
                                        <div class="flex flex-wrap">
                                            <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                                <h5 class="text-blueGray-400 uppercase font-bold text-xs">
                                                    {{ __('common.customers') }}
                                                </h5>
                                                <span class="font-semibold text-xl text-blueGray-700">
                                                    {{ $totalCustomerThisMonth }}
                                                </span>
                                            </div>
                                            <div class="relative w-auto pl-4 flex-initial">
                                                <div
                                                    class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-pink-500">
                                                    <i class="fas fa-users"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="text-xs text-blueGray-400 mt-4">
                                            <span
                                                class="{{ $totalCustomerThisMonth >= $totalCustomerBeforeMonth ? 'text-emerald-500' : 'text-red-500' }} mr-2">
                                                <i
                                                    class="fas {{ $totalCustomerThisMonth >= $totalCustomerBeforeMonth ? 'fa-arrow-up' : 'fa-arrow-down' }}"></i>
                                                {{ (!is_int($percentageCustomers) ? number_format($percentageCustomers, 0, ',', '') : $percentageCustomers) . '%' }}
                                            </span>
                                            <span class="whitespace-nowrap"> {{ __('common.since_last_month') }}
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
                                <div
                                    class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                                    <div class="flex-auto p-4">
                                        <div class="flex flex-wrap">
                                            <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                                <h5 class="text-blueGray-400 uppercase font-bold text-xs">
                                                    {{ __('common.ratings') }}
                                                </h5>
                                                <span class="font-semibold text-xl text-blueGray-700">
                                                    {{ $ratingThisMonth }}
                                                </span>
                                            </div>
                                            <div class="relative w-auto pl-4 flex-initial">
                                                <div
                                                    class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-lightBlue-500">
                                                    <i class="fas fa-percent"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="text-xs text-blueGray-400 mt-4">
                                            <span
                                                class="{{ $ratingThisMonth >= $ratingBeforeMonth ? 'text-emerald-500' : 'text-red-500' }} mr-2">
                                                <i
                                                    class="fas {{ $ratingThisMonth >= $ratingBeforeMonth ? 'fa-arrow-up' : 'fa-arrow-down' }}"></i>
                                                {{ (!is_int($percentageRatings) ? number_format($percentageRatings, 0, ',', '') : $percentageRatings) . '%' }}
                                            </span>
                                            <span class="whitespace-nowrap">
                                                {{ __('common.since_last_month') }}
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-4 md:px-10 mx-auto w-full -m-24">
                <div class="flex flex-wrap">
                    <div class="w-full  mb-12 xl:mb-0 px-4">
                        <div
                            class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-blueGray-700">
                            <div class="rounded-t mb-0 px-4 py-3 bg-transparent">
                                <div class="flex flex-wrap items-center">
                                    <div class="relative w-full max-w-full flex-grow flex-1">
                                        <h2 class="text-white text-xl font-semibold">
                                            {{ __('common.total_sales') }}
                                        </h2>
                                    </div>
                                    <div>
                                        <div class="flex items-center">
                                            <div class="relative">
                                                <div
                                                    class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                                    <svg aria-hidden="true"
                                                        class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                                        fill="currentColor" viewBox="0 0 20 20"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </div>
                                                <input datepicker datepicker-autohide datepicker-format="mm/dd/yyyy" id="start_date" name="start" type="text"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="{{ __('common.start_date') }}">
                                            </div>
                                            <span class="mx-4 text-white">
                                                {{ __('common.to') }}
                                            </span>
                                            <div class="relative">
                                                <div
                                                    class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                                    <svg aria-hidden="true"
                                                        class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                                        fill="currentColor" viewBox="0 0 20 20"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </div>
                                                <input datepicker datepicker-autohide datepicker-format="mm/dd/yyyy" id="end_date" name="end" type="text"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="{{ __('common.end_date') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="p-8 flex-auto">
                                <!-- Chart -->
                                <div class="p-4 relative h-450-px bg-blueGray-50 rounded">
                                    <canvas id="chart-sales" width="800" height="450"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full px-4">
                        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
                            <div class="rounded-t mb-0 px-4 py-3 bg-transparent">
                                <div class="flex flex-wrap items-center">
                                    <div class="relative w-full max-w-full flex-grow flex-1">
                                        <h2 class="text-blueGray-700 text-xl font-semibold">
                                            {{ __('common.total_quantity') }}
                                        </h2>
                                    </div>
                                    <div>
                                        <div date-rangepicker class="flex items-center">
                                            <div class="relative">
                                                <div
                                                    class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                                    <svg aria-hidden="true"
                                                        class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                                        fill="currentColor" viewBox="0 0 20 20"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </div>
                                                <input id="start_date" name="start" type="text"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="{{ __('common.start_date') }}">
                                            </div>
                                            <span class="mx-4 text-grey-500">
                                                {{ __('common.to') }}
                                            </span>
                                            <div class="relative">
                                                <div
                                                    class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                                    <svg aria-hidden="true"
                                                        class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                                        fill="currentColor" viewBox="0 0 20 20"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </div>
                                                <input id="end_date" name="end" type="text"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="{{ __('common.end_date') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="p-4 flex-auto">
                                <!-- Chart -->
                                <div class="p-4 relative h-450-px rounded">
                                    <canvas id="chart-quantity" width="800" height="450"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap mt-4">
                    <div class="w-full mb-12 xl:mb-0 px-4">
                        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
                            <div class="rounded-t mb-0 px-4 py-3 border-0">
                                <div class="flex flex-wrap items-center">
                                    <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                                        <h3 class="font-semibold text-base text-blueGray-700">
                                            {{ __('common.new_products') }}
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="block w-full overflow-x-auto">
                                <!-- Projects table -->
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
                                        @if (count($newProducts))
                                            @foreach ($newProducts as $product)
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
                                                    <td
                                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                        {{ $product->updated_at }}
                                                    </td>
                                                    <td class="px-6 whitespace-nowrap text-left text-sm font-medium">
                                                        <form
                                                            action="{{ route('admin.products.destroy', $product->id) }}"
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
                            </div>
                        </div>
                    </div>
                    <div class="w-full px-4">
                        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
                            <div class="rounded-t mb-0 px-4 py-3 border-0">
                                <div class="flex flex-wrap items-center">
                                    <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                                        <h3 class="font-semibold text-base text-blueGray-700">
                                            {{ __('common.new_orders') }}
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="block w-full overflow-x-auto">
                                <!-- Projects table -->
                                <table class="items-center w-full bg-transparent border-collapse">
                                    <thead class="thead-light">
                                        <tr>
                                            <th
                                                class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                                {{ __('#') }}
                                            </th>
                                            <th
                                                class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                                {{ __('common.customer') }}
                                            </th>
                                            <th
                                                class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                                {{ __('common.phone') }}
                                            </th>
                                            <th
                                                class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                                {{ __('common.address') }}
                                            </th>
                                            <th
                                                class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                                {{ __('common.time') }}
                                            </th>
                                            <th
                                                class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
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
                                        @if (count($newOrders))
                                            @foreach ($newOrders as $order)
                                                <tr>
                                                    <td
                                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                                                        <span class="font-bold text-blueGray-600">
                                                            {{ $num++ }}
                                                        </span>
                                                    </td>
                                                    <td
                                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left flex items-center">
                                                        <span class="ml-3 font-bold text-blueGray-600">
                                                            {{ $order->user->name }}
                                                        </span>
                                                    </td>
                                                    <td
                                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                        {{ $order->phone }}
                                                    </td>
                                                    <td
                                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                        {{ $order->address }}
                                                    </td>
                                                    <td
                                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                        {{ $order->created_at }}
                                                    </td>
                                                    <td
                                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                        {{ $order->sum_amount }}
                                                    </td>
                                                    <td class="px-6 whitespace-nowrap text-left text-sm font-medium">
                                                        <div class="flex items-center gap-3">
                                                            <a href="{{ route('admin.orders.show', $order->id) }}"
                                                                class="inline-block bg-indigo-500 hover:bg-indigo-700 text-white text-xs text-center py-1 px-3 rounded">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                            @if ($order->status == config('const.approve') || $order->status == config('const.reject'))
                                                                <p
                                                                    class="px-3 py-1 rounded text-white text-xs font-bold {{ $order->status == config('const.reject') ? 'bg-red-400 px-7' : 'bg-green-400 ' }} ">
                                                                    {{ $order->status == config('const.reject') ? __('common.rejected') : __('common.accepted') }}
                                                                </p>
                                                            @else
                                                                <form
                                                                    action="{{ route('admin.stateOrder', $order->id) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('PATCH')
                                                                    <button type="submit"
                                                                        class="inline-block bg-indigo-500 hover:bg--700 text-white text-center py-1 px-3 rounded">
                                                                        <i class="fas fa-check-circle"></i>
                                                                    </button>
                                                                </form>
                                                                <form
                                                                    action="{{ route('admin.rejectOrder', $order->id) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('PATCH')
                                                                    <button type="submit"
                                                                        class="bg-red-500 hover:bg-red-700 text-white text-center py-1 px-3 rounded"
                                                                        onclick="return confirm('Are you sure to remove this products ?')">
                                                                        <i class="fas fa-window-close"></i>
                                                                    </button>
                                                                </form>
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" charset="utf-8"></script>
    <script type="text/javascript">
        window.dataChartSales = {!! $dataChartSales !!}
        window.dataChartQuantity = {!! $dataChartQuantity !!}
    </script>
</x-app-layout>

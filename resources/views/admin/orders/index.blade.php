<x-app-layout>
    <x-slot name="slot">
        <div class="px-4 md:px-10 mx-auto w-full -m-24">
            <div class="flex flex-wrap mt-4">
                <div class="w-full mb-12 px-4">
                    <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white">
                        <div class="block w-full overflow-x-auto">
                            <table id="manage-user" class="items-center w-full bg-transparent border-collapse">
                                <thead>
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
                                    @if (count($orders))
                                        @foreach ($orders as $order)
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
                                                        <a data-id="{{ $order->id }}" 
                                                            data-status="{{ $order->status }}"
                                                            data-allStatus="{{ json_encode($status) }}"
                                                            x-data="{ id: 'modal-example' }"
                                                            x-on:click="$dispatch('modal-overlay',{id})"
                                                            class="update-status-order inline-block bg-yellow-500 hover:bg-yellow-700 text-white text-center text-xs py-1 px-3 rounded">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        @if ($order->status == config('const.approve') || $order->status == config('const.reject'))
                                                            <p
                                                                class="px-3 py-1 rounded text-white text-xs font-bold {{ $order->status == config('const.reject') ? 'bg-red-400 px-7' : 'bg-green-400 ' }} ">
                                                                {{ $order->status == config('const.reject') ? __('common.rejected') : __('common.accepted') }}
                                                            </p>
                                                        @else
                                                            <form action="{{ route('admin.stateOrder', $order->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('PATCH')
                                                                <button type="submit"
                                                                    class="inline-block bg-indigo-500 hover:bg--700 text-white text-xs text-center py-1 px-3 rounded">
                                                                    <i class="fas fa-check-circle"></i>
                                                                </button>
                                                            </form>
                                                            <form action="{{ route('admin.rejectOrder', $order->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('PATCH')
                                                                <button type="submit"
                                                                    class="bg-red-500 hover:bg-red-700 text-white text-center text-xs py-1 px-3 rounded"
                                                                    onclick="return confirm('Are you sure ?')">
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
                            @if ($orders->hasPages())
                                <hr class="my-4 md:min-w-full">
                                <div class="px-6 pb-6">
                                    {{ $orders->links() }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="flex items-center justify-center">
            <div class="fixed inset-0 z-10 flex flex-col items-center justify-end overflow-y-auto bg-gray-600 bg-opacity-50 sm:justify-start"
                x-data="{ modal: false }" x-show="modal"
                x-on:modal-overlay.window="if ($event.detail.id == 'modal-example') modal=true"
                x-transition:enter="transition ease-out duration-1000" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-500"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                <div class="w-full px-2 py-20 transition-all transform sm:max-w-2xl" role="dialog" aria-modal="true"
                    aria-labelledby="modal-headline" x-show="modal"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 -translate-y-4 sm:translate-y-4"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-100 translate-y-0"
                    x-transition:leave-end="opacity-0 -translate-y-4 sm:translate-y-4" x-on:click.away="modal=false">
                    <div class="bg-white rounded-xl shadow-sm mt-24">
                        <form class="form-update-status">
                            <div class="shadow overflow-hidden sm:rounded-md">
                                <div class="px-4 py-5 bg-white sm:p-6">
                                    <div class="grid grid-cols-1 gap-6">
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="country"
                                                class="block text-sm font-medium text-gray-700">{{ __('common.update_status_order') }}</label>
                                            <select id="status_order" name="status"
                                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                {{-- @php
                                                    $orderModal = App\Models\Order::where('status', );
                                                @endphp
                                                @foreach ($status as $key => $value)
                                                    <option value="{{ $value }}">{{ $key }}
                                                    </option>
                                                @endforeach --}}
                                            </select>
                                            @error('parent')
                                                <p class="text-red-500">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="flex justify-end bg-gray-100 text-right sm:px-6">
                                    <a @click="modal = false"
                                        class="items-center gap-2 bg-gray-500 hover:bg-gray-700 ml-5 cursor-pointer inline-flex justify-center my-2 py-1 px-3 border border-transparent shadow-sm text-sm font-bold rounded-md text-white focus:outline-none focus:ring-0 focus:ring-offset-0">
                                        {{ __('common.cancel') }}
                                    </a>
                                    <button type="submit"
                                        class="items-center gap-2 bg-pink-500 hover:bg-pink-700 ml-5 cursor-pointer inline-flex justify-center my-2 py-1 px-3 border border-transparent shadow-sm text-sm font-bold rounded-md text-white focus:outline-none focus:ring-0 focus:ring-offset-0">
                                        {{ __('common.update') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </section>
    </x-slot>
</x-app-layout>

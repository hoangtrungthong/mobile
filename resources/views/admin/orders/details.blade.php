<x-app-layout>
    <x-slot name="slot">
        <div class="px-4 md:px-10 mx-auto w-full -m-24">
            <div class="flex flex-wrap mt-4">
                <div class="w-full mb-12 px-4">
                    <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white">
                        <div class="block w-full overflow-x-auto">
                            @if (count($orderDetails))
                                <div class="w-full h-full bg-white">
                                    <div class="flex justify-between p-4">
                                        <div>
                                            <h6 class="font-bold">{{ __('common.order_date') }} : <span
                                                    class="text-sm font-medium">
                                                    {{ $orderDetails[0]->order->created_at }}</span></h6>
                                            <h6 class="font-bold">{{ __('common.order_id') }} : <span
                                                    class="text-sm font-medium">{{ $orderDetails[0]->order->id }}</span>
                                            </h6>
                                        </div>
                                        <div class="w-40">
                                            <address class="text-sm">
                                                <span class="font-bold">{{ __('common.ship_to') }} :</span>
                                                <ul>
                                                    <li>{{ $orderDetails[0]->order->user->name }}</li>
                                                    <li>{{ $orderDetails[0]->order->user->phone }}</li>
                                                    <li>{{ $orderDetails[0]->order->user->address }}</li>
                                                </ul>
                                            </address>
                                        </div>
                                    </div>
                                    <div class="flex justify-center p-4 w-full">
                                        <div class="border-b border-gray-200 w-full">
                                            <table class="w-full">
                                                <thead class="bg-gray-50">
                                                    <tr>
                                                        <th class="text-center px-4 py-2 text-sm text-gray-500 ">
                                                            {{ __('#') }}
                                                        </th>
                                                        <th class="text-center px-4 py-2 text-sm text-gray-500 ">
                                                            {{ __('common.product') }}
                                                        </th>
                                                        <th class="text-center px-4 py-2 text-sm text-gray-500 ">
                                                            {{ __('common.color') }}
                                                        </th>
                                                        <th class="text-center px-4 py-2 text-sm text-gray-500 ">
                                                            {{ __('common.memory') }}
                                                        </th>
                                                        <th class="text-center px-4 py-2 text-sm text-gray-500 ">
                                                            {{ __('common.quantity') }}
                                                        </th>
                                                        <th class="text-center px-4 py-2 text-sm text-gray-500 ">
                                                            {{ __('common.price') }}
                                                        </th>
                                                        <th class="text-center px-4 py-2 text-sm text-gray-500 ">
                                                            {{ __('common.total') }}
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="bg-white">
                                                    @php
                                                        $num = 1;
                                                        $total = 0;
                                                    @endphp
                                                    @foreach ($orderDetails as $key => $item)
                                                        <tr class="whitespace-nowrap">
                                                            <td class="text-center px-6 py-4 text-sm text-gray-500">
                                                                {{ $num++ }}
                                                            </td>
                                                            <td class="text-center px-6 py-4">
                                                                <div class="text-sm text-gray-900">
                                                                    {{ $item->product->name }}
                                                                </div>
                                                            </td>
                                                            <td class="text-center text-sm  px-6 py-4">
                                                                <div class="    uppercase text-gray-500">
                                                                    {{ $item->color->name }}</div>
                                                            </td>
                                                            <td class="text-center px-6 py-4 text-sm text-gray-500">
                                                                {{ $item->memory->rom }}
                                                            </td>
                                                            <td class="text-center px-6 py-4">
                                                                {{ $item->quantity }}
                                                            </td>
                                                            <td class="text-center px-6 py-4">
                                                                {{ number_format($item->price, 0, '', ',') . ' đ' }}
                                                            </td>
                                                            <td class="text-center px-6 py-4">
                                                                <p class="bg-green-300 p-1 text-white">
                                                                    {{ number_format($item->price * $item->quantity, 0, '', ',') . ' đ' }}
                                                                </p>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    @foreach ($orderDetails as $vl)
                                                        @php
                                                            $total += $vl['price'] * $vl['quantity'];
                                                        @endphp
                                                    @endforeach
                                                    <tr class="text-center text-white bg-gray-800">
                                                        <th colspan="6"></th>
                                                        <td class="text-sm font-bold">
                                                            <b>{{ number_format($total, 0, '', ',') . ' đ' }}</b>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex justify-between bg-gray-100 text-right sm:px-6">
                                    <a href="{{ route('admin.orders.index') }}"
                                        class="items-center gap-2 bg-pink-500 hover:bg-pink-700 ml-5 cursor-pointer inline-flex justify-center my-5 py-1 px-3 border border-transparent shadow-sm text-sm font-bold rounded-md text-white focus:outline-none focus:ring-0 focus:ring-offset-0">
                                        <i class="fas fa-arrow-circle-left"></i>
                                        {{ __('common.back') }}
                                    </a>
                                    @if ($orderDetails[0]->order->status > config('const.pedding'))
                                        @switch($orderDetails[0]->order->status )
                                            @case(config('const.reject'))
                                                <p class="items-center gap-2 ml-5 cursor-pointer inline-flex justify-center my-5 py-1 px-3 border border-transparent shadow-sm text-sm font-bold rounded-md text-white focus:outline-none focus:ring-0 focus:ring-offset-0 rounded text-white text-sm font-bold bg-red-400 px-7 ">
                                                    {{ __('common.rejected') }}
                                                </p>
                                            @break

                                            @case(config('const.approve'))
                                                <p class="items-center gap-2 ml-5 cursor-pointer inline-flex justify-center my-5 py-1 px-3 border border-transparent shadow-sm text-sm font-bold rounded-md text-white focus:outline-none focus:ring-0 focus:ring-offset-0 rounded text-white text-sm font-bold px-7"
                                                    style="background:  rgb(127, 80, 238)">
                                                    {{ __('common.accepted') }}
                                                </p>
                                            @break

                                            @case(config('const.processing'))
                                                <p class="items-center gap-2 ml-5 cursor-pointer inline-flex justify-center my-5 py-1 px-3 border border-transparent shadow-sm text-sm font-bold rounded-md text-white focus:outline-none focus:ring-0 focus:ring-offset-0 rounded text-white text-sm font-bold bg-orange-400 px-7 "
                                                    style="background:  rgb(232, 124, 66)">
                                                    {{ __('common.orders.status.processing') }}
                                                </p>
                                            @break

                                            @case(config('const.cancel'))
                                                <p class="items-center gap-2 ml-5 cursor-pointer inline-flex justify-center my-5 py-1 px-3 border border-transparent shadow-sm text-sm font-bold rounded-md text-white focus:outline-none focus:ring-0 focus:ring-offset-0 rounded text-white text-sm font-bold bg-amber-800 px-7 "
                                                    style="background:  rgb(79, 59, 4)">
                                                    {{ __('common.canceled') }}
                                                </p>
                                            @break

                                            @case(config('const.refund'))
                                                <p class="items-center gap-2 ml-5 cursor-pointer inline-flex justify-center my-5 py-1 px-3 border border-transparent shadow-sm text-sm font-bold rounded-md text-white focus:outline-none focus:ring-0 focus:ring-offset-0 rounded text-white text-sm font-bold bg-yellow-400 px-7 "
                                                    style="background:  rgb(226, 197, 51)">
                                                    {{ __('common.orders.status.refund') }}
                                                </p>
                                            @break

                                            @case(config('const.completed'))
                                                <p class="items-center gap-2 ml-5 cursor-pointer inline-flex justify-center my-5 py-1 px-3 border border-transparent shadow-sm text-sm font-bold rounded-md text-white focus:outline-none focus:ring-0 focus:ring-offset-0 rounded text-white text-sm font-bold bg-green-400 px-7 ">
                                                    {{ __('common.isCompleted') }}
                                                </p>
                                            @break

                                            @default
                                                ''
                                        @endswitch
                                    @else
                                        <div class="flex gap-3 items-center mr-10">
                                            <form action="{{ route('admin.stateOrder', $orderDetails[0]->order->id) }}"
                                                method="post">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit"
                                                    class="inline-block bg-indigo-500 hover:bg--700 text-white text-center py-1 px-3 rounded">
                                                    <i class="fas fa-check-circle"></i>
                                                </button>
                                            </form>
                                            <form
                                                action="{{ route('admin.rejectOrder', $orderDetails[0]->order->id) }}"
                                                method="post">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit"
                                                    class="bg-red-500 hover:bg-red-700 text-white text-center py-1 px-3 rounded"
                                                    onclick="return confirm('Are you sure to remove this products ?')">
                                                    <i class="fas fa-window-close"></i>
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>

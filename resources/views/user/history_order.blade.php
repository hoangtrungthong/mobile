<x-guest-layout>
    <x-slot name="slot">
        <div class="flex flex-col mt-16">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('#') }}
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('common.image') }}
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('common.name') }}
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('common.color') }}
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('common.memory') }}
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('common.price') }}
                                    </th>
                                    <th scope="col"
                                        class=" x-6  py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('common.quantity') }}
                                    </th>
                                    <th scope="col"
                                        class=" x-6  py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('common.time') }}
                                    </th>
                                    <th scope="col"
                                        class="x-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('common.total') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @if (count($orders))
                                    @php
                                        $total = 0;
                                        $num = 1;
                                    @endphp
                                    @foreach ($orders as $order)
                                        @foreach ($order->orderDetails as $items)
                                            <tr>
                                                <td class="px-6 py-3 text-center whitespace-nowrap">
                                                    <p class="text-sm text-center font-medium text-gray-900">
                                                        {{ $num++ }}
                                                    </p>
                                                </td>
                                                <td class="px-6 py-3 whitespace-nowrap w-1/6">
                                                    <div class="flex items-center">
                                                        <img src="{{ Storage::url($items->image ?? '') }}"
                                                            alt="Image">
                                                    </div>
                                                </td>
                                                <td class="px-6 py-3 text-center whitespace-nowrap">
                                                    <p class="text-sm text-center font-medium text-gray-900">
                                                        {{ $items->product->name }}
                                                    </p>
                                                </td>
                                                <td class="px-6 py-3 text-center whitespace-nowrap">
                                                    <p class="text-sm text-center font-medium text-gray-900">
                                                        {{ $items->color->name }}
                                                    </p>
                                                </td>
                                                <td class="px-6 py-3 text-center whitespace-nowrap">
                                                    <p class="text-sm text-center font-medium text-gray-900">
                                                        {{ $items->memory->rom }}
                                                    </p>
                                                </td>
                                                <td class="px-6 py-3 text-center whitespace-nowrap">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ number_format($items->price, 0, '', ',') }}$
                                                    </div>
                                                </td>
                                                <td class="px-6 py-3 text-center whitespace-nowrap">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $items->quantity }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-3 text-center whitespace-nowrap">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $items->created_at }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-3 text-center whitespace-nowrap">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ number_format(($items->price * $items->quantity), 0, '', ',') }}$
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                    @foreach ($orders as $ord)
                                        @foreach ($ord->orderDetails as $val)
                                            @php
                                                $total += $val->price * $val->quantity;
                                            @endphp
                                        @endforeach
                                    @endforeach
                                    <tr class="text-white bg-gray-800">
                                        <th colspan="7"></th>
                                        <td class="text-sm font-bold"><b>{{ __('common.total') }}</b></td>
                                        <td class="text-sm font-bold"><b>{{ number_format($total, 0, '', ',') }}$</b></td>
                                    </tr>
                                @else
                                    <tr>
                                        <td class="text-center px-6 py-3 text-sm font-medium text-gray-500 whitespace-nowrap"
                                            colspan="9">
                                            {{ __('common.empty') }}
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white">
            {{ $orders->links() }}
        </div>
    </x-slot>
</x-guest-layout>

<x-app-layout>
    <x-slot name="slot">
        <div class="px-4 md:px-10 mx-auto w-full -m-24">
            <div class="flex flex-wrap mt-4">
                <div class="w-full mb-12 px-4">
                    <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white">
                        <div class="block w-ful">
                            <table id="manage-users" class="items-center w-full bg-transparent border-collapse">
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
                                            {{ __('common.phone') }}
                                        </th>
                                        <th
                                            class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                            {{ __('common.address') }}
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
                                    @if (count($users))
                                        @foreach ($users as $user)
                                            <tr>
                                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                                                    <span class="font-bold text-blueGray-600">
                                                        {{ $num++ }}
                                                    </span>
                                                </td>
                                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left flex items-center">
                                                    <img src="@if ($user->image && !str_contains($user->image, "https://"))
                                                            {{ Storage::url($user->image) }}
                                                        @elseif ($user->image && str_contains($user->image, "https://"))
                                                            {{ $user->image }}
                                                        @else
                                                            {{ asset('images/avatar_default.png') }}
                                                        @endif"
                                                        class="h-12 w-12 bg-white rounded-full border" alt="..." />
                                                    <span class="ml-3 font-bold text-blueGray-600">
                                                        {{ $user->name }}
                                                    </span>
                                                </td>
                                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                    {{ $user->phone }}
                                                </td>
                                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                    {{ $user->address }}
                                                </td>
                                                <td class="statusUser-{{ $user->id }} border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                    @if ($user->status === config('const.users.status.active'))
                                                        <button data-id="{{ $user->id }}"
                                                            class="block_user cursor-pointer inline-flex justify-center py-1 px-3 border border-transparent shadow-sm text-xs font-bold rounded-md text-white bg-red-600 focus:outline-none focus:ring-0 focus:ring-offset-0">
                                                            {{ __('user.block') }}
                                                            <span class="amount_block"></span>
                                                        </button>
                                                    @else
                                                        <button data-id="{{ $user->id }}"
                                                            class="active_user cursor-pointer inline-flex justify-center py-1 px-3 border border-transparent shadow-sm text-xs font-bold rounded-md text-white bg-green-500 focus:outline-none focus:ring-0 focus:ring-offset-0">
                                                            {{ __('user.active') }}
                                                            <span class="amount_active"></span>
                                                        </button>
                                                    @endif
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
                            @if ($users->hasPages())
                                <hr class="my-4 md:min-w-full">
                                <div class="px-6 pb-6">
                                    {{ $users->links() }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
    @section('js')
        <script src="{{ asset('js/users.js') }}" defer></script>
    @endsection
</x-app-layout>

<x-app-layout>
    <x-slot name="slot">
        <div class="px-4 md:px-10 mx-auto w-full -m-24">
            <div class="flex flex-wrap mt-4">
                <div class="w-full mb-12 px-4">
                    <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white">
                        {{-- <div class="rounded-t mb-0 px-4 py-3 border-0">
                            <div class="flex flex-wrap items-center">
                                <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                                    <h3 class="font-semibold text-lg text-blueGray-700">
                                        Card Tables
                                    </h3>
                                </div>
                            </div>
                        </div> --}}
                        <div class="block w-full overflow-x-auto">
                            <!-- Projects table -->
                            <table id="manage-user" class="items-center w-full bg-transparent border-collapse">
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
                                            {{ __('common.status') }}
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
                                    @foreach ($users as $user)
                                        <tr>
                                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                                                <span class="font-bold text-blueGray-600">
                                                    {{ $num++ }}
                                                </span>
                                            </td>
                                            <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left flex items-center">
                                                <img src="@if ($user->image)
                                                        {{ Storage::url($user->image) }}
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
                                            <td
                                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                <i class="fas fa-circle 
                                                    @if ($user->is_block === config('const.active'))
                                                        text-green-500
                                                    @else
                                                        text-red-500
                                                    @endif mr-2"></i>
                                                @if ($user->is_block === config('const.active'))
                                                    {{ __('user.active') }}
                                                @else
                                                    {{ __('user.block') }}
                                                @endif
                                            </td>
                                            <td class="px-6 whitespace-nowrap text-left text-sm font-medium">
                                                <a href="" class="inline-block bg-yellow-500 hover:bg-yellow-700 text-white text-center py-1 px-3 rounded">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                                <a data-id="{{ $user->id }}" class="btn-update-users bg-red-500 hover:bg-red-700 text-white text-center py-1 px-3 rounded">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
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
</x-app-layout>

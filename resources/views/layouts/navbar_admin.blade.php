<nav
    class="absolute top-0 left-0 w-full z-10 bg-transparent md:flex-row md:flex-nowrap md:justify-start flex items-center p-4 bg-pink-500">
    <div class="w-full mx-autp items-center flex justify-between md:flex-nowrap flex-wrap md:px-10 px-4">
        <a class="text-white text-sm uppercase hidden lg:inline-block font-semibold"
            href="{{ route('admin.dashboard') }}">{{ __('common.dashboard') }}</a>
        <form action="{{ route('search') }}" method="get"
            class="md:flex hidden w-8/12 flex-row flex-wrap items-center lg:ml-auto mr-auto">
            <div class="relative flex w-full flex-wrap items-stretch">
                <input type="text" name="key"
                    class="border-0 w-10 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 relative bg-white bg-white rounded text-sm shadow outline-none focus:outline-none focus:ring w-full pl-10"
                    placeholder="{{ __('common.search') }}" />
                <button type="submit"
                    class="z-10 h-full leading-snug font-normal absolute text-center text-blueGray-300 absolute bg-transparent rounded text-base items-center justify-center w-8 pl-3 py-3">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>

        <div class="flex justify-center">
            <div x-data="{ dropdownOpen: true }" class="relative right-5">
                <button @click="dropdownOpen = !dropdownOpen" class="relative z-10 block p-2 focus:outline-none">
                    <svg class="h-7 w-7 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path
                            d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z" />
                    </svg>
                    <p data-count="{{ $data['read'] && count($data['read']) > 0 ? count($data['read']) : 0 }}"
                        id="count-notify"
                        class="absolute bg-red-500 text-xs text-white px-2 rounded-full absolute top-1 text-bold">
                        <span
                            class="notify-count">{{ $data['read'] && count($data['read']) > 0 ? count($data['read']) : '' }}</span>
                    </p>
                </button>

                <div x-show="!dropdownOpen" @click="dropdownOpen = !dropdownOpen" class="fixed inset-0 w-full z-10">
                </div>
                <div x-show="!dropdownOpen"
                    class="absolute right-0 mt-2 bg-white rounded-md shadow-lg overflow-hidden z-20"
                    style="width:20rem;">
                    <div>
                        <div class="p-4 flex items-center justify-between">
                            <p class="text-sm text-indigo-600">{{ __('common.notifications') }}</p>
                            @if (count($data['notifications']))
                                <a class="opacity-70 inline-flex justify-center p-2 border border-transparent shadow-sm text-xs font-medium rounded-lg text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                    href="{{ route('admin.markAllRead') }}">
                                    {{ __('common.mark_read') }}
                                </a>
                            @endif
                        </div>
                        <hr />
                        <div class="list-notification" style="min-height: 200px; max-height:400px; overflow-y: auto; overflow-x: hidden">
                            @forelse ($data['notifications'] as $notify)
                                <form action="{{ route('admin.notifications.update', $notify->id) }}" method="post"
                                    class="{{ $notify->read_at == null ? 'bg-blue-50' : 'bg-white' }} flex items-center px-4 py-3 border-b hover:bg-gray-100 -mx-2">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="focus:outline-none">
                                        <div class="flex text-left">
                                            <div tabindex="0" aria-label="heart icon" role="img"
                                                class="h-8 w-8 rounded-full object-cover mx-1 text-green-400">
                                                <i class="fas fa-donate"></i>
                                            </div>
                                            <div class="text-gray-600 text-sm mx-2 block">
                                                <p class="">
                                                    {{ __('common.new_order') . $notify->data['content'] }}</p>
                                                <p class="focus:outline-none float-left text-xs text-gray-500">
                                                    {{ $notify->created_at->diffForHumans($data['now']) }}
                                                </p>
                                            </div>
                                        </div>
                                    </button>
                                </form>
                            @empty
                                <div class="mt-10 text-center text-gray-500">
                                    <p class="">{{ __('common.empty_notify') }}</p>
                                    <i class="fas fa-bell-slash text-xl"></i>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <ul class="flex-col md:flex-row list-none items-center hidden md:flex">
            <a class="text-blueGray-500 block" onclick="openDropdown(event,'user-dropdown')">
                <div class="items-center flex">
                    <span
                        class="w-12 h-12 text-sm text-white bg-blueGray-200 inline-flex items-center justify-center rounded-full"><img
                            alt="..." class="w-full rounded-full align-middle border-none shadow-lg"
                            src="{{ auth()->user()->image ? Storage::url(auth()->user()->image) : asset('images/avatar_default.png') }}" /></span>
                </div>
            </a>
            @if (auth()->user()->role_id == config('const.user'))
                <div class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-48"
                    id="user-dropdown">
                    <a href="#pablo"
                        class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">Action</a><a
                        href="#pablo"
                        class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">Another
                        action</a><a href="#pablo"
                        class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">Something
                        else here</a>
                    <div class="h-0 my-2 border border-solid border-blueGray-100"></div>
                    <a href="#pablo"
                        class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">Seprated
                        link</a>
                </div>
            @endif
        </ul>
    </div>
</nav>

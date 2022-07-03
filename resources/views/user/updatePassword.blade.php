<x-guest-layout>
    <x-slot name="slot">
        <div class="container mx-auto mt-5 w-full max-w-lg text-black mt-40 my-40">
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"
                action="{{ route('user.changePassword', ['user' => $user]) }}" method="post">
                @method('PATCH')
                @csrf
                <div class="flex items-center border-b border-teal-500 py-2 gap-5">
                    <x-label class="block text-gray-700 text-sm font-bold mr-5 w-56" for="password"
                        :value="__('common.password')" />
                    <x-input id="password"
                        class="appearance-none shadow-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none focus:ring-transparent"
                        type="password" name="password" required />
                </div>
                <div class="flex items-center border-b border-teal-500 py-2 gap-5">
                    <x-label class="block text-gray-700 text-sm font-bold mr-5 w-56" for="password_confirmation"
                        :value="__('common.confirm_password')" />
                    <x-input id="password_confirmation"
                        class="appearance-none shadow-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none focus:ring-transparent"
                        type="password" name="password_confirmation" required />
                </div>
                @error('password')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
                <div class="flex items-center justify-between mt-5">
                    <button type="submit"
                        class="gradient hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">{{ __('common.update') }}</button>
                    <a class="gradient hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        href="{{ route('user.profile') }}">{{ __('common.cancel') }}</a>
                </div>
            </form>
        </div>
    </x-slot>
</x-guest-layout>

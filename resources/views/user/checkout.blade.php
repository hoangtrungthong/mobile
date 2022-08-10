<x-guest-layout>
    <x-slot name="slot">
        <div class="mt-10 bg-white">
            <div class="md:grid md:grid-cols-1 md:gap-6">
                <div class="container mx-auto my-28 md:col-span-1 w-1/2">
                    <form action="{{ route('user.order') }}" method="POST">
                        @csrf
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div class="grid grid-cols-1 gap-6">
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="phone"
                                            class="block text-sm font-medium text-gray-700">{{ __('common.phone') }}</label>
                                        <input type="text" name="phone" id="phone" autocomplete="given-name"
                                            class="text-gray-700 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                            value="{{ $user->phone }}">
                                        @error('phone')
                                            <p class="text-red-500">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="address"
                                            class="block text-sm font-medium text-gray-700">{{ __('common.address') }}</label>
                                        <input type="text" name="address" id="address" autocomplete="given-name"
                                            class="text-gray-700 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                            value="{{ $user->address }}">
                                        @error('address')
                                            <p class="text-red-500">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="payment_method"
                                            class="block text-sm font-medium text-gray-700">{{ __('common.payment_method') }}</label>
                                        @error('payment_method')
                                            <p class="text-red-500">{{ $message }}</p>
                                        @enderror
                                          <select
                                            name="payment_method"
                                            id="payment_method"
                                            class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                            aria-label="Default select example">
                                            @foreach ($payment_methods as $item)
                                                <option value="{{ $item->id }}">{{ $item->type }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                                </div>
                                <div class="px-4 py-3 text-right sm:px-1">
                                    <button type="submit"
                                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        {{ __('common.continue') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-slot>
</x-guest-layout>

<x-app-layout>
    <x-slot name="slot">
        <div class="px-4 md:px-10 mx-auto w-full -m-24" style="margin-top: -150px">
            <div class="flex flex-wrap mt-4">
                <div class="w-full mb-12 px-4">
                    <div class="block w-full overflow-x-auto">
                        <div class="md:flex md:items-center mt-12 bg-white rounded-xl p-6">
                            <div class="flex justify-between flex-wrap gap-28 w-full">
                                <div class="max-w-full">
                                    <!-- Swiper -->
                                    <style>
                                        .gallery {
                                            width: 100%;
                                            max-width: 200px;
                                            margin: 10px auto;
                                            overflow: hidden
                                        }

                                        .gallery-slider {
                                            width: 100%;
                                            height: auto;
                                            margin: 0 0 10px 0;
                                        }

                                        .gallery .swiper-container {
                                            padding-top: 0
                                        }

                                        .gallery-slider .swiper-slide {
                                            width: auto;
                                            height: 200px;
                                        }

                                        .gallery-slider .swiper-slide img {
                                            display: block;
                                            width: auto;
                                            height: auto;
                                            margin: 0 auto;
                                        }

                                        .gallery-thumbs {
                                            width: 100%;
                                            padding: 0;
                                            overflow: hidden;
                                        }

                                        .gallery-thumbs .swiper-slide {
                                            width: 100px;
                                            height: 100px;
                                            text-align: center;
                                            overflow: hidden;
                                            opacity: 0.1;
                                        }

                                        .gallery-thumbs .swiper-slide-active {
                                            opacity: 1;
                                        }

                                        .gallery-thumbs .swiper-slide img {
                                            width: auto;
                                            height: 100%;
                                        }
                                    </style>
                                    <div>
                                        <div class="gallery">
                                            <div class="swiper-container gallery-slider">
                                                <div class="swiper-wrapper">
                                                    @foreach ($product->productImages as $img)
                                                        <div class="swiper-slide">
                                                            <img src="{{ Storage::url($img->path) }}" alt="">
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>

                                            <div class="swiper-container gallery-thumbs">
                                                <div class="swiper-wrapper">
                                                    @foreach ($product->productImages as $img)
                                                        <div class="swiper-slide">
                                                            <img src="{{ Storage::url($img->path) }}" alt="">
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-3">
                                    <div>
                                        <p>{{ $product->content }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full max-w-lg mx-auto mt-5 md:ml-8 md:mt-0 md:w-1/2">
                                <h3 class="text-gray-700 uppercase text-lg">{{ $product->name }}</h3>
                                <hr class="my-3">
                                <div class="mt-3">
                                    <div class="flex flex-wrap mt-4">
                                        <div
                                            class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white">
                                            <div class="block w-full overflow-x-auto">
                                                <table
                                                    class="items-center w-full bg-transparent border-collapse  bg-gray-200">
                                                    <thead>
                                                        <tr>
                                                            <th
                                                                class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                                                {{ __('common.color') }}
                                                            </th>
                                                            <th
                                                                class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                                                {{ __('common.memory') }}
                                                            </th>
                                                            <th
                                                                class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                                                {{ __('common.import_price') }}
                                                            </th>
                                                            <th
                                                                class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                                                {{ __('common.export_price') }}
                                                            </th>
                                                            <th
                                                                class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                                                {{ __('common.quantity') }}
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
                                                        @foreach ($product->productAttributes as $attr)
                                                            <tr>
                                                                @foreach ($attr->colors as $color)
                                                                    <td
                                                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left flex items-center">
                                                                        <p style="background-color: {{ $color->name }}"
                                                                            class="col-span-2 h-5 w-5 rounded-full focus:outline-none">
                                                                        </p>
                                                                        <span class="ml-3 font-bold text-blueGray-600">
                                                                            {{ $color->name }}
                                                                        </span>
                                                                    </td>
                                                                @endforeach
                                                                @foreach ($attr->memories as $memory)
                                                                    <td
                                                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                                        {{ $memory->rom }}
                                                                    </td>
                                                                @endforeach
                                                                <td
                                                                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                                    {{ number_format($attr->price, 0, '', ',') }}đ
                                                                </td>
                                                                <td
                                                                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                                    {{ number_format($attr->export_price, 0, '', ',') }}đ
                                                                </td>
                                                                <td
                                                                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                                                    {{ $attr->quantity }}
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-3">
                                    <div>
                                        <label
                                            class="col-span-2 text-gray-700 text-sm text-info underline uppercase italic"
                                            for="count">{{ __('common.specifications') }} </label>
                                        <p>{{ $product->specifications }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('admin.products.index') }}"
                            class="items-center gap-2 bg-pink-500 hover:bg-pink-700 ml-5 cursor-pointer inline-flex justify-center my-5 py-1 px-3 border border-transparent shadow-sm text-sm font-bold rounded-md text-white focus:outline-none focus:ring-0 focus:ring-offset-0">
                            <i class="fas fa-arrow-circle-left"></i>
                            {{ __('common.back') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
    @section('js')
        <!-- Initialize Swiper -->
        <script type="text/javascript">
            //メインスライド
            var slider = new Swiper('.gallery-slider', {
                slidesPerView: 1,
                centeredSlides: true,
                loop: true,
                loopedSlides: 6, //スライドの枚数と同じ値を指定
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });

            //サムネイルスライド
            var thumbs = new Swiper('.gallery-thumbs', {
                slidesPerView: 'auto',
                spaceBetween: 10,
                centeredSlides: true,
                loop: true,
                slideToClickedSlide: true,
            });

            //3系
            //slider.params.control = thumbs;
            //thumbs.params.control = slider;

            //4系～
            slider.controller.control = thumbs;
            thumbs.controller.control = slider;
        </script>
    @endsection
</x-app-layout>

<x-guest-layout>
    <x-slot name="slot">
        <div class="pt-24">
            <div class="container px-3 mb-14 mx-auto flex flex-wrap flex-col md:flex-row items-center">
                <div class="carousel w-full relative overflow-hidden">
                    <div class="carousel-inner relative overflow-hidden w-full">
                        <!--Slide 1-->
                        <input class="carousel-open hidden" type="radio" id="carousel-1" name="carousel" aria-hidden="true"
                            hidden="" checked="checked" />
                        <div class="carousel-item absolute opacity-0 inline h-96">
                            <img class="m-auto h-96 rounded-2xl"
                                src="{{ asset('images/banners/830-300-830x300-24.png') }}" alt="">
                        </div>
                        <label for="carousel-3"
                            class=" control-1 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 left-0 my-auto flex justify-center content-center">
                            <i class="fas fa-angle-left mt-3"></i>
                        </label>
                        <label for="carousel-2"
                            class=" next control-1 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 right-0 my-auto">
                            <i class="fas fa-angle-right mt-3"></i>
                        </label>

                        <!--Slide 2-->
                        <input class="carousel-open hidden" type="radio" id="carousel-2" name="carousel"
                            aria-hidden="true" hidden="" />
                        <div class="carousel-item absolute opacity-0 inline h-96">
                            <img class="m-auto h-96 rounded-2xl"
                                src="{{ asset('images/banners/Aseri-830-300-830x300-2.png') }}" alt="">
                        </div>
                        <label for="carousel-1"
                            class=" control-2 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 left-0 my-auto">
                            <i class="fas fa-angle-left mt-3"></i>
                        </label>
                        <label for="carousel-3"
                            class=" next control-2 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointe  hidden font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 right-0 my-auto">
                            <i class="fas fa-angle-right mt-3"></i>
                        </label>

                        <!--Slide 3-->
                        <input class="carousel-open hidden" type="radio" id="carousel-3" name="carousel"
                            aria-hidden="true" hidden="" />
                        <div class="carousel-item absolute opacity-0 inline h-96">
                            <img class="m-auto h-96 rounded-2xl"
                                src="{{ asset('images/banners/renno6-seri-830-300-830x300-3.png') }}" alt="">
                        </div>
                        <label for="carousel-2"
                            class=" control-3 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 left-0 my-auto">
                            <i class="fas fa-angle-left mt-3"></i>
                        </label>
                        <label for="carousel-1"
                            class=" next control-3 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-700 leading-tight text-center z-10 inset-y-0 right-0 my-auto">
                            <i class="fas fa-angle-right mt-3"></i>
                        </label>
                    </div>
                </div>
            </div>
            <div class="relative -mt-12 lg:-mt-24">
                <svg viewBox="0 0 1428 174" version="1.1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g transform="translate(-2.000000, 44.000000)" fill="#FFFFFF" fill-rule="nonzero">
                            <path
                                d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496"
                                opacity="0.100000001"></path>
                            <path
                                d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z"
                                opacity="0.100000001"></path>
                            <path
                                d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z"
                                id="Path-4" opacity="0.200000003"></path>
                        </g>
                        <g transform="translate(-4.000000, 76.000000)" fill="#FFFFFF" fill-rule="nonzero">
                            <path
                                d="M0.457,34.035 C57.086,53.198 98.208,65.809 123.822,71.865 C181.454,85.495 234.295,90.29 272.033,93.459 C311.355,96.759 396.635,95.801 461.025,91.663 C486.76,90.01 518.727,86.372 556.926,80.752 C595.747,74.596 622.372,70.008 636.799,66.991 C663.913,61.324 712.501,49.503 727.605,46.128 C780.47,34.317 818.839,22.532 856.324,15.904 C922.689,4.169 955.676,2.522 1011.185,0.432 C1060.705,1.477 1097.39,3.129 1121.236,5.387 C1161.703,9.219 1208.621,17.821 1235.4,22.304 C1285.855,30.748 1354.351,47.432 1440.886,72.354 L1441.191,104.352 L1.121,104.031 L0.457,34.035 Z">
                            </path>
                        </g>
                    </g>
                </svg>
            </div>
            <div>
                <section class="bg-white border-b">
                    <div class="suggest container mx-auto px-16 phone relative">
                        <div class="container mx-auto pt-4 ">
                            <h1 style="font-weight: 300"
                                class="text-3xl font-light pl-4 w-1/4 rounded-tr-3xl font-bold leading-tight text-white gradient">
                                {{ __('common.suggest') }}
                            </h1>
                        </div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper swiper-container border-2 border-pink-500 ">
                            <div class="swiper-wrapper phone_menu">
                                @foreach ($products as $product)
                                    <div class="swiper-slide">
                                        <div>
                                            <a href="{{ route('showProduct', $product->slug) }}">
                                                <img class="max-w-full h-52"
                                                    src="{{ Storage::url($product->productImages[0]->path) }}"
                                                    alt="">
                                            </a>
                                            <a href="" class="mt-3">{{ $product->name }}</a>
                                        </div>
                                        <div class="price mt-3">
                                            <p>{{ number_format($product->discount > 0 ? $product->productAttributes[0]->sale_price : $product->productAttributes[0]->export_price) }}đ
                                            </p>
                                            @if ($product->discount > 0)
                                                <del
                                                    style="color: #ccc">{{  number_format($product->productAttributes[0]->export_price) }}đ</del>
                                            @endif

                                        </div>
                                        @if ($product->discount > 0)
                                            <div>
                                                <span class="sale">-{{ $product->discount }}%</span>
                                                <div class="ico">
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </section>
                <section class="bg-white">
                    <div class="px-16 ">
                        <div class="max-w-2xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
                            <div class="container mx-auto pt-4 border-b-2 border-pink-500">
                                <h2 style="font-weight: 300"
                                    class="text-4xl pl-4 w-1/4 rounded-tr-3xl font-bold leading-tight text-white gradient">
                                    {{ __('common.product') }}</h2>
                            </div>
                            <div
                                class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                                @foreach ($products as $product)
                                    <div class="group relative">
                                        <div
                                            class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
                                            <img src="{{ Storage::url($product->productImages[0]->path) }}"
                                                alt="image"
                                                class="w-full h-full object-center object-cover lg:w-full lg:h-full">
                                        </div>
                                        <div class="mt-4 flex justify-between">
                                            <div>
                                                <h3 class="text-sm text-gray-700">
                                                    <a href="{{ route('showProduct', $product->slug) }}">
                                                        <span aria-hidden="true" class="absolute inset-0"></span>
                                                        {{ $product->name }}
                                                    </a>
                                                </h3>
                                                <p class="mt-1 text-sm text-gray-500"></p>
                                            </div>
                                            <div>
                                                <p class="text-sm font-medium text-gray-900">
                                                    {{ number_format($product->discount > 0 ? $product->productAttributes[0]->sale_price : $product->productAttributes[0]->export_price) }}đ
                                                </p>
                                                @if ($product->discount > 0)
                                                    <del
                                                        style="color: #ccc">{{  number_format($product->productAttributes[0]->export_price) }}đ</del>
                                                @endif
                                            </div>
                                              @if ($product->discount > 0)
                                            <div>
                                                <span class="sale">-{{ $product->discount }}%</span>
                                                <div class="ico">
                                                </div>
                                            </div>
                                        @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </section>
                <section class="bg-white border-b py-8">
                    <div class="container mx-auto flex flex-wrap pt-4 pb-12">
                        <h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
                            Title
                        </h2>
                        <div class="w-full mb-4">
                            <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
                        </div>
                        <div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
                            <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
                                <a href="#" class="flex flex-wrap no-underline hover:no-underline">
                                    <p class="w-full text-gray-600 text-xs md:text-sm px-6">
                                        xGETTING STARTED
                                    </p>
                                    <div class="w-full font-bold text-xl text-gray-800 px-6">
                                        Lorem ipsum dolor sit amet.
                                    </div>
                                    <p class="text-gray-800 text-base px-6 mb-5">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam at ipsum eu
                                        nunc
                                        commodo posuere et sit amet ligula.
                                    </p>
                                </a>
                            </div>
                            <div
                                class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow p-6">
                                <div class="flex items-center justify-start">
                                    <button
                                        class="mx-auto lg:mx-0 hover:underline gradient text-white font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                                        Action
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
                            <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
                                <a href="#" class="flex flex-wrap no-underline hover:no-underline">
                                    <p class="w-full text-gray-600 text-xs md:text-sm px-6">
                                        xGETTING STARTED
                                    </p>
                                    <div class="w-full font-bold text-xl text-gray-800 px-6">
                                        Lorem ipsum dolor sit amet.
                                    </div>
                                    <p class="text-gray-800 text-base px-6 mb-5">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam at ipsum eu
                                        nunc
                                        commodo posuere et sit amet ligula.
                                    </p>
                                </a>
                            </div>
                            <div
                                class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow p-6">
                                <div class="flex items-center justify-center">
                                    <button
                                        class="mx-auto lg:mx-0 hover:underline gradient text-white font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                                        Action
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
                            <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
                                <a href="#" class="flex flex-wrap no-underline hover:no-underline">
                                    <p class="w-full text-gray-600 text-xs md:text-sm px-6">
                                        xGETTING STARTED
                                    </p>
                                    <div class="w-full font-bold text-xl text-gray-800 px-6">
                                        Lorem ipsum dolor sit amet.
                                    </div>
                                    <p class="text-gray-800 text-base px-6 mb-5">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam at ipsum eu
                                        nunc
                                        commodo posuere et sit amet ligula.
                                    </p>
                                </a>
                            </div>
                            <div
                                class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow p-6">
                                <div class="flex items-center justify-end">
                                    <button
                                        class="mx-auto lg:mx-0 hover:underline gradient text-white font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                                        Action
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="bg-gray-100 py-8">
                    <div class="container mx-auto px-2 pt-4 pb-12 text-gray-800">
                        <h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
                            Pricing
                        </h2>
                        <div class="w-full mb-4">
                            <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
                        </div>
                        <div class="flex flex-col sm:flex-row justify-center pt-12 my-12 sm:my-4">
                            <div
                                class="flex flex-col w-5/6 lg:w-1/4 mx-auto lg:mx-0 rounded-none lg:rounded-l-lg bg-white mt-4">
                                <div
                                    class="flex-1 bg-white text-gray-600 rounded-t rounded-b-none overflow-hidden shadow">
                                    <div class="p-8 text-3xl font-bold text-center border-b-4">
                                        Free
                                    </div>
                                    <ul class="w-full text-center text-sm">
                                        <li class="border-b py-4">Thing</li>
                                        <li class="border-b py-4">Thing</li>
                                        <li class="border-b py-4">Thing</li>
                                    </ul>
                                </div>
                                <div
                                    class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow p-6">
                                    <div class="w-full pt-6 text-3xl text-gray-600 font-bold text-center">
                                        £0
                                        <span class="text-base">for one user</span>
                                    </div>
                                    <div class="flex items-center justify-center">
                                        <button
                                            class="mx-auto lg:mx-0 hover:underline gradient text-white font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                                            Sign Up
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="flex flex-col w-5/6 lg:w-1/3 mx-auto lg:mx-0 rounded-lg bg-white mt-4 sm:-mt-6 shadow-lg z-10">
                                <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
                                    <div class="w-full p-8 text-3xl font-bold text-center">Basic</div>
                                    <div class="h-1 w-full gradient my-0 py-0 rounded-t"></div>
                                    <ul class="w-full text-center text-base font-bold">
                                        <li class="border-b py-4">Thing</li>
                                        <li class="border-b py-4">Thing</li>
                                        <li class="border-b py-4">Thing</li>
                                        <li class="border-b py-4">Thing</li>
                                    </ul>
                                </div>
                                <div
                                    class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow p-6">
                                    <div class="w-full pt-6 text-4xl font-bold text-center">
                                        £x.99
                                        <span class="text-base">/ per user</span>
                                    </div>
                                    <div class="flex items-center justify-center">
                                        <button
                                            class="mx-auto lg:mx-0 hover:underline gradient text-white font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                                            Sign Up
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="flex flex-col w-5/6 lg:w-1/4 mx-auto lg:mx-0 rounded-none lg:rounded-l-lg bg-white mt-4">
                                <div
                                    class="flex-1 bg-white text-gray-600 rounded-t rounded-b-none overflow-hidden shadow">
                                    <div class="p-8 text-3xl font-bold text-center border-b-4">
                                        Pro
                                    </div>
                                    <ul class="w-full text-center text-sm">
                                        <li class="border-b py-4">Thing</li>
                                        <li class="border-b py-4">Thing</li>
                                        <li class="border-b py-4">Thing</li>
                                    </ul>
                                </div>
                                <div
                                    class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow p-6">
                                    <div class="w-full pt-6 text-3xl text-gray-600 font-bold text-center">
                                        £x.99
                                        <span class="text-base">/ per user</span>
                                    </div>
                                    <div class="flex items-center justify-center">
                                        <button
                                            class="mx-auto lg:mx-0 hover:underline gradient text-white font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                                            Sign Up
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Change the colour #f8fafc to match the previous section colour -->
                <svg class="wave-top" viewBox="0 0 1439 147" version="1.1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g transform="translate(-1.000000, -14.000000)" fill-rule="nonzero">
                            <g class="wave" fill="#f8fafc">
                                <path
                                    d="M1440,84 C1383.555,64.3 1342.555,51.3 1317,45 C1259.5,30.824 1206.707,25.526 1169,22 C1129.711,18.326 1044.426,18.475 980,22 C954.25,23.409 922.25,26.742 884,32 C845.122,37.787 818.455,42.121 804,45 C776.833,50.41 728.136,61.77 713,65 C660.023,76.309 621.544,87.729 584,94 C517.525,105.104 484.525,106.438 429,108 C379.49,106.484 342.823,104.484 319,102 C278.571,97.783 231.737,88.736 205,84 C154.629,75.076 86.296,57.743 0,32 L0,0 L1440,0 L1440,84 Z">
                                </path>
                            </g>
                            <g transform="translate(1.000000, 15.000000)" fill="#FFFFFF">
                                <g
                                    transform="translate(719.500000, 68.500000) rotate(-180.000000) translate(-719.500000, -68.500000) ">
                                    <path
                                        d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496"
                                        opacity="0.100000001"></path>
                                    <path
                                        d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z"
                                        opacity="0.100000001"></path>
                                    <path
                                        d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z"
                                        opacity="0.200000003"></path>
                                </g>
                            </g>
                        </g>
                    </g>
                </svg>
                <section class="container mx-auto text-center py-6 mb-12">
                    <h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-white">
                        Call to Action
                    </h2>
                    <div class="w-full mb-4">
                        <div class="h-1 mx-auto bg-white w-1/6 opacity-25 my-0 py-0 rounded-t"></div>
                    </div>
                    <h3 class="my-4 text-3xl leading-tight">
                        Main Hero Message to sell yourself!
                    </h3>
                    <button
                        class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                        Action!
                    </button>
                </section>
            </div>
        </div>
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
        <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
        <script>
            var swiper =
                new Swiper(
                    '.swiper-container', {
                        slidesPerView: '1',
                        spaceBetween: 0,
                        autoplay: false,
                        slidesPerView: 'auto',
                        grabCursor: true,
                        grabbingCursor: true,
                        navigation: {
                            nextEl: '.swiper-button-next',
                            prevEl: '.swiper-button-prev',
                        },
                    }
                );

            function reinitSwiper(swiper) {
                setTimeout(function() {
                    swiper.update();
                }, 500);
            }
        </script>

        <div class="site-wrapper animsition" data-animsition-in="fade-in" data-animsition-out="fade-out">

            <!-- end:Top links -->
            <!-- start: Inner page hero -->
            <div class="inner-page-hero bg-image" data-image-src="images/profile-banner.jpg">
                <div class="container"> </div>
                <!-- end:Container -->
            </div>
            <div class="result-show">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-3">
                            <p><span class="primary-color"><strong>124</strong></span> Results so far
                        </div>
                        </p>
                        <div class="col-sm-9">
                            <select class="custom-select pull-right">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //results show -->
            <section class="restaurants-page">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-5 col-md-4 col-lg-3">
                            <div class="sidebar clearfix m-b-20">
                                <div class="main-block">
                                    <div class="sidebar-title white-txt">
                                        <h6>Choose Cusine</h6> <i class="fa fa-cutlery pull-right"></i>
                                    </div>
                                    <div class="input-group">
                                        <input type="text" class="form-control search-field"
                                            placeholder="Search your favorite food"> <span class="input-group-btn">
                                            <button class="btn btn-secondary search-btn" type="button"><i
                                                    class="fa fa-search"></i></button>
                                        </span>
                                    </div>
                                    <form>
                                        <ul>
                                            <li>
                                                <label class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"> <span
                                                        class="custom-control-indicator"></span> <span
                                                        class="custom-control-description">Barbecuing and
                                                        Grilling</span> </label>
                                            </li>
                                            <li>
                                                <label class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"> <span
                                                        class="custom-control-indicator"></span> <span
                                                        class="custom-control-description">Appetizers</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"> <span
                                                        class="custom-control-indicator"></span> <span
                                                        class="custom-control-description">Soup and
                                                        salads</span> </label>
                                            </li>
                                            <li>
                                                <label class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"> <span
                                                        class="custom-control-indicator"></span> <span
                                                        class="custom-control-description">Seafood</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"> <span
                                                        class="custom-control-indicator"></span> <span
                                                        class="custom-control-description">Beverages</span>
                                                </label>
                                            </li>
                                        </ul>
                                    </form>
                                    <div class="clearfix"></div>
                                </div>
                                <!-- end:Sidebar nav -->
                                <div class="widget-delivery">
                                    <form>
                                        <div class="col-xs-6 col-sm-12 col-md-6 col-lg-6">
                                            <label class="custom-control custom-radio">
                                                <input id="radio1" name="radio" type="radio"
                                                    class="custom-control-input" checked=""> <span
                                                    class="custom-control-indicator"></span> <span
                                                    class="custom-control-description">Delivery</span> </label>
                                        </div>
                                        <div class="col-xs-6 col-sm-12 col-md-6 col-lg-6">
                                            <label class="custom-control custom-radio">
                                                <input id="radio2" name="radio" type="radio"
                                                    class="custom-control-input"> <span
                                                    class="custom-control-indicator"></span> <span
                                                    class="custom-control-description">Takeout</span> </label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="widget clearfix">
                                <!-- /widget heading -->
                                <div class="widget-heading">
                                    <h3 class="widget-title text-dark">
                                        Price range
                                    </h3>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="widget-body">
                                    <div class="range-slider m-b-10"> <span id="ex2CurrentSliderValLabel">
                                            Filter by price:<span id="ex2SliderVal"><strong>35</strong></span>€</span>
                                        <br>
                                        <input id="ex2" type="text" data-slider-min="1"
                                            data-slider-max="100" data-slider-step="1" data-slider-value="35" />
                                    </div>
                                </div>
                            </div>
                            <!-- end:Pricing widget -->
                            <div class="widget clearfix">
                                <!-- /widget heading -->
                                <div class="widget-heading">
                                    <h3 class="widget-title text-dark">
                                        Popular tags
                                    </h3>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="widget-body">
                                    <ul class="tags">
                                        <li> <a href="#" class="tag">
                                                Pizza
                                            </a> </li>
                                        <li> <a href="#" class="tag">
                                                Sendwich
                                            </a> </li>
                                        <li> <a href="#" class="tag">
                                                Sendwich
                                            </a> </li>
                                        <li> <a href="#" class="tag">
                                                Fish
                                            </a> </li>
                                        <li> <a href="#" class="tag">
                                                Desert
                                            </a> </li>
                                        <li> <a href="#" class="tag">
                                                Salad
                                            </a> </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- end:Widget -->
                        </div>
                        <div class="col-xs-12 col-sm-7 col-md-8 col-lg-9">
                            <div class="row">
                                <!-- Each popular food item starts -->
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 food-item">
                                    <div class="food-item-wrap">
                                        <div class="figure-wrap bg-image" data-image-src="images/food1.jpg">
                                            <div class="distance"><i class="fa fa-pin"></i>1240m</div>
                                            <div class="rating pull-left"> <i class="fa fa-star"></i> <i
                                                    class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                    class="fa fa-star"></i> <i class="fa fa-star-o"></i>
                                            </div>
                                            <div class="review pull-right"><a href="#">198 reviews</a>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <h5><a href="#">The South"s Best Fried Chicken</a></h5>
                                            <div class="product-name">Fried Chicken with cheese</div>
                                            <div class="price-btn-block"> <span class="price">$ 15,99</span>
                                                <a href="profile.html" class="btn theme-btn-dash pull-right">Order
                                                    Now</a>
                                            </div>
                                        </div>
                                        <div class="restaurant-block">
                                            <div class="left">
                                                <a class="pull-left" href="#"> <img src="images/logo1.png"
                                                        alt="Restaurant logo"> </a>
                                                <div class="pull-left right-text"> <a href="#">Chicken
                                                        Restaurant</a> <span>68 5th Avenue New York</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Each popular food item starts -->
                                <!-- Each popular food item starts -->
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 food-item">
                                    <div class="food-item-wrap">
                                        <div class="figure-wrap bg-image" data-image-src="images/food2.jpg">
                                            <div class="distance"><i class="fa fa-pin"></i>1240m</div>
                                            <div class="rating pull-left"> <i class="fa fa-star"></i> <i
                                                    class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                    class="fa fa-star"></i> <i class="fa fa-star-o"></i>
                                            </div>
                                            <div class="review pull-right"><a href="#">198 reviews</a>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <h5><a href="#">The South"s Best Fried Chicken</a></h5>
                                            <div class="product-name">Fried Chicken with cheese</div>
                                            <div class="price-btn-block"> <span class="price">$ 18,49</span>
                                                <a href="profile.html" class="btn theme-btn-dash pull-right">Order
                                                    Now</a>
                                            </div>
                                        </div>
                                        <div class="restaurant-block">
                                            <div class="left">
                                                <a class="pull-left" href="#"> <img src="images/logo2.png"
                                                        alt="Restaurant logo"> </a>
                                                <div class="pull-left right-text"> <a href="#">Chicken
                                                        Restaurant</a> <span>68 5th Avenue New York</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Each popular food item starts -->
                                <!-- Each popular food item starts -->
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 food-item">
                                    <div class="food-item-wrap">
                                        <div class="figure-wrap bg-image" data-image-src="images/food3.jpg">
                                            <div class="distance"><i class="fa fa-pin"></i>1240m</div>
                                            <div class="rating pull-left"> <i class="fa fa-star"></i> <i
                                                    class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                    class="fa fa-star"></i> <i class="fa fa-star-o"></i>
                                            </div>
                                            <div class="review pull-right"><a href="#">198 reviews</a>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <h5><a href="#">The South"s Best Fried Chicken</a></h5>
                                            <div class="product-name">Fried Chicken with cheese</div>
                                            <div class="price-btn-block"> <span class="price">$ 21,19</span>
                                                <a href="profile.html" class="btn theme-btn-dash pull-right">Order
                                                    Now</a>
                                            </div>
                                        </div>
                                        <div class="restaurant-block">
                                            <div class="left">
                                                <a class="pull-left" href="#"> <img src="images/logo3.png"
                                                        alt="Restaurant logo"> </a>
                                                <div class="pull-left right-text"> <a href="#">Chicken
                                                        Restaurant</a> <span>68 5th Avenue New York</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Each popular food item starts -->
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 food-item">
                                    <div class="food-item-wrap">
                                        <div class="figure-wrap bg-image" data-image-src="images/food1.jpg">
                                            <div class="distance"><i class="fa fa-pin"></i>1240m</div>
                                            <div class="rating pull-left"> <i class="fa fa-star"></i> <i
                                                    class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                    class="fa fa-star"></i> <i class="fa fa-star-o"></i>
                                            </div>
                                            <div class="review pull-right"><a href="#">198 reviews</a>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <h5><a href="#">The South"s Best Fried Chicken</a></h5>
                                            <div class="product-name">Fried Chicken with cheese</div>
                                            <div class="price-btn-block"> <span class="price">$ 21,19</span>
                                                <a href="profile.html" class="btn theme-btn-dash pull-right">Order
                                                    Now</a>
                                            </div>
                                        </div>
                                        <div class="restaurant-block">
                                            <div class="left">
                                                <a class="pull-left" href="#"> <img src="images/logo3.png"
                                                        alt="Restaurant logo"> </a>
                                                <div class="pull-left right-text"> <a href="#">Chicken
                                                        Restaurant</a> <span>68 5th Avenue New York</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Each popular food item starts -->
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 food-item">
                                    <div class="food-item-wrap">
                                        <div class="figure-wrap bg-image" data-image-src="images/food1.jpg">
                                            <div class="distance"><i class="fa fa-pin"></i>1240m</div>
                                            <div class="rating pull-left"> <i class="fa fa-star"></i> <i
                                                    class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                    class="fa fa-star"></i> <i class="fa fa-star-o"></i>
                                            </div>
                                            <div class="review pull-right"><a href="#">198 reviews</a>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <h5><a href="#">The South"s Best Fried Chicken</a></h5>
                                            <div class="product-name">Fried Chicken with cheese</div>
                                            <div class="price-btn-block"> <span class="price">$ 21,19</span>
                                                <a href="profile.html" class="btn theme-btn-dash pull-right">Order
                                                    Now</a>
                                            </div>
                                        </div>
                                        <div class="restaurant-block">
                                            <div class="left">
                                                <a class="pull-left" href="#"> <img src="images/logo3.png"
                                                        alt="Restaurant logo"> </a>
                                                <div class="pull-left right-text"> <a href="#">Chicken
                                                        Restaurant</a> <span>68 5th Avenue New York</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Each popular food item starts -->
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 food-item">
                                    <div class="food-item-wrap">
                                        <div class="figure-wrap bg-image" data-image-src="images/food1.jpg">
                                            <div class="distance"><i class="fa fa-pin"></i>1240m</div>
                                            <div class="rating pull-left"> <i class="fa fa-star"></i> <i
                                                    class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                    class="fa fa-star"></i> <i class="fa fa-star-o"></i>
                                            </div>
                                            <div class="review pull-right"><a href="#">198 reviews</a>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <h5><a href="#">The South"s Best Fried Chicken</a></h5>
                                            <div class="product-name">Fried Chicken with cheese</div>
                                            <div class="price-btn-block"> <span class="price">$ 21,19</span>
                                                <a href="profile.html" class="btn theme-btn-dash pull-right">Order
                                                    Now</a>
                                            </div>
                                        </div>
                                        <div class="restaurant-block">
                                            <div class="left">
                                                <a class="pull-left" href="#"> <img src="images/logo3.png"
                                                        alt="Restaurant logo"> </a>
                                                <div class="pull-left right-text"> <a href="#">Chicken
                                                        Restaurant</a> <span>68 5th Avenue New York</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Each popular food item starts -->
                                <div class="col-xs-12">
                                    <nav aria-label="...">
                                        <ul class="pagination">
                                            <li class="page-item disabled">
                                                <a class="page-link" href="#" tabindex="-1"
                                                    aria-label="Previous"> <span aria-hidden="true">«</span>
                                                    <span class="sr-only">Previous</span> </a>
                                            </li>
                                            <li class="page-item active"> <a class="page-link" href="#">1 <span
                                                        class="sr-only">(current)</span></a> </li>
                                            <li class="page-item"><a class="page-link" href="#">2</a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="#">3</a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="#">4</a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="#">5</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#" aria-label="Next"> <span
                                                        aria-hidden="true">»</span> <span class="sr-only">Next</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <!-- end:right row -->
                        </div>
                    </div>
                </div>
            </section>
            <section class="app-section">
                <div class="app-wrap">
                    <div class="container">
                        <div class="row text-img-block text-xs-left">
                            <div class="container">
                                <div class="col-xs-12 col-sm-6 right-image text-center hidden-xs-down">
                                    <figure> <img src="images/app.png" alt="Right Image"> </figure>
                                </div>
                                <div class="col-xs-12 col-sm-6 left-text">
                                    <h3>The Best Food Delivery App</h3>
                                    <p>Now you can make food happen pretty much wherever you are thanks to the
                                        free easy-to-use Food Delivery &amp; Takeout App.</p>
                                    <div class="social-btns">
                                        <a href="#" class="app-btn apple-button clearfix">
                                            <div class="pull-left"><i class="fa fa-apple"></i> </div>
                                            <div class="pull-right"> <span class="text">Available on
                                                    the</span> <span class="text-2">App Store</span> </div>
                                        </a>
                                        <a href="#" class="app-btn android-button clearfix">
                                            <div class="pull-left"><i class="fa fa-android"></i> </div>
                                            <div class="pull-right"> <span class="text">Available on
                                                    the</span> <span class="text-2">Play store</span> </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- start: FOOTER -->
            <footer class="footer">
                <div class="container">
                    <!-- top footer statrs -->
                    <div class="row top-footer">
                        <div class="col-xs-12 col-sm-3 footer-logo-block color-gray">
                            <a href="#"> <img src="images/food-picky-logo.png" alt="Footer logo"> </a>
                            <span>Order Delivery &amp; Take-Out </span>
                        </div>
                        <div class="col-xs-12 col-sm-2 about color-gray">
                            <h5>About Us</h5>
                            <ul>
                                <li><a href="#">About us</a> </li>
                                <li><a href="#">History</a> </li>
                                <li><a href="#">Our Team</a> </li>
                                <li><a href="#">We are hiring</a> </li>
                            </ul>
                        </div>
                        <div class="col-xs-12 col-sm-2 how-it-works-links color-gray">
                            <h5>How it Works</h5>
                            <ul>
                                <li><a href="#">Enter your location</a> </li>
                                <li><a href="#">Choose restaurant</a> </li>
                                <li><a href="#">Choose meal</a> </li>
                                <li><a href="#">Pay via credit card</a> </li>
                                <li><a href="#">Wait for delivery</a> </li>
                            </ul>
                        </div>
                        <div class="col-xs-12 col-sm-2 pages color-gray">
                            <h5>Pages</h5>
                            <ul>
                                <li><a href="#">Search results page</a> </li>
                                <li><a href="#">User Sing Up Page</a> </li>
                                <li><a href="#">Pricing page</a> </li>
                                <li><a href="#">Make order</a> </li>
                                <li><a href="#">Add to cart</a> </li>
                            </ul>
                        </div>
                        <div class="col-xs-12 col-sm-3 popular-locations color-gray">
                            <h5>Popular locations</h5>
                            <ul>
                                <li><a href="#">Sarajevo</a> </li>
                                <li><a href="#">Split</a> </li>
                                <li><a href="#">Tuzla</a> </li>
                                <li><a href="#">Sibenik</a> </li>
                                <li><a href="#">Zagreb</a> </li>
                                <li><a href="#">Brcko</a> </li>
                                <li><a href="#">Beograd</a> </li>
                                <li><a href="#">New York</a> </li>
                                <li><a href="#">Gradacac</a> </li>
                                <li><a href="#">Los Angeles</a> </li>
                            </ul>
                        </div>
                    </div>
                    <!-- top footer ends -->
                    <!-- bottom footer statrs -->
                    <div class="row bottom-footer">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12 col-sm-3 payment-options color-gray">
                                    <h5>Payment Options</h5>
                                    <ul>
                                        <li>
                                            <a href="#"> <img src="images/paypal.png" alt="Paypal">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#"> <img src="images/mastercard.png" alt="Mastercard">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#"> <img src="images/maestro.png" alt="Maestro">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#"> <img src="images/stripe.png" alt="Stripe">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#"> <img src="images/bitcoin.png" alt="Bitcoin">
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-xs-12 col-sm-4 address color-gray">
                                    <h5>Address</h5>
                                    <p>Concept design of oline food order and deliveye,planned as restaurant
                                        directory</p>
                                    <h5>Phone: <a href="tel:+080000012222">080 000012 222</a></h5>
                                </div>
                                <div class="col-xs-12 col-sm-5 additional-info color-gray">
                                    <h5>Addition informations</h5>
                                    <p>Join the thousands of other restaurants who benefit from having their
                                        menus on TakeOff</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- bottom footer ends -->
                </div>
            </footer>
            <!-- end:Footer -->
        </div>
        </div>

    </x-slot>
</x-guest-layout>

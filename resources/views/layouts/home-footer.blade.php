<footer class="bg-white"    >
    <div class="container mx-auto px-8">
        <div class="w-full flex flex-col md:flex-row py-6">
            <div class="flex-1 mb-6 text-black">
                <a class="text-pink-600 no-underline hover:no-underline font-bold text-2xl lg:text-4xl" href="#">
                    <img class="h-8 fill-current inline" src="{{ asset('images/logo.png') }}" alt="">
                    {{ __('Mobile') }}
                </a>
            </div>
            <div class="flex-1">
                <p class="uppercase text-gray-500 md:mb-6">{{ __('common.links') }}</p>
                <ul class="list-reset mb-6">
                    <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a href="#"
                            class="no-underline hover:underline text-gray-800 hover:text-pink-500">{{ __('FAQs') }}</a>
                    </li>
                    <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a href="#"
                            class="no-underline hover:underline text-gray-800 hover:text-pink-500">{{ __('common.help') }}</a>
                    </li>
                    <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a href="#"
                            class="no-underline hover:underline text-gray-800 hover:text-pink-500">{{ __('common.support') }}</a>
                    </li>
                </ul>
            </div>
            <div class="flex-1">
                <p class="uppercase text-gray-500 md:mb-6">{{ __('common.social') }}</p>
                <ul class="list-reset mb-6">
                    <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a href="#"
                            class="no-underline hover:underline text-gray-800 hover:text-pink-500">{{ __('Facebook') }}</a>
                    </li>
                    <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a href="#"
                            class="no-underline hover:underline text-gray-800 hover:text-pink-500">{{ __('Linkedin') }}</a>
                    </li>
                    <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a href="#"
                            class="no-underline hover:underline text-gray-800 hover:text-pink-500">{{ __('Twitter') }}</a>
                    </li>
                </ul>
            </div>
            <div class="flex-1">
                <p class="uppercase text-gray-500 md:mb-6">{{ __('common.company') }}</p>
                <ul class="list-reset mb-6">
                    <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a href="#"
                            class="no-underline hover:underline text-gray-800 hover:text-pink-500">{{ __('common.contact') }}: Mr.Thông 0345236493</a>
                    </li>
                    <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a href="#"
                            class="no-underline hover:underline text-gray-800 hover:text-pink-500">Keangnam, Mễ trì, Hà Nội</a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</footer>
</div>
<!-- Messenger Plugin chat Code -->
{{-- <div id="fb-root"></div>

<!-- Your Plugin chat code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

<script>
    var chatbox = document.getElementById('fb-customer-chat');
    chatbox.setAttribute("page_id", "101023109405710");
    chatbox.setAttribute("attribution", "biz_inbox");
</script>

<!-- Your SDK code -->
<script>
    window.fbAsyncInit = function() {
        FB.init({
            xfbml: true,
            version: 'v14.0'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script> --}}

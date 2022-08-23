//realtime pusher

if (document.documentElement.lang == 'vi') {
    var newOrder = 'Có đơn đặt hàng mới từ ';
} else {
    var newOrder = 'Got a new order from ';
}

var notificationsCount = $("#count-notify").data('count');
var pusher = new Pusher("82bb143636955a54161f", {
    encrypted: true,
    cluster: "ap1",
});
var channel = pusher.subscribe('notifications-order');
channel.bind('NotificationEvent', function (e) {
    var url = window.location.protocol + "//" + window.location.host + '/admin/notifications/' + e.id;
    var formNotification = `<form action="`
    formNotification += url
    formNotification += `" method="post" class="flex items-center px-4 py-3 border-b hover:bg-gray-100 bg-blue-50 -mx-2">
        <input type="hidden" name="_method" value="PATCH">
        <input type="hidden" name="_token" value="${$(
            'meta[name="csrf-token"]'
        ).attr("content")}">
        <button type="submit" class="focus:outline-none" data-id ="${e.id}">
            <div class="flex text-left">
                <div tabindex="0" aria-label="heart icon" role="img"
                    class="h-8 w-8 rounded-full object-cover mx-1 text-green-400">
                    <i class="fas fa-donate"></i>
                </div>
                <div class="text-gray-600 text-sm mx-2 block">
                    <p tabindex="0"">
                        ${newOrder + e.content}
                    </p>
                    <p tabindex="0" class="focus:outline-none float-left text-xs text-gray-500">`;
        formNotification += moment().fromNow()
        formNotification += `
                    </p>
                </div>
            </div>
        </button>
    </form>
    `;

    $('.list-notification').prepend(formNotification);

    notificationsCount += 1;
    $("#count-notify").prop('data-count', notificationsCount);
    $(".notify-count").empty().html(notificationsCount);
});

// tabs
// const tabs = document.getElementById("tabs");0a377ec79a01a1efb2d2
// const tab = document.querySelectorAll(".tab");
// const panel = document.querySelectorAll(".tab-content");

// function onTabClick(event) {

//     for (let i = 0; i < tab.length; i++) {
//         tab[i].classList.remove("active");
//     }

//     for (let i = 0; i < panel.length; i++) {
//         panel[i].classList.remove("active");
//     }
//     event.target.classList.add('active');
//     let classString = event.target.getAttribute('data-target');
//     document.getElementById('panels').getElementsByClassName(classString)[0].classList.add("active");
// }

// for (let i = 0; i < tab.length; i++) {
//     tab[i].addEventListener('click', onTabClick, false);
// }

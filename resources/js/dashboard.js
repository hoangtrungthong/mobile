$(document).ready(function () {
    // active page
    var $navItems = $(".navigation li")
        .removeClass("text-pink-500 hover:text-pink-600")
        .addClass("text-blueGray-700 hover:text-blueGray-500");

    $navItems
        .filter(function () {
            return location.href.includes($(this).find("a").prop("href"));
        })
        .addClass("text-pink-500 hover:text-pink-600")
        .removeClass("text-blueGray-700 hover:text-blueGray-500");
});

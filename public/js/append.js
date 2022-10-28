/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************!*\
  !*** ./resources/js/append.js ***!
  \********************************/
$(document).ready(function () {
  var html = "\n    <div class=\"child flex flex-wrap gap-6 sm:col-span-8\">\n        <div class=\"w-1/5 col-span-6 sm:col-span-6 lg:col-span-2\">\n            <input type=\"text\" name=\"quantity[]\" id=\"quantity\"\n                class=\"mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md\">\n        </div>\n        <div class=\"w-1/5 col-span-6 sm:col-span-6 lg:col-span-2\">\n            <select id=\"color\" name=\"color_id[]\" autocomplete=\"color\"\n            class=\"mt-1 block col-span-8 w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm\">";
  +window.colors.forEach(function (e) {
    html += "<option style=\"background: " + e.name + "\" value=\"" + e.id + "\">" + e.name + "</option>";
  });
  html += "\n            </select>\n        </div>\n        <div class=\"w-1/5 col-span-6 sm:col-span-3 lg:col-span-2\">\n        <select id=\"memory\" name=\"memory_id[]\" autocomplete=\"memory\"\n            class=\"mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm\">";
  window.memories.forEach(function (el) {
    html += "<option style=\"background: " + el.rom + "\" value=\"" + el.id + "\">" + el.rom + "</option>";
  });
  html += "\n            </select>\n        </div>\n        <div class=\"w-1/5 col-span-6 sm:col-span-3 lg:col-span-2\">\n            <input type=\"text\" name=\"price[]\" id=\"price\" autocomplete=\"postal-code\"\n                class=\"mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md\">\n        </div>\n        <p class=\"removeEl mt-5 items-center gap-2 bg-pink-500 hover:bg-pink-700 ml-5 cursor-pointer inline-flex justify-cente py-1 px-3 border border-transparent shadow-sm text-sm font-bold rounded-md text-white focus:outline-none focus:ring-0 focus:ring-offset-0\">\n            <i class=\"fas fa-times-circle\"></i>\n        </p>\n    </div>";
  $("#add").click(function () {
    $(".parent").append(html);
  });
  $(".parent").on('click', '.removeEl', function () {
    $(this).parent().remove(".child");
  });
});
/******/ })()
;
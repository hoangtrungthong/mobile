/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************!*\
  !*** ./resources/js/home.js ***!
  \******************************/
// var navMenuDiv = document.getElementById("nav-content");
var navMenu = document.getElementById("nav-toggle"); // document.onclick = check;
// function check(e) {
//     var target = (e && e.target) || (event && event.srcElement);
//     //Nav Menu
//     if (!checkParent(target, navMenuDiv)) {
//         // click NOT on the menu
//         if (checkParent(target, navMenu)) {
//             // click on the link
//             if (navMenuDiv.classList.contains("hidden")) {
//                 navMenuDiv.classList.remove("hidden");
//             } else {
//                 navMenuDiv.classList.add("hidden");
//             }
//         } else {
//             // click both outside link and outside menu, hide menu
//             navMenuDiv.classList.add("hidden");
//         }
//     }
// }

function checkParent(t, elm) {
  while (t.parentNode) {
    if (t == elm) {
      return true;
    }

    t = t.parentNode;
  }

  return false;
}

var scrollpos = window.scrollY;
var header = document.getElementById("header");
var navcontent = document.getElementById("nav-content");
var navaction = document.getElementById("navAction");
var brandname = document.getElementById("brandname");
var toToggle = document.querySelectorAll(".toggleColour");
document.addEventListener("scroll", function () {
  /*Apply classes for slide in bar*/
  scrollpos = window.scrollY;

  if (scrollpos > 10) {
    header.classList.add("bg-white");
    navaction.classList.remove("bg-white");
    navaction.classList.add("gradient");
    navaction.classList.remove("text-gray-800");
    navaction.classList.add("text-white"); //Use to switch toggleColour colours

    for (var i = 0; i < toToggle.length; i++) {
      toToggle[i].classList.add("text-gray-800");
      toToggle[i].classList.remove("text-white");
    }

    header.classList.add("shadow");
    navcontent.classList.remove("bg-gray-100");
    navcontent.classList.add("bg-white");
  } else {
    header.classList.remove("bg-white");
    navaction.classList.remove("gradient");
    navaction.classList.add("bg-white");
    navaction.classList.remove("text-white");
    navaction.classList.add("text-gray-800"); //Use to switch toggleColour colours

    for (var i = 0; i < toToggle.length; i++) {
      toToggle[i].classList.add("text-white");
      toToggle[i].classList.remove("text-gray-800");
    }

    header.classList.remove("shadow");
    navcontent.classList.remove("bg-white");
    navcontent.classList.add("bg-gray-100");
  }
}); // $(document).ready(function () {
//     let attr = window.product_attr;
//     let attrs = [];
//     attr.forEach(function (e) {
//         e.memories.forEach((el) => {
//             attrs.push({ color_id: parseInt(e.color_id), memory_id: el.id });
//         });
//     });
//     $("input[name='color']").click(function (e) {
//         var _tmp = $(this);
//         attrs.forEach((el) => {
//             if (_tmp.val() == el.color_id) {
//                 $(`#memory${el.memory_id}`).prop("disabled", true);
//                 $(`#memory${el.memory_id}`).prop("checked", false);
//             } else {
//                 $(`#memory${el.memory_id}`).prop("disabled", false);
//             }
//             // $(`#color${el.color_id}`).props("disabled", false);
//             // console.log(el, _tmp.val());
//             // if (el.includes(parseInt(_tmp.val()))) {
//             //     el.forEach((v) => {
//             //         console.log(v);
//             //     });
//             // }
//         });
//     });
//     // attr.forEach(e => {
//     //     e.colors.forEach((key, el) => {
//     //         console.log(key, el);
//     //     })
//     // });
//     $("#memory_id").attr("for", function (index, value) {
//         console.log(
//             this,
//             $("#mem" + element.id),
//             value,
//             "memory" + element.id,
//             element
//         );
//         if (value == "mem" + element.id) {
//             $("#mem" + element.id).remove();
//             return $("#memory_id").attr("style", "display: none");
//         }
//         return (value = "mem" + element.id);
//     });
// });
/******/ })()
;
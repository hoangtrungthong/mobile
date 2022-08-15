$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    let cancel = `<a
        class="btn-edit-discount inline-block bg-red-500 hover:bg-red-700 text-white text-center py-1 px-3 rounded">
        <i class="fa fa-times"></i>
    </a>`;
    // $(document).on("click", ".btn-edit-discount", function (e) {
    //     console.log(123);
    //     let id = $(this).data("id");
    //     let discount = $(`.edit-discount-${id}`).data("discount");
    //     let input = `<input id="input-discount-${id}"
    //         class="px-2 py-1 w-1/3 border-2 border-blue-600 text-blue-600 font-medium text-xs leading-tight uppercase rounded transition duration-150 ease-in-out"
    //         type="text" name="discount" min="0" max="100" value="${discount}">`;
    //     let inputTag = $(`.edit-discount-${id}`).find("input");
    //     if (inputTag.length == 0) {
    //         $(`.edit-discount-${id}`).empty().append(input);
    //         // $(this).empty().append(`<i class="fas fa-check"></i>`);
    //         // $(this)
    //         //     .removeClass("bg-yellow-500 hover:bg-yellow-700")
    //         //     .addClass("bg-green-500 hover:bg-green-700 btn-update-user");
    //         $(this).hide();
    //         $(`.update-discount-${id}`).show();
    //         $(`#btn-cancel-discount-${id}`).empty().append(cancel);
    //     } else {
    //         if (inputTag.val() == "") {
    //             inputTag.val(0);
    //         }
    //         let value = inputTag.val();
    //         $(`.edit-discount-${id}`).data("discount", value);
    //         $(`.edit-discount-${id}`).empty().append(`
    //             <p>${value}%</p>
    //         `);
    //         // $(this).empty().append(`<i class="fas fa-edit"></i>`);
    //         // $(this)
    //         //     .removeClass("bg-green-500 hover:bg-green-700 btn-update-user")
    //         //     .addClass("bg-yellow-500 hover:bg-yellow-700");
    //         $(this).show();
    //         $(`.update-discount-${id}`).hide();
    //         $(`#btn-cancel-discount-${id}`).empty();
    //     }
    // });

    // window.onclick = function () {
        
    // }

    // $(document).on("click", ".btn-update-discount", function (e) {
    //     let id = $(this).data("id");
    //     let data = $(document).find(`#input-discount-${id}`).val();
    //     $(`.discount-${id}`).show();
    //     $(this).hide();
    //     $(`.btn-cancel-discount`).empty();
    //     $.ajax({
    //         type: "PATCH",
    //         url: `discount/${id}`,
    //         data: data,
    //     })
    //         .done(function () {})
    //         .fail(function () {});
    // });

    $(document).on("keypress", "input[name='discount']", function (evt) {
        evt = evt ? evt : window.event;
        var charCode = evt.which ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    });

    // $(document).on("click", ".btn-cancel-discount", function (e) {
    //     let id = $(this).data("id");
    //     let discount = $(document)
    //         .find(`.edit-discount-${id}`)
    //         .data("discount");
    //     console.log(discount);
    //     // $(`.edit-discount-${id}`).empty().append(`
    //     //         <p>${discount}%</p>
    //     //     `);
    //     // $(".edit-discount").empty().append(`<i class="fas fa-edit"></i>`);
    //     // $(".edit-discount")
    //     //     .removeClass("bg-green-500 hover:bg-green-700")
    //     //     .addClass("bg-yellow-500 hover:bg-yellow-700");
    // });
});

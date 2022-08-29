var helper = require("./helper");
import Swal from "sweetalert2";
import languageForDatatable from "./datatable/language";
import routes from "./routes";

$(document).ready(function () {
    let checkboxsActive = [];
    let checkboxsBlock = [];
    $("#selectAll").change(function (e) {
        let allCheckbox = $(document).find('input[type="checkbox"]');
        if ($(this).checked) {
            allCheckbox.each(function (index, value) {
                $(value).prop("checked", false);
            });
            $(".amount_active").empty();
            $(".amount_block").empty();
            $("#active_user").attr("disabled", true);
            $("#block_user").attr("disabled", true);
        } else {
            allCheckbox.each(function (index, value) {
                $(value).prop("checked", true);
            });
            checkboxsActive.length = 0;
            checkboxsBlock.length = 0;
            allCheckbox.each(function (index, value) {
                if ($(value).attr("data-status") == 2) {
                    checkboxsBlock.push($(value).val());
                } else if ($(value).attr("data-status") == 1) {
                    checkboxsActive.push($(value).val());
                }
            });

            if (checkboxsBlock.length) {
                $(".amount_active").empty().text(`(${checkboxsBlock.length})`);
                $("#active_user").attr("disabled", false);
            }
            if (checkboxsActive.length) {
                $(".amount_block").empty().text(`(${checkboxsActive.length})`);
                $("#block_user").attr("disabled", false);
            }
        }
    });

    $(document).on("click", ".block_user", function (e) {
        let id = $(this).data("id");
        $.ajax({
            type: "PATCH",
            url: routes.users.blockUser,
            data: {
                id: id,
            },
        })
            .done(function (result) {
                $(`.statusUser-${id}`)
                    .empty()
                    .append(
                        `<button data-id="${id}"
                class="active_user cursor-pointer inline-flex justify-center py-1 px-3 border border-transparent shadow-sm text-xs font-bold rounded-md text-white bg-green-500 focus:outline-none focus:ring-0 focus:ring-offset-0">
                    ${helper.trans("user.active")}
                    <span class="amount_active"></span>
                </button>`
                    );
                helper.showToast(
                    helper.trans("common.success.update"),
                    3000,
                    "success"
                );
            })
            .fail(function (errors) {
                helper.showToast(
                    helper.trans("common.general.wrong"),
                    3000,
                    "error"
                );
            });
    });

    $(document).on("click", ".active_user", function (e) {
        let id = $(this).data("id");

        $.ajax({
            type: "PATCH",
            url: routes.users.activeUser,
            data: {
                id: id,
            },
        })
            .done(function (result) {
                $(`.statusUser-${id}`)
                    .empty()
                    .append(
                        `<button data-id="${id}"
                    class="block_user cursor-pointer inline-flex justify-center py-1 px-3 border border-transparent shadow-sm text-xs font-bold rounded-md text-white bg-red-600 focus:outline-none focus:ring-0 focus:ring-offset-0">
                    ${helper.trans("user.block")}
                    <span class="amount_active"></span>
                </button>`
                    );
                helper.showToast(
                    helper.trans("common.success.update"),
                    3000,
                    "success"
                );
            })
            .fail(function (errors) {
                helper.showToast(
                    helper.trans("common.general.wrong"),
                    3000,
                    "error"
                );
            });
    });

    // $('#block_user').click(function (e) {
    //     $.ajax({
    //         type: 'PATCH',
    //         url: routes.users.blockUser,
    //         data: {
    //             'ids': checkboxsActive,
    //         }
    //     }).done(function (result) {
    //         checkboxsActive.forEach(function (id) {
    //             $(`#statusUser-${id}`).removeClass('text-green-600');
    //             $(`#statusUser-${id}`).addClass('text-red-600');
    //             $(`#statusUser-${id}`).empty().html(helper.trans('user.block'));
    //             $(`#checkbox-${id}`).attr('data-status', 2);
    //         })
    //         $(document).find('input[type="checkbox"]').each(function (index, value) {
    //             $(value).prop("checked", false);
    //         })
    //         $('.amount_block').empty();
    //         $('#block_user').attr('disabled', true);
    //         helper.showToast(helper.trans('common.success.update'), 1500, 'success')
    //     }).fail(function (errors) {
    //         helper.showToast(helper.trans('common.general.wrong'), 1500, 'error')
    //     })
    // })

    // $('#active_user').click(function (e) {
    //     $.ajax({
    //         type: 'PATCH',
    //         url: routes.users.activeUser,
    //         data: {
    //             'ids': checkboxsBlock,
    //         }
    //     }).done(function (result) {
    //         checkboxsBlock.forEach(function (id) {
    //             $(`#statusUser-${id}`).removeClass('text-red-600');
    //             $(`#statusUser-${id}`).addClass('text-green-600');
    //             $(`#statusUser-${id}`).empty().html(helper.trans('user.active'));
    //             $(`#checkbox-${id}`).attr('data-status', 1);
    //         })
    //         $(document).find('input[type="checkbox"]').each(function (index, value) {
    //             $(value).prop("checked", false);
    //         });
    //         $('.amount_active').empty();
    //         $('#active_user').attr('disabled', true);
    //         helper.showToast(helper.trans('common.success.update'), 1500, 'success')
    //     }).fail(function (errors) {
    //         helper.showToast(helper.trans('common.general.wrong'), 1500, 'error')
    //     })
    // })

    // $('.btn-update-users').click(function () {
    //     var id = $(this).data('id');
    //     Swal.fire({
    //         title: helper.trans('common.status'),
    //         text: "You won't be able to revert this!",
    //         icon: 'warning',
    //         showCancelButton: true,
    //         confirmButtonColor: '#3085d6',
    //         cancelButtonColor: '#d33',
    //         confirmButtonText: 'Yes, delete it!',
    //         showLoaderOnConfirm: true,
    //         preConfirm: function() {
    //             $.ajax({
    //                 type: 'DELETE',
    //                 url: routes.users.deleteUser(id),
    //                 data: {
    //                     'id': id
    //                 }
    //             }).done(function (result) {
    //                 window.location.reload();
    //                 helper.showToast(helper.trans('common.success.update'), 1500, 'success')
    //             }).fail(function (errors) {
    //                 helper.showToast(helper.trans('common.general.wrong'), 1500, 'error')
    //             })
    //         }
    //       })
    // })

    $("#btn-checkout").click(function (e) {
        e.preventDefault();
        console.log(window.checkoutSuccess);
        let data = $("#form-checkout").serializeArray();
        $.ajax({
            type: "POST",
            url: routes.users.order,
            data: data,
        })
            .done(function (result) {
                helper.showToast(
                    helper.trans("common.success.update"),
                    1500,
                    "success"
                );
            })
            .fail(function (errors) {
                console.log(errors);
                helper.showToast(
                    helper.trans("common.general.wrong"),
                    1500,
                    "error"
                );
            });
    });

    new $.fn.dataTable.FixedColumns(
        $("#manage-users").DataTable({
            scrollY: "500px",
            scrollCollapse: true,
            paging: true,
            fixedColumns: true,
            oLanguage: languageForDatatable,
        })
    );
});

var helper = require("./helper");
import Swal from "sweetalert2";
import routes from "./routes";
import languageForDatatable from "./datatable/language";
import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();
$(document).ready(function () {
    var order_id;
    $(document).on("click", ".update-status-order", function (e) {
        $(document).find("#modal-update-orders").show();
        $(document).find("#modal-form-update-orders").show();
        order_id = $(this).data("id");
        var status = $(this).data("status");
        var allStatus = JSON.parse($(this).attr("data-allStatus"));
        var select = $(document).find("#status_order").empty();
        $.each(allStatus, function (key, value) {
            if (value != status) {
                select.append(
                    new Option(
                        helper.trans("common.orders.status." + key),
                        value
                    )
                );
            }
        });
    });

    $(document).on("click", ".close-modal", function (e) {
        $(document).find("#modal-update-orders").hide();
        $(document).find("#modal-form-update-orders").hide();
    });

    $(document).on("click", ".btn-update-status-order", function (e) {
        e.preventDefault();
        e.stopPropagation();
        $.LoadingOverlay("show", {
            image: "",
            fontawesome: "fa fa-cog fa-spin",
        });
        $.ajax({
            type: "PATCH",
            url: `update-order/${order_id}`,
            data: $(".form-update-status").serializeArray(),
        })
            .done(function (result) {
                $.LoadingOverlay("hide");
                localStorage.setItem(
                    "flash",
                    helper.trans("common.success.update")
                );
               window.location.reload();
            })
            .fail(function (errors) {
                $.LoadingOverlay("hide");
                helper.showToast(
                    helper.trans("common.general.wrong"),
                    3000,
                    "error"
                );
            });
         $(document).find("#modal-update-orders").hide();
         $(document).find("#modal-form-update-orders").hide();
    });

    window.onload = function (e) {
        if (localStorage.getItem("flash") != null) {
            helper.showToast(
                helper.trans("common.success.update"),
                3000,
                "success"
            );
            localStorage.removeItem("flash");
        }
    };
    new $.fn.dataTable.FixedColumns(
        $("#manage-orders").DataTable({
            scrollY: "500px",
            scrollCollapse: true,
            paging: true,
            fixedColumns: true,
            oLanguage: languageForDatatable,
        })
    );
});

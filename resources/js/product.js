var helper = require("./helper");
import Swal from "sweetalert2";
import routes from "./routes";
import languageForDatatable from "./datatable/language";
$(document).ready(function () {
    $(document).on("click", ".btn-delete-product", function (e) {
        e.preventDefault();
        var id = $(this).data("id");
        let name = $(this).data("name");

        Swal.fire({
            title: helper.trans("common.title_destroy_product"),
            html: `<strong>${helper.trans(
                "common.text_success_destroy_product",
                {
                    name: name,
                }
            )}</strong>`,
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#fb4e4e",
            cancelButtonColor: "#6b6c7f",
            confirmButtonText: helper.trans("common.yes"),
            cancelButtonText: helper.trans("common.cancel"),
            showLoaderOnConfirm: true,
            preConfirm: function () {
                $.ajax({
                    type: "DELETE",
                    url: `products/${id}`,
                    data: {
                        id: id,
                    },
                })
                    .done(function (result) {
                        if (result.data == "") {
                            helper.showToast(
                                helper.trans("common.delete_product_failed", {
                                    name: name,
                                }),
                                3000,
                                "error"
                            );
                        } else {
                            localStorage.setItem(
                                "flash",
                                helper.showToast(
                                    helper.trans("common.success.update"),
                                    3000,
                                    "success"
                                )
                            );
                            window.location.reload();
                        }
                    })
                    .fail(function (errors) {
                        helper.showToast(
                            helper.trans("common.general.wrong"),
                            1500,
                            "error"
                        );
                    });
            },
        });
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
        $("#manage-products").DataTable({
            scrollY: "500px",
            scrollCollapse: true,
            paging: true,
            fixedColumns: true,
            oLanguage: languageForDatatable,
        })
    );
});

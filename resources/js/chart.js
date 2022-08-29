import { showToast } from "./helper";
var helper = require("./helper");

// chart sale order
let chartOrder = new Chart(document.getElementById("chart-sales"), {
    type: "line",
    data: {
        labels: Object.keys(window.dataChartSales),
        datasets: [
            {
                data: Object.values(window.dataChartSales),
                borderColor: "#DB2777",
                fill: false,
            },
        ],
    },
    options: {
        legend: {
            display: false,
        },
        maintainAspectRatio: false,
        responsive: true,
        scales: {
            yAxes: [
                {
                    ticks: {
                        beginAtZero: true,
                        callback: function (value, index, values) {
                            return new Intl.NumberFormat("vi", {
                                style: "currency",
                                currency: "VND",
                            }).format(value);
                        },
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, 0)",
                    },
                },
            ],
            xAxes: [
                {
                    gridLines: {
                        color: "rgba(0, 0, 0, 0)",
                    },
                },
            ],
        },
    },
});

// chart product quantity
let chartProduct = new Chart(document.getElementById("chart-quantity"), {
    type: "line",
    data: {
        labels: Object.keys(window.dataChartQuantity),
        datasets: [
            {
                data: Object.values(window.dataChartQuantity),
                borderColor: "#DB2777",
                fill: false,
            },
        ],
    },
    options: {
        legend: {
            display: false,
        },
        maintainAspectRatio: false,
        responsive: true,
        scales: {
            yAxes: [
                {
                    ticks: {
                        beginAtZero: true,
                        // callback: function (value, index, values) {
                        //     return new Intl.NumberFormat("vi", {
                        //         style: "currency",
                        //         currency: "VND",
                        //     }).format(value);
                        // },
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, 0)",
                    },
                },
            ],
            xAxes: [
                {
                    gridLines: {
                        color: "rgba(0, 0, 0, 0)",
                    },
                },
            ],
        },
    },
});
/* Make dynamic date appear */
(function () {
    if (document.getElementById("get-current-year")) {
        document.getElementById("get-current-year").innerHTML =
            new Date().getFullYear();
    }
})();
// /* Sidebar - Side navigation menu on mobile/responsive mode */
// function toggleNavbar(collapseID) {
//     document.getElementById(collapseID).classList.toggle("hidden");
//     document.getElementById(collapseID).classList.toggle("bg-white");
//     document.getElementById(collapseID).classList.toggle("m-2");
//     document.getElementById(collapseID).classList.toggle("py-3");
//     document.getElementById(collapseID).classList.toggle("px-6");
// }
// /* Function for dropdowns */
// function openDropdown(event, dropdownID) {
//     let element = event.target;
//     while (element.nodeName !== "A") {
//         element = element.parentNode;
//     }
//     Popper.createPopper(element, document.getElementById(dropdownID), {
//         placement: "bottom-start",
//     });
//     document.getElementById(dropdownID).classList.toggle("hidden");
//     document.getElementById(dropdownID).classList.toggle("block");
// }

$(document).ready(function () {
    let a = $("input[type='date']").attr("max", new Date().toISOString().split("T")[0]);
    console.log(a);
    $("#btn-filter_order").click(function (e) {
        e.preventDefault();
        $(".errorDate").empty();
        let start = $("#order_start_date").val();
        let end = $("#order_end_date").val();
        let valid = false;

        if (start == "") {
            $("#div-start").append(
                '<div class="errorDate text-teal-500">Không được để trống</div>'
            );
            valid = true;
        }

        if (end == "") {
            $("#div-end").append(
                '<div class="errorDate text-teal-500">Không được để trống</div>'
            );
            valid = true;
        }

        if (Date.parse(start) > Date.parse(end)) {
            $("#div-start").append(
                `<div class="errorDate text-teal-500">Phải nhỏ hơn ngày kết thúc</div>`
            );
            $("#div-end").append(
                `<div class="errorDate text-teal-500">Phải lớn hơn ngày bắt đầu</div>`
            );
            valid = true;
        }

        if (valid) {
            return;
        }

        $.ajax({
            type: "GET",
            url: "orders/chart",
            data: {
                start_date: start,
                end_date: end,
            },
        })
            .done(function (results) {
                if (checkObj(results)) {
                    chartOrder.data.labels = Object.keys(results);
                    chartOrder.data.datasets[0].data = Object.values(results);
                    chartOrder.update();
                } else {
                    showToast(helper.trans("common.noData"), 3000, "error");
                }
            })
            .fail(function (errors) {
                showToast(helper.trans("common.wrong"), 3000, "error");
            });
    });

    $("#btn-filter_product").click(function (e) {
        e.preventDefault();
        $(".errorDate").empty();
        let start = $("#product_start_date").val();
        let end = $("#product_end_date").val();
        let valid = false;

        if (start == "") {
            $("#div-start1").append(
                '<div class="errorDate text-teal-500">Không được để trống</div>'
            );
            valid = true;
        }

        if (end == "") {
            $("#div-end1").append(
                '<div class="errorDate text-teal-500">Không được để trống</div>'
            );
            valid = true;
        }

        if (Date.parse(start) > Date.parse(end)) {
            $("#div-start1").append(
                `<div class="errorDate text-teal-500">Phải nhỏ hơn ngày kết thúc</div>`
            );
            $("#div-end1").append(
                `<div class="errorDate text-teal-500">Phải lớn hơn ngày bắt đầu</div>`
            );
            valid = true;
        }

        if (valid) {
            return;
        }

        $.ajax({
            type: "GET",
            url: "products/chart",
            data: {
                start_date: start,
                end_date: end,
            },
        })
            .done(function (results) {
                if (checkObj(results)) {
                    chartProduct.data.labels = Object.keys(results);
                    chartProduct.data.datasets[0].data = Object.values(results);
                    chartProduct.update();
                } else {
                    showToast(helper.trans("common.noData"), 3000, "error");
                }
            })
            .fail(function (errors) {
                showToast(helper.trans("common.wrong"), 3000, "error");
            });
    });

    function checkObj(obj) {
        return (
            obj &&
            obj !== "null" &&
            obj !== "undefined" &&
            Object.keys(obj).length !== 0
        );
    }
});

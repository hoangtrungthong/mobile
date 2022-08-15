// chart sale order
new Chart(document.getElementById("chart-sales"), {
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

// chart quantity
new Chart(document.getElementById("chart-quantity"), {
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
/* Sidebar - Side navigation menu on mobile/responsive mode */
function toggleNavbar(collapseID) {
    document.getElementById(collapseID).classList.toggle("hidden");
    document.getElementById(collapseID).classList.toggle("bg-white");
    document.getElementById(collapseID).classList.toggle("m-2");
    document.getElementById(collapseID).classList.toggle("py-3");
    document.getElementById(collapseID).classList.toggle("px-6");
}
/* Function for dropdowns */
function openDropdown(event, dropdownID) {
    let element = event.target;
    while (element.nodeName !== "A") {
        element = element.parentNode;
    }
    Popper.createPopper(element, document.getElementById(dropdownID), {
        placement: "bottom-start",
    });
    document.getElementById(dropdownID).classList.toggle("hidden");
    document.getElementById(dropdownID).classList.toggle("block");
}

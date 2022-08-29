var helper = require("../helper");

export default {
    sLengthMenu: `${helper.trans("common.general.show")}&nbsp;
        <select>
            <option value="10">10</option>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="100">100</option>
        </select>&nbsp;
        ${helper.trans("common.general.records")}`,
    sSearch: "",
    sSearchPlaceholder: helper.trans("common.general.search") + "...",
    oPaginate: {
        sPrevious: helper.trans("common.general.previous"),
        sNext: helper.trans("common.general.next"),
    },
    sInfo: `${helper.trans("common.general.show")} ${helper.trans(
        "common.general.from"
    )} _START_ ${helper.trans("common.general.to")} _END_ ${helper.trans(
        "common.general.of"
    )} _TOTAL_ ${helper.trans("common.general.records")}`,
    sEmptyTable: `<div id="request-table-inner">
                        <div class="p-5 text-center">
                            <h3>${helper.trans("common.general.noData")}</h3>
                        </div>
                    </div>`,
    sZeroRecords: helper.trans("common.general.noMatching"),
    sInfoEmpty: helper.trans("common.general.noData"),
    sInfoFiltered: `${helper.trans("common.general.from")} _MAX_ ${helper.trans(
        "common.general.records"
    )}`,
};

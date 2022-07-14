var helper = require('./helper')
import Swal from "sweetalert2"
import routes from './routes'

$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.btn-update-users').click(function () {
        var id = $(this).data('id');
        Swal.fire({
            title: helper.trans('common.status'),
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            showLoaderOnConfirm: true,
            preConfirm: function() {
                $.ajax({
                    type: 'PATCH',
                    url: routes.users.blockUser(id),
                    dataType: 'JSON',
                }).done(function (result) {
                    helper.showToast(helper.trans('common.success.update'), 1500, 'success')
                }).fail(function (errors) {
                    console.log(errors);
                    helper.showToast(helper.trans('common.general.wrong'), 1500, 'error')
                })
            }
          })
    })
})
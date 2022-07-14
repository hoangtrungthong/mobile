import toastr from "toastr";

function trans(key, replace = {})
{
    let translation = key.split('.').reduce((t, i) => t[i] || null, window.translations) || key;

    for (var placeholder in replace) {
        translation = translation.replace(`:${placeholder}`, replace[placeholder]);
    }

    return translation;
}

function showToast(content, timeout, type = 'success') {
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": timeout,
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
    console.log(123123);
    switch (type) {
        case 'success':
            toastr.success(content);
            break;
        case 'error':
            toastr.error(content);
            break;
        case 'warning':
            toastr.warning(content);
            break;
    }
}

export {
    trans,
    showToast,
}

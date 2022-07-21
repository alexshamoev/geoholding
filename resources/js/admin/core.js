'use strict';


$(function() {
    $('.js_delete_file_button').on('click', function() {
        Swal.fire({
            title: $('.js_bsws').data('delete_file_title'),
            showConfirmButton: false,
            showDenyButton: true,
            showCancelButton: true,
            denyButtonText: $('.js_bsws').data('delete'),
            cancelButtonText: $('.js_bsws').data('cancel'),
        }).then((result) => {
            if(result.isDenied) {
                window.location.href = $(this).data('delete-url');
            }
        })
    });
});
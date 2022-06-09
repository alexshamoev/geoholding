'use strict';


$(function() {
    // Allow digits only, using a RegExp
        $('.single_product__quantity_input').inputFilter(function(value) {
            return /^\d*$/.test(value);
        }, 'Only digits allowed');
    //


    // +- clicks
        $('.single_product__plus').on('click', function() {
            let amountValue = parseInt($('.single_product__quantity_input').val());

            amountValue++;

            $('.single_product__quantity_input').val(amountValue);     
        });

        $('.single_product__minus').on('click', function() {
            let amountValue = parseInt($('.single_product__quantity_input').val());

            if(amountValue > 1) {
                amountValue--;
            } 

            $('.single_product__quantity_input').val(amountValue);     
        });
    // 

    
    $('.single_product__add_to_basket_button').on('click', function() {
        localStorage.setItem('product_' + $('.js_data').data('active_product_id'), $('.quantity_input').val());

		Swal.fire({
			title: $('.js_data').data('product_added_in_basket'),
			icon: 'success'
		})
    });
});
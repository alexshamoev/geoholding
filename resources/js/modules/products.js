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

            if(amountValue) {
                amountValue++;
            } else {
                amountValue = 1;
            }

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
        let productId = $('.js_data').data('active_product_id');
        let productAmount = $('.single_product__quantity_input').val();

        if(productAmount === '') {
            localStorage.removeItem('product_' + productId);
        } else {
            localStorage.setItem('product_' + productId, productAmount);

            Swal.fire({
                title: $('.js_data').data('product_added_in_basket'),
                icon: 'success'
            })
        }
    });
});
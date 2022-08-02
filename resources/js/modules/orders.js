'use strict';


function showProductFromLocalStorageInOrder() {
    let productsData = '';

    for(let i = 0; i < localStorage.length; i++) {
        let key = localStorage.key(i) || '';
        let splitKey = key.split('_');
        
        if(splitKey[0] === 'product') {
            let productId = splitKey[1];

            // console.log(productId + ' ' + localStorage.getItem(key));

            productsData += '<input type="hidden" name="productIds[]" value="' + productId + '">';
            productsData += '<input type="hidden" name="quantity[]" value="' + localStorage.getItem(key) + '">';
        }
    }

    $('.js_products_data').html(productsData);
}


$(function() {
    showProductFromLocalStorageInOrder();
});
'use strict';


function showProductFromLocalStorage() {
    // console.log('showProductFromLocalStorage', localStorage.length);

    let numberOfProductsInLocalStorage = 0;

    for(let i = 0; i < localStorage.length; i++) {
        let key = localStorage.key(i) || '';
        let splitKey = key.split('_');
        
        if(splitKey[0] === 'product') {
            numberOfProductsInLocalStorage++;
        }
    }

    console.log('numberOfProductsInLocalStorage', numberOfProductsInLocalStorage);

    let k = 0;

    for(let i = 0; i < localStorage.length; i++) {
        let key = localStorage.key(i) || '';
        let splitKey = key.split('_');
        
        if(splitKey[0] === 'product') {
            let productId = splitKey[1];

            console.log(localStorage.getItem(key) + ' ' + productId);

            let _token = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: "/basket/get-data",
                type: "POST",
                data: {
                    productId: productId,
                    lang: $('.app_lang').val(),
                    _token: _token
                },
                success: function(response) {
                    console.log(response);
                    
                    if(response) {
                        $('.basket__product_template').first().clone().appendTo('.basket__products_list');

                        $('.basket__product_template').last().find('.basket__product_id').val(productId);
                        $('.basket__product_template').last().find('.basket__product_amount').val(localStorage.getItem(key));

                        $('.basket__product_template').last().find('.basket__product_title').html(response['title']);
                        $('.basket__product_template').last().find('.basket__product_price').html(response['price']);
                        $('.basket__product_template').last().find('.basket__product_price_sum').html(parseFloat(response['price'] * localStorage.getItem(key)).toFixed(2));
                        
                        $('.basket__product_template').last().find('.basket__product_image').attr('src', '/storage/images/modules/products/69/' + productId + '.jpg');


                        let parentTemplate = $('.basket__product_template').last();

                        parentTemplate.find('.basket__plus_btn').on('click', function() {
                            let amountValue = parseInt($(parentTemplate).find('.basket__product_amount').val());

                            amountValue++;

                            $(parentTemplate).find('.basket__product_amount').val(amountValue);

                            setProductSum();
                        });


                        parentTemplate.find('.basket__minus_btn').on('click', function() {
                            let amountValue = parseInt($(parentTemplate).find('.basket__product_amount').val());

                            if(amountValue > 1) {
                                amountValue--;
                            }

                            $(parentTemplate).find('.basket__product_amount').val(amountValue);

                            setProductSum();
                        });
                    }


                    console.log('success', k, numberOfProductsInLocalStorage - 1);

                    if(k == numberOfProductsInLocalStorage - 1) {
                        console.log('delete template');
                        

                        $('.basket__product_template').first().remove();

                        setBasketSum();

                        $('.basket__product_amount').inputFilter(function(value) {
                            return /^\d*$/.test(value); // Allow digits only, using a RegExp
                        }, 'Only digits allowed');

                        $('.basket__product_amount').keyup(function() {
                            setProductSum();
                        });


                        $('.basket__product_delete_button').on('click', function() {
                            removeProductFromBasket($(this));
                        });
                    }

                    k++;
                },
            });
        }
    }
}


function removeProductFromBasket(element) {
    let id = element.parents('.basket__product_template').find('.basket__product_id').val();

    element.parents('.basket__product_template').remove();

    localStorage.removeItem('product_' + id);

    setBasketSum();

    checkBasketEmptiness();
}


function setBasketSum() {
    let sum = 0;

    $('.basket__product_price_sum').each(function() {
        sum += parseFloat($(this).text());
    });
    
    $('.basket__sum').text(parseFloat(sum).toFixed(2));
}


function checkBasketEmptiness() {
    let productsInBasket = 0;

    for(let i = 0; i < localStorage.length; i++) {
        let key = localStorage.key(i) || '';
        let splitKey = key.split('_');
        
        if(splitKey[0] === 'product') {
            productsInBasket++;
        }
    }

    // alert(productsInBasket);

    if(productsInBasket > 0) {
        $('.empty_basket').addClass('d-none');
        $('.basket').removeClass('d-none');

        // alert(1);
    } else {
        $('.empty_basket').removeClass('d-none');
        $('.basket').addClass('d-none');

        // alert(0);
    }
}


function setProductSum() {
    $('.basket__product_price_sum').each(function() {
        let price = parseFloat($(this).parents('.basket__product_template').find('.basket__product_price').text()).toFixed(2);
        let amount = parseInt($(this).parents('.basket__product_template').find('.basket__product_amount').val());

        if(isNaN(amount)) {
            amount = 0;
        }
        
        console.log(price, amount);

        $(this).text(parseFloat(price * amount).toFixed(2));
    });

    setBasketSum();
}


function deleteProductFromLocalStorage() {
    let localStorageLenght = localStorage.length;
    let localStorageData = localStorage;
    let products = {};

    for(let i = 0; i < localStorageLenght; i++) {
        let key = localStorageData.key(i) || '';
        let splitKey = key.split('_');
        
        if(splitKey[0] === 'product') {
            products[key] = localStorage.getItem(key);
        }
    }
    
    let productsLength = Object.keys(products).length;
    
    for(let i = 0; i < productsLength; i++) { 
        localStorage.removeItem(Object.keys(products)[i]);
    }
}


$(function() {
    showProductFromLocalStorage();

    checkBasketEmptiness();
});
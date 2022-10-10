'use strict';


$(function() {
    $('.owl-carousel').owlCarousel({
        navigation : true,
        loop:true,
        margin:10,
        // nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    })
});
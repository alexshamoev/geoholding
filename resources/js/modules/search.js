'use strict';


function search_expansion() {
    $('.js_open_search').on('click', function() {
        $(this).hide();
        $('.js_close_search').show();
        $('.js_search').addClass('expanded');
    });

    $('.js_close_search').on('click', function() {
        $(this).hide();
        $('.js_open_search').show();
        $('.js_search').removeClass('expanded');
    });
}


$(document).ready(function() {
	console.log('search');


    search_expansion();


    $('#search').keypress(function (e) {
        if (e.which == 13) {
        $('#search_form').submit();
        return false;    
        }
    });
});
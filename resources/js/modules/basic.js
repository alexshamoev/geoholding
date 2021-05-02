var r_menu_buttons_show_hide_frame_speed = 40;
var r_menu_buttons_show_hide_frames_number = 16;
var r_menu_buttons_show_hide_frame_width = 34;


function r_menu_buttons_show() {
	var i = 0;

	var interval = setInterval(function () {
		$('.navbar__toggler-icon').css('background-position', '-' + i * r_menu_buttons_show_hide_frame_width + 'px 0px');

		i++;

		if (i === r_menu_buttons_show_hide_frames_number) {
			clearInterval(interval);
		}
	}, r_menu_buttons_show_hide_frame_speed);
}


function r_menu_buttons_hide() {
	var i = r_menu_buttons_show_hide_frames_number;

	var interval = setInterval(function () {
		i--;

		$('.navbar__toggler-icon').css('background-position', '-' + i * r_menu_buttons_show_hide_frame_width + 'px 0px');

		if (i === 0) {
			clearInterval(interval);
		}
	}, r_menu_buttons_show_hide_frame_speed);
}


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


$(document).ready(function () {
    search_expansion();

    $('nav').on('hide.bs.collapse', function () {
        r_menu_buttons_hide();
    });
    
    $('nav').on('show.bs.collapse', function () {
        r_menu_buttons_show();
    });


	// alert('jquery load');
});
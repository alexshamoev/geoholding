'use strict';


let r_mb_show_hide_frame_speed = 40;
let r_mb_show_hide_frames_number = 16;
let r_mb_show_hide_frame_width = 34;

let mb_slide_speed = 300;
let mb_stop_delay = 300;

let mb_sub_menu_is_enable = [];
let mb_timeout = [];

let mb_mouse_active = false;

let menu_is_active = false;
 

function r_menu_buttons_show() {
	let i = 0;

	let interval = setInterval(function () {
		$('.navbar__toggler-icon').css('background-position', '-' + i * r_mb_show_hide_frame_width + 'px 0px');

		i++;

		if (i === r_mb_show_hide_frames_number) {
			clearInterval(interval);
		}
	}, r_mb_show_hide_frame_speed);
}


function r_menu_buttons_hide() {
	let i = r_mb_show_hide_frames_number;

	let interval = setInterval(function () {
		i--;

		$('.navbar__toggler-icon').css('background-position', '-' + i * r_mb_show_hide_frame_width + 'px 0px');

		if (i === 0) {
			clearInterval(interval);
		}
	}, r_mb_show_hide_frame_speed);
}


function w_mb_init() {
	$('.js_menu_buttons__item').mouseover(function (e) {
		w_mb_show_sub_menu($('.js_menu_buttons__item').index(this));
	});

	$('.js_menu_buttons__item').mouseout(function (e) {
		w_mb_hide_sub_menu($('.js_menu_buttons__item').index(this));
	});
}


function w_mb_show_sub_menu(i) {
	mb_sub_menu_is_enable[i] = true;

	if (mb_timeout[i]) {
		clearTimeout(mb_timeout[i]);
	}

	if (mb_sub_menu_is_enable[i]) {
		$('.js_menu_buttons__item').eq(i).find('.menu_buttons__slide_down_block').slideDown(mb_slide_speed);
	}
}


function w_mb_hide_sub_menu(i) {
	mb_sub_menu_is_enable[i] = false;

	mb_timeout[i] = setTimeout(function () {
		if (!mb_sub_menu_is_enable[i]) {
			$('.js_menu_buttons__item').eq(i).find('.menu_buttons__slide_down_block').slideUp(mb_slide_speed);
		}
	}, mb_stop_delay);
}


function menu_active() {
	$('.menu_buttons__sub_menu_item--active').each(function () {
		$(this).parent().parent().parent().addClass('menu_buttons__active_item_block');
	});
}


function r_show_hide_sub_menu() {
	$('.js_menu_buttons__item').each(function () {
		if ($(this).find('.menu_buttons__slide_down_block').length) {
			$(this).find('.js_arrow_div').css('display', 'inline-block');
		}
	});

	$('.js_arrow_div').on('click', function () {
		if (!menu_is_active) {
			menu_is_active = true;
			$(this).parent().parent().find('.menu_buttons__slide_down_block_in_burger').slideDown(mb_slide_speed);
			$(this).css('transform', 'rotate(90deg)');

		} else {
			menu_is_active = false;
			$(this).parent().parent().find('.menu_buttons__slide_down_block_in_burger').slideUp(mb_slide_speed);
			$(this).css('transform', 'rotate(0)');
		}
	});
}


$(document).ready(function() {
	console.log(222);

    w_mb_init();
    menu_active();
    r_show_hide_sub_menu();

    if($(window).width() < 1180) {

        $('.js_menu_buttons__item').off('mouseover');

    } else {
        $('.js_arrow_div').css({ 'display': 'none', 'transform': 'rotate(0deg)' });

        $('.menu_buttons__slide_down_block_in_burger').css('display', 'none');

        $('.js_menu_buttons__item').on('mouseover');

        w_mb_init();
    }

    $('nav').on('hide.bs.collapse', function () {
        r_menu_buttons_hide();
    });
    
    $('nav').on('show.bs.collapse', function () {
        r_menu_buttons_show();
    });
});


$(window).on('resize', function () {
	if($(window).width() > 1150) {
		$('.js_arrow_div').css({ 'display': 'none', 'transform': 'rotate(0deg)' });

		$('.menu_buttons__slide_down_block_in_burger').css('display', 'none');

		$('.js_menu_buttons__item').on('mouseover');

		w_mb_init();
	} else {
		$('.js_menu_buttons__item').off('mouseover');
		
		$('.js_menu_buttons__item').each(function () {
			if ($(this).find('.menu_buttons__slide_down_block').length) {
				$(this).find('.js_arrow_div').css('display', 'inline-block');
			}
		});
	}

	// show width
	let device_width_wrapper = $(".device_width");
	let device_width = $(window).width();

	device_width_wrapper.html(device_width + "px");

});
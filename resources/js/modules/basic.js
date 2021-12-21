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


// menu buttons script
var w_mb_slide_speed = 300;
var w_mb_stop_delay = 300;

var w_mb_sub_menu_is_enable = [];
var w_mb_timeout = [];

var w_mb_mouse_active = false;

var menu_is_active = false;


function w_mb_init() {
	$('.me5').mouseover(function (e) {
		w_mb_show_sub_menu($('.me5').index(this));
	});

	$('.me5').mouseout(function (e) {
		w_mb_hide_sub_menu($('.me5').index(this));
	});
}


function w_mb_show_sub_menu(i) {
	w_mb_sub_menu_is_enable[i] = true;

	if (w_mb_timeout[i]) {
		clearTimeout(w_mb_timeout[i]);
	}

	if (w_mb_sub_menu_is_enable[i]) {
		$('.me5').eq(i).find('.me7').slideDown(w_mb_slide_speed);
	}
}

function w_mb_hide_sub_menu(i) {
	w_mb_sub_menu_is_enable[i] = false;

	w_mb_timeout[i] = setTimeout(function () {
		if (!w_mb_sub_menu_is_enable[i]) {
			$('.me5').eq(i).find('.me7').slideUp(w_mb_slide_speed);
		}
	}, w_mb_stop_delay);
}

function menu_active() {
	$('.me3').each(function () {
		$(this).parent().parent().parent().addClass('me2');
	});
}



function r_show_hide_sub_menu() {

	$('.me5').each(function () {
		if ($(this).find('.me7').length) {
			$(this).find('.js_arrow_div').css('display', 'inline-block');
		}
	});

	$('.js_arrow_div').on('click', function () {
		if (!menu_is_active) {
			menu_is_active = true;
			$(this).parent().parent().find('.me9').slideDown(w_mb_slide_speed);
			$(this).css('transform', 'rotate(90deg)');

		} else {
			menu_is_active = false;
			$(this).parent().parent().find('.me9').slideUp(w_mb_slide_speed);
			$(this).css('transform', 'rotate(0)');
		}
	});

}

$(window).on('resize', function () {
	if ($(window).width() > 1150) {
		$('.js_arrow_div').css({ 'display': 'none', 'transform': 'rotate(0deg)' });

		$('.me9').css('display', 'none');

		$('.me5').on('mouseover');

		w_mb_init();
	} else {
		$('.me5').off('mouseover');
		
		$('.me5').each(function () {
			if ($(this).find('.me7').length) {
				$(this).find('.js_arrow_div').css('display', 'inline-block');
			}
		});
	}

	// show width
	let device_width_wrapper = $(".device_width");
	let device_width = $(window).width();

	device_width_wrapper.html(device_width + "px");

});

// menu buttons script

$(document).ready(function () {
	let device_width_wrapper = $(".device_width");
	let device_width = $(window).width();

	device_width_wrapper.html(device_width + "px");

    search_expansion();

    $('nav').on('hide.bs.collapse', function () {
        r_menu_buttons_hide();
    });
    
    $('nav').on('show.bs.collapse', function () {
        r_menu_buttons_show();
    }); 
    // lightbox.init();
// menu buttons script
    w_mb_init();
	menu_active();
	r_show_hide_sub_menu();

	if ($(window).width() < 1180) {

		$('.me5').off('mouseover');

	} else {
		$('.js_arrow_div').css({ 'display': 'none', 'transform': 'rotate(0deg)' });

		$('.me9').css('display', 'none');

		$('.me5').on('mouseover');

		w_mb_init();
	}
// menu buttons script

	// search 
	$('#search').keypress(function (e) {
		if (e.which == 13) {
		  $('#search_form').submit();
		  return false;    
		}
	});



// photo Swipe
var openPhotoSwipe = function() {
    var pswpElement = document.querySelectorAll('.pswp')[0];

    // build items array
    var items = [
        {
            src: 'https://farm2.staticflickr.com/1043/5186867718_06b2e9e551_b.jpg',
            w: 964,
            h: 1024
        },
        {
            src: 'https://farm7.staticflickr.com/6175/6176698785_7dee72237e_b.jpg',
            w: 1024,
            h: 683
        }
    ];
    
    // define options (if needed)
    var options = {
			 // history & focus options are disabled on CodePen        
      	history: false,
      	focus: false,
		
        showAnimationDuration: 0,
        hideAnimationDuration: 0,
        
		closeOnScroll: false
    };
    
    var gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);
    gallery.init();
};

document.getElementById('btn').onclick = openPhotoSwipe;
});
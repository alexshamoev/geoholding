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

 


// photoswipe
	var initPhotoSwipeFromDOM = function(gallerySelector) {

		// parse slide data (url, title, size ...) from DOM elements 
		// (children of gallerySelector)
		var parseThumbnailElements = function(el) {
			var thumbElements = el.childNodes,
				numNodes = thumbElements.length,
				items = [],
				figureEl,
				linkEl,
				size,
				item;

			for(var i = 0; i < numNodes; i++) {

				figureEl = thumbElements[i]; // <figure> element

				// include only element nodes 
				if(figureEl.nodeType !== 1) {
					continue;
				}

				linkEl = figureEl.children[0]; // <a> element

				size = linkEl.getAttribute('data-size').split('x');

				// create slide object
				item = {
					src: linkEl.getAttribute('href'),
					w: parseInt(size[0], 10),
					h: parseInt(size[1], 10)
				};



				if(figureEl.children.length > 1) {
					// <figcaption> content
					item.title = figureEl.children[1].innerHTML; 
				}

				if(linkEl.children.length > 0) {
					// <img> thumbnail element, retrieving thumbnail url
					item.msrc = linkEl.children[0].getAttribute('src');
				} 

				item.el = figureEl; // save link to element for getThumbBoundsFn
				items.push(item);
			}

			return items;
		};

		// find nearest parent element
		var closest = function closest(el, fn) {
			return el && ( fn(el) ? el : closest(el.parentNode, fn) );
		};

		// triggers when user clicks on thumbnail
		var onThumbnailsClick = function(e) {
			e = e || window.event;
			e.preventDefault ? e.preventDefault() : e.returnValue = false;

			var eTarget = e.target || e.srcElement;

			// find root element of slide
			var clickedListItem = closest(eTarget, function(el) {
				return (el.tagName && el.tagName.toUpperCase() === 'FIGURE');
			});

			if(!clickedListItem) {
				return;
			}

			// find index of clicked item by looping through all child nodes
			// alternatively, you may define index via data- attribute
			var clickedGallery = clickedListItem.parentNode,
				childNodes = clickedListItem.parentNode.childNodes,
				numChildNodes = childNodes.length,
				nodeIndex = 0,
				index;

			for (var i = 0; i < numChildNodes; i++) {
				if(childNodes[i].nodeType !== 1) { 
					continue; 
				}

				if(childNodes[i] === clickedListItem) {
					index = nodeIndex;
					break;
				}
				nodeIndex++;
			}



			if(index >= 0) {
				// open PhotoSwipe if valid index found
				openPhotoSwipe( index, clickedGallery, true);
			}
			return false;
		};

		// parse picture index and gallery index from URL (#&pid=1&gid=2)
		var photoswipeParseHash = function() {
			var hash = window.location.hash.substring(1),
			params = {};

			if(hash.length < 5) {
				return params;
			}

			var vars = hash.split('&');
			for (var i = 0; i < vars.length; i++) {
				if(!vars[i]) {
					continue;
				}
				var pair = vars[i].split('=');  
				if(pair.length < 2) {
					continue;
				}           
				params[pair[0]] = pair[1];
			}

			if(params.gid) {
				params.gid = parseInt(params.gid, 10);
			}

			return params;
		};

		var openPhotoSwipe = function(index, galleryElement, disableAnimation, fromURL) {
			var pswpElement = document.querySelectorAll('.pswp')[0],
				gallery,
				options,
				items;

			items = parseThumbnailElements(galleryElement);

			// define options (if needed)
			options = {
				closeOnScroll:false,
				// define gallery index (for URL)
				galleryUID: galleryElement.getAttribute('data-pswp-uid'),

				getThumbBoundsFn: function(index) {
					// See Options -> getThumbBoundsFn section of documentation for more info
					var thumbnail = items[index].el.getElementsByTagName('img')[0], // find thumbnail
						pageYScroll = window.pageYOffset || document.documentElement.scrollTop,
						rect = thumbnail.getBoundingClientRect(); 

					return {x:rect.left, y:rect.top + pageYScroll, w:rect.width};
				}

			};

			// PhotoSwipe opened from URL
			if(fromURL) {
				if(options.galleryPIDs) {
					// parse real index when custom PIDs are used 
					// http://photoswipe.com/documentation/faq.html#custom-pid-in-url
					for(var j = 0; j < items.length; j++) {
						if(items[j].pid == index) {
							options.index = j;
							break;
						}
					}
				} else {
					// in URL indexes start from 1
					options.index = parseInt(index, 10) - 1;
				}
			} else {
				options.index = parseInt(index, 10);
			}

			// exit if index not found
			if( isNaN(options.index) ) {
				return;
			}

			if(disableAnimation) {
				options.showAnimationDuration = 0;
				options.hideAnimationDuration = 0;
			}

			// Pass data to PhotoSwipe and initialize it
			gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);
			gallery.init();
		};

		// loop through all gallery elements and bind events
		var galleryElements = document.querySelectorAll( gallerySelector );

		for(var i = 0, l = galleryElements.length; i < l; i++) {
			galleryElements[i].setAttribute('data-pswp-uid', i+1);
			galleryElements[i].onclick = onThumbnailsClick;
		}

		// Parse URL and open gallery if it contains #&pid=3&gid=1
		var hashData = photoswipeParseHash();
		if(hashData.pid && hashData.gid) {
			openPhotoSwipe( hashData.pid ,  galleryElements[ hashData.gid - 1 ], true, true );
		}
	};

	// execute above function
	initPhotoSwipeFromDOM('.my-gallery');
//


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
	//
	
	// Photoswipe init
		initPhotoSwipeFromDOM('.my-gallery');
	//
});
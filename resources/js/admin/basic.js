// window.$ = window.jQuery = require('jquery');
// import  'jquery-ui/ui/widgets/sortable';
// import  'jquery-ui/ui/widgets/draggable';
// import  'jquery-ui/ui/widgets/droppable';


var animation_speed = 50;


function init_type_select() {
	show_type_blocks($('#type_select').val(), 0);
	
	$('#type_select').on('change', function() {
		show_type_blocks($(this).val(), 250);
		console.log($(this).val());
	});
}


function hide_type_blocks(speed_delay) {
	$('.type_div').fadeOut(speed_delay);
}


function show_type_blocks(id, speed_delay) {
	let block_id = $('#block_id_input').val();
	
	hide_type_blocks(speed_delay);
	
	$('.type_' + id).fadeIn(animation_speed);
}


$(document).ready(function () {
    jQuery('.svg_img').each(function () {
        var $img = jQuery(this);
        var imgID = $img.attr('id');
        var imgClass = $img.attr('class');
        var imgURL = $img.attr('src');

        jQuery.get(imgURL, function (data) {
            /* Get the SVG tag, ignore the rest*/
            var $svg = jQuery(data).find('svg');

            /* Add replaced image's ID to the new SVG */
            if (typeof imgID !== 'undefined') {
                $svg = $svg.attr('id', imgID);
            }
            /* Add replaced image's classes to the new SVG */
            if (typeof imgClass !== 'undefined') {
                $svg = $svg.attr('class', imgClass + ' replaced-svg');
            }

            /* Remove any invalid XML tags as per http://validator.w3.org */
            $svg = $svg.removeAttr('xmlns:a');

            /* Check if the viewport is set, else we gonna set it if we can. */
            if (!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
                $svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'));
            }

            /* Replace image with new SVG */
            $img.replaceWith($svg);

        }, 'xml');
    });

   
    $('.delete-block').on('click', function() {
        let conf = confirm('ნამდვილად გსურთ მონაცემების წაშლა?');

        if(conf) {
            window.location.href = $(this).data('delete-link');
        }
    });

    init_type_select();


	// Modules.
		$('.modulesStep0__typeBox').fadeOut(0);

		

		let active_include_type = $('.modulesStep0 input[name="include_type"]:checked').val()
		$('.modulesStep0__type' + active_include_type + 'Box').fadeIn(0);
		
		$('.modulesStep0 input[name="include_type"]').on('change', function() {
			$('.modulesStep0__typeBox').fadeOut(0);

			$('.modulesStep0__type' + $(this).val() + 'box').fadeIn(0);
		});
	//
});
window.$ = window.jQuery = require('jquery');
import  'jquery-ui/ui/widgets/sortable';
// import  'jquery-ui/ui/widgets/draggable';
// import  'jquery-ui/ui/widgets/droppable';


var animation_speed = 50;


function checkBlockType(blockType) {
	$('.step2 .dataBlock').fadeOut(0);


	if(blockType === 'alias') {
		$('.step2 .forAlias').fadeIn(0);
	}

	if(blockType === 'input') {
		$('.step2 .forInput').fadeIn(0);
	}

	if(blockType === 'input_with_languages') {
		$('.step2 .forInputWithLanguages').fadeIn(0);
	}

	if(blockType === 'editor') {
		$('.step2 .forEditor').fadeIn(0);
	}

	if(blockType === 'editor_with_languages') {
		$('.step2 .forEditorWithLanguages').fadeIn(0);
	}

	if(blockType === 'file') {
		$('.step2 .forFile').fadeIn(0);
	}

	if(blockType === 'image') {
		$('.step2 .forImage').fadeIn(0);
	}

	if(blockType === 'select') {
		$('.step2 .forSelect').fadeIn(0);
	}

	if(blockType === 'calendar') {
		$('.step2 .forCalendar').fadeIn(0);
	}

	if(blockType === 'color_picker') {
		$('.step2 .forColorPicker').fadeIn(0);
	}

	if(blockType === 'rang') {
		$('.step2 .forRang').fadeIn(0);
	}

	if(blockType === 'published') {
		$('.step2 .forPublished').fadeIn(0);
	}

	if(blockType === 'select_with_optgroup') {
		$('.step2 .forSelectWithOptgroup').fadeIn(0);
	}

	if(blockType === 'select_with_ajax') {
		$('.step2 .forSelectWithAjax').fadeIn(0);
	}

	if(blockType === 'checkbox') {
		$('.step2 .forCheckbox').fadeIn(0);
	}

	if(blockType === 'multiply_checkboxes') {
		$('.step2 .forMultiplyCheckboxes').fadeIn(0);
	}

	if(blockType === 'multiply_checkboxes_with_category') {
		$('.step2 .forMultiplyCheckboxesWithCategory').fadeIn(0);
	}

	if(blockType === 'multiply_input_params') {
		$('.step2 .forMultiplyInputParams').fadeIn(0);
	}
}


function hide_type_blocks(speed_delay) {
	$('.type_div').fadeOut(speed_delay);
}

// ///////////////////////////

'use strict';


var required_fields_exists = false;
var published = true;


function published_init() {
	if($('.required').length) {
		for(var i = 0; i < $('.required').length; i++) {
			if($('.required').eq(i).val() === '1') {
				required_fields_exists = true;
			}
		}
	}

	if(required_fields_exists) {
		check_publication();
	}

	$('.ajax_select').on('change', function() {
		check_publication();
	});
}


function check_file_exists(url) {
	var http = new XMLHttpRequest();

    http.open('HEAD', url, false);
    http.send();

    return http.status != 404;
}


function check_publication() {
	published = true;

	var published_value = 0;

	$('.ajax_select').each(function() {
		var value = $(this).val();
		var required = $(this).parent().find('.required').val();

		if(Number(required)) {
			if(Boolean(value) === false) {
				published = false;

				$(this).addClass('required_warning_input');
			} else {
				$(this).removeClass('required_warning_input');
			}
		}
	});


	$('.ajax_text_input').each(function() {
		var value = $(this).val();
		var required = $(this).parent().find('.required').val();

		if(Number(required)) {
			if(value === '') {
				published = false;

				$(this).addClass('required_warning_input');
			} else {
				$(this).removeClass('required_warning_input');
			}
		}
	});


	$('.alias_text_input').each(function() {
		var value = $(this).val();
		var required = $(this).parent().find('.required').val();

		if(Number(required)) {
			if(value === '') {
				published = false;

				$(this).addClass('required_warning_input');
			} else {
				$(this).removeClass('required_warning_input');
			}
		}
	});


	$('.ajax_editor').each(function() {
		var required = $(this).parent().find('.required').val();
		var value = CKEDITOR.instances[$(this).attr('id')].getData();

		if(Number(required)) {
			if(value === '') {
				published = false;

				$(this).parent().addClass('required_warning_input');
			} else {
				$(this).parent().removeClass('required_warning_input');
			}
		}
	});


	$('.file_uploader').each(function() {
		var required = Number($(this).find('.required').val());

		if(required) {
			let file_exists = Number($(this).find('.file_exists').val());

			if(!file_exists) {
				published = false;

				$(this).addClass('required_warning_input');
			} else {
				$(this).removeClass('required_warning_input');
			}
		}
	});


	if($('#status_line_div').length) {
		if(published) {
			$('#content_div').removeClass('fail');
			$('#content_div').addClass('ok');

			published_value = 1;
		} else {
			$('#content_div').removeClass('ok');
			$('#content_div').addClass('fail');

			published_value = 0;
		}

		if($('#js_published_sql_table').length) {
			var published_sql_table = $('#js_published_sql_table').val();

			var id = $('#js_sql_id').val();

			mysql_update(published_sql_table, "published = '" + published_value + "'", "id = '" + id + "'");
		}
	} else {
		if(published) {
			published_value = 1;
		} else {
			published_value = 0;
		}

		if($('#js_published_sql_table').length) {
			var published_sql_table = $('#js_published_sql_table').val();

			var id = $('#js_sql_id').val();

			mysql_update(published_sql_table, "published = '" + published_value + "'", "id = '" + id + "'");
		}
	}
	
	
	if($('#submit_button').length) {
		if(published) {
			$('#submit_button').css('opacity', '1');
		} else {
			$('#submit_button').css('opacity', '0.3');
			
		}
	}
}


function submit_data_form() {
	console.log("submit_data_form", published, $('#submit_button').length);
	
//	if(published && $('#data_form').length && $('#submit_button').length) {
	if(published && $('#submit_button').length) {
		document.getElementById('data_form').submit();
	}
}


$(document).ready();


// ////////////////////

// function show_type_blocks(id, speed_delay) {
// 	let block_id = $('#block_id_input').val();
	
// 	hide_type_blocks(speed_delay);
	
// 	$('.type_' + id).fadeIn(animation_speed);
// }


jQuery(function () {
	// Dragable blocks.
		$('#rangBlocks').sortable({
			// Only make the .rangButton child elements support dragging.
			// Omit this to make then entire <li>...</li> draggable.
			handle: '.rangButton', 
			update: function() {
				let idsArray = [];

				$('.blockWithRang', $('#rangBlocks')).each(function(index, elem) {
					console.log($(elem).data('id'));

					idsArray[index] = $(elem).data('id');

					// Persist the new indices.
				});

				// alert(1);

				// event.preventDefault();

				// let name = $("input[name=name]").val();
				// let email = $("input[name=email]").val();
				// let mobile_number = $("input[name=mobile_number]").val();
				// let message = $("input[name=message]").val();
				// let _token   = $('meta[name="csrf-token"]').attr('content');

				let _token = $('meta[name="csrf-token"]').attr('content');

				$.ajax({
					url: "/admin/set-rangs",
					type: "POST",
					data: {
						db_table: $('#rangBlocks').data('db_table'),
						idsArray: idsArray,
						_token: _token
					},
					success: function(response) {
						console.log(response);
						
						if(response) {

						}
					},
				});

				

				// alert(555);
			}
		});
	//

	// login submit

	$('#login_submit').on('click', function() {
		$('#login_form').submit();
	})

	
	// menu buttons select script
	published_init();


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


	// Block types.
		checkBlockType($('#type_select').val());

		$('#type_select').on('change', function() {
			checkBlockType($(this).val());
		});
	//


	// Modules.
		$('.modulesStep0__typeBox').fadeOut(0);
		

		console.log($('.include_type:checked').val());

		$('.modulesStep0__type' + $('.include_type:checked').val() + 'Box').fadeIn(0);
		
		$('.include_type').on('change', function() {
			$('.modulesStep0__typeBox').fadeOut(0);

			$('.modulesStep0__type' + $(this).val() + 'Box').fadeIn(0);
		});


		// $('.modulesStep0__typeBox').fadeOut(0);

		// $('.modulesStep0__type' + $(this).val() + 'Box').fadeIn(0);
	//
});
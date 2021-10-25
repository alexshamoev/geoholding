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
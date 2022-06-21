'use strict';


function showHideFieldsByLinkType(fieldValue) {
	if($('#js_page_parent_div').length && $('#js_free_link_parent_div').length && $('#js_open_in_new_tab_parent_div').length) {
		switch(fieldValue) {
			case 'page':
				$('#js_page_parent_div').fadeIn(0);
				$('#js_free_link_parent_div').fadeOut(0);
				$('#js_open_in_new_tab_parent_div').fadeOut(0);

				break;
			case 'free_link':
				$('#js_page_parent_div').fadeOut(0);
				$('#js_free_link_parent_div').fadeIn(0);
				$('#js_open_in_new_tab_parent_div').fadeIn(0);

				break;
			case 'without_link':
				$('#js_page_parent_div').fadeOut(0);
				$('#js_free_link_parent_div').fadeOut(0);
				$('#js_open_in_new_tab_parent_div').fadeOut(0);

				break;
		}
	}
}

$(function() {
	if($('#js_link_type').length) {
		showHideFieldsByLinkType($('#js_link_type').val());

		$('#js_link_type').on('change', function() {
			showHideFieldsByLinkType($(this).val());
		});
	}
});
"use strict";

function horizontal_handleDropEvent(event, ui) {
	var draggable = ui.draggable;
	
	ui.draggable.draggable('option', 'revert', false);
	
	setTimeout(function() {
		ui.draggable.draggable('option', 'revert', true);
	}, 100);
	
	$(ui.draggable).css('left', '0');
	$(ui.draggable).css('top', '0');
	
	$(ui.draggable).insertBefore(this);
	
	for(var i = 0; i < $('.js-sortable-item').length; i++) {
		// $('.js-sortable-item').eq(i).before($('#drag_target_' + i + '_div'));
	}

    // Change later (put in for loop with real data)
    $('.js-sortable-item').before($('#drag_target_0_div'));
    // Change later (put in for loop with real data)
	
	// update_rangs();
}

function handleDropEvent(event, ui) {
	var draggable = ui.draggable;
	
	ui.draggable.draggable('option', 'revert', false);
	
	setTimeout(function() {
		ui.draggable.draggable('option', 'revert', true);
	}, 100);
	
	$(ui.draggable).css('left', '0');
	$(ui.draggable).css('top', '0');
	
	$(ui.draggable).insertBefore(this);
	
	var k = 0;
	var f = 0;
	
	for(var i = 0; i < $('.standart_blocks_div').length; i++) {
		$('.standart_blocks_div').eq(i).before($('#drag_target_' + k + '_div'));
		
		k++;
		
		if(k > 0 && k % 5 === 0) {
			
			var o = k - 1;
			
			$('#drag_target_' + o + '_div').after($('.drag_target_clear_div').eq(f));
			
			$('.drag_target_clear_div').eq(f).after($('#drag_target_' + k + '_div'));
			
			k++;
			f++;
		} else {
			
		}	
	}

    $('#drag_target_0_div').after($('.drag_target_clear_div'));
    
    $('.drag_target_clear_div').after($('#drag_target_0_div'));
	
	// update_rangs();
}

// function update_rangs() {
// 	var rang = $('.rang_input').length * 5;
	
// 	var sql_table = $('#js_sql_table').val();
	
// 	//alert(sql_table);
	
// 	for(var i = 0; i < $('.rang_input').length; i++) {
// 		var id = $('.rang_input').eq(i).parent().find('.block_id').val();
		
// 		//console.log(id + ' | ' + rang);
		
// 		mysql_update(sql_table, "rang = '" + rang + "'", "id = '" + id + "'");
		
// 		rang -= 5;
// 	}
	
// 	//console.log('update_rangs');
// }

$(window).on('load', function () {
	$('.drag_target_div').find('div').height($('.standart_blocks_div').height() + 32);
});

$(document).ready(function() {
	$('.standart_blocks_div').draggable({
		stack: '.standart_blocks_div',
		containment: 'section',
		revert: true
	});
	
	$('.drag_target_div').droppable({
		hoverClass: 'dragover',
		drop: handleDropEvent,
		tolerance: 'touch'
	});
	
	$('.js-sortable-item').draggable({
		stack: '.js-sortable-item',
		containment: 'section',
		revert: true
	});
	
	$('.drag_target_horizontal_div').droppable({
		hoverClass: 'dragover',
		drop: horizontal_handleDropEvent,
		tolerance: 'touch'
	});
	
	//console.log('drag_and_drop');
});
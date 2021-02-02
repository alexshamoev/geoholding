<div class="standart_bg_table_outside_div p-2">
	<table class="standart_bg_table">
		<tr>
			<td>
				<a href="{{ $editLink }}">
					{{ $title }}
				</a>
			</td>
			
			@if(isset($text))
				<td>
					{{ $text }}
				</td>
			@endif
			
			<td style="width: 1px;">
				<a href="{{ $editLink }}">
					<span class="ba_edit edit_icon"></span> Edit
				</a>
			</td>
			<td style="width: 1px;">
				<a href="{{ $deleteLink }}">
					<span class="ba_close_fat delete_icon"></span> Delete
				</a>
			</td>	
		</tr>
	</table>
</div>
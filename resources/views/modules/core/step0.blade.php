@extends('admin.master')


@section('pageMetaTitle')
    {{ $module -> title }}
@endsection


@section('content')
	@include('admin.includes.tags', [
		'tag0Text' => $module -> title
	])


	<div class="p-2">
		@include('admin.includes.addButton', [
			'text' => $bsw -> a_add.' '.$moduleStep -> title,
			'url' => route('coreAddStep0', $module -> alias)
		])


		<div class="row" id="rangBlocks" data-db_table="{{ $moduleStep -> db_table }}">
			@if(!$moduleStep -> images)
				@foreach($moduleStepData as $data)
					@if($sortBy === 'rang')
						@include('admin.includes.horizontalEditDeleteBlock', [
							'id' => $data -> id,
							'title' => $data -> $use_for_tags,
							'editLink' => route('coreEditStep0', array($module -> alias, $data -> id)),
							'deleteLink' => route('coreDeleteStep0', array($module -> alias, $data -> id))
						])
					@else 
						@include('admin.includes.horizontalEditDelete', [
								'id' => $data -> id,
								'title' => $data -> $use_for_tags,
								'editLink' => route('coreEditStep0', array($module -> alias, $data -> id)),
								'deleteLink' => route('coreDeleteStep0', array($module -> alias, $data -> id))
						])
					@endif
				@endforeach
			@else
				@foreach($moduleStepData as $data)
					@if($sortBy === 'rang')
						@include('admin.includes.verticalEditDeleteBlockWithRangs', [
										'id' => $data -> id,
										'title' => $data -> $use_for_tags,
										'imageUrl' => 'storage/images/modules/'.$module -> alias.'/step_0/'.$data -> id.'.'.$imageFormat,
										'editLink' => route('coreEditStep0', array($module -> alias, $data -> id)),
										'deleteLink' => route('coreDeleteStep0', array($module -> alias, $data -> id))
									])
					@else
						@include('admin.includes.verticalEditDeleteBlock', [
										'id' => $data -> id,
										'title' => $data -> $use_for_tags,
										'imageUrl' => 'storage/images/modules/'.$module -> alias.'/step_0/'.$data -> id.'.'.$imageFormat,
										'moduleAlias' => $module -> alias,
										'editLink' => route('coreEditStep0', array($module -> alias, $data -> id)),
										'deleteLink' => route('coreDeleteStep0', array($module -> alias, $data -> id))
									])
					@endif
				@endforeach
			@endif
		</div>
	</div>
@endsection
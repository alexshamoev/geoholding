@extends('admin.master')


@section('pageMetaTitle')
    Modules
@endsection


@section('content')
	@include('admin.includes.tags', [
		'tag0Text' => $module -> title,
		'tag0Url' => route('coreGetStep0', $module -> alias)
	])


	<div class="p-2">
		@include('admin.includes.addButton', [
			'text' => $bsw -> a_add.' '.$moduleStep -> title,
			'url' => route('coreAddStep0', $module -> alias)
		])

		
		<div id="rangBlocks" data-db_table="{{ $moduleStep -> db_table }}">
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
	</div>
@endsection
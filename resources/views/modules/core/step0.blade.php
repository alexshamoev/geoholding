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


		@foreach($moduleStepData as $data)
			@include('admin.includes.horizontalEditDeleteBlock', [
				'title' => $data -> $use_for_tags,
				'editLink' => route('coreEditStep0', array($module -> alias, $data -> id)),
				'deleteLink' => route('coreDeleteStep0', array($module -> alias, $data -> id))
			])
		@endforeach
	</div>
@endsection
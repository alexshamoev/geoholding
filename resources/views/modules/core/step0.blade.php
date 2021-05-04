@extends('admin.master')


@section('pageMetaTitle')
    Modules
@endsection


@section('content')
	@include('admin.includes.tags', [
		'tag0Text' => $module -> title,
		'tag0Url' => route('moduleGetData', $module -> alias)
	])


	<div class="p-2">
		@include('admin.includes.addButton', [
			'text' => $bsw -> a_add.' '.$moduleStep -> title,
			'url' => route('moduleDataAdd', $module -> alias)
		])


		@foreach($moduleStepData as $data)
			@include('admin.includes.horizontalEditDeleteBlock', [
				'title' => $data -> $use_for_tags,
				'editLink' => route('moduleDataEdit', array($module -> alias, $data -> id)),
				'deleteLink' => route('moduleDataDelete', array($module -> alias, $data -> id))
			])
		@endforeach
	</div>
@endsection
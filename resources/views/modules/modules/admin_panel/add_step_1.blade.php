@extends('admin.master')


@section('pageMetaTitle')
    Modules > {{ $module -> alias }} > {{ __('bsw.adding') }}
@endsection


@section('content')
	@include('admin.includes.tags', [
		'tag0Text' => 'Modules',
		'tag0Url' => route('moduleStartPoint'),
		'tag1Text' => $module -> alias,
		'tag1Url' => route('moduleEdit', $module -> id),
		'tag2Text' => __('bsw.adding')
	])

	<div class="p-2">
		@if($errors -> any())
			<div class="p-2">
				<div class="alert alert-danger m-0">
					{{ __('bsw.warningStatus') }}
				</div>
			</div>
		@endif
		
		
		@if(Session :: has('successStatus'))
			<div class="p-2">
				<div class="alert alert-success m-0" role="alert">
					{{ Session :: get('successStatus') }}
				</div>
			</div>
		@endif


		@if(Session :: has('successDeleteStatus'))
			<div class="p-2">
				<div class="alert alert-success m-0" role="alert">
					{{ Session :: get('successDeleteStatus') }}
				</div>
			</div>
		@endif


		{{ Form :: open(array('route' => array('moduleLevelInsert', $module -> id))) }}
			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>Title: *</span>
						<span>(Example: Category)</span>
					</div>
					
					<div class="p-2">
						{{ Form :: text('title') }}
					</div>
				</div>

				@error('title')
					<div class="alert alert-danger">
						{{ $message }}
					</div>
				@enderror
			</div>

			<div class="p-2 submit-button">
				{{ Form :: submit(__('bsw.adding')) }}
			</div>
		{{ Form :: close() }}
@endsection
@extends('admin.master')


@section('pageMetaTitle')
	Languages > {{ __('bsw.adding') }}
@endsection


@section('content')
	@include('admin.includes.tags', [
		'tag0Text' => 'Language',
		'tag0Url' => route('languageStartPoint'),
		'tag1Text' => __('bsw.adding')
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


		{{ Form :: open(array('route' => 'languageInsert', 'files' => 'true')) }}
			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>ენის დასახელება, ინგლისურ ენაზე: *</span>
						<span>(მაგალითად: ge)</span>
					</div>
					
					<div class="p-2">
						{{ Form :: text('title') }}
					</div>
				</div>

				@error('title')
					<div class="alert alert-danger m-0">
						{{ $message }}
					</div>
				@enderror
			</div>

			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>ენის სრული დასახელება: *</span>
						<span>(მაგალითად: ქა)</span>
					</div>

					<div class="p-2">
						{{ Form :: text('full_title') }}
					</div>
				</div>

				@error('full_title')
					<div class="alert alert-danger m-0">
						{{ $message }}
					</div>
				@enderror
			</div>

			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2">
						<span>Image (SVG):</span>
					</div>

					<div class="p-2">
						{{ Form :: file('svg_icon_languages') }}
					</div>
				</div>
			</div>

			<div class="p-2 submit-button">
				{{ Form :: submit(__('bsw.adding')) }}
			</div>
		{{ Form :: close() }}
	</div>
@endsection

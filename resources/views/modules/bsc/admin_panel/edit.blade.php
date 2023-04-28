@extends('admin.master')


@section('pageMetaTitle')
    BSC > {{ $activeBsc -> system_word }}
@endsection


@section('content')
	@include('admin.includes.tags', [
		'tag0Text' => 'BSC',
		'tag0Url' => route('bsc.index'),
		'tag1Text' => $activeBsc -> system_word
	])


	@include('admin.includes.bar', [
		'addUrl' => route('bsc.create'),
		'deleteUrl' => route('bsc.destroy', $activeBsc -> id),
		'nextId' => $nextBscId,
		'prevId' => $prevBscId,
		'nextRoute' => route('bsc.edit', $nextBscId),
		'prevRoute' => route('bsc.edit', $prevBscId),
		'backRoute' => route('bsc.index')
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
		

		{{ Form :: model($activeBsc, array('route' => array('bsc.update', $activeBsc -> id))) }}
			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						System word: *
					</div>
					
					<div class="p-2">
						{{ Form :: text('system_word') }}
					</div>
				</div>

				@error('system_word')
					<div class="alert alert-danger m-0">
						{{ $message }}
					</div>
				@enderror
			</div>

			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						Configuration: *
					</div>

					<div class="p-2">
						{{ Form :: text('configuration') }}
					</div>
				</div>

				@error('configuration')
					<div class="alert alert-danger">
						{{ $message }}
					</div>
				@enderror
			</div>
			
			<div class="p-2 submit-button">
				{{ Form :: submit('Submit') }}
			</div>
		{{ Form :: close() }}
	</div>
@endsection

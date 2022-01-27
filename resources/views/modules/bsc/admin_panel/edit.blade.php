@extends('admin.master')


@section('pageMetaTitle')
    BSC > {{ $activeBsc -> system_word }}
@endsection


@section('content')
	@include('admin.includes.tags', [
		'tag0Text' => 'BSC',
		'tag0Url' => route('bscStartPoint'),
		'tag1Text' => $activeBsc -> system_word
	])


	@include('admin.includes.bar', [
		'addUrl' => route('bscAdd'),
		'deleteUrl' => route('bscDelete', $activeBsc -> id),
		'nextId' => $nextBscId,
		'prevId' => $prevBscId,
		'nextRoute' => route('bscEdit', $nextBscId),
		'prevRoute' => route('bscEdit', $prevBscId),
		'backRoute' => route('bscStartPoint')
	])

	
	@if(Session :: has('successStatus'))
        <div class="alert alert-success" role="alert">
            {{ Session :: get('successStatus') }}
        </div>
    @endif


	{{ Form :: model($activeBsc, array('route' => array('bscUpdate', $activeBsc -> id))) }}
		<div class="p-2">
			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>System word: *</span>
						<span>(e.g: images_folder)</span>
					</div>
					
					<div class="p-2">
						{{ Form :: text('system_word') }}
					</div>
				</div>

				@error('system_word')
					<div class="alert alert-danger">
						{{ $message }}
					</div>
				@enderror
			</div>

			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>Configuration: *</span>
						<span>(e.g: modules/gallery/uploads/)</span>
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
		</div>
	{{ Form :: close() }}
@endsection

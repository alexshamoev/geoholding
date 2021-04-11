@extends('admin.layouts.master')


@section('pageMetaTitle')
    Modules
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
			</div>

			<div class="p-2 submit-button">
				{{ Form :: submit('Submit') }}
			</div>
		</div>
	{{ Form :: close() }}
@endsection

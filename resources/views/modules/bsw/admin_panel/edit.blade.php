@extends('admin.master')


@section('pageMetaTitle')
    BSW Edit
@endsection


@section('content')
	@include('admin.includes.tags', [
		'tag0Text' => 'BSW',
		'tag0Url' => route('bswStartPoint'),
		'tag1Text' => $activeBsw -> system_word
	])


	@include('admin.includes.bar', [
		'addUrl' => route('bswAdd'),
		'deleteUrl' => route('bswDelete', $activeBsw -> id),
		'nextId' => $nextBswId,
		'prevId' => $prevBswId,
		'nextRoute' => route('bswEdit', $nextBswId),
		'prevRoute' => route('bswEdit', $prevBswId),
		'backRoute' => route('bswStartPoint')
	])


	{{ Form :: model($activeBsw, array('route' => array('bswUpdate', $activeBsw -> id))) }}
		<!-- @if($errors -> any())
			<div class="alert alert-danger">
				<ul>
					@foreach($errors -> all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif -->


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
		</div>		

		<div class="px-3">
			<div class="top-border">
				@foreach($languages as $langData)
					<div class="standard-block standard-block--no-top-border  p-2">
						<div class="p-2">
							<span>Description: {{$langData -> title}}</span>
						</div>			

						<div class="p-2">
							{{ Form :: text('word_'.$langData -> title) }}
						</div>
					</div>

					@error('word_'.$langData -> title)
						<div class="alert alert-danger">
							{{ $message }}
						</div>
					@enderror
				@endforeach
			</div>
		</div>

		<div class="p-2">
			<div class="p-2 submit-button">
				{{ Form :: submit('Submit') }}
			</div>
		</div>
	{{ Form :: close() }}
@endsection
@extends('admin.master')


@section('pageMetaTitle')
    Modules
@endsection


@section('content')
	@include('admin.includes.tags', [
		'tag0Text' => 'Language',
		'tag0Url' => route('languageStartPoint'),
		'tag1Text' => $language -> title
	])


	@include('admin.includes.bar', [
		'addUrl' => route('languageAdd'),
		'deleteUrl' => route('languageDelete', $language -> id),
		'nextId' => $nextLanguageId,
		'prevId' => $prevLanguageId,
		'nextRoute' => route('languageEdit', $nextLanguageId),
		'prevRoute' => route('languageEdit', $prevLanguageId),
		'backRoute' => route('languageStartPoint')
	])

	
	{{ Form :: model($language, array('route' => array('languageUpdate', $language -> id), 'files' => 'true')) }}
		<div class="p-2">
			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>ენის დასახელება, ინგლისურ ენაზე: *</span>
						<span>(მაგალითად: georgian)</span>
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

			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>ენის სრული დასახელება: *</span>
						<span>(მაგალითად: ქართული)</span>
					</div>

					<div class="p-2">
						{{ Form :: text('full_title') }}
					</div>
				</div>

				@error('full_title')
					<div class="alert alert-danger">
						{{ $message }}
					</div>
				@enderror
			</div>

			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-1">
						<span>დროშის ფოტო:</span>
					</div>

					<div class="p-1">
						{{ Form :: file('svg_icon_languages') }}
					</div>

					@if(null !== "/storage/images/modules/languages/$language -> id.svg")
						<div class="p-3">
							<img src="{{ asset('/storage/images/modules/languages/'.$language -> id.'.svg') }}" alt="close" style="width: 50px;">
						</div>
					@endif
				</div>
			</div>

			<div class="p-2 submit-button">
				{{ Form :: submit('Submit') }}
			</div>
		</div>
	{{ Form :: close() }}
@endsection

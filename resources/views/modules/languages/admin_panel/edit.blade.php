@extends('admin.layouts.master')


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


	{{ Form :: model($language, array('route' => array('languageUpdate', $language -> id))) }}
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
			</div>

			<div class="p-2 w-100">
				<div class="standard-block standard-block--no-left-border row">
					<div class="col-3 p-3 checkbox-block">
						<label>
							{{ Form :: checkbox('like_default', '1') }}

							Default for front?
						</label>
					</div>

					<div class="col-3 p-3 checkbox-block">
						<label>
							{{ Form :: checkbox('like_default_for_admin', '1') }}

							Default for admin?
						</label>
					</div>
				</div>
			</div>

			<div class="p-2 submit-button">
				{{ Form :: submit('Submit') }}
			</div>
		</div>
	{{ Form :: close() }}
@endsection

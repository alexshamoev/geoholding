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
		'prevRoute' => route('languageEdit', $prevLanguageId)
	])


	{{ Form :: model($language, array('route' => array('languageUpdate', $language -> id))) }}
		<div class="p-2">
			{{ Form :: text('title') }}
		</div>

		<div class="p-2">
			{{ Form :: text('full_title') }}
		</div>

		<div>
			<label>
				{{ Form :: checkbox('like_default', '1') }}

				Default for front?
			</label>
		</div>

		<div>
			<label>
				{{ Form :: checkbox('like_default_for_admin', '1') }}

				Default for admin?
			</label>
		</div>

		{{ Form :: submit('Submit') }}
	{{ Form :: close() }}
@endsection

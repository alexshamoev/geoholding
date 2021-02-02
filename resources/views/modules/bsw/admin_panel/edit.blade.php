@extends('admin.layouts.master')


@section('pageMetaTitle')
    Modules
@endsection


@section('content')
	@include('admin.includes.tags', [
		'tag0Text' => 'BSW',
		'tag0Url' => route('bswStartPoint'),
		'tag1Text' => $bsw -> system_word
	])


	@include('admin.includes.bar', [
		'addUrl' => route('bswAdd'),
		'deleteUrl' => route('bswDelete', $bsw -> id),
		'nextId' => $nextBswId,
		'prevId' => $prevBswId,
		'nextRoute' => route('bswEdit', $nextBswId),
		'prevRoute' => route('bswEdit', $prevBswId)
	])


	{{ Form :: model($bsw, array('route' => array('bswUpdate', $bsw -> id))) }}
		<div class="p-2">
			{{ Form :: text('system_word') }}
		</div>

		@foreach($languages as $langData)
			<div class="p-2">
				{{ Form :: text('word_'.$langData -> title) }}
			</div>
		@endforeach

		{{ Form :: submit('Submit') }}
	{{ Form :: close() }}
@endsection

@extends('admin.master')


@section('pageMetaTitle')
    {{ $module -> title }}
@endsection


@section('content')
    @include('admin.includes.tags', [
		'tag0Text' => $module -> title
	])

    <div class="p-2">
        @foreach($users as $data)
            @include('admin.includes.horizontalEditDelete', [
                    'id' => $data -> id,
                    'title' => $data -> email,
                    'editLink' => route('userEdit', $data -> id),
                    'deleteLink' => route('userDelete', $data -> id)
            ])
        @endforeach
    </div>
@endsection
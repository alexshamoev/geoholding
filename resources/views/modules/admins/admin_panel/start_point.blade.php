@extends('admin.master')


@section('pageMetaTitle')
    {{ $module -> title }}
@endsection


@section('content')
    @include('admin.includes.tags', [
		'tag0Text' => $module -> title
	])

    <div class="p-2">
		@include('admin.includes.addButton', ['text' => 'Add Admin', 'url' => route('adminAdd')])

        @foreach($admins as $data)
            @include('admin.includes.horizontalEditDelete', [
                    'id' => $data -> id,
                    'title' => $data -> email,
                    'editLink' => route('adminEdit', $data -> id),
                    'deleteLink' => route('adminDelete', $data -> id)
            ])
        @endforeach
    </div>
@endsection
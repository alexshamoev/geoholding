@extends('admin.master')


@section('pageMetaTitle')
    Admins
@endsection


@section('content')
    @include('admin.includes.tags', [
		'tag0Text' => 'Admins',
		'tag0Url' => route('adminStartPoint'),
		'tag0ArrowData' => $admins
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
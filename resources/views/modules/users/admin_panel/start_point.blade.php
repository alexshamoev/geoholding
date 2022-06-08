@extends('admin.master')


@section('pageMetaTitle')
    {{ $module -> title }}
@endsection


@section('content')
    @include('admin.includes.tags', [
		'tag0Text' => $module -> title
	])

    <div class="p-2">
        @if(Session :: has('successStatus'))
			<div class="p-2">
				<div class="alert alert-success m-0" role="alert">
					{{ Session :: get('successStatus') }}
				</div>
			</div>
		@endif


        @foreach($users as $data)
            @include('admin.includes.infoBlockWithoutImage', [
                    'id' => $data -> id,
                    'title' => $data -> email,
                    'editLink' => route('userEdit', $data -> id),
                    'deleteLink' => route('userDelete', $data -> id)
            ])
        @endforeach
    </div>
@endsection
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


		@include('admin.includes.addButton', ['text' => 'Add Admin', 'url' => route('admins.create')])

        @foreach($admins as $data)
            @include('admin.includes.infoBlockWithoutImage', [
                    'id' => $data -> id,
                    'title' => $data -> email,
                    'editLink' => route('admins.edit', $data -> id),
                    'deleteLink' => route('admins.destroy', $data -> id),
                    'possibilityToDelete' => true,
					'possibilityToEdit' => true,
            ])
        @endforeach
    </div>
@endsection
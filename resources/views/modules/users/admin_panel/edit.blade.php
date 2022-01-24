@extends('admin.master')


@section('pageMetaTitle')
    Users > Edit Admin
@endsection


@section('content')
    @include('admin.includes.tags', [
		'tag0Text' => 'Users',
		'tag0Url' => route('userStartPoint'),
		'tag1Text' => $activeAdmin -> email
	])


    @include('admin.includes.bar', [
		'deleteUrl' => route('userDelete', $activeAdmin -> id),
		'nextId' => $nextUsersId,
		'prevId' => $prevUsersId,
		'nextRoute' => route('userEdit', $nextUsersId),
		'prevRoute' => route('userEdit', $prevUsersId),
		'backRoute' => route('userStartPoint')
	])


		<div class="p-2">
			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>სახელი: {{ $name }}</span>
					</div>
				</div>
			</div>

			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>ელ. ფოსტა: {{ $email }}</span>
					</div>
				</div>
			</div>
		</div>


  
@endsection
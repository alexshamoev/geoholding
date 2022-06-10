@extends('admin.master')


@section('pageMetaTitle')
	{{ $module -> title }} > {{ $user -> email }}
@endsection


@section('content')
    @include('admin.includes.tags', [
		'tag0Text' => $module -> title,
		'tag0Url' => route('userStartPoint'),
		'tag1Text' => $user -> email
	])


    @include('admin.includes.bar', [
		'deleteUrl' => route('userDelete', $user -> id),
		'nextId' => $nextUsersId,
		'prevId' => $prevUsersId,
		'nextRoute' => route('userEdit', $nextUsersId),
		'prevRoute' => route('userEdit', $prevUsersId),
		'backRoute' => route('userStartPoint')
	])

	{{ Form :: open(array('route' => array('userUpdate', $user -> id), 'files' => true)) }}
		<div class="container-xl px-4 mt-4">
			<div class="row">
				<div class="col-xl-4">
					<!-- Profile picture card-->
					<div class="card mb-4 mb-xl-0">
						<div class="card-header">
							Profile Picture
						</div>

						<div class="card-body text-center">
							<!-- Profile picture image-->
							<img class="img-account-profile rounded-circle mb-2" src="{{ asset('storage/images/modules/users/'.$user -> id.'.jpg') }}" alt="">
							<!-- Profile picture help block-->
							<div class="small font-italic text-muted mb-4">
								JPG or PNG no larger than 5 MB
							</div>
							<!-- Profile picture upload button-->
							<input type="file" name="profile_image" id="">
						</div>
					</div>

					
				</div>
			</div>
		</div>
	{{ Form :: close() }}
@endsection
@extends('admin.master')


@section('pageMetaTitle')
	{{ $module->title }} > {{ $user->email }}
@endsection


@section('content')
    @include('admin.includes.tags', [
		'tag0Text' => $module->title,
		'tag0Url' => route('users.index'),
		'tag1Text' => $user->email
	])


    @include('admin.includes.bar', [
		'deleteUrl' => route('users.destroy', $user->id),
		'nextId' => $nextUsersId,
		'prevId' => $prevUsersId,
		'nextRoute' => route('users.edit', $nextUsersId),
		'prevRoute' => route('users.edit', $prevUsersId),
		'backRoute' => route('users.index')
	])

	<div class="p-2">
		@if($errors->any())
			<div class="p-2">
				<div class="alert alert-danger m-0">
					{{ __('bsw.warningStatus') }}
				</div>
			</div>
		@endif
		
		
		@if(Session::has('successStatus'))
			<div class="p-2">
				<div class="alert alert-success m-0" role="alert">
					{{ Session::get('successStatus') }}
				</div>
			</div>
		@endif

		{{ Form::open(array('route' => array('users.update', $user->id))) }}
			@method('put')

			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>ფოტო: *</span>
					</div>
					
					<div class="p-2">
						{{ Form::file('profile_image') }}
					</div>

					@if(file_exists(public_path('storage/images/modules/users/'.$user->id.'.jpg')))
						<div class="p-2">
							<img class="w-25" src="{{ asset('storage/images/modules/users/'.$user->id.'.jpg') }}" alt="">
						</div>
					@else 
						@if($user->social_type === 'google')
							<div class="p-2">
								<img class="w-25" src="{{ $user->avatar_url }}" alt="Default Text">
							</div>
						@else
							<div class="p-2">
								<img class="w-25" src="{{ asset('storage/images/modules/users/default.png') }}" alt="Default Text">
							</div>
						@endif
					@endif
				</div>

                @error('profile_image')
					<div class="alert alert-danger m-0">
						{{ $message }}
					</div>
				@enderror
			</div>

			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>სახელი: *</span>
					</div>
					
					<div class="p-2">
						{{ Form::text('name', $user->name) }}
					</div>
				</div>

                @error('name')
					<div class="alert alert-danger m-0">
						{{ $message }}
					</div>
				@enderror
			</div>

			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>გვარი: *</span>
					</div>
					
					<div class="p-2">
						{{ Form::text('last_name', $user->last_name) }}
					</div>
				</div>

                @error('last_name')
					<div class="alert alert-danger m-0">
						{{ $message }}
					</div>
				@enderror
			</div>

			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>ელ. ფოსტა: *</span>
					</div>

					<div class="p-2">
						{{ Form::email('email', $user->email) }}
					</div>
				</div>

                @error('email')
					<div class="alert alert-danger m-0">
						{{ $message }}
					</div>
				@enderror
			</div>

			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>{{ __('auth.phone') }}: *</span>
					</div>

					<div class="p-2">
						{{ Form::text('phone', $user->phone) }}
					</div>
				</div>

                @error('phone')
					<div class="alert alert-danger m-0">
						{{ $message }}
					</div>
				@enderror
			</div>

			<div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2 d-flex flex-column">
						<span>{{ __('auth.address') }}: *</span>
					</div>

					<div class="p-2">
						{{ Form::text('address', $user->address) }}
					</div>
				</div>

                @error('address')
					<div class="alert alert-danger m-0">
						{{ $message }}
					</div>
				@enderror
			</div>

			<div class="p-2 submit-button">
				{{ Form::submit('მონაცემების შეცვლა') }}
			</div>
		{{ Form::close() }}
	</div>
@endsection
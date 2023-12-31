@extends('admin.master')


@section('pageMetaTitle')
	{{ $module->title }}
@endsection


@section('content')
    @include('admin.includes.tags', [
		'tag0Text' => $module->title
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


		{{ Form::open(array('route' => 'contactsUpdate')) }}
            <div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2">
						<span>ელ. ფოსტის მისამართი: *</span>
					</div>
					
					<div class="p-2">
                        {{ Form::text('admin_email', config('bsc.admin_email')) }}
					</div>
				</div>

				@error('admin_email')
					<div class="alert alert-danger">
						{{ $message }}
					</div>
				@enderror
			</div>


            <div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2">
						<span>Facebook-ის მისამართი: *</span>
					</div>
					
					<div class="p-2">
                        {{ Form::text('facebook_link', config('bsc.facebook_link')) }}
					</div>
				</div>

				@error('facebook_link')
					<div class="alert alert-danger">
						{{ $message }}
					</div>
				@enderror
			</div>


            <div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2">
						<span>Instagram-ის მისამართი: *</span>
					</div>
					
					<div class="p-2">
                        {{ Form::text('instagram_link', config('bsc.instagram_link')) }}
					</div>
				</div>

				@error('instagram_link')
					<div class="alert alert-danger">
						{{ $message }}
					</div>
				@enderror
			</div>


            <div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2">
						<span>Twitter-ის მისამართი: *</span>
					</div>
					
					<div class="p-2">
                        {{ Form::text('twitter_link', config('bsc.twitter_link')) }}
					</div>
				</div>

				@error('twitter_link')
					<div class="alert alert-danger">
						{{ $message }}
					</div>
				@enderror
			</div>


            <div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2">
						<span>ტელეფონის ნომერი: *</span>
					</div>
					
					<div class="p-2">
                        {{ Form::text('phone_number', config('bsc.phone_number')) }}
					</div>
				</div>

				@error('phone_number')
					<div class="alert alert-danger">
						{{ $message }}
					</div>
				@enderror
			</div>


            <div class="p-2">
                <div class="top-border">
                    @foreach($languages as $langData)
                        <div class="standard-block standard-block--no-top-border p-2">
                            <div class="p-2">
                                მისამართი: *
                                
                                <img src="{{ asset('/storage/images/modules/languages/'.$langData->id.'.svg') }}" width="30" height="30">
                            </div>			

                            <div class="p-2">
                                {{ Form::text('address_'.$langData->title, ${ 'address_'.$langData->title }) }}
                            </div>
                        </div>

                        @error('address_'.$langData->title)
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    @endforeach
                </div>
            </div>


            <div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2">
						<span>მარკერის X კოორდინატა: *</span>
					</div>
					
					<div class="p-2">
                        {{ Form::text('cordinate_x', config('bsc.cordinate_x')) }}
					</div>
				</div>

				@error('cordinate_x')
					<div class="alert alert-danger">
						{{ $message }}
					</div>
				@enderror
			</div>


            <div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2">
						<span>მარკერის Y კოორდინატა: *</span>
					</div>
					
					<div class="p-2">
                        {{ Form::text('cordinate_y', config('bsc.cordinate_y')) }}
					</div>
				</div>

				@error('cordinate_y')
					<div class="alert alert-danger">
						{{ $message }}
					</div>
				@enderror
			</div>


            <div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2">
						<span>რუკის მიახლოება:</span>
					</div>
					
					<div class="p-2">
                        {{ Form::selectRange('map_number', 21, 10, config('bsc.map_number')) }}
					</div>
				</div>

				@error('cordinate_y')
					<div class="alert alert-danger">
						{{ $message }}
					</div>
				@enderror
			</div>

            
            <div class="p-2 submit-button">
                {{ Form::submit(__('bsw.submit')) }}
            </div>
		{{ Form::close() }}
	</div>
@endsection
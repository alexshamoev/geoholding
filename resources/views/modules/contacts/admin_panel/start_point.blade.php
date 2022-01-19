@extends('admin.master')


@section('pageMetaTitle')
    Contacts
@endsection

@if($errors -> any())
    <div class="alert alert-danger">
        Whoops, looks like something went wrong
    </div>
@endif


@section('content')
    @include('admin.includes.tags', [
		'tag0Text' => 'Contacts',
		'tag0Url' => route('contactsEdit')
	])

    
    @if(Session :: has('successStatus'))
        <div class="alert alert-success" role="alert">
            {{ Session :: get('successStatus') }}
        </div>
    @endif


    {{ Form::open(array('route' => 'contactsUpdate')) }}
        <div class="p-2">
            <div class="p-2">
				<div class="standard-block p-2">
					<div class="p-2">
						<span>ელ. ფოსტის მისამართი: *</span>
					</div>
					
					<div class="p-2">
                        {{ Form :: text('admin_email', $bsc -> admin_email) }}
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
                        {{ Form :: text('facebook_link', $bsc -> facebook_link) }}
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
                        {{ Form :: text('instagram_link', $bsc -> instagram_link) }}
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
                        {{ Form :: text('twitter_link', $bsc -> twitter_link) }}
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
                        {{ Form :: text('phone_number', $bsc -> phone_number) }}
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
                                
                                <img src="{{ asset('/storage/images/modules/languages/'.$langData -> id.'.svg') }}" width="30" height="30">
                            </div>			

                            <div class="p-2">
                                {{ Form :: text('address_'.$langData -> title, ${ 'address_'.$langData -> title }) }}
                            </div>
                        </div>

                        @error('address_'.$langData -> title)
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
                        {{ Form :: text('cordinate_x', $bsc -> cordinate_x) }}
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
                        {{ Form :: text('cordinate_y', $bsc -> cordinate_y) }}
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
                        {{ Form :: selectRange('map_number', 21, 10, $bsc -> map_number) }}
					</div>
				</div>

				@error('cordinate_y')
					<div class="alert alert-danger">
						{{ $message }}
					</div>
				@enderror
			</div>

            
            <div class="p-2 submit-button">
                {{ Form :: submit(__('bsw.submit')) }}
            </div>
        </div>
    {{ Form::close() }}
@endsection
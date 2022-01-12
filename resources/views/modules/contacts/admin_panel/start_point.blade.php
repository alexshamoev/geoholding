@extends('admin.master')


@section('pageMetaTitle')
    BSW Start Point
@endsection

@if($errors -> any())
    <div class="alert alert-danger">
        Whoops, looks like something went wrong
    </div>
@endif


@if(Session :: has('successStatus'))
    <div class="alert alert-success" role="alert">
        {{ Session :: get('successStatus') }}
    </div>
@endif

@section('content')
    {{ Form::open(array('route' => 'contactsUpdate')) }}

        <span>ელ. ფოსტის მისამართი: *</span> <br>
        {{ Form :: text('admin_email', $bsc -> admin_email) }}
        
        @error('admin_email')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror

        <br><span>Facebook-ის მისამართი: *</span> <br>
        {{ Form :: text('facebook_link', $bsc -> facebook_link) }}
        
        @error('facebook_link')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        
            @enderror
        <br><span>Instagram-ის მისამართი: *</span> <br>
        {{ Form :: text('instagram_link', $bsc -> instagram_link) }}

        @error('instagram_link')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror

        <br><span>Twitter-ის მისამართი: *</span> <br>
        {{ Form :: text('twitter_link', $bsc -> twitter_link) }}

        @error('twitter_link')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror

        <br><span>ტელეფონის ნომერი:</span> <br>
        {{ Form :: text('phone_number', $bsc -> phone_number) }}
        
        @error('phone_number')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror

        <br><span>მისამართი GE:</span> <br>
        {{ Form :: text('address_ge', $address_ge) }}

        @error('address_ge')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror

        <br><span>მისამართი EN:</span> <br>
        {{ Form :: text('address_en', $address_en) }}

        @error('address_en')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror

        <br><span>მისამართი RU:</span> <br>
        {{ Form :: text('address_ru', $address_ru) }}

        @error('address_ru')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror

        <br><span>განლაგება რუკაზე:</span> <br>
        <br><span>მარკერის X კოორდინატა:</span> <br>
        {{ Form :: text('cordinate_x', $bsc -> cordinate_x) }}

        <br><span>მარკერის Y კოორდინატა:</span> <br>
        {{ Form :: text('cordinate_y', $bsc -> cordinate_y) }}

        <br><span>რუკის მიახლოება:</span> <br>
        <br> {{ Form :: selectRange('map_number', 10, 21, $bsc -> map_number) }}
        
        <br>{{ Form::submit('Click Me!') }}
    {{ Form::close() }}
@endsection
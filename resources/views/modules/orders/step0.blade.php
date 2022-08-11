@extends('master')

@section('pageMetaTitle'){{ $page->metaTitle }}@endsection
@section('pageMetaDescription'){{ $page->metaDescription }}@endsection
@section('pageMetaUrl'){{ $page->metaUrl }}@endsection

@section('content')
    <div class="container
				p-2
				main_content--height
				order">
    @if($errors->any())
        <div class="p-2">
            <div class="alert alert-danger m-0">
                {{ __('bsw.warningStatus') }}
            </div>
        </div>
    @endif


    <h1 class="p-2">
        {{ $page->title }}
    </h1>

    <div class="p-2">
        {!! $page->text !!}
    </div>


    {{ Form::open(['route' => ['makeOrder', app()->getLocale()]]) }}
        <div class="row">
            <div class="col-md-6 p-1">
                <label class="w-100">
                    <div class="p-1">
                        {{ __('bsw.name') }} *
                    </div>

                    <div class="p-1">
                        {{ Form::text('name') }}
                    </div>
                </label>

                @error('name')
                    <div class="p-1">
                        <div class="alert alert-danger m-0 p-2">
                            {{ $message }}
                        </div>
                    </div>
                @enderror
            </div>

            <div class="col-md-6 p-1">
                <label class="w-100">
                    <div class="p-1">
                        {{ __('bsw.lastName') }} *
                    </div>

                    <div class="p-1">
                        {{ Form::text('last_name') }}
                    </div>
                </label>

                @error('last_name')
                    <div class="p-1">
                        <div class="alert alert-danger m-0 p-2">
                            {{ $message }}
                        </div>
                    </div>
                @enderror
            </div>

            <div class="col-md-6 p-1">
                <label class="w-100">
                    <div class="p-1">
                        {{ __('bsw.companyName') }} *
                    </div>

                    <div class="p-1">
                        {{ Form::text('company_name') }}
                    </div>
                </label>

                @error('company_name')
                    <div class="p-1">
                        <div class="alert alert-danger m-0 p-2">
                            {{ $message }}
                        </div>
                    </div>
                @enderror
            </div>

            <div class="col-md-6 p-1">
                <label class="w-100">
                    <div class="p-1">
                        {{ __('bsw.fullAddress') }} *
                    </div>

                    <div class="p-1">
                        {{ Form::text('full_address') }}
                    </div>
                </label>

                @error('full_address')
                    <div class="p-1">
                        <div class="alert alert-danger m-0 p-2">
                            {{ $message }}
                        </div>
                    </div>
                @enderror
            </div>

            <div class="col-md-6 p-1">
                <label class="w-100">
                    <div class="p-1">
                        {{ __('bsw.email') }} *
                    </div>

                    <div class="p-1">
                        {{ Form::email('email') }}
                    </div>
                </label>

                @error('email')
                    <div class="p-1">
                        <div class="alert alert-danger m-0 p-2">
                            {{ $message }}
                        </div>
                    </div>
                @enderror
            </div>

            <div class="col-md-6 p-1">
                <label class="w-100">
                    <div class="p-1">
                        {{ __('bsw.phone') }} *
                    </div>

                    <div class="p-1">
                        {{ Form::text('phone') }}
                    </div>
                </label>

                @error('phone')
                    <div class="p-1">
                        <div class="alert alert-danger m-0 p-2">
                            {{ $message }}
                        </div>
                    </div>
                @enderror
            </div>
            
            <div class="col-12 p-1">
                <label class="w-100">
                    <div class="p-1">
                        {{ __('bsw.additionalDetails') }}
                    </div>

                    <div class="p-1">
                        {{ Form::textarea('details', null, array('class' => 'form-control')) }}
                    </div>
                </label>
            </div>
        </div>

        <!-- Products data from local storage -->
            <div class="js_products_data"></div>
        <!--  -->

        <div class="d-flex justify-content-center p-2">
            {{ Form::submit(__('bsw.orderPlacement'), ['class' => 'order__btn d-block']) }}
        </div>
    {{ Form::close() }}
@endsection
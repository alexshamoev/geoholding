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
            <div class="alert alert-danger">
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
            <div class="col-md-6 p-1 mb-3">
                <label class="w-100">
                    <div class="p-1">
                        {{ __('bsw.name')}}
                    </div>

                    <div class="p-1">
                        {{ Form::text('name', null, array('placeholder' => __('&nbsp;'), 'class' => 'form-control custom__input')) }}
                    </div>
                </label>

                @error('name')
                    <div class="alert alert-danger m-2 p-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-md-6 p-1 mb-3">
                <label class="w-100">
                    <div class="p-1">
                        {{ __('bsw.lastName')}}
                    </div>

                    <div class="p-1">
                        {{ Form::text('lastName', null, array('placeholder' => __('&nbsp;').' '.__('bsw.notRequired'), 'class' => 'form-control custom__input')) }}
                    </div>
                </label>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 p-1 mb-3">
                <label class="w-100">
                    <div class="p-1">
                        {{ __('bsw.companyName')}}
                    </div>

                    <div class="p-1">
                        {{ Form::text('companyName', null, array('placeholder' => __('&nbsp;').' '.__('bsw.notRequired'), 'class' => 'form-control custom__input')) }}
                    </div>
                </label>
            </div>

            <div class="col-md-6 p-1 mb-3">
                <label class="w-100">
                    <div class="p-1">
                        {{ __('bsw.fullAddress')}}
                    </div>

                    <div class="p-1">
                        {{ Form::text('fullAddress', null, array('placeholder' => __('&nbsp;').' '.__('bsw.notRequired'), 'class' => 'form-control custom__input')) }}
                    </div>
                </label>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 p-1 mb-3">
                <label class="w-100">
                    <div class="p-1">
                        {{ __('bsw.email')}}
                    </div>

                    <div class="p-1">
                        {{ Form::email('email', null, array('placeholder' => __('&nbsp;').' '.__('bsw.notRequired'), 'class' => 'form-control custom__input')) }}
                    </div>
                </label>
            </div>

            <div class="col-md-6 p-1 mb-3">
                <label class="w-100">
                    <div class="p-1">
                        {{ __('bsw.phone')}}
                    </div>

                    <div class="p-1">
                        {{ Form::text('phone', null, array('placeholder' => __('&nbsp;'), 'class' => 'form-control custom__input')) }}
                    </div>
                </label>

                @error('phone')
                    <div class="alert alert-danger p-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="row">
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

        <div class="row justify-content-center">
            <div class="form-button col-lg-5 col-md-7 col-12">
                <div>
                    {{ Form::submit(__('bsw.orderPlacement'), array('class' => 'order__btn')) }}
                </div>
            </div>
        </div>
    {{ Form::close() }}
@endsection
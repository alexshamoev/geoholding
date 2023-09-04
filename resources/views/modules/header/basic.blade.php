@if($widgetGetVisibility['header'])
    <div class="container-fluid p-0">
        <div class="container p-2 d-none d-lg-block">
            <div class="d-flex
                        align-items-center
                        justify-content-between
                        row">
                <div class="col-xl-1
                            col-lg-2
                            position-relative__logo
                            order-0">
                    <div class="pe-2">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('/storage/images/logo.svg') }}">
                        </a>
                    </div>
                </div>

                <div class="col-xl-9 
                            col-lg-8">
                    <div class="d-flex
                                justify-content-center
                                header__company_station">
                        @if ($companies->isNotEmpty())    
                            @foreach ($companies as $item)
                                <div class="p-2">
                                    <a href="{{ $item->fullUrl }}">
                                        <button class="px-4 py-2 header__company_btn">
                                            {{ $item->title }}
                                        </button>
                                    </a>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                
                <div class="alias_info d-none" data-alias="{{config('activeCompany')->alias}}">
                    {{config('activeCompany')->alias}}
                </div>

                <div class="col-lg-2
                            ms-auto
                            d-block
                            order-lg-2
                            order-1
                            p-0">
                    @include('modules.languages.basic')
                </div>
            </div>
        </div>
    </div>

    <header class="header position-relative d-none d-lg-block">
        <div class="container p-2">
            <!-- React search -->
			    <div id="examplereact"></div>
            <!--  -->

            <div class="row">
                <nav class="navbar
                            col-12
                            navbar-expand-lg
                            navbar-light
                            p-0">
                    <div class="row
                                d-flex
                                w-100
                                align-items-center">
                    <!-- <div class="col-md-1
                                    col-2
                                    d-lg-none
                                    d-block
                                    order-lg-4
                                    order-3">
                            <div class="header
                                        position-relative__mobNav
                                        d-flex
                                        justify-content-end">
                                <button class="border-0
                                                bg-transparent
                                                p-0
                                                d-block
                                                navbar-toggler"
                                        type="button"
                                        data-bs-target="#navbar"
                                        aria-controls="navbarNav"
                                        aria-expanded="false"
                                        aria-label="Toggle navigation">
                                    <div id="nav-icon3">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </button>
                            </div>
                        </div> -->

                        <div class="col-12
                                    d-flex 
                                    justify-content-center
                                    order-xl-1
                                    order-4">
                            @include('modules.menu_buttons.basic')
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>

    <!-- Logo and Header side by side (Shown on screens "md" and below) -->
    <div class="d-lg-none d-block">
        <div class="container-fluid p-0 header">
            <div class="container p-2">
                <div class="row">
                    <div class="col-12 p-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-1 col-md-2 col-3 position-relative__logo">
                                <div class="pe-2">
                                    <a href="{{ url('/') }}">
                                        <img src="{{ asset('/storage/images/logo_mobile.svg') }}">
                                    </a>
                                </div>
                            </div>
                            
                            <!-- Header -->
                            <div class="col-12 
                                        d-flex 
                                        justify-content-end 
                                        align-items-center">
                                <nav class="navbar 
                                            navbar-expand-lg 
                                            navbar-light p-0">
                                    <div class="row 
                                                d-flex 
                                                w-100 
                                                align-items-center">
                                        <div class="col-md-1 
                                                    col-2 
                                                    d-lg-none 
                                                    d-block
                                                    order-lg-4 
                                                    order-3">
                                            <div class="header 
                                                        position-relative__mobNav 
                                                        d-flex 
                                                        justify-content-end">
                                                <button class="border-0 bg-transparent p-0 d-block navbar-toggler"
                                                        type="button"
                                                        data-bs-target="#navbar"
                                                        aria-controls="navbarNav"
                                                        aria-expanded="false"
                                                        aria-label="Toggle navigation">
                                                    <div id="nav-icon3">
                                                        <span></span>
                                                        <span></span>
                                                        <span></span>
                                                        <span></span>
                                                    </div>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </nav>
                            </div>
                        </div>

                        <div class="col-12 header__company_station_mobile d-none">
                            <div class="text-center">
                                @if ($companies->isNotEmpty())    
                                    @foreach ($companies as $item)
                                    <div class="p-2">
                                        <a href="{{ $item->fullUrl }}">
                                                <button class="px-4 py-2 header__company_btn_mobile">
                                                    {{ $item->title }}
                                                </button>
                                            </a>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                
                        <div class="alias_info d-none" data-alias="{{config('activeCompany')->alias}}">
                            {{config('activeCompany')->alias}}
                        </div>

                        <div class="col-12 
                                    d-flex 
                                    justify-content-center 
                                    order-xl-1 
                                    order-4 
                                    text-center">
                            @include('modules.menu_buttons.basic')
                        </div>

                        <div class="col-12
                                    d-flex 
                                    justify-content-center 
                                    languages_mobile
                                    d-none
                                    pb-4">
                            @include('modules.languages.basic')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
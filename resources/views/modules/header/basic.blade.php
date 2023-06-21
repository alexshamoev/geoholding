@if($widgetGetVisibility['header'])
    <header class="header position-relative">
        <div class="container p-2">
            <!-- React search -->
			    <div id="examplereact"></div>
            <!--  -->

            <div class="row">
                <div class="d-flex
                            align-items-center
                            justify-content-between
                            row">
                    <div class="col-6">
                        <span>{{ __('bsw.phone_number') }}: {{ config('bsc.phone_number') }}</span>
                    </div>

                    @if(Auth :: check())
                        <div class="col-2">
                            {{ Auth :: user() -> name }}
                        </div>
                
                        <div class="col-2">
                            <a href="{{ route('logout', $language->title) }}">
                                Logout
                            </a>
                        </div>

                        <div class="col-2">
                            <a href="{{ '/'.$language -> title.'/'.$basketPage -> alias }}">
                                Basket Icon
                            </a>
                        </div>
                    @else
                        <div class="col-3">
                            
                                {{ __('auth.register') }}
                        </div>

                        <div class="col-3">
                                {{ __('auth.login') }}
                        </div>
                    @endif
                </div>

                <nav class="navbar
                            col-12
                            navbar-expand-xl
                            navbar-light
                            p-0">
                    <div class="row
                                d-flex
                                w-100
                                align-items-center">
                  
                        <div class="col-xl-1
                                    col-md-2
                                    col-3
                                    header position-relative__logo
                                    order-0">
                            <div class="pe-2">
                                <a href="{{ url('/') }}">
                                    <img src="{{ asset('/storage/images/admin/logo.svg') }}">
                                </a>
                            </div>
                        </div>

                        <div class="col-md-1
                                    col-2
                                    d-xl-none
                                    d-block
                                    order-lg-4
                                    order-3">
                            <div class="header
                                        position-relative__mobNav
                                        d-flex
                                        justify-content-end">
                                <button class="navbar-toggler
                                                p-0"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#navbar"
                                        aria-controls="navbar"
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

                        <div class="col-xl-9
                                    col-12
                                    order-xl-1
                                    order-4">
                            @include('modules.menu_buttons.basic')
                        </div>
                        
                        <div class="col-xl-2
                                    col-6
                                    ms-auto
                                    d-block
                                    order-lg-2
                                    order-1">
                            @include('modules.languages.basic')
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>
@endif
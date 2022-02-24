@if($widgetGetVisibility['header'])
    <header class="header position-relative">
        <div class="container p-2">
            <div class="row">
                <div class="d-flex
                            align-items-center
                            justify-content-between">
                    <div class="p-2">
                        <span>{{ $bsw -> phone_number }}: {{ $bsc -> phone_number }}</span>
                    </div>


                    @if(Auth :: check())
                        <div class="nav-item">
                            <div class="p-2">
                                {{ Auth :: user() -> name }}
                            </div>
                        </div>
                
                        <div class="nav-item">
                            <a href="{{ route('logout') }}">
                                <div class="p-2">
                                    Logout
                                </div>
                            </a>
                        </div>
                    @else
                        <div class="nav-item">
                            <a href="{{ route('register') }}">
                                <div class="p-2">
                                    Registration
                                </div>
                            </a>
                        </div>

                        <div class="nav-item">
                            <a href="{{ route('login') }}">
                                <div class="p-2">
                                    Authorization
                                </div>
                            </a>
                        </div>
                    @endif


                    <div class="d-flex
                                align-items-center
                                justify-content-end">
                        <div class="header__search-input js_search">
                            <div class="p-2">
                                <form action="#" id="search_form">
                                    <input type="text" id="search" placeholder="ძიება">
                                </form>
                            </div>
                        </div>

                        <div>
                            <div class="p-2
                                        js_open_search
                                        header__open-search">
                                <span class="ba_search"></span>
                            </div>

                            <div class="p-2
                                        d-none
                                        js_close_search
                                        header__close-search">
                                <span class="ba_close"></span>
                            </div>
                        </div>
                    </div>
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
                                <a href="#">
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
@if($widgetGetVisibility['header'])
    <header>
        <div class="container p-2 mainHeader">
            <div class="row">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="p-2">
                        <span>{{ $bsw -> phone_number }}: {{ $bsc -> phone_number }}</span>
                    </div>

                    <div class="d-flex align-items-center justify-content-end">
                        <div class="header__search-input js_search">
                            <div class="p-2">
                                <form action="#" id="search_form">
                                    <input type="text" id="search" placeholder="ძიება">
                                </form>
                            </div>
                        </div>

                        <div>
                            <div class="p-2 js_open_search header__open-search">
                                <span class="ba_search"></span>
                            </div>

                            <div class="p-2 js_close_search header__close-search">
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
                    <div class="row d-flex w-100 align-items-center">
                  
                        <div class="col-xl-1 col-md-2 col-3 mainHeader__logo order-0">
                            <div class="pe-2">
                                <a href="">
                                    <img src="{{ asset('/storage/images/admin/logo.svg') }}" alt="HobbyStudio" class="w-100">
                                </a>
                            </div>
                        </div>

                        <div class="col-md-1 col-2 order-lg-4 order-3">
                            <div class="p-0 mainHeader__mobNav d-flex justify-content-end">
                                <button class="navbar-toggler p-0 ms-sm-3 ms-0"
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

                        <div class="col-xl-7 col-12 order-xl-1 order-4">
                            @include('modules.menu_buttons.basic')
                        </div>
                        
                        <div class="col-xl-2 col-6 ms-auto d-block order-lg-2 order-1">
                            @include('modules.languages.basic')
                        </div>

                        <div class="col-lg-2 col-1 ms-auto text-lg-center text-end order-lg-3 order-2">
                            <div class="mainHeader__authorization">
                                <a href="#">
                                    <div class="d-flex justify-content-end align-items-center">
                                        <div>                                  
                                            <div class="pe-md-1 pe-0 ba_user_newest"></div>                                
                                        </div>

                                        <div class="d-lg-block d-none">									
                                            authorization
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>
@endif
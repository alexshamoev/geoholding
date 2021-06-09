@if($widgetGetVisibility['header'])
    <header>
        <div class="container">
            <div class="header p-2">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="p-2">
                        <span>{{ $bsw -> phone_number }}: {{ $bsc -> phone_number }}</span>
                    </div>

                    <div class="d-flex align-items-center justify-content-end">
                        <div class="header__search-input js_search">
                            <div class="p-2">
                                <input type="text" placeholder="ძიება">
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

                <div class="d-flex align-items-center">
                    <div class="col-xl-10 col-lg-10 col-12">
                        <div class="row align-items-center">
                            <div class="col-xl-2 col-lg-2 col-12 p-0 d-flex justify-content-between align-items-center">
                                <div class="p-2">
                                    <img src="{{ asset('/images/admin/logo.svg') }}" alt="HobbyStudio">
                                </div>

                                <div class="navbar-toggler d-lg-none d-block" 
                                    data-toggle="collapse" 
                                    data-target="#navbar" 
                                    aria-controls="navbar" 
                                    aria-expanded="false" 
                                    aria-label="Toggle navigation">
                                    <div class="navbar__toggler-icon"></div>
                                </div>
                            </div>

                            <div class="col-xl-10 col-lg-10 col-12 p-0">
                                @include('modules.menu_buttons.basic')
                            </div>
                        </div>
                    </div>

                    <div class="col-2 p-0 d-xl-block d-lg-block d-none">
                        @include('modules.languages.basic')
                    </div>
                </div>
            </div>
        </div>
    </header>
@endif
@if($widgetGetVisibility['header'])
    <div class="container p-2">
        <div class="d-flex
                    align-items-center
                    justify-content-between
                    row">
            <div class="col-xl-1
                            col-md-2
                            col-3
                            position-relative__logo
                            order-0">
                <div class="pe-2">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('/storage/images/logo.svg') }}">
                    </a>
                </div>
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
    </div>

    <header class="header position-relative">
        <div class="container p-2">
            <!-- React search -->
			    <div id="examplereact"></div>
            <!--  -->

            <div class="row">
                <nav class="navbar
                            col-12
                            navbar-expand-xl
                            navbar-light
                            p-0">
                    <div class="row
                                d-flex
                                w-100
                                align-items-center">
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
@endif
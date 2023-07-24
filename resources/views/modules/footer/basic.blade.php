@if($widgetGetVisibility['footer'])
    <footer class="footer">
        <div class="container py-5 px-3">
            <div class="row">
                <div class="col-lg-3
                            col-sm-6
                            col-12
                            py-4
                            d-sm-block
                            d-flex
                            flex-column
                            align-items-center">
                    <div class="mb-4 mb-md-5" >
                        <img src="{{ asset('storage\images\modules\companies\83\1.png') }}" class="w-auto"/>
                    </div>

                    <div class="d-flex gap-2">
                        <div>
                            <a href="{{ config('bsc.facebook_link') }}"
                                target="_blank"
                                class="ba_fb
                                        footer__media_icon
                                        footer__media_icon--fb
                                        border
                                        rounded"></a>
                        </div>
                        
                        <div>
                            <a href="{{ config('bsc.instagram_link') }}"
                                target="_blank"
                                class="ba_inst
                                        footer__media_icon
                                        footer__media_icon--instagram
                                        border
                                        rounded"></a>
                        </div>
                        
                        <div>
                            <a href="{{ config('bsc.twitter_link') }}"
                                target="_blank"
                                class="ba_tw
                                        footer__media_icon
                                        footer__media_icon--twitter
                                        border
                                        rounded"></a>
                        </div>

                        <div>
                            <a href="#"
                                target="_blank"
                                class="ba_in
                                        footer__media_icon
                                        footer__media_icon--linkedin
                                        border
                                        rounded"></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3
                            col-sm-6
                            col-12
                            py-4
                            d-sm-block
                            d-flex
                            flex-column
                            align-items-center">
                    <h3 class="mb-4">კომპანიები</h3>

                    <div class="d-flex
                                flex-column
                                gap-3">
                        <div>
                            <a href="" class="text-secondary py-2">Ice Land Georgia</a>
                        </div>

                        <div>
                            <a href="" class="text-secondary py-2">BD Company</a>
                        </div>

                        <div>
                            <a href="" class="text-secondary py-2">BD Plus</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 
                            col-sm-6 
                            col-12
                            py-4
                            d-sm-block
                            d-flex
                            flex-column
                            align-items-center">
                    <h3 class="mb-4">მენიუ</h3>
                    <div class="d-flex
                                flex-column
                                gap-3">
                        @foreach($menuButtons as $data)
                            <div class="nav-item
                                        menu_buttons__item
                                        position-relative
                                        js_menu_buttons__item">
                                @php
                                    $activeCssClass = '';
    
                                    if($data -> active) {
                                        $activeCssClass = 'menu_buttons__active_item_block';
                                    }
                                @endphp
                                
                                <div class="d-block
                                            {{ $activeCssClass }}"> 
                                    @if($data -> url)
                                        <a href="{{ $data -> url }}" target="{{ $data -> urlTarget }}">
                                    @endif
    
                                    <span>
                                        {{ $data -> title }}
                                    </span>
                                    
                                    @if($data -> url)
                                        </a>
                                    @endif
    
                                    @if(count($data -> menuButtonStep1))
                                        <div class="js_arrow_div
                                                    d-inline-block
                                                    menu_buttons__arrow_block">
                                            <span class="ba_thin_arrow_right"></span>
                                        </div>
                                    @endif
                                </div>
                                
                                @if(count($data -> menuButtonStep1))
                                    <div class="menu_buttons__slide_down_block mt-3">
                                        @foreach($data -> menuButtonStep1 as $dataInside)
                                            @php
                                                $activeCssClass = '';
    
                                                if($dataInside -> active) {
                                                    $activeCssClass = 'menu_buttons__sub_menu_item--active';
                                                }
                                            @endphp
                                            
                                            <div class="menu_buttons__sub_menu_item {{ $activeCssClass }}">
                                                @if($dataInside -> url)
                                                    <a href="{{ $dataInside -> url }}" target="{{ $dataInside -> urlTarget }}">
                                                        <span>
                                                            {{ $dataInside -> title }}
                                                        </span>
                                                    </a>
                                                @else
                                                    <span>
                                                        {{ $dataInside -> title }}
                                                    </span>
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
    
    
                                    <div class="menu_buttons__slide_down_block_in_burger mt-1">
                                        @foreach($data -> menuButtonStep1 as $dataInside)
                                            @php
                                                $activeCssClass = '';
    
                                                if($dataInside -> active) {
                                                    $activeCssClass = 'menu_buttons__sub_menu_item--active';
                                                }
                                            @endphp
                                            
                                            <div class="menu_buttons__sub_menu_item {{ $activeCssClass }}">
                                                @if($dataInside -> url)
                                                    <a href="{{ $dataInside -> url }}" target="{{ $dataInside -> urlTarget }}">
                                                        <span>
                                                            {{ $dataInside -> title }}
                                                        </span>
                                                    </a>
                                                @else
                                                    <span>
                                                        {{ $dataInside -> title }}
                                                    </span>
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-lg-3
                            col-sm-6
                            col-12
                            py-4
                            d-sm-block
                            d-flex
                            flex-column
                            align-items-center">
                    <h3 class="mb-4">კონტაქტები</h3>

                    <div class="d-flex
                                flex-column
                                gap-3
                                text-secondary" >
                        <div>
                            {{ config('bsw.address') }}
                        </div>
                        
                        <div>
                            {{ __('bsw.phone_number') }}: <a href="tel:{{ config('bsc.phone_number') }}">{{ config('bsc.phone_number') }}</a>
                        </div>
                        
                        <div>
                            <a href="mailto:{{ config('bsc.admin_email') }}">{{ config('bsc.admin_email') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer__horizontal_line"></div>

        <div class="container p-2">
            <div class="row">
                <div class="col-lg-8
                            col-12
                            p-2
                            text-lg-start
                            text-center">
                    © {{ config('constants.year_of_site_creation') }} {{ __('bsw.copyright') }} 
                </div>

                <div class="col-lg-4
                            col-12
                            p-2
                            text-lg-end
                            text-center">
                    Created by <a href="http://hobbystudio.ge/" target="_blank">HobbyStudio</a>
                </div>
            </div>
        </div>

        <a href="/admin" target="_blank">
            <div class="footer__admin_button"></div>
        </a>
    </footer>
@endif
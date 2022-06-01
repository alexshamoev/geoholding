@if($widgetGetVisibility['footer'])
    <footer class="footer">
        <div class="container p-2">
            <div class="row">
                <div class="col-md-6 col-0 p-2">
                    @foreach($menuButtons as $data)
                        <div class="nav-item
                                    ps-lg-0
                                    ps-4
                                    pt-lg-0
                                    pt-1
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
                                        py-2
                                        px-4
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

                <div class="col-md-6
                            col-12
                            text-right
                            d-flex
                            p-0
                            flex-column
                            align-items-end">
                    <div class="p-2">
                        {{ $bsw -> address }}
                    </div>
                    
                    <div class="p-2">
                        {{ __('bsw.phone_number') }}: <a href="tel:{{ $bsc -> phone_number }}">{{ $bsc -> phone_number }}</a>
                    </div>
                    
                    <div class="p-2">
                        <a href="mailto:{{ $bsc -> admin_email }}">{{ $bsc -> admin_email }}</a>
                    </div>

                    <div class="row">
                        <div class="col-3 p-2">
                            <a href="#"
                                target="_blank"
                                class="ba_fb
                                        footer__media_icon
                                        footer__media_icon--fb"></a>
                        </div>
                        
                        <div class="col-3 p-2">
                            <a href="#"
                                target="_blank"
                                class="ba_inst
                                        footer__media_icon
                                        footer__media_icon--instagram"></a>
                        </div>
                        
                        <div class="col-3 p-2">
                            <a href="#"
                                target="_blank"
                                class="ba_tw
                                        footer__media_icon
                                        footer__media_icon--twitter"></a>
                        </div>

                        <div class="col-3 p-2">
                            <a href="#"
                                target="_blank"
                                class="ba_in
                                        footer__media_icon
                                        footer__media_icon--linkedin"></a>
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
                    © {{ $copyrightDate }} {{ __('bsw.copyright') }} 
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
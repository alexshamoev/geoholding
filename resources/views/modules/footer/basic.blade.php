@if($widgetGetVisibility['footer'])
    <footer class="footer">
        <div class="container p-2">
            <div class="row">
                <div class="col-md-6 col-0 p-2">
                    menu_buttons
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
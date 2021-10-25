@if($widgetGetVisibility['footer'])
    <footer>
        <div class="container p-2 top_footer">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-0">
                    menu_buttons
                </div>

                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 p-0 text-right d-flex flex-column align-items-end">
                    <div class="p-2">
                        yazbegis 70
                    </div>
                    
                    <div class="p-2">
                        phone number: +995 599101010
                    </div>

                    <div class="p-2">
                        <a href="#"
                            target="_blank"
                            class="ba_fb text-decoration-none m-0 top_footer__media_icon"
                            style="color: #3b5998;"></a>

                        <a href="#"
                            target="_blank"
                            class="ba_inst top_footer__media_icon"
                            style="color: #8a3ab9;"></a>

                        <a href="#"
                            target="_blank"
                            class="ba_tw top_footer__media_icon"
                            style="color: #1DA1F2;"></a>

                        <a href="#"
                            target="_blank"
                            class="ba_in top_footer__media_icon"
                            style="color: #0077b5;"></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer_horizontal_line"></div>

        <div class="container p-2">
            <div class="row">
                <div class="col-md-8 col-12 py-md-2 py-3 text-md-start text-center">
                    © {{ $copyrightDate }} {{ $bsw -> copyright }} 
                </div>

                <div class="col-md-4 col-12 pb-md-2 pb-3 pt-md-2 pt-0 text-md-end text-center">
                    Created by <a href="http://hobbystudio.ge/" target="_blank" class="legends">HobbyStudio</a>
                </div>
            </div>
        </div>

        <div id="admin-panel-link">
            <a href="/admin" target="_blank">
                Admin Panel
            </a>
        </div>
    </footer>
@endif
@if($widgetGetVisibility['footer'])
    <footer>
        <div class="container p-2">
            <div class="p-2">
                Footer Menu
            </div>
        </div>

        <div class="footer_horizontal_line"></div>

        <div class="container">
            <div class="row">
                <div class="col-md-6 col-12 text-md-left text-center">
                    © {{ $copyrightDate }} {{ $bsw -> copyright }} 
                </div>

                <div class="col-md-6 col-12 text-md-right text-center">
                    Created by <a href="http://hobbystudio.ge/" target="_blank">HobbyStudio</a>
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
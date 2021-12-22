<!-- <h2>First gallery:</h2>

<h2>Second gallery:</h2>
  <div class="my-gallery" itemscope itemtype="http://schema.org/ImageGallery">
    <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
      <a href="https://farm2.staticflickr.com/1043/5186867718_06b2e9e551_b.jpg" itemprop="contentUrl" data-size="964x1024">
          <img src="https://farm2.staticflickr.com/1043/5186867718_06b2e9e551_m.jpg" itemprop="thumbnail" alt="Image description" />
      </a>
      <figcaption itemprop="caption description">Image caption 2.1</figcaption>
    </figure>

    <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
      <a href="https://farm7.staticflickr.com/6175/6176698785_7dee72237e_b.jpg" itemprop="contentUrl" data-size="1024x683">
          <img src="https://farm7.staticflickr.com/6175/6176698785_7dee72237e_m.jpg" itemprop="thumbnail" alt="Image description" />
      </a>
      <figcaption itemprop="caption description">Image caption 2.2</figcaption>
    </figure>

    <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
      <a href="https://farm6.staticflickr.com/5023/5578283926_822e5e5791_b.jpg" itemprop="contentUrl" data-size="1024x768">
          <img src="https://farm6.staticflickr.com/5023/5578283926_822e5e5791_m.jpg" itemprop="thumbnail" alt="Image description" />
      </a>
      <figcaption itemprop="caption description">Image caption 2.3</figcaption>
    </figure>
</div> -->



<!-- Root element of PhotoSwipe. Must have class pswp. -->
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

    <!-- Background of PhotoSwipe. 
         It's a separate element, as animating opacity is faster than rgba(). -->
    <div class="pswp__bg"></div>

    <!-- Slides wrapper with overflow:hidden. -->
    <div class="pswp__scroll-wrap">

        <!-- Container that holds slides. PhotoSwipe keeps only 3 slides in DOM to save memory. -->
        <!-- don't modify these 3 pswp__item elements, data is added later on. -->
        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>

        <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
        <div class="pswp__ui pswp__ui--hidden">

            <div class="pswp__top-bar">

                <!--  Controls are self-explanatory. Order can be changed. -->

                <div class="pswp__counter"></div>

                <div class="relative close_button">
                    <span class="ba_close_fat"></span>
                    <button class="pswp__button pswp__button--close text-white" title="Close (Esc)">
                    </button>
                </div>

                <!-- <button class="pswp__button pswp__button--share" title="Share"></button> -->

                <!-- <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button> -->

                <!-- <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button> -->

                <!-- Preloader demo https://codepen.io/dimsemenov/pen/yyBWoR -->
                <!-- element will get class pswp__preloader--active when preloader is running -->
                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                      <div class="pswp__preloader__cut">
                        <div class="pswp__preloader__donut"></div>
                      </div>
                    </div>
                </div>
            </div>

            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div> 
            </div>

            <button class="pswp__button pswp__button--arrow--left text-white" title="Previous (arrow left)">
                <span class="ba_arrow_left"></span>
            </button>

            <button class="pswp__button pswp__button--arrow--right text-white" title="Next (arrow right)">
                <span class="ba_arrow_right"></span>
            </button>

            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
            </div>
        </div>
    </div>
</div>
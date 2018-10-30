<!-- FOOTER -->
<footer id="t3-footer" class="wrap t3-footer">
            <div class="container">
                <div class="row">
                    <div class="span8 copyright">
                        <small>Copyright &#169; 2018 Ecole De Dessin. All Rights Reserved. </small>
                    </div>
                    <!-- FOOTER LOGO -->
                    <div class="span4 pull-right">    
                    </div>
                    <!-- //FOOTER LOGO -->
                </div>
            </div>
        </footer>
        <!-- //FOOTER -->
        <!-- BACK TO TOP -->
        <div id="back-to-top" class="back-to-top t3-hide">
            <i class="icon-long-arrow-up"></i>
        </div>
        <script type="text/javascript">
            //<![CDATA[
            (function($){
              $(document).ready(function(){
                $('#back-to-top').click(function(){
                  if($(this).hasClass('reveal')){
                    $('html, body').stop(true).animate({
                      scrollTop: 0
                    });
                  }
                });
            
                $(window).scroll(function(){
                  $('#back-to-top')[$(window).scrollTop() > ($('#t3-mainbody').length ? $('#t3-mainbody').offset().top : 0) ? 'addClass' : 'removeClass']('reveal');
                });
              });
            })(jQuery);
            //]]>
        </script>
        <!-- //BACK TO TOP -->
        <div id="popup-view" class="t3-hide">
            <div id="popup-position">
                <div id="popup-content">
                    <div class="popup-head">
                        <a id="popup-close" href="/" class="btn-close pull-right icon-remove" title="Close">Close</a>
                    </div>
                    <div class="popup-nav pull-right">
                        <a id="popup-prev" href="/" class="icon-chevron-left" title="Previous"><span>Previous</span></a>
                        <a id="popup-next" href="/" class="icon-chevron-right" title="Next"><span>Next</span></a>
                    </div>
                    <div id="popup-loader" class="fade hide" data-backdrop="">
                        <div class="ajax-indicator">Loading...</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- //POPUP VIEW -->
        <!-- PAGE LOADER INDICATOR -->
        <div id="page-loader" class="fade hide" data-backdrop="">
            <div class="ajax-indicator">Loading...</div>
        </div>
        <!-- //PAGE LOADER INDICATOR -->
        <!-- ARTICLE LOADER INDICATOR -->
        <div id="article-loader" class="fade hide" data-backdrop="">
            <div class="ajax-indicator">Loading...</div>
        </div>
        <!-- //ARTICLE LOADER INDICATOR --> 
   
<?php
/**
 * The template for displaying the footer.
 *
 * @package WordPress
 * @subpackage Authentic Themes
 * @since 1.0
 */
?>

		<div class="clear"></div><!-- .clear any floats -->
	</div><!-- #main-content -->

</div><!-- #wrap -->

<div id="footer-wrap">
    <footer id="footer" class="grid-1 site-footer">
        <div id="footer-widgets" class="clr">
          
                <!-- removed extra footer areas -->
                <?php dynamic_sidebar( 'footer-one' ); ?>
              <?php dynamic_sidebar( 'social-area-footer' ); ?>
        </div><!-- #footer-widgets -->
        <div id="footer-thankyou">
        <p>Theme Development by <a href="http://www.alphagraphics.com/centers/leesburg-virginia-us694/" target="_blank">AlphaGraphics Loudoun</a></p>
        </div>
    </footer><!-- #footer -->
</div><!-- #footer-wrap -->

<?php att_hook_site_after(); ?>

<?php wp_footer(); ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-49649640-1', 'conciergecathy.com');
  ga('send', 'pageview');

</script>
        <script type="text/javascript"> 
            jQuery(window).bind("load", function() {
                var param = document.URL.split('#')[1];
                jQuery('#serv-full-conent').html(jQuery('#serv-load-post-'+ param).html());
                
                if (typeof param === 'undefined'){ jQuery('#serv-full-conent').hide();jQuery('#serv-full-footer').hide();}
                else {jQuery('#page-masthead-wrap').hide();}
                });
            
    jQuery(document).ready(function(){
                                      
                jQuery('a.serviceex').click(function() {
                    var id =  jQuery(this).attr('id');
                    jQuery('#serv-full-conent').html(jQuery('#serv-load-'+ id).html());
                     jQuery('#serv-full-conent').show();
                     jQuery('#serv-full-footer').show();
                    jQuery("html, body").animate({ scrollTop: 0 }, "slow");
                    jQuery('#page-masthead-wrap').hide();
                    return false;
                });        
            });
         </script>
</body>
</html>
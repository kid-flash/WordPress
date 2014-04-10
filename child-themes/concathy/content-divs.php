  <?php
                        $servarray = array();
                        
                         while ( have_posts() ) : the_post();
                           $id= get_the_ID();
                           $servarray[].= $id;
                           
                             endwhile;                                     ?>
<div id="serv-full-conent">

                        </div>
<div id="serv-full-footer">
     <?php dynamic_sidebar( 'footer-one' ); ?>
</div><!--serv-full-footer-->
      
                    
                <?php             foreach ($servarray as $value) {
                        echo '<div id="serv-load-post-'.$value.'" style="width: 20%; margin-left: 33%;" class="serv-hide"> ';
                                     $serv_article = '[post-content show_image=true show_title=true post_type="services" id='.$value.' shortcodes=true image_width=300 image_height=300]';
                                       echo do_shortcode($serv_article);
                                      
                                       
                           echo '</div>';
                } ?>


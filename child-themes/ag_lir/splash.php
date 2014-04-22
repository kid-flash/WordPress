<?php
$don = get_field('amount_donated');
if ($don != ""){
    $amt = $don/10000;
    $per = $amt*100;
    $width = $per*4.28; 
}
 else {
     $width = 20;
}
 ?>   
<div id="splashwrapper" class="clearfix">
    <div id="splashhead">
        <img src="<?php echo get_stylesheet_directory_uri()?>/images/splash-header.png" alt="10for10">
    </div>
        <div id="splashbody">
            <div id="notepad">
                <img src="<?php echo get_stylesheet_directory_uri()?>/images/10for10-paper.png" alt="10for10" class="aligncenter hundredper">
                <img src="<?php echo get_stylesheet_directory_uri()?>/images/left-note.png" alt="10for10" id="left-note" class="post-it">
                <img src="<?php echo get_stylesheet_directory_uri()?>/images/right-note.png" alt="10for10" id="right-note" class="post-it">
                <img src="<?php echo get_stylesheet_directory_uri()?>/images/apple-girl.png" alt="10for10" id="apple-girl" class="polaroid">
                <img src="<?php echo get_stylesheet_directory_uri()?>/images/middle-image.png" alt="10for10" id="middle-image" class="polaroid">
                <img src="<?php echo get_stylesheet_directory_uri()?>/images/top-image.png" alt="10for10" id="top-image" class="polaroid">
                <img src="<?php echo get_stylesheet_directory_uri()?>/images/10for10.png" alt="10for10" id="logo" class="polaroid">
                
            
                
            <div class="foodwrapper">
			<img src="<?php echo get_stylesheet_directory_uri()?>/images/shelves-full.png" class="shelf" style="clip: rect(0px, <?php echo $width ?>px, 519px, 0px); position: absolute; top: 0px; left: 0px; margin: 0px;">
                        <div id="total-donation">
                            <h3 class="nycd-font">&#36;<?php echo $don ?></h3>
                        </div>
            </div><!--foodwrapper-->    
             
                
                <div id="total-percent">
                    <p class="nycd-font"> We've reached <?php echo $per; ?>&#37; of our goal&#33;&#33;</p>
                </div>
                
                
                
                
                
                
            </div> <!--notepad-->
            <div id="lowersplash">
                <a href="<?php echo network_site_url( '/' );?>/donate-now" id="donate-button">Donate Now</a>
                <img src="<?php echo get_stylesheet_directory_uri()?>/images/footer-text.png" alt="10for10" id="footer-text" class="footer-text">
            
            </div>
            
        </div><!--splashboddy-->
        <div id="splash-divider">
            <a href="http://twitter.com/Food4Loudoun" target="_self" class="social-link"> <img src="<?php echo get_stylesheet_directory_uri()?>/images/twitter.png" alt="follow twitter" id="twitter" class="social-button"> </a>
            <a href="http://www.facebook.com/LoudounInterfaithRelief" target="_self" class="social-link" >    <img src="<?php echo get_stylesheet_directory_uri()?>/images/facebook.png" alt="follow twitter" id="facebook" class="social-button"></a>
        </div>
        <div id="splashfooter">
            
            <h1><span class="bigred">10</span> for <span class="bigred">10</span> Community Sponsors</h1>
            <?php             the_content(); ?>
        </div>



</div><!--splashwrapper-->
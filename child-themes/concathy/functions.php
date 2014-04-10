<?php
/*
 * Registers Social icon area
 */
register_sidebar( array(
		'name'			=> __( 'social-area', 'att' ),
		'id'			=> 'social',
		'description'	=> __( 'Area for social icons in the header..', 'att' ),
		'before_widget'	=> '<div class="sidebar-widget %2$s clr">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h4 class="heading socialwidget"><span>',
		'after_title'	=> '</span></h4>',
	)
);

register_sidebar( array(
		'name'			=> __( 'social-area-footer', 'att' ),
		'id'			=> 'social-footer',
		'description'	=> __( 'Area for social icons in the footer..', 'att' ),
		'before_widget'	=> '<div class="footer-widget %2$s clr">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h4 class="heading socialwidget"><span>',
		'after_title'	=> '</span></h4>',
	)
);

/*
 * removes extra footer areas
 */
function remove_some_widgets(){

	// Unregister some of the TwentyTen sidebars
	unregister_sidebar( 'footer-two' );
	unregister_sidebar( 'footer-three' );
	unregister_sidebar( 'footer-four' );
}
add_action( 'widgets_init', 'remove_some_widgets', 11 );

//modifies the read more link for excerpts
function att_excerpt($length=30, $readmore=false ) {
		global $post;
		$id = $post->ID;
		if ( has_excerpt( $id ) ) {
			$output = $post->post_excerpt;
		} else {
			$output = wp_trim_words( strip_shortcodes( get_the_content( $id ) ), $length);
			if ( $readmore == true ) {
				$readmore_link = '<span class="readmore-link"><span style="color: #6e2a80">'. __('continue reading', 'att' ) .' &raquo;</span></span>';
				$output .= apply_filters( 'att_readmore_link', $readmore_link );
			}
		}
		echo $output;
	}

/*********************************************/
/*** Adding Post Order to Services Menu Type****/
    /********************/
include ('functions/post-types/services.php');
include ('functions/post-types/slides.php');

function show_order_column($name){
  global $post;

  switch ($name) {
    case 'menu_order':
      $order = $post->menu_order;
      echo $order;
      break;
   default:
      break;
   }
}
add_action('manage_posts_custom_column','show_order_column');

function my_login_logo() { ?>
    <style type="text/css">
        body.login div#login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png);
            padding-bottom: 30px;
            width: 250px;
            background-size: 250px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

// Modify the admin footer text
add_filter('admin_footer_text', 'rvam_modify_footer_admin');
function rvam_modify_footer_admin ()
{
echo '<span id="footer-thankyou">Theme Development by <a href="http://www.chiseledimages.com" target="_blank">Chiseled Images, LLC</a> and <a href="http://www.alphagraphics.com/centers/leesburg-virginia-us694/" target="_blank">AlphaGraphics Loudoun</a></span>';
}

function remove_admin_bar_links() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('wp-logo');
	$wp_admin_bar->remove_menu('updates');
}
add_action( 'wp_before_admin_bar_render', 'remove_admin_bar_links' );
?>
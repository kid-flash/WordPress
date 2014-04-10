<?php
/**
 * The default template for displaying services content.
 *
 * @package WordPress
 * @subpackage Authentic Themes
 * @since 1.0
 */
 
 
 
/******************************************************
 * Single Posts
 * @since 1.0
*****************************************************/
if ( is_singular( 'services') ) { ?>
    
    <?php if ( get_post_meta( get_the_ID(), 'att_services_post_video', true ) !== '' ) { ?>
    	<div id="post-video">
    		<?php echo wp_oembed_get( get_post_meta( get_the_ID(), 'att_services_post_video', true ) ); ?>
        </div><!-- #post-video -->
	<?php } else if ( has_post_thumbnail() ) { ?>
<!--          <div id="post-thumbnail">
          <img src="<?php echo aq_resize( wp_get_attachment_url( get_post_thumbnail_id() ),  att_img( 'services_post_width' ), att_img( 'services_post_height' ), att_img( 'services_post_crop' ) ); ?>" alt="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>" />
        </div> #post-thumbnail -->
    <?php } ?>



<?php
/******************************************************
 * Entries
 * @since 1.0
*****************************************************/
} 


else { ?>
	
	<?php global $att_count; ?>
<a id="post-<?php the_ID(); ?>" <?php if(!is_front_page()){echo 'class="serviceex"';}?> <?php if(is_front_page()){echo 'href="services/#'.get_the_ID().'"';}?>>
    <article <?php post_class( 'services-entry clr grid-'. of_get_option( 'services_entry_grid','4') .' col-'. $att_count . '' ); ?>>
        <header class="post-heading">
			<?php if ( get_post_meta(get_the_ID(), 'att_services_icon', true ) !== '' ) { ?>
				<img src="<?php echo get_post_meta(get_the_ID(), 'att_services_icon', true ); ?>" alt="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>" class="services-entry-icon" />
			<?php } ?>
            <h3 class="cathy"><?php the_title(); ?></h3>
        </header>
        <div class="services-entry-content">
            <div class="services-entry-excerpt">
                 <?php att_excerpt(15, true ) ?>
                 
            </div><!-- .services-entry-excerpt -->
        </div><!-- .services-entry-content -->  
    </article><!-- .services-entry -->
</a>
<?php } ?>
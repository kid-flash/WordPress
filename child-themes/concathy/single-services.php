<?php
/**
 * The Template for displaying your single services posts
 *
 * @package WordPress
 * @subpackage Authentic Themes
 * @since 1.0
 */
 
get_header(); ?>

	<div id="primary" class="content-area clr">
		<div id="content" class="site-content" role="main">
        
			<?php $posttype_obj = get_post_type_object( get_post_type( ) ); ?>
        
            <div id="page-masthead-wrap">
                <header id="page-header" class="grid-1">
                    <h1><?php echo get_post_type_object( get_post_type( ) )->label; ?> : <?php the_title(); ?></h1>
                </header><!-- #page-header -->
            </div><!-- #page-masthead-wrap -->
          
            
            <div class="grid-1 clr">
                
                <?php while ( have_posts() ) : the_post(); ?>
                    <article id="post" class="clr">
                        <div class="entry clr">
                        	<?php get_template_part( 'content', 'services' ); ?>
                            <?php the_content(); ?>
                        </div><!-- .entry -->
                         <div id="post-thumbnail">
            <img src="<?php echo aq_resize( wp_get_attachment_url( get_post_thumbnail_id() ),  att_img( 'services_post_width' ), att_img( 'services_post_height' ), att_img( 'services_post_crop' ) ); ?>" alt="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>" />
        </div><!-- #post-thumbnail -->
                        <?php //comments_template(); ?>
                    </article><!-- #post -->
                <?php endwhile; ?>
                
            </div><!-- .grid-1 -->

    	</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>
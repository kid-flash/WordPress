<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Authentic Themes
 * @since 1.0
 */
 
get_header(); ?>

	<div id="primary" class="content-area clr">
		<div id="content" class="site-content" role="main">

            <div id="page-masthead-wrap">
                <div id="page-header" class="grid-1">
                    <h1><?php _e( 'Attending To Your Needs...', 'att' ); ?></h1>
                </div><!-- #page-header -->
            </div><!-- #page-header -->
            
            <div class="grid-1">
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'content', get_post_format() ); ?>
                <?php endwhile; ?>
                <?php get_sidebar(); ?>
            </div><!-- .grid-1 -->

    	</div><!-- #content -->
	</div><!-- #primary -->
    
<?php get_footer(); ?>
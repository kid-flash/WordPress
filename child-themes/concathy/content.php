<?php
/**
 * The default template for displaying post content.
 *
 * @package WordPress
 * @subpackage Authentic Themes
 * @since 1.0
 */
 
 
 
/******************************************************
 * Single Posts
 * @since 1.0
*****************************************************/
if ( is_singular() && is_main_query() ) { ?>

    <div id="post" class="single-post clr">
        
        <div id="post-heading">
            <header><h1><?php the_title(); ?></h1></header>
            <ul class="meta clr">
				<li><i class="icon-time"></i><?php the_time( 'jS F Y' ); ?></li> 
				<li><i class="icon-user"></i><?php the_author_posts_link(); ?></li>   
				<?php if ( comments_open() ) { ?>
					<li class="comments-scroll"><i class="icon-comments"></i><?php comments_popup_link(__( '0 Comments', 'att' ), __( '1 Comment', 'att' ), __( '% Comments', 'att' ), 'comments-link' ); ?></li>
				<?php } ?>
            </ul>
        </div><!-- /post-heading -->
        
        <?php if ( of_get_option( 'blog_single_thumbnail') == '1' && has_post_thumbnail() ) { ?>
            <div id="post-thumbnail">
                <img src="<?php echo aq_resize( wp_get_attachment_url( get_post_thumbnail_id() ),  att_img( 'blog_width' ), att_img( 'blog_height' ), att_img( 'blog_crop' ) ); ?>" alt="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>" />
            </div><!-- /post-thumbnail -->
        <?php } ?>
        
        <article class="entry clr">
            <?php the_content(); ?>
        </article><!-- .entry -->
           
        <?php wp_link_pages(); ?> 
        <?php comments_template(); ?>
        
		<div id="post-pagination" class="clr">
        	<div class="post-prev"><?php previous_post_link( '%link', '&larr; ' . __( 'Previous Article', 'att' ), false ); ?></div>
        	<div class="post-next"><?php next_post_link( '%link', __( 'Next Article', 'att' ) .' &rarr;', false ); ?></div>
        </div><!-- #post-pagination -->
            
    </div><!-- #post -->


<?php
/******************************************************
 * Entries
 * @since 1.0
*****************************************************/
} else { ?>

    <br>
    <article <?php post_class( 'blog-entry clr' ); ?>>  
    
        <header class="post-heading">
            <h2><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>"><?php the_title(); ?></a></h2>
        </header>
    
         <ul class="meta clr">
             <li><i class="icon-time"></i><?php the_time( 'jS F Y' ); ?></li> 
             <li><i class="icon-user"></i><?php the_author_posts_link(); ?></li>   
             <?php if ( comments_open() ) { ?>
             	<li><i class="icon-comments"></i><?php comments_popup_link(__( '0 Comments', 'att' ), __( '1 Comment', 'att' ), __( '% Comments', 'att' ), 'comments-link' ); ?></li>
			<?php } ?>
        </ul>
    
        <?php if ( has_post_thumbnail() ) {  ?>
            <div class="blog-entry-thumbnail">
                <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>"><img src="<?php echo aq_resize( wp_get_attachment_url( get_post_thumbnail_id() ),  att_img( 'blog_width' ), att_img( 'blog_height' ), att_img( 'blog_crop' ) ); ?>" alt="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>" /></a>
            </div><!-- .post-entry-thumbnail -->
        <?php } ?>
        
        <div class="blog-entry-content">
            <div class="blog-entry-text">
                <?php the_excerpt(); ?>
            </div><!-- .blog-entry-text -->
            <a class="theme-button" href="<?php the_permalink(); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>"><?php _e( 'Continue Reading', 'att' ); ?></a>
        </div><!-- .blog-entry-content -->  
    </article><!-- .blog-entry -->

<?php } ?>
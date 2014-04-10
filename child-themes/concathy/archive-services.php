<?php
/**
 * The template for displaying the Services custom post type archive.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Authentic Themes
 * @since 1.0
 */

get_header(); ?>
	<div id="primary" class="content-area clr">
		<div id="content" class="site-content" role="main">

           <div id="page-masthead-wrap">
                <header id="page-header" class="grid-1 clr">
                    <h1 class="page-header-title"><?php post_type_archive_title(); ?></h1>
                </header><!-- #page-header -->
            </div><!-- #page-masthead-wrap -->
      
			<?php if ( have_posts() ) : ?>
                    

                                <?php get_template_part( 'content','divs' ); ?>
                                
       
            
                <div id="services-template" class="grid-1">   
                    <div id="services-wrap" class="clr grid-container">
                        <?php
                        $att_count=0;
                        $serv_count = 0;
                        query_posts( array('post_type'=>'services', 'orderby'=>'menu_order','order'=>'ASC' ) );
                         while ( have_posts() && $serv_count <= 5 ) : the_post();
                            $att_count++;
                                get_template_part( 'content','services' );
                               if ( $att_count == of_get_option( 'services_entry_grid','4') ) {
                                $att_count=0;
                            }
                            $serv_count++;
                        endwhile; $att_count = NULL; ?>
                    </div><!-- /services-wrap -->
                    <?php att_pagination(); ?>
                </div><!-- /services-template -->

            <?php endif; ?>

    	</div><!-- #content -->
	</div><!-- #primary -->
    
<?php get_footer(); ?>
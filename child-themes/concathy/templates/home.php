<?php
/**
 * Template Name: Homepage
 *
 *
 * Custom template used for this theme's homepage display
 *
 * @package WordPress
 * @subpackage Authentic Themes
 * @since 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area clr">
		<div id="content" class="site-content" role="main">

            <div id="home-wrap" class="clr grid-1">
                
                                <?php
                /**************************
                * Page Content
                ****************************/
                while ( have_posts() ) : the_post(); ?>
                    <div id="home-content">
                        <?php the_content(); ?>
                    </div><!-- #home-content -->
                <?php endwhile; ?>
                    
                    
              <?php
                /**************************
                * Services
                ****************************/
                if ( of_get_option ( 'enable_services', '1' ) == '1' ) : ?>
                
                    <?php $query_services_posts = new WP_Query(
                        array(
                            'post_type'			=> 'services',
                            'posts_per_page'	=> of_get_option( 'home_services_count','4'),
                            'no_found_rows'		=> true,
                            'orderby'=>'menu_order',
                            'order'=>'ASC',
                        )
                    );
                    if ( $query_services_posts->posts ) { ?>
                    
                        <div id="home-services" class="grid-1 clr">
                            <div id="services-wrap" class="clr grid-container">
                                <?php $att_count=0; ?>
                                <?php foreach( $query_services_posts->posts as $post ) : setup_postdata($post); ?>
                                    <?php $att_count++; ?>
                                        <?php get_template_part( 'content','services' ); ?>
                                    <?php if ( $att_count == of_get_option( 'services_entry_grid','4') ) { ?>
                                        <?php $att_count=0; ?>
                                    <?php } ?>
                                <?php endforeach; ?>
                            </div><!-- #services-wrap -->
                        </div><!-- #home-services -->
                    
                    <?php } ?>
                    
                    <?php wp_reset_postdata(); ?>
                    
                <?php endif; ?>
                    
                    
           
                <?php	
                /**************************
                * Portfolio
                ****************************/
                if ( of_get_option ( 'enable_portfolio', '1' ) ) : ?>
                
                    <?php $query_portfolio_posts = new WP_Query(
                          array(
                              'post_type'			=> 'portfolio',
                              'posts_per_page'	=> of_get_option( 'home_portfolio_count','4'),
                              'no_found_rows'		=> true,
                          )
                      );		
                      if ( $query_portfolio_posts->posts ) { ?>
                                
                        <div id="home-portfolio">
                            <h2 class="att-heading"><?php _e( 'Recent Events', 'att' ); ?></h2>
                            <div id="portfolio-wrap">               
								<?php $att_count=0; ?>
                                <?php foreach( $query_portfolio_posts->posts as $post ) : setup_postdata($post); ?>
                                    <?php $att_count++; ?>
                                        <?php get_template_part( 'content', 'portfolio' ); ?>
                                    <?php if ( $att_count == of_get_option( 'portfolio_entry_grid','4') ) { ?>
                                        <?php $att_count=0; ?>
                                    <?php } ?>
                                <?php endforeach; ?>
                            </div><!-- #portfolio-wrap -->
                        </div><!-- #home-portfolio -->
                        
                        
                    
                            <?php } ?>
                        
                                             
                    <?php wp_reset_postdata(); ?>
                
                <?php endif; ?>
                        
                   <div id="testimonials">
                            <h2 class="att-heading">Attending to the needs of others...</h2>
                            <?php do_action( 'woothemes_testimonials' ); ?>
                        </div> <!--testimonials-->
            </div><!-- #home-wrap -->   

    	</div><!-- #content -->
	</div><!-- #primary -->
    
<?php get_footer(); ?>
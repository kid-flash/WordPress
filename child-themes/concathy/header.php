<?php
/**
 * The Header for our theme.
 *
 * @package WordPress
 * @subpackage Authentic Themes
 * @since 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php wp_title( '' ); ?><?php if (wp_title( '', false )) { echo ' |'; } ?> <?php bloginfo( 'name' ); ?></title>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <link href='http://fonts.googleapis.com/css?family=Allura' rel='stylesheet' type='text/css'>
    <?php wp_head(); ?>    


</head>

<body <?php body_class(); ?>>

<?php att_hook_site_before(); ?>

<div id="masthead-wrap" class="clr">
	<header id="masthead" class="site-header clr grid-1" role="banner">
        <div id="logo">
			<?php if( of_get_option('custom_logo','') !== '' ) { ?>
                <a href="<?php echo home_url(); ?>/" title="<?php echo get_bloginfo( 'name' ); ?>" rel="home"><img src="<?php echo of_get_option('custom_logo'); ?>" alt="<?php get_bloginfo( 'name' ) ?>" /></a>
            <?php } else { ?>
                 <h2><a href="<?php echo home_url(); ?>/" title="<?php echo get_bloginfo( 'name' ); ?>" rel="home"><?php echo get_bloginfo( 'name' ); ?></a></h2>
            <?php } ?>
        </div><!-- #logo -->
		<nav id="site-navigation" class="navigation main-navigation clr" role="navigation">
            <?php wp_nav_menu( array(
                'theme_location'	=> 'main_menu',
                'sort_column'		=> 'menu_order',
                'menu_class'		=> 'dropdown-menu sf-menu',
                'fallback_cb'		=> false,
                'walker'			=> new ATT_Dropdown_Walker_Nav_Menu()
            ) ); ?>
        </nav><!-- #site-navigation -->
    </header><!-- #masthead -->
    <div id="social-header">
     <?php dynamic_sidebar( 'social-area' ); ?>
        </div> <!-- #social-header-->
</div><!-- #masthead-wrap -->

<?php if( is_front_page()||is_page("home2") && of_get_option ( 'enable_slides', '1' ) == '1' ) { ?>
	<?php get_template_part('content','slides'); ?>
<?php } ?>

<div id="wrap" class="clr">
    <div id="main-content" class="clr">
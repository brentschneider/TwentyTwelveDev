<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<header id="masthead" class="site-header" role="banner">

<!-- * * * * * * * * * * * * * * * * * * * *
* * * *s
* * * * * Header Development Start
* * * *
* * * * * * * * * * * * * * * * * * * * -->

		<hgroup>
			<h1 class="site-title">

				 <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
						<!-- < ?php bloginfo( 'name' ); ?> -->
						<div class="headlogo" >
						</div>
					</a>
			</h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</hgroup>

<!-- * * * * * * * * * * * * * * * * * * * *
* * * *
* * * * * End Header Development
* * * *
* * * * * * * * * * * * * * * * * * * * -->

  	<?php if ( get_header_image() ) : ?>
	  	<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php header_image(); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a>
		<?php endif; ?>

    <!-- Start Nav -->
		<div id="custom-bootstrap-menu" class="navbar navbar-default " role="navigation">
    <div class="container-fluid">
        <div class="navbar-header"><a class="navbar-brand" href="tel:509448-5888">(509) 448-5888 </a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menubuilder"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse navbar-menubuilder">
					<?php
					 wp_nav_menu( array(
							 'menu'              => 'primary',
							 'theme_location'    => 'primary',
							 'depth'             => 2,
							 'container'         => 'ui',
							 'container_class'   => 'nav navbar-nav navbar-left',
							 'container_id'      => 'bs-example-navbar-collapse-1',
							 'menu_class'        => 'nav navbar-nav',
							 'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
							 'walker'            => new wp_bootstrap_navwalker())
					 );
			 	 	?>
        </div>
    	</div>
		</div><!-- end Nav -->

	</header><!-- #masthead -->
	<div id="main" class="wrapper">

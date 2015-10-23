<?php
/* The Template for displaying header area.
 *
 *
 * @subpackage persia
 * @since persia 0.1.0
 */
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

			<div class="site-head" id="masthead">
				<div class="banner">
					
					<div class="site-title-container">
						<a class="site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
							<?php if(!is_single()){ ?>
								<h1  id="site-title"><?php esc_attr(bloginfo( 'name' )); ?></h1>
							<?php } else { ?>
								<h3  id="site-title"><?php esc_attr(bloginfo( 'name' )); ?></h3>
							<?php } ?>
						</a>
						<h2 class="site-description" id="site-description"><?php esc_attr(bloginfo( 'description' )); ?></h2>
					</div>
												
				</div><!--.banner-->
				<?php 
						$mcolor = esc_attr(get_theme_mod('persia_menu_color'));
						$menu_color = ($mcolor)?($mcolor):'violet';
						$meffect = esc_attr(get_theme_mod('persia_menu_effect'));
						$menu_effect = ($meffect)?($meffect):'1'; 
						
						if (has_nav_menu('responsive_menu')){
							$active_responsive = 'active-responsive';
						} else {
							$active_responsive = 'disable-responsive';
						};
				?>
				
				<div id="header-menu-bar" class="header-menu-bar <?php echo $menu_color.'-menu '.$active_responsive; ?>">
					<div class="inner">
						
						<?php wp_nav_menu( array( 'theme_location' => 'header_menu', 'menu_class' => 'header-menu' ) ); ?>
					</div><!--.inner-->
				</div><!--.header-menu-bar-->
				
				<div class = "menu-container <?php echo $active_responsive; ?>" id="<?php echo $menu_effect; ?>">
						<nav id="dl-menu" class="dl-menuwrapper <?php echo $menu_color.'-menu '; ?>">
							<button class="dl-trigger"><?php echo __('Menu','persia'); ?></button>
							<?php wp_nav_menu( array( 'theme_location' => 'responsive_menu', 'menu_class' => 'dl-menu' ) ); ?>
						</nav><!--.header-menu-->
				</div>
				<a id="advancesearch-button" class="<?php echo $active_responsive; ?>"><i class="fa fa-search"></i></a>
			</div><!--.site-head-->
	
	<div class="main" id="main">
		<div class="content" id="content">
		
			
		
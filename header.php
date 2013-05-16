<?php $theme_options = get_option('option_tree'); ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'united' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); echo '?' . filemtime( get_stylesheet_directory() . '/style.css'); ?>" />
<!--[if lt IE 8]><link rel="stylesheet" href="<?php bloginfo( 'template_directory' ); ?>/css/ie.css" type="text/css" media="screen, projection"><![endif]-->
<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php bloginfo( 'template_directory' ); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>



</head>

<body <?php body_class(); ?>>
<div id="header-wrap">
<header id="branding" role="banner">
			<hgroup>
				<h1 id="site-title"><span><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span></h1>
				<h2 id="site-description"><?php bloginfo( 'description' ); ?></h2>
			</hgroup>

			<nav id="access" role="navigation">
				<h1 class="section-heading"><?php _e( 'Main menu', 'united' ); ?></h1>
				<div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'united' ); ?>"><?php _e( 'Skip to content', 'united' ); ?></a></div>

				<?php wp_nav_menu( array( 'theme_location' => 'main' ) ); ?>
				<?php wp_nav_menu( array( 'theme_location' => 'social' ) ); ?>
			<?php get_search_form(); ?>
			</nav><!-- #access -->


	</header><!-- #branding -->
</div>
<?php if (is_front_page())
	if(function_exists('show_flexslider_rotator')) echo show_flexslider_rotator( 'homepage' );

?>

<div id="page" class="hfeed container">



	<div id="main">

<?php

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 950; /* pixels */

/**
 * Tell WordPress to run united_theme_setup() when the 'after_setup_theme' hook is run.
 */
add_action( 'after_setup_theme', 'united_theme_setup' );

function united_theme_setup() {

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on united, use a find and replace
	 * to change 'united' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'united', TEMPLATEPATH . '/languages' );
	
	$locale = get_locale();
	$locale_file = TEMPLATEPATH . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

	/**
	 * Set the thumbnail sizes for this theme
	 */
	if ( function_exists( 'add_theme_support' ) ) { 
		add_theme_support( 'post-thumbnails' );
		add_image_size( '310x175', 310, 175, true );
	}

/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'main' => __( 'Main Menu', 'united' ),
		'top' => __( 'Top Right Menu', 'united' ),
		'social' => __( 'Social Menu', 'united' ),
		'footer1' => __( 'Footer Menu One', 'united' ),
		'footer2' => __( 'Footer Menu Two', 'united' ),
		'team' => __( 'Team Menu', 'united' ),
		'products' => __( 'Products Menu', 'united' )
	) );
	
	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );
	
	/**
	 * Add support for custom backgrounds
	 */
	add_custom_background();

} // united_theme_setup()

/**
 * Setup a default path to our theme includes folder
 */
$includes_path = TEMPLATEPATH . '/inc/';

/**
 * Load Javascripts
 */
require_once ($includes_path . 'scripts.php');

/**
 * Load Javascripts
 */
require_once ($includes_path . 'attachments.php');
	
/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
function united_page_menu_args($args) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'united_page_menu_args' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function united_widgets_init() {
	register_sidebar( array (
		'name' => __( 'Sidebar 1', 'united' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );

	register_sidebar( array (
		'name' => __( 'Sidebar 2', 'united' ),
		'id' => 'sidebar-2',
		'description' => __( 'An optional second sidebar area', 'united' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );	
	
	register_sidebar( array (
		'name' => __( 'Footer Widget', 'united' ),
		'id' => 'footer-widget-1',
		'description' => __( 'Footer left widget area', 'united' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );
	
}
add_action( 'widgets_init', 'united_widgets_init' );


/**
 * New excerpt length
 */
function united_excerpt_length($length) {
	return 70;
}
add_filter('excerpt_length', 'united_excerpt_length');

/**
 * Add read more link
 */
function united_excerpt_more($more) {
  global $post;
	return '<a href="'. get_permalink($post->ID) . '">...continue...</a>';
}
add_filter('excerpt_more', 'united_excerpt_more');

/**
 * Remove wp_generator from wp_head hook
 */
remove_action('wp_head', 'wp_generator');

/**
 * Add google fonts to wp_head hook
 */
function united_google_fonts() {
	if ( function_exists('get_option_tree') ) {
		$heading_fonts = get_option_tree( 'heading_fonts' );
		$paragraph_fonts = get_option_tree( 'paragraph_fonts' );
		if ( $heading_fonts != "")
			echo '<link href="http://fonts.googleapis.com/css?family='.$heading_fonts.'" rel="stylesheet" type="text/css">'."\n";
		if ( $paragraph_fonts != "")
			echo '<link href="http://fonts.googleapis.com/css?family='.$paragraph_fonts.'" rel="stylesheet" type="text/css">'."\n";
	} // end if function exists
} // end function
add_action('wp_head','united_google_fonts');

/**
 * Add custom css to wp_head hook
 */
function united_custom_css() {
	if ( function_exists('get_option_tree') ) {
		$logo = get_option_tree( 'logo' );
		$css = get_option_tree( 'css' );
		$font_color = get_option_tree( 'font_color' );
		$metadata_color = get_option_tree( 'metadata_color' );
		$link_color = get_option_tree( 'link_color' );
		$link_hover_color = get_option_tree( 'link_hover_color' );
		$border_color = get_option_tree( 'border_color' );
		if ($logo != "" || $css != "" || $font_color != "" || $metadata_color != "" || $link_color != "" || $link_hover_color != "" || $border_color != "") {
			echo '<style type="text/css">';
			if ($logo != "")
				echo '#site-title a { background-image: url('.$logo.'); }?>); }';
			if ($css != "")
				echo $css;
			if ($font_color != "")
				echo 'body, p, h1, h2, h3, h4, h5, h6 {color: '.$font_color.'}';
			if ($metadata_color != "")
				echo '.entry-meta { border-color: '.$metadata_color.'; color: '.$metadata_color.'; }';
			if ($link_color != "")
				echo 'a, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a { color: '.$link_color.'; }';
			if ($link_hover_color != "")
				echo 'a:focus, a:active, a:hover { color: '.$link_hover_color.'; }';
			if ($border_color != "")
				echo 'h3 { border-color: '.$border_color.'; border-top: 1px solid '.$border_color.'; background-image:none; }';
			echo '</style>'."\n";
		} // end if logo or css exist
	} // end if function exists
} // end function
add_action('wp_head','united_custom_css');

/**
 * Add Google Analytics tracking to wp_footer hook
 */
function united_google_analytics() {
	if ( function_exists('get_option_tree') ) {
		$gaid = get_option_tree( 'google_analytics_id' );
		if ($gaid != "") {
			$ga_script = '';
			$ga_script .= '
<script type="text/javascript">
	var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
	document.write(unescape("%3Cscript src=\'" + gaJsHost + "google-analytics.com/ga.js\' type=\'text/javascript\'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
	try{
		var pageTracker = _gat._getTracker("'.$gaid.'");
		pageTracker._trackPageview();
	} catch(err) {}
</script>';
			echo $ga_script;
			echo "\n";
		} // end if not empty
	} // end if function exists
} // end function
add_action('wp_footer','united_google_analytics');

/**
 * Add notice to admin about theme requirements
 */
function united_theme_options_notice(){
	global $current_screen;
	$theme = get_bloginfo('template_directory');
	if ( $current_screen->parent_base == 'themes') {
		if (!is_plugin_active('option-tree/index.php')) {
			echo '<div class="error"><p>You must install the <a href="http://wordpress.org/extend/plugins/option-tree/" target="_blank">Option Tree plugin</a> to use this theme. Refer to the <a href="'.$theme.'/readme.txt" target="_blank">Theme Instructions</a> if you have questions.</p></div>';
		} // end conditional check
	} // end on themes page check
} // end function
add_action( 'admin_notices', 'united_theme_options_notice' );

/**
 * Add custom admin styles
 */
function united_custom_admin_css() {
   echo '<style type="text/css">
           #framework_wrap #header h1 {
    					background: url("../wp-content/themes/united/images/theme-options.png") no-repeat scroll 0 0 transparent !important;
						}
         </style>';
}
add_action('admin_head', 'united_custom_admin_css');

/**
 * Add Twitter Icon to Posts
 */
function united_social_buttons_below($content) {
	$permalink = get_permalink($post->ID);
	$title = get_the_title();
	if(!is_feed() && !is_home() && !is_page()) {
		$content = $content . '<div class="social-links">
	<a href="http://twitter.com/share" class="twitter-share-button" data-count="none" data-url="'.$permalink.'" data-text="'.$title.'">Tweet</a>
	<div id="fb-root"></div><fb:like href="'.$permalink.'" layout="button_count" width="100" show_faces="false" font=""></fb:like>
</div>';
	}
	return $content;
}
add_filter('the_content', 'united_social_buttons_below');

if( !function_exists( 'united_product_tax_class' ) ) {
  function united_product_tax_class( $classes, $class, $ID ) {
    $taxonomy = 'type';
    $terms = get_the_terms( (int) $ID, $taxonomy );
    if( !empty( $terms ) ) {
      foreach( (array) $terms as $order => $term ) {
        if( !in_array( $term->slug, $classes ) ) {
          $classes[] = $term->slug;
        }
      }
    }
    return $classes;
  }
}
add_filter( 'post_class', 'united_product_tax_class', 10, 3 );

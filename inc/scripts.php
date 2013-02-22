<?php
	
function united_js( ) {
	wp_enqueue_script('jquery');
	wp_enqueue_script('slidesjs', get_bloginfo('template_directory').'/js/slides.min.jquery.js', array('jquery'));
	wp_enqueue_script('unitedjs', get_bloginfo('template_directory').'/js/united.jquery.js', array('jquery'));
}
function united_social_js( ) {
	wp_enqueue_script('twitter', 'http://platform.twitter.com/widgets.js', '');
	wp_enqueue_script('facebook', 'http://connect.facebook.net/en_US/all.js#xfbml=1', '');
}
function united_dom_js() {
	if (is_home() || is_singular() || is_archive('Products')) {
	$template = get_bloginfo('template_directory');
	$doc_ready_script = "";
	$doc_ready_script .= "

<script type=\"text/javascript\">
/* <![CDATA[ */
	jQuery(function($){
		$('#hs').slides({
			preload: true,
			preloadImage: '" . $template . "/images/slideshow/loading.gif',
			play: 5000,
			pause: 2500,
			hoverPause: true
		});
	});
	jQuery(function($){
		$('#ss').slides({
			preload: true,
			preloadImage: '" . $template . "/images/slideshow/loading.gif',
			effect: 'slide, fade',
			crossfade: true,
			slideSpeed: 350,
			fadeSpeed: 500,
			generateNextPrev: true,
			generatePagination: false
		});
	});
/* ]]> */	
</script>";
	echo $doc_ready_script;
	echo "\n";
	}
}

/**
 * Load javascripts sitewide
 */

if (!is_admin())
	add_action( 'init', 'united_js' );

/**
 * Load javascripts on homepage only
 */

add_action('wp_head', 'united_dom_js');

/**
 * Load social javascripts in footer
 */

add_action('wp_head', 'united_social_js');
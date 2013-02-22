<?php
if ( function_exists( 'get_option_tree' ) ) {
	$template = get_bloginfo('template_directory');
	echo '<div id="hs_wrap">
				<div id="hs">
					<div class="slides_container">';
  $slides = get_option_tree( 'slides', $option_tree, false, true, -1 );
  foreach( $slides as $slide ) {
    echo '<a href="'.$slide['link'].'" title="'.$slide['title'].' - '.$slide['description'].'"><img src="'.$slide['image'].'" alt="'.$slide['title'].' - '.$slide['description'].'" /></a>';
  }
  echo '</div><!-- .slides_container -->
  			</div><!-- #hs -->
  			</div><!-- #hs_wrap -->';
}
?>
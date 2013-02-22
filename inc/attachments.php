<?php

/**
 * Display all attachments
 */

function united_product_attachments($size) {
	global $post;
	$args = array(
		'order'          => 'ASC',
		'orderby' 		 => 'menu_order',
		'post_type'      => 'attachment',
		'post_parent'    => $post->ID,
		'post_mime_type' => 'image',
		'post_status'    => null,
		'numberposts'    => -1,
		'size' => $size,
	);
	
	$attachments = get_posts($args);
	if ($attachments) {
		foreach ($attachments as $attachment) {
		echo '<a href="#">';
			echo wp_get_attachment_image($attachment->ID, $size, false, false);
		$description = $attachment->post_content;
		if (isset($description)) { echo '';}
		echo '</a>';
		}
	}
}

function united_product_attachments_thumbs($size) {
	global $post;
	$args = array(
		'order'          => 'ASC',
		'orderby' 		 => 'menu_order',
		'post_type'      => 'attachment',
		'post_parent'    => $post->ID,
		'post_mime_type' => 'image',
		'post_status'    => null,
		'numberposts'    => -1,
		'size' => $size,
	);
	
	$attachments = get_posts($args);
	if ($attachments) {
		foreach ($attachments as $attachment) {
		echo '<li><a href="#">';
			echo wp_get_attachment_image($attachment->ID, $size, false, false);
		$description = $attachment->post_content;
		if (isset($description)) { echo '';}
		echo '</a></li>';
		}
	}
}

function united_slideshow($size) { ?>

				<div id="ss_wrap"> 
					<div id="ss"> 
						<div class="slides_container">
							<?php united_product_attachments($size); ?>
						</div>
						<ul class="pagination">
							<?php united_product_attachments_thumbs('thumbnail'); ?>
						</ul>
					</div>
				</div>
<?php }

?>
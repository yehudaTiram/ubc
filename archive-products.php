<?php get_header(); ?>

		<section id="primary"  class="full-width">
			<div id="content" role="main">

				<header class="page-header">
					<h1 class="page-title">Products</h1>
				</header>
<div id="product-categories">
				<?php
$terms = get_terms('type','hide_empty=1');
 $count = count($terms);
 if ( $count > 0 ){
     echo "<ul>";
     foreach ( $terms as $term ) {
       	
       echo "<li><a href='" . get_term_link($term->slug, 'type') . "' title='" . $term->name . "' >";
       
if (z_taxonomy_image_url($term->term_id) != '') {

       echo "<img src='" . z_taxonomy_image_url($term->term_id) . "' title='" . $term->name . "' />";

   } else {
   		echo "<img src='";
   		echo bloginfo('stylesheet_directory') . "/images/image-coming-soon.gif' title='" . $term->name . "' />";
   };
       echo $term->name . "</a></li>"; 	
       
        
     }
     echo "</ul>";
 }
 ?>

<div class="clear"></div>

</div>


			




			</div><!-- #content -->
		</section><!-- #primary -->
		

<?php get_footer(); ?>
<?php get_header(); ?>

		<div id="primary"   class="full-width">
			<div id="content" role="main">

			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
					<header class="entry-header">
						<h1 class="entry-title"><?php the_title(); ?></h1>
					</header><!-- .entry-header -->
					
					<div class="entry-content">
				
						<?php united_slideshow('large'); ?>
						
						<?php the_content(); ?>
						
						<?php
							$meta = $product_metabox->the_meta();
							if ( isset($meta['products'])) {
								if ( isset($meta['geometry'])) {
									echo '<div class="specs">';
								}
						?>
						<table id="specs">
							<tr>
								<th>Specs</th>
							</tr>		
							<?php
								// the product spec
								if ( isset($meta['products'])) {
									foreach ($meta['products'] as $product) {
										echo '<tr>';
										echo '<td>'.$product['product_spec_value'].'</td>';
										echo '</tr>';
									}
								}
							?>
						</table>
						<?php
							if ( isset($meta['geometry'])) {
								echo '</div>';
							}
						} // end if product spec isset
						?>
						
						<?php if ( isset($meta['geometry'])) { ?>
						<div class="geometry">
						<table id="geometry">
							<tr>
								<th colspan="2"><?php if ( has_term( 'complete-bikes', 'type', $post->ID ) ) { echo 'Specs'; } else { echo 'Geometry'; } ?></th>
								
							</tr>		
							<?php
								// the product spec
								foreach ($meta['geometry'] as $detail) {
									echo '<tr>';
									echo '<td>'.$detail['product_geometry_title'].'</td>';
									echo '<td>'.$detail['product_geometry_value'].'</td>';
									echo '</tr>';
								}
							?>
						</table>
						</div>
						<?php } // only show geometry section if geometry value is set ?>

						<?php if ( isset($meta['video'])) { ?>
						<div class="video">
						<table id="video">
							<tr>
								<th colspan="2"><?php if ( has_term( 'complete-bikes', 'type', $post->ID ) ) { echo 'Specs'; } else { echo 'Geometry'; } ?></th>
								
							</tr>		
							<?php
								// the product spec
								foreach ($meta['geometry'] as $detail) {
									echo '<tr>';
									echo '<td>'.$detail['product_geometry_title'].'</td>';
									echo '<td>'.$detail['product_geometry_value'].'</td>';
									echo '</tr>';
								}
							?>
						</table>
						</div>
						<?php } // only show geometry section if geometry value is set ?>
					
					</div><!-- .entry-content -->
	
				</article>

			<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->


<?php get_footer(); ?>
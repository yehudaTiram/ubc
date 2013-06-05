<?php global $post;?>

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
						if ( isset($meta['product_videos'])) { ?>
						<div class="video">
						<table id="video">
							<tr>
								<th colspan="2">Video</th>

							</tr>
							<tr>
								<td colspan="2">
									<?php echo $meta['product_videos']; ?>

								</td>
							</tr>
						</table>
						</div>
						<?php
} // only show geometry section if video value is set ?>

						<?php
							$meta = $product_metabox->the_meta();
							if ( isset($meta['products'])) {
								if ( isset($meta['products'])) {
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
						<?php
} // only show geometry section if video value is set
?>


					</div><!-- .entry-content -->

				</article>

			<?php endwhile; // end of the loop. ?>
			</div><!-- #content -->
		</div><!-- #primary -->
<?php get_template_part('social'); ?>
<?php echo fbcommentbox(''); ?>
<?php
        if ( 'products' == get_post_type() ) {
            $taxs = wp_get_post_terms( $post->ID, 'type' );
            if ( $taxs ) {
                $tax_ids = array();
                foreach( $taxs as $tax)
                    $tax_ids[] = $tax->term_id;
                    $args = array(
                        'tax_query' => array(
                            array(
                                'taxonomy'  => 'type',
                                'terms'     => $tax_ids,
                                'operator'  => 'IN'
                            )
                        ),
                        'post__not_in'          => array( $post->ID ),
                        'posts_per_page'        => 3,
                        'ignore_sticky_posts'   => 1
                    );

                $my_query = new wp_query( $args );
                if( $my_query->have_posts() ) {
                    echo '<div class="related-products">';
                    echo '<h3>Related Products</h3>';
                    while ( $my_query->have_posts() ) :
                        $my_query->the_post();
                        echo '<div class="related-product-wrapper">';
                        echo '<a href="'.get_permalink().'" rel="bookmark" class="product-related">';
                        the_post_thumbnail('310x175');
                        the_title('<span class="product-related-title">','</span>');
                        echo '</a>';
                        echo '</div>';
                    endwhile;
                    wp_reset_query();

                    echo '</div>';
            }
          }
      }
?>
<?php get_footer(); ?>




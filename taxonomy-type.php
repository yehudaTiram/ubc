<?php get_header(); ?>

		<section id="primary" class="full-width">
			<div id="content" role="main">

				<?php the_post(); ?>

				<header class="page-header">
					<h1 class="page-title"><?php

					$term =	$wp_query->queried_object;
					echo $term->name;
					?>

					</h1>
				</header>

				<?php rewind_posts(); ?>
				<div id="taxonomy-archive-type">
					<ul>
        <?php /* Start the Loop */ ?>
        <?php query_posts($query_string . '&showposts=-1'); ?>
				<?php while ( have_posts() ) : the_post(); ?>

				<li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s', 'united' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_post_thumbnail('310x175'); ?><?php echo get_the_title(); ?></a>


					</li><!-- #post-<?php the_ID(); ?> -->

				<?php endwhile; ?>
				</ul>
				</div>

			</div><!-- #content -->
		</section><!-- #primary -->

<?php get_footer(); ?>

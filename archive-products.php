<?php get_header(); ?>

		<section id="primary">
			<div id="content" role="main">

				<header class="page-header">
					<h1 class="page-title">Products</h1>
				</header>

				<?php get_template_part('slideshow-products'); ?>

			</div><!-- #content -->
		</section><!-- #primary -->
		
<?php get_sidebar('products'); ?>
<?php get_footer(); ?>
<?php get_header(); ?>

		<section id="primary" class="full-width">
			<div id="content" role="main">

				<?php the_post(); ?>

				<header class="page-header">
					<h1 class="page-title">Team</h1>
				</header>
				
				<?php $levels = array( "pros", "ams", "world", "vets" );
					foreach ( $levels as $level ) {
				?>

				<!-- <?php echo $level; ?> -->
				<div id="<?php echo $level; ?>" class="clearfix">
				<?php
    			$team = new WP_Query();
    			$team->query('showposts=-1&post_type=team&level='.$level.'');
    			$i = 0;
				?>
				<h3><?php echo $level; ?></h3>
				<?php while ($team->have_posts()) : $team->the_post(); $i++; ?>
				<div class="span-8<?php if ($i == 3) { echo ' last'; } ?>">
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="teammate">
						<header class="entry-header">
							<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'united' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php $meta = $team_metabox->the_meta(); echo '<span>'.$meta['team_first_name'], '</span> '.$meta['team_last_name']; ?></a></h1>
						</header><!-- .entry-header -->
						<div class="entry-content">
							<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'united' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_post_thumbnail('310x175'); ?></a>
							<?php edit_post_link( __( 'Edit', 'united' ), '<span class="edit-link">', '</span>' ); ?>
						</div><!-- .entry-content -->
						</div><!-- .teammate -->
					</article><!-- #post-<?php the_ID(); ?> -->
				</div><!-- .span-8 -->
				<?php if ($i == 3) { ?><hr class="space" /><?php $i = 0; } ?>
				<?php endwhile; ?>
				</div><!-- #<?php echo $level; ?> -->
				
				<?php } // end foreach loop ?>

			</div><!-- #content -->
		</section><!-- #primary -->

<?php get_footer(); ?>
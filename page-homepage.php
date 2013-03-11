<?php
/*
Template Name: Homepage 2013
*/
?>

<?php get_header(); ?>

		<section id="primary" class="full-width">
			<div id="content" role="main">

				<section id="hp-riders"><?php the_post(); ?>

				<header class="page-header">
					<h2 class="page-title">Featured Riders</h2>
				</header>
				
				<?php $levels = array( "homepage" );
					foreach ( $levels as $level ) {
				?>

				<!-- <?php echo $level; ?> -->
				<div id="<?php echo $level; ?>" class="clearfix">
				<?php
    			$team = new WP_Query();
    			$team->query('showposts=-1&post_type=team&level='.$level.'');
    			$i = 0;
				?>
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
</section>				
				
				
				<section id="hp-videos"><header class="page-header">
					<h2 class="page-title">Videos</h2>
				</header>
				<?php
				  $wpvq = array( 'post_type' => 'videos',
				  				 'rider' => 'homepage' );
				  $rider_posts = new WP_Query ($wpvq);
				  $i = 0;
				?>
					          
					  <?php foreach( $rider_posts->posts as $post ) : $i++; ?>
					   <div class="span-8<?php if ($i == 3) { echo ' last'; } ?>">
							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<div class="video-archive">
								<header class="entry-header">
									<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'united' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
								</header><!-- .entry-header -->
								<div class="entry-content">
									<?php
										printf( __( '<time class="entry-date" datetime="%1$s" pubdate> <span class="month">%2$s</span> <span class="day">%3$s</span> <span class="year">%4$s</span></time>', 'united' ),
											get_the_date( 'c' ),
											get_the_date('M'), // Jan, Feb, etc
											get_the_date('d'), // 01-31
											get_the_date('Y') // 1979, etc
										);
									?>
									<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'united' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_post_thumbnail('310x175'); ?></a>
								</div><!-- .entry-content -->
								<footer class="entry-meta">
									<?php the_date(); ?>
								</footer>
								</div><!-- .video-archive -->
							</article><!-- #post-<?php the_ID(); ?> -->
						</div><!-- .span-8 -->
						<?php if ($i == 3) { ?><hr class="space" /><?php $i = 0; } ?>
					 <?php endforeach ?>
</section>				
				
				

			</div><!-- #content -->
		</section><!-- #primary -->

<?php get_footer(); ?>
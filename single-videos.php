<?php get_header(); ?>

		<div id="primary" class="full-width">
			<div id="content" role="main">

			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
					<header class="entry-header">
						<h1 class="entry-title"><?php the_title(); ?></h1>
					</header><!-- .entry-header -->
					
					<div class="entry-content">
						<?php
							// get the meta data for the current post
							$meta = $video_metabox->the_meta();
							$date = get_the_date();
							echo '<div class="video">';
							echo $meta['video_embed_code'];
							echo '<p class="credit">Credit: <a href="'.$meta['video_credit_url'].'">'.$meta['video_credit'].'</a></p>';
							echo '</div><!-- .video -->';
							echo '<div class="video-meta">';
							printf( __( '<time class="entry-date" datetime="%1$s" pubdate> <span class="month">%2$s</span> <span class="day">%3$s</span> <span class="year">%4$s</span></time></a> ', 'united' ),
								get_the_date( 'c' ),
								get_the_date('M'), // Jan, Feb, etc
								get_the_date('d'), // 01-31
								get_the_date('Y') // 1979, etc
							);
							echo '<p>'.$meta['video_description'].'</p>';
							echo '<h4>Watch this video on:</h4>';
							echo '<ul class="video-links">';
							echo '<li><a href="'.$meta['video_vimeo_url'].'" class="vimeo" title="Watch on Vimeo" target="_blank">Vimeo</a></li>';
							echo '<li><a href="'.$meta['video_youtube_url'].'" class="youtube" title="Watch on YouTube" target="_blank">YouTube</a></li>';
							echo '<li><a href="'.$meta['video_itunes_podcast'].'" class="itunes" title="Watch on iTunes" target="_blank">iTunes</a></li>';
							echo '</ul>';
							get_template_part('social');
							echo '</div><!-- .video-meta -->';
						?>
					</div><!-- .entry-content -->
					
					<style type="text/css">
					body {
						background-image: url(<?php echo $meta['video_background_image_url']; ?>);
						background-repeat:no-repeat !important;
						background-position:center center !important;
						background-attachment:fixed !important;
						-o-background-size: 100% 100%, auto !important;
						-moz-background-size: 100% 100%, auto !important;
						-webkit-background-size: 100% 100%, auto !important;
						background-size: 100% 100%, auto !important;
					}
					</style>
					
				</article>

				<nav id="nav-below">
					<h1 class="section-heading"><?php _e( 'Post navigation', 'united' ); ?></h1>
					<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr; Previous Video: ', 'Previous post link', 'united' ) . '</span> %title' ); ?></div>
					<div class="nav-next"><?php next_post_link( '%link', 'Next Video: %title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'united' ) . '</span>' ); ?></div>
				</nav><!-- #nav-below -->

			<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>
<?php get_header(); ?>

		<div id="primary" class="full-width">
			<div id="content" role="main">

			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
					<header class="entry-header">
						<h1 class="entry-title"><?php the_title(); ?></h1>
					</header><!-- .entry-header -->
					
					<div class="entry-content clearfix">
						
							<div class="span-15 colborder">
							
								<?php united_slideshow('medium'); ?>
	
								<?php the_content(); ?>
								
							</div>
							
							<div class="span-8 last">
							
							<?php
							// get the bio meta data for the current post
							$meta = $team_metabox->the_meta();
							if (isset($meta['team_first_name'])) {
								echo '<h3>Bio</h3>';
								echo '<ul class="bio">';
								if (isset($meta['team_first_name']))
									echo '<li><span class="id">Name</span><span class="value">'.$meta['team_first_name'], '&nbsp;'.$meta['team_last_name'].'</span></li>';
								if (isset($meta['team_hometown']))
									echo '<li><span class="id">Hometown</span><span class="value">'.$meta['team_hometown'].'</span></li>';
								if (isset($meta['team_dob']))
									echo '<li><span class="id">Date of Birth</span><span class="value">'.$meta['team_dob'].'</span></li>';
								if (isset($meta['team_twitter']))
									echo '<li><span class="id">Twitter</span><span class="value"><a href="http://twitter.com/#!/'.$meta['team_twitter'].'" title="'.$meta['team_first_name'], '&nbsp;'.$meta['team_last_name'].' on Twitter" target="_blank">@'.$meta['team_twitter'].'</a></span></li>';
								if (isset($meta['team_facebook']))
									echo '<li><span class="id">Facebook</span><span class="value"><a href="http://facebook.com/'.$meta['team_facebook'].'" title="'.$meta['team_first_name'], '&nbsp;'.$meta['team_last_name'].' on Facebook" target="_blank">'.$meta['team_first_name'].' on Facebook</a></span></li>';
								if (isset($meta['sponsors'])) {
									echo '<li id="sponsors"><span class="id">Sponsors</span><span class="value">';
									foreach ($meta['sponsors'] as $spec) {
										echo '<a href="'.$spec['team_sponsor_url'].'" class="sponsor" target="_blank" title="'.$spec['team_sponsor_name'].'">'.$spec['team_sponsor_name'].'</a> ';
									}
									echo '</span></li>';
								} // if sponsors are set
								echo '</ul>';
								//echo '<p>'.$meta['team_description'].'</p>';
							} // only show if the first name is set
							?>

							<?php
							// get the video meta data for the current post
							$meta = $team_metabox->the_meta();
							if ( isset($meta['videos']) || isset($meta['team_video_featured_title']) ) {
								echo '<h3>Videos</h3>';
								if (isset($meta['team_video_featured_url'])) {
									echo '<div class="video-featured"><a href="'.$meta['team_video_featured_url'].'" class="fancybox-vimeo" title="'.$meta['team_video_featured_title'].'"><img src="'.$meta['team_video_featured_thumb'].'" alt="'.$meta['team_video_featured_title'].'" width="310" height="175" /><span>'.$meta['team_video_featured_title'].'</span><span class="play"></span></a></div>';
								}
								if ( isset($meta['videos']) ) {
									echo '<ul class="videos clearfix">';
									if (isset($meta['videos']))
									$i = 0;
									foreach ($meta['videos'] as $video) {
										$i++;
										if($i % 2 == 0)
											$class = 'last';
										else
											$class = 'first';
										echo '<li class="'.$class.'"><a id="video_'.$i.'" class="fancybox-vimeo" href="'.$video['team_video_url'].'" title="'.$video['team_video_title'].'"><img src="'.$video['team_video_thumb'].'" alt="'.$video['team_video_title'].'" width="150" height="100" /><span>'.$video['team_video_title'].'</span><span class="play"></span></a></li>';
									} // end foreach videos
									echo '</ul>';
								} // if videos are set
							} // if videos or featured videos are set
							?>

							<?php
							// get the ad meta data for the current post
							$meta = $team_metabox->the_meta();
							if (isset($meta['ads'])) {
								echo '<h3>Ads</h3>';
								echo '<ul class="ads">';
								if (isset($meta['ads']))
								foreach ($meta['ads'] as $ad) {
									echo '<li><a href="'.$ad['team_ad_url'].'" title="'.$ad['team_ad_name'].'"><img src="'.$ad['team_ad_thumb'].'" title="'.$ad['team_ad_name'].'" alt="'.$ad['team_ad_name'].'" width="310" height="175" /></a><span class="fancy">'.$ad['team_ad_name'].'</span></li>';
								}
								echo '</ul>';
							}
							?>
							
							</div><!-- .span-8 .last -->
					
					</div><!-- .entry-content -->
	
				</article>

			<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>
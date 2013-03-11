<?php
/*
Template Name: Homepage 2013
*/
?>

<?php get_header(); ?>




		<section id="primary" class="full-width">
			<div id="content" role="main">
			
			<section id="hp-posts">
			
			<?php $my_query = new WP_Query('category_name=featured&posts_per_page=3');
			 while ($my_query->have_posts()) : $my_query->the_post();
			 $do_not_duplicate = $post->ID; 
			 ?>
			  
			  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			  	<header class="entry-header">
			  		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'united' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
			  
			  		<?php if ( 'post' == $post->post_type ) : ?>
			  		<div class="entry-meta">
			  			<?php
			  				printf( __( '<span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="%6$s" title="%7$s">%8$s</a></span> <span class="sep">on</span> <a href="%1$s" rel="bookmark"><time class="entry-date" datetime="%2$s" pubdate> <span class="month">%3$s</span> <span class="day">%4$s</span> <span class="year">%5$s</span></time></a> ', 'united' ),
			  					get_permalink(),
			  					get_the_date( 'c' ),
			  					get_the_date('M'), // Jan, Feb, etc
			  					get_the_date('d'), // 01-31
			  					get_the_date('Y'), // 1979, etc
			  					get_author_posts_url( get_the_author_meta( 'ID' ) ),
			  					sprintf( esc_attr__( 'View all posts by %s', 'united' ), get_the_author() ),
			  					get_the_author()
			  				);
			  			?>
			  		</div><!-- .entry-meta -->
			  		<?php endif; ?>
			  	</header><!-- .entry-header -->
			  
			  	<?php if ( is_search() ) : // Only display Excerpts for search pages ?>
			  	<div class="entry-summary">
			  		<?php the_excerpt( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'united' ) ); ?>
			  	</div><!-- .entry-summary -->
			  	<?php else : ?>
			  	<div class="entry-content">
			  		<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'united' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_post_thumbnail('310x175'); ?></a>
			  		<?php the_excerpt(); ?>
			  		<?php get_template_part('social'); ?>
			  		<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'united' ), 'after' => '</div>' ) ); ?>
			  	</div><!-- .entry-content -->
			  	<?php endif; ?>
			  
			  	<footer class="entry-meta">
			  		<span class="cat-links"><span class="entry-utility-prep entry-utility-prep-cat-links"><?php _e( 'Posted in ', 'united' ); ?></span><?php the_category( ', ' ); ?></span>
			  		<span class="sep"> | </span>
			  		<?php the_tags( '<span class="tag-links">' . __( 'Tagged ', 'united' ) . '</span>', ', ', '<span class="sep"> | </span>' ); ?>
			  		<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'united' ), __( '1 Comment', 'united' ), __( '% Comments', 'united' ) ); ?></span>
			  		<?php edit_post_link( __( 'Edit', 'united' ), '<span class="sep">|</span> <span class="edit-link">', '</span>' ); ?>
			  	</footer><!-- #entry-meta -->
			  </article><!-- #post-<?php the_ID(); ?> -->
			  
			  
			  
			   
			 <?php endwhile; ?>
			
			</section>
			
			
			

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
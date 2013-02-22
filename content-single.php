<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>

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
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'united' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
		<?php
			$tag_list = get_the_tag_list( '', ', ' );
			if ( '' != $tag_list ) {
				$utility_text = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'united' );
			} else {
				$utility_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'united' );
			}
			printf(
				$utility_text,
				get_the_category_list( ', ' ),
				$tag_list,
				get_permalink(),
				the_title_attribute( 'echo=0' )
			);
		?>

		<?php edit_post_link( __( 'Edit', 'united' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->

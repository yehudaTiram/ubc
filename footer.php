	</div><!-- #main -->

	<footer id="colophon" role="contentinfo">
			<div id="site-credits">
				<p><?php printf(__('All content &copy; %1$s by %2$s.','united'),date('Y'),__(get_bloginfo('name'))); ?> | <?php printf( __( 'Site by %1$s', 'united' ), '<a href="http://graphpaperpress.com/" rel="designer">Graph Paper Press</a>' ); ?></p>
			</div>
			<?php wp_nav_menu( 'sort_column=menu_order&menu_class=menu-footer&theme_location=footer' ); ?>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
	</div><!-- #main -->
	</div><!-- #page -->
	<div id="footer-wrap">
	<footer id="colophon" role="contentinfo">
	<?php if ( ! dynamic_sidebar( 'footer-widget-1' ) ) : ?>
	<?php endif; // end footer widget area ?>
	<aside class="widget facebook-like-box">
	
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	
	<div class="fb-like-box" data-href="http://www.facebook.com/unitedbmx" data-width="292" data-show-faces="false" data-stream="false" data-header="true"></div>
	</aside>
			
			<?php wp_nav_menu( 'sort_column=menu_order&menu_class=menu-footer1&theme_location=footer1' ); ?>
			<?php wp_nav_menu( 'sort_column=menu_order&menu_class=menu-footer2&theme_location=footer2' ); ?>
			<div id="site-credits">
				<p><?php printf(__('All content &copy; %1$s by %2$s.','united'),date('Y'),__(get_bloginfo('name'))); ?> | <?php printf( __( 'Site by %1$s', 'united' ), '<a href="http://graphpaperpress.com/" rel="designer">Graph Paper Press</a>' ); ?></p>
			</div>
			
	<div class="clear"></div>		
	</footer><!-- #colophon -->

	</div>


<?php wp_footer(); ?>

</body>
</html>
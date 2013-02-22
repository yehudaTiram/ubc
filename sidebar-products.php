		<div id="secondary" class="widget-area" role="complementary">
		
		<div class="product-list widget">
	  <h3>Select a product</h3>
		<?php wp_nav_menu( array( 'container_class' => 'menu-products', 'menu_class' => 'menu', 'theme_location' => 'products', 'link_after' => '<span>+</span>' ) ); ?>
		</div>
		
		<div class="product-list widget">
	  <h3>Select a product</h3>
	  <?php $types = get_terms('type', 'hide_empty=1'); ?>
	  <ul>
	    <?php foreach( $types as $type ) : ?>
	      <li>
	      	<h4 class="toggler"><?php echo $type->name; ?> <span>+</span></h4>
	        <ul class="hidden">
	          <?php
	            $wpq = array( 'post_type' => 'products', 'taxonomy' => 'type', 'term' => $type->slug, 'orderby' => 'menu_order' );
	            $type_posts = new WP_Query ($wpq);
	          ?>
	          <?php foreach( $type_posts->posts as $post ) : ?>
	            <li><a href="<?php echo get_permalink( $post->ID ); ?>"><?php echo $post->post_title; ?></a></li>
	          <?php endforeach ?>
	        </ul>
	      </li>
	    <?php endforeach ?>
	  </ul>
	  </div><!-- .product-list .widget -->
		</div><!-- #secondary .widget-area -->

		<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
		<div id="tertiary" class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'sidebar-2' ); ?>
		</div><!-- #tertiary .widget-area -->
		<?php endif; ?>
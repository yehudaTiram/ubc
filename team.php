		<div id="team" class="widget-area" role="complementary">
			<?php // wp_nav_menu( 'sort_column=menu_order&menu_class=menu-team&theme_location=team' ); ?>
			<div class="team-list widget">
		  <h3>The United Team</h3>
		  <?php $levels = get_terms('level'); ?>
		  <ul>
		    <?php foreach( $levels as $level ) : ?>
		      <li>
		      	<h4 class="toggler"><?php echo $level->name; ?> <span>+</span></h4>
		        <ul class="hidden">
		          <?php
		            $wplq = array( 'post_type' => 'team', 'taxonomy' => 'level', 'term' => $level->slug );
		            $level_posts = new WP_Query ($wplq);
		          ?>
		          <?php foreach( $level_posts->posts as $post ) : ?>
		            <li><a href="<?php echo get_permalink( $post->ID ); ?>"><?php echo $post->post_title; ?></a></li>
		          <?php endforeach ?>
		        </ul>
		      </li>
		    <?php endforeach ?>
		  </ul>
		  </div><!-- .team-list .widget -->
		</div><!-- #team .widget-area -->
<!-- Navigation bar -->
<div class="navbar navbar-inverse navbar-static-top" role="navigation">

	<!-- The header of the navigation bar -->
	<div class="row">
		<div class="navbar_header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only"><?php _e('Toggle navigation', 'napi'); ?></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>

			<div class="row">
				<!-- The name of the blog -->
				<a class="navbar-brand" href="<?php echo home_url(); ?>"><?php echo get_bloginfo('name'); ?></a>
				<?php if (get_bloginfo('description') != '') {
					echo '<p class="navbar-text">"' . get_bloginfo('description') . '"</p>';
				} ?>

				<!-- The search bar -->
				<?php get_template_part('navbar-searchform'); ?>
			</div>


			<!-- The header image if there's one specified -->
			<?php if (get_header_image() != ''): ?>
				<div class="row" id="header_image_div">
					<img class="img-responsive" src="<?php header_image(); ?>">
				</div>
			<?php endif; ?>


		</div>
	</div>

	<!-- The content of the navigation bar -->
	<div class="row">
		<div class="col-lg-11 col-lg-push-1">
			<?php
				//The array used to initialize the main menu
				$main_menu_params = array(
					'theme_location' => 'main_menu',  //The id of the menu
					'id' => 'main_navbar',
					'menu_class' => 'nav navbar-nav',  //The class of the menu
					'container' => 'div',  //The container of the menu
					'container_class' => 'collapse navbar-collapse',  //Its css class
					'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',  //The way to display the list
				);

				//Method to display it
				wp_nav_menu($main_menu_params);
			?>
		</div>
	</div>
</div>

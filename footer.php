<footer id="colophon" role="contentinfo" class="jumbotron" style="color: white; background-color: rgb(51,51,51);">
    <div class="container">
    	<?php
			//The array used to initialize the main menu
			$footer_menu_params = array(
				'theme_location' => 'footer_menu',  //The id of the menu
				'container' => '',  //The container of the menu
				'items_wrap' => '<div id="%1$s" class="%2$s">%3$s</div>',  //The way to display the list
				'menu_class' => '',
				'after' => ' | ',
				'menu_id' => 'footer_menu'
			);

			//Method to display it
			wp_nav_menu($footer_menu_params);
		?>
    	<?php _e('Proudly powered by', 'napi'); ?> <a href="http://wordpress.org" target="_blank">Wordpress</a>  |  
    	<?php _e('Theme', 'napi'); ?>: <a href="http://www.napi.fr/wordpress-theme-napi" target="_blank">Napi</a>
    </div>
</footer>
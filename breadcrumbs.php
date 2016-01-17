<div>
	<?php  //Breadcrumb navigation  (as seen at http://wpchannel.com/creer-fil-ariane-plugin-wordpress)
		echo '<ol class="breadcrumb">';  //Begins the breadcrumb

		//Display the first element: The home
		echo '<li><a title="' . get_bloginfo('name') . '" rel="nofollow" href="' . home_url() . '">' . __('Home', 'napi') . '</a></li>';

		//If it's a page, get all its ancestors
		if (is_page()) {
			$ancestors = get_post_ancestors($post);

			if ($ancestors) {
			$ancestors = array_reverse($ancestors);

				foreach ($ancestors as $crumb) {
					echo '<li><a href="' . get_permalink($crumb) . '">' . get_the_title($crumb) . '</a></li>';
				}
			}
		}

		//If single, just get the category and display it
		if (is_single()) {
			$category = get_the_category();
			echo '<li><a href="' . get_category_link($category[0]->cat_ID) . '">' . $category[0]->cat_name . '</a></li>';
		}

		//And the last one: the current page
		if (is_page() || is_single()) {
			echo '<li class="active">' . get_the_title() . '</li>';
		}

		//Close the breadcrumb
		echo '</ol>';
	?>
</div>
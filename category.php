<?php  //Display the header
	get_header();
?>

<body>
	<!-- All the page is contained here -->
	<div class="container">

		<?php  //Get the navigation bar
			get_template_part('navbar');
		?>

		<!-- Content of the pages -->
		<div id="content">
			<div class="row">

				<!-- The article part -->
				<div class="col-lg-9">

					<!-- Display the text of the category page -->
					<div class="page_title">
						<?php echo '<h1>' . single_cat_title(__('Category', 'napi') . ': <strong>', false) . '</strong></h1>'; ?>
					</div>

					<?php
						//Display posts if there are some
						if (have_posts()) {
							while (have_posts()) {
								//Increment the cursor on the posts
								the_post();

								//Put all the post in a box
								echo '<div class="box col-lg-10 col-lg-push-1 col-ls-pull-1">';

								//Display the title of the post
								the_title('<div class="page-header"><h1><a href="' . get_permalink() . '">', '</a>  ');

								//Display its categories
								echo napi_get_categories(get_the_category()) . '</h1>';

								//Display the author of the post
								echo '<small>' . __('Author', 'napi') . ': <a href="' . get_author_posts_url(get_the_author_meta('ID')) . '">' . get_the_author_link() . '</a> | ';

								//Chekc if the article was modified
								$modified_time = '';
								if (get_the_modified_time('jFYhis') != get_the_time('jFYhis'))
									$modified_time = ' - ' . __('Edited on the', 'napi') . ' ' . get_the_modified_time('j F Y') . ' ' . __('at', 'napi') . ' ' . get_the_modified_time('H:i');

								//Display time informations about the post
								echo __('Published on the', 'napi') . ' ' . get_the_time('j F Y') . ' ' . __('at', 'napi') . ' ' . get_the_time('H:i') . $modified_time;

								//Display the number of comments
								comments_number('', __(' | One comment', 'napi'), __(' | % comments', 'napi'));

								//Then close this line of informations
								echo '</small></div>';

								//If it has a thumbnail
								if (has_post_thumbnail()) {
									echo '<div class="thumbnail post_thumbnail">';
									the_post_thumbnail();
									echo '</div>';
								}

								//Display the article until the '<!--more-->' tag
								the_content(__('Read more', 'napi') . ' <span class="glyphicon glyphicon-arrow-right small"></span>');

								echo '</div>';  //Close the box
							}
						}
					?>
				</div>

				<!-- The widget on the right -->
				<nav class="col-lg-3">
					<?php dynamic_sidebar('right_sidebar'); ?>
				</nav>

			</div>
		</div>

		<?php  //Display the footer
			get_footer();
		?>

	</div>

	<?php  //Display the wp footer (admin bar is contained here)
		wp_footer();
	?>
</body>
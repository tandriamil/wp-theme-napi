<?php

//Display the breadcrumbs
echo get_template_part('breadcrumbs');

if (have_posts()) {
	//Increment the cursor on the posts
	the_post();

	//Display the title
	the_title('<div style="text-align: center;" class="page-header"><h1 style="color: #428bca;">', '</h1>');

	//Display the author of the post
	echo '<small>' . __('Author', 'napi') . ': <a href="' . get_author_posts_url(get_the_author_meta('ID')) . '">' . get_the_author_link() . '</a> | ';

	//Chekc if the article was modified
	$modified_time = '';
	if (get_the_modified_time('jFYhis') != get_the_time('jFYhis'))
		$modified_time = ' - ' . __('Edited on the', 'napi') . ' ' . get_the_modified_time('j F Y') . ' ' . __('at', 'napi') . ' ' . get_the_modified_time('h:i');

	//Display time informations about the post
	echo __('Published on the', 'napi') . ' ' . get_the_time('j F Y') . ' ' . __('at', 'napi') . ' ' . get_the_time('H:i') . $modified_time;

	//Display the number of comments
	comments_number('', __(' | One comment', 'napi'), __(' | % comments', 'napi'));

	//Display the tags
	the_tags('<br/>' . __('Tags:', 'napi') . ' ', ', ');

	//Then close this line of informations
	echo '</small></div>';

	//The post thumbnail
	if (has_post_thumbnail())
		echo '<div class="row"><div class="col-lg-push-2 col-lg-pull-2 col-lg-8"><div class="thumbnail">' . get_the_post_thumbnail($post->ID, 'full') . '</div></div></div>';

	//Display the post
	echo '<div class="row"><div class="col-lg-12">';
	the_content();
	echo '</div></div>';

	//Display the comment section
	echo '<div class="row"><div class="col-lg-12">';
	comments_template();
	echo '</div></div>';

	//Arguments for the pagination
	$wp_link_pages_args = array(
		'before' => '<ul class="pagination">',
		'after' => '</ul>',
		'next_or_number' => 'next'
	);

	//Display the pagination bar
	wp_link_pages($wp_link_pages_args);
}

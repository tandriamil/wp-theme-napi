<?php

//Here we'll add all the actions
add_action('wp_enqueue_scripts', 'napi_enqueue_bootstrap');  //For styles and js imports
add_action('init', 'napi_add_menus');  //The menus, there's only one here
add_action('widgets_init', 'napi_add_sidebar');  //The sidebar at the right
load_theme_textdomain('napi', get_template_directory() . '/languages');  //Load the languages files





/* ################################### The functions ################################### */

/**
 * Add the styles and bootstrap files to the header
 */
function napi_enqueue_bootstrap() {
	//Only one minified .css file
	wp_enqueue_style('napi-css', get_stylesheet_directory_uri() . '/css/napi.css');

	//Then the js one
	wp_enqueue_script('napi-js', get_stylesheet_directory_uri() . '/js/napi.js');

	//A script required by wordpress
	if (is_singular())
		wp_enqueue_script('comment-reply');
}


/**
 * Add the Napi theme's menu
 */
function napi_add_menus() {
	register_nav_menu('main_menu', __('Main menu', 'napi'));  //The id and the name
	register_nav_menu('footer_menu', __('Footer menu', 'napi'));  //The id and the name
}


/**
 * Add the Napi theme's right sidebar
 */
function napi_add_sidebar() {
	register_sidebar(array(
		'id' => 'right_sidebar',  //The id of the widget zone
		'name' => __('Right widgets', 'napi'),  //Its name
		'description' => __('The right widget sidebar.', 'napi'),  //A little description
		'before_widget' => '<div class="panel panel-primary">',
		'after_widget' => '</div></div>',
		'before_title' => '<div class="panel-heading">',
		'after_title' => '</div><div style="padding-left: 0;" class="panel-body">'
	));
}


/**
 * Get the categories of a post
 * @param $categories An array containing each categories of the post (get from get_the_category() function)
 * @return string An output to echo in the template
 */
function napi_get_categories($categories) {
	$separator = ' &gt; ';  //The separator
	$output = '';  //The final output

	//If there's at least one category in this
	if ($categories) {
		foreach ($categories as $category) {
			$output .= '<a style="font-size: medium;" href="' . get_category_link($category->term_id) . '" title="' . esc_attr(sprintf(__('View all posts in %s', 'napi'), $category->name )) . '">' . $category->cat_name . '</a>' . $separator;
		}
		return trim($output, $separator);
	}
}






/* ################################### Theme support ################################### */

//For some functions that this theme supports
add_theme_support('custom-header');
add_theme_support('post-thumbnails');
add_theme_support('automatic-feed-links');
set_post_thumbnail_size(150, 150);  //Set the size of the thumbnails post


/* ################################### Some definitions required by WordPress ################################### */
// The contact width
if (!isset($content_width))
	$content_width = 900;

?>

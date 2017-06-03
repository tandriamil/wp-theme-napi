<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<!-- Putting the wp header -->
	<?php wp_head(); ?>

	<!-- Declaration of the charset and some bootstrap parameters -->
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<?php if (is_home())
		echo '<meta name="description" content="Blog d\'un étudiant en Informatique, 
		passionné de nouvelles technologies et de l\'univers du web.
		Ici vous trouverez quelques astuces, mes projets informatiques ainsi que des avis sur des sites ou outils."/>';
	?>
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<!-- Here we'll specify the favicon used for our website -->
	<link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri() . '/img/favicon.png'; ?>" />

	<!-- The title of the page -->
	<title>
		<?php
			//If it's the home, we have another way of displaying it
			if (is_home())
				echo get_bloginfo('name') . ' | ' . get_bloginfo('description');
			else
				wp_title(get_bloginfo('name') . ' | ');
		?>
	</title>
</head>

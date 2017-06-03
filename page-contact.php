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
					<?php  //Display posts if there are some, without the comment section!
						if (have_posts()) {
							//Increment the cursor on the posts
							the_post();

							//Display the title
							the_title('<div style="text-align: center;" class="page-header"><h1 style="color: #428bca;">', '</h1></div>');

							//Display the post
							the_content();
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

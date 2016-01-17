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
					<?php  //Display posts if there is one
						get_template_part('display-single-post');
					?>
				</div>

				<!-- The widget on the right -->
				<div class="col-lg-3">
					<?php dynamic_sidebar('right_sidebar'); ?>
				</div>
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
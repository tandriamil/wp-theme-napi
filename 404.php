<?php  //Display the header
	get_header();
?>

<body>
	<!-- Content of the error page -->
	<div id="error">
		<h1>
			<?php _e('Oooops, the requested page wans\'t found.', 'napi'); ?>
		</h1>

		<p style="text-align: center;">
			<?php
				_e('You can try a research on the blog or go back to', 'napi');
				echo ' <a style="color: white; font-weight: bold;" href="javascript:history.back()">' . __('the previous page', 'napi') . '.</a>';
			?>
		</p>

		<form method="get" action="<?php echo esc_url(home_url('/')); ?>">
			<div class="input-group">
				<input type="text" name="s" class="form-control input-lg" placeholder="<?php _e('Research', 'napi'); ?>">
				<span class="input-group-btn">
					<button type="submit" class="btn btn-primary btn-lg" name="submit" value="<?php __('Research', 'napi'); ?>">
						<span class="glyphicon glyphicon-search"></span>
					</button>
				</span>
			</div>
		</form>
	</div>

	<?php  //Display the wp footer (admin bar is contained here)
		wp_footer();
	?>
</body>

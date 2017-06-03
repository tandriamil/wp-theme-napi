<form id="search_form" method="get" style="margin-left: 10px;" action="<?php echo esc_url(home_url('/')); ?>">
	<div class="input-group">
		<input type="text" name="s" class="input-sm form-control" placeholder="<?php _e('Research', 'napi'); ?>">
		<span class="input-group-btn">
			<button type="submit" class="btn btn-primary btn-sm" name="submit" value="<?php __('Research', 'napi'); ?>">
				<span class="glyphicon glyphicon-search"></span>
			</button>
		</span>
	</div>
</form>

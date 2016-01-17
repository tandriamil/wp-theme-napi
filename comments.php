<div id="comment-section">
	<?php  //Display the comment_form
		//Some options that we'll need here
		$commenter = wp_get_current_commenter();
		$req = get_option('require_name_email');
		$aria_req = ($req ? ' aria-required="true" required="true"' : '');

		//The text before the comment form
		$required_text = __('Required fields are marked with * .', 'napi');
		$comment_notes_before = '<div style="margin: 5px;" class="row"><div class="col-lg-10 col-lg-push-1 col-lg-pull-1"><div id="comment_info">' . __('Your email address will not be published.', 'napi') . ' ' . ($req ? $required_text : '') . ' <br/>' . __('You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes:', 'napi') . ' <code>' . allowed_tags() . '</code></div></div></div>';

		//The fields of the comment form
		$fields = array(
			'author' => '<div style="margin: 5px; margin-top: 20px;" class="row"><div class="col-lg-6 col-lg-push-3 col-lg-pull-3"><div class="input-group"><span class="input-group-addon glyphicon glyphicon-user"></span><input class="form-control" id="author" name="author" type="text" placeholder="' . __('Name', 'napi') . ($req ? ' *' : '' ) . '" value="' . esc_attr($commenter['comment_author']) . '" ' . $aria_req . ' /></div></div></div>',
			'email' => '<div style="margin: 5px;" class="row"><div class="col-lg-6 col-lg-push-3 col-lg-pull-3"><div class="input-group"><span class="input-group-addon">@</span><input class="form-control" id="email" name="email" type="text" placeholder="' . __('Email', 'napi') . ($req ? ' *' : '' ) . '" value="' . esc_attr($commenter['comment_author_email']) . '" ' . $aria_req . ' /></div></div></div>',
			'url' => '<div style="margin: 5px;" class="row"><div class="col-lg-6 col-lg-push-3 col-lg-pull-3"><div class="input-group"><span class="input-group-addon glyphicon glyphicon-globe"></span><input class="form-control" id="url" name="url" type="text" placeholder="' . __('Website', 'napi') . '" value="' . esc_attr($commenter['comment_author_url']) . '"/></div></div></div>'
		);

		//The comment field
		$comment_field = '<div style="margin: 5px;" class="row"><div class="col-lg-6 col-lg-push-3 col-lg-pull-3"><label for="comment">' . __('Comment', 'napi') . ':</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true">' . '</textarea></div></div>';

		//Put it in the arguments of the comment_form method
		$comment_form_args = array(
			'comment_notes_before' => $comment_notes_before,
			'comment_notes_after' => '',
			'fields' => $fields,
			'comment_field' => $comment_field,
			'id_submit' => 'comment-submit'
		);

		//Then run the method with those arguments
		comment_form($comment_form_args);
	?>
</div>


<div id="comments">
	<?php if ($comments) {  //If there are some comments ?>
		<h3>
			<?php _e('Comments', 'napi'); ?>
		</h3>
		<ol>
			<?php foreach ($comments as $comment) : //Comment loop start ?>
				<div class="media" <?php if (isset($oddcomment)) { echo $oddcomment; } ?>>
					<a class="pull-left">
						<?php echo get_avatar($comment, 96); ?>
					</a>
					<div class="media-body">
						<h4 class="media-heading">
							<small>
								<?php echo __('On the ', 'napi') . ' ' . get_comment_date('j F Y') . ' ' . __('at', 'napi') . ' ' . get_comment_date('H:i') . ', ' . get_comment_author() . ' ' . __('said', 'napi') . ' : '; ?> 
								<?php edit_comment_link(__('Edit', 'napi')); ?>
							</small>
						</h4>
						<?php comment_text(); ?>
					</div>
				</div>
			<?php endforeach;  //End of comment loop ?>
		</ol>
	<?php }  //Close the if there are comments ?>


	<?php if ($post->comment_status != 'open') {  //If comments are closed ?>
		<p>
			<?php _e('Comments are closed.', 'napi'); ?>
		</p>
	<?php } ?>

	<?php  //The comments pagination
		paginate_comments_links();
	?>
</div>
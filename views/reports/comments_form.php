<!-- start submit comments block -->
<div class="comment-block">
	
	<h4><?php echo Kohana::lang('ui_main.leave_a_comment');?></h4>
	<?php
	if ($form_error)
	{
		?>
		<!-- red-box -->
		<div class="red-box">
			<h4><?php echo Kohana::lang('ui_main.error');?></h4>
			<ul>
				<?php
					foreach ($errors as $error_item => $error_description)
					{
						print (!$error_description) ? '' : "<li>" . $error_description . "</li>";
					}
				?>
			</ul>
		</div>
		<?php
	}
	?>
	<?php print form::open(NULL, array('id' => 'commentForm', 'name' => 'commentForm')); ?>
	<?php
	if ( ! $user)
	{
		?>
		<div class="report_row row collapse">
			<div class="large-2 columns"><span class="prefix"><?php echo Kohana::lang('ui_main.name');?>:</span></div>
			<div class="large-10 columns"><?php print form::input('comment_author', $form['comment_author'], ' class="text"'); ?></div>	
		</div>

		<div class="report_row row collapse">
			<div class="large-2 columns"><span class="prefix"><?php echo Kohana::lang('ui_main.email'); ?>:</span></div>
			<div class="large-10 columns"><?php print form::input('comment_email', $form['comment_email'], ' class="text"'); ?></div>
		</div>
		<?php
	}
	else
	{
		?>
		<div class="report_row row">
			<div class="large-12 columns"><p><strong><?php echo $user->name; ?></strong></p></div>
		</div>
		<?php
	}
	?>
	<div class="report_row row collapse">
		<div class="large-4 columns"><span class="prefix"><?php echo Kohana::lang('ui_main.comments'); ?>:</span></div>
		<div class="large-8 columns"><?php print form::textarea('comment_description', $form['comment_description'], ' rows="4" cols="40" class="textarea" ') ?></div>
	</div>
	<div class="report_row row collapse">
		<div class="large-4 columns">
			<span class="prefix"><?php echo Kohana::lang('ui_main.security_code'); ?>: <?php print $captcha->render(); ?></span>
		</div>
		<div class="large-8 columns"><?php print form::input('captcha', $form['captcha'], ' class="text"'); ?></div>
	</div>
	<?php
	// Action::comments_form - Runs right before the end of the comment submit form
	Event::run('ushahidi_action.comment_form');
	?>
	<div class="report_row">
		<input name="submit" type="submit" value="<?php echo Kohana::lang('ui_main.reports_btn_submit'); ?> <?php echo Kohana::lang('ui_main.comment'); ?>" class="button expand" />
	</div>
	<?php print form::close(); ?>
	
</div>
<!-- end submit comments block -->
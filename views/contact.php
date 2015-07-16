<div id="content" class="row">
	<!-- start contacts block -->
	<div class="large-12 columns">
		<h3><?php echo Kohana::lang('ui_main.contact'); ?></h3>
		<div id="contact_us" class="contact">
			<?php
			if ($form_error)
			{
				?>
				<!-- red-box -->
				<div class="red-box">
					<h4>Error!</h4>
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

			if ($form_sent)
			{
				?>
				<!-- green-box -->
				<div class="green-box">
					<h4><?php echo Kohana::lang('ui_main.contact_message_has_send'); ?></h4>
				</div>
				<?php
			}								
			?>
			<?php print form::open(NULL, array('id' => 'contactForm', 'name' => 'contactForm')); ?>
			<div class="report_row">
				<h5><?php echo Kohana::lang('ui_main.contact_name'); ?>:</h5>
				<?php print form::input('contact_name', $form['contact_name'], ' class="text"'); ?>
			</div>
			<div class="report_row">
				<h5><?php echo Kohana::lang('ui_main.contact_email'); ?>:</h5>
				<?php print form::input('contact_email', $form['contact_email'], ' class="text"'); ?>
			</div>
			<div class="report_row">
				<h5><?php echo Kohana::lang('ui_main.contact_phone'); ?>:</h5>
				<?php print form::input('contact_phone', $form['contact_phone'], ' class="text"'); ?>
			</div>
			<div class="report_row">
				<h5><?php echo Kohana::lang('ui_main.contact_subject'); ?>:</h5>
				<?php print form::input('contact_subject', $form['contact_subject'], ' class="text"'); ?>
			</div>								
			<div class="report_row">
				<h5><?php echo Kohana::lang('ui_main.contact_message'); ?>:</h5>
				<?php print form::textarea('contact_message', $form['contact_message'], ' rows="4" cols="40" class="textarea long" ') ?>
			</div>		
			<div class="report_row row collapse">
				<h5><?php echo Kohana::lang('ui_main.contact_code'); ?>:</h5>
				<div class="large-4 columns">
					<span class="prefix"><strong><?php print $captcha->render(); ?></strong></span>
				</div>
				<div class="large-8 columns">
					<?php print form::input('captcha', $form['captcha'], ' class="text"'); ?>
				</div>
			</div>
			<div class="report_row">
				<input name="submit" type="submit" value="<?php echo Kohana::lang('ui_main.contact_send'); ?>" class="btn_submit button success expand" />
			</div>
			<?php print form::close(); ?>
		</div>
		
	</div>
	<!-- end contacts block -->
</div>
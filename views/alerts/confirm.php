<div id="content" class="row">
	<!-- start block -->
	<div class="large-12 columns">
		<h3><?php echo Kohana::lang('ui_main.alerts_get') ?></h3>
		
		<?php if($show_mobile == TRUE): ?>
		<!-- Mobile Alert -->
		<div class="green-box">
			<?php if ($alert_mobile): ?>
			<?php	echo "<h4>".Kohana::lang('alerts.mobile_ok_head')."</h4>"; ?>
			<?php endif; ?>
			<div class="alert_response">
				<?php 
				if ($alert_mobile)
				{
					echo Kohana::lang('alerts.mobile_alert_request_created')."<u><strong>".
						$alert_mobile."</strong></u>.".
						Kohana::lang('alerts.verify_code');
				}
				?>
				<div class="alert_confirm">
					<p><?php echo Kohana::lang('alerts.mobile_code'); ?></p>
					<?php 
					print form::open('/alerts/verify');
					print "Verification Code:<BR>".form::input('alert_code', '', ' class="text"')."<BR>";
					print "Mobile Phone:<BR>".form::input('alert_mobile', $alert_mobile, ' class="text"')."<BR>";
					print form::submit('button', 'Confirm My Alert Request', ' class="btn_submit"');
					print form::close();
					?>
				</div>
			</div>
		</div>
		<!-- / Mobile Alert -->
		<?php endif; ?>
		
		<!-- Email Alert -->
		<div class="green-box">
			<?php
			if ($alert_email)
			{
				echo "<h3>".Kohana::lang('alerts.email_ok_head')."</h3>";
			}
			?>
			
			<div class="alert_response">
				<?php 
				if ($alert_email)
				{
					echo Kohana::lang('alerts.email_alert_request_created')."<u><strong>".
						$alert_email."</strong></u>.".
						Kohana::lang('alerts.verify_code');
				}
				?>
				<div class="alert_confirm">
					<p><?php echo Kohana::lang('alerts.email_code'); ?></p>
					<?php 
					print form::open('/alerts/verify');
					print "Verification Code:<BR>".form::input('alert_code', '', ' class="text"')."<BR>";
					print "Email Address:<BR>".form::input('alert_email', $alert_email, ' class="text"')."<BR>";
					print form::submit('button', 'Confirm My Alert Request', ' class="btn_submit button success expand"');
					print form::close();
					?>
				</div>
			</div>
		</div>
		<!-- / Email Alert -->
		
		
		<!-- Return -->
		<div class="green-box">
			<div class="alert_response text-center">
				<a href="<?php echo url::site().'alerts'?>"><?php echo Kohana::lang('alerts.create_more_alerts'); ?></a>
			</div>
		</div>
		<!-- / Return -->
		
	</div>
	<!-- end block -->
</div>

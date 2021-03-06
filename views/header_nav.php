<!-- Right Nav Section -->
<ul class="right">
	<li class="has-dropdown">
	<?php if($loggedin_user != FALSE){ ?>

		<a href="<?php echo url::site().$loggedin_role;?>">
			<?php echo html::escape($loggedin_user->username); ?>
			<img alt="<?php echo html::escape($loggedin_user->username); ?>" src="<?php echo html::escape(members::gravatar($loggedin_user->email, 20)); ?>" width="20" />
		</a>

		<ul class="dropdown">
		<?php if($loggedin_role != ""){ ?>
			<li><a href="<?php echo url::site().$loggedin_role;?>/profile"><?php echo Kohana::lang('ui_main.manage_your_account'); ?></a></li>

			<li><a href="<?php echo url::site().$loggedin_role;?>"><?php echo Kohana::lang('ui_main.your_dashboard'); ?></a></li>
		<?php } ?>
			<li><a href="<?php echo url::site();?>profile/user/<?php echo $loggedin_user->username; ?>"><?php echo Kohana::lang('ui_main.view_public_profile'); ?></a></li>

			<li><a href="<?php echo url::site();?>logout"><em><?php echo Kohana::lang('ui_admin.logout');?></em></a></li>

		</ul>

	<?php } else { ?>

		<a href="<?php echo url::site('login');?>"><?php echo Kohana::lang('ui_main.login'); ?></a>
		
		<ul class="dropdown">
			<li>
				<a class="overform">
					<?php echo form::open('login/', array('id' => 'userpass_form')); ?>
					<div class="row">
						<div class="large-12 columns">
							<input type="hidden" name="action" value="signin" />
							<label for="username"><?php echo Kohana::lang('ui_main.email');?></label><input type="text" name="username" id="username" class="" />
						</div>
					</div>
					<div class="row">
						<div class="large-12 columns">								
							<label for="password"><?php echo Kohana::lang('ui_main.password');?></label><input name="password" type="password" class="" id="password" size="20" />
							<input type="submit" name="submit" value="<?php echo Kohana::lang('ui_main.login'); ?>" class="small button" />
						</div>
					</div>
					<?php echo form::close(); ?>
				</a>
			</li>
			<li class="divider"></li>
			<li>
				<a href="<?php echo url::site()."login/?newaccount";?>"><?php echo Kohana::lang('ui_main.login_signup_click'); ?></a>
			</li>
			<li>
				<a onclick="return false">
					<?php echo Kohana::lang('ui_main.forgot_password');?>
					<?php echo form::open('login/', array('id' => 'header_nav_userforgot_form')); ?>
					<input type="hidden" name="action" value="forgot" />
					<label for="resetemail"><?php echo Kohana::lang('ui_main.registered_email');?></label>
					<input type="text" id="resetemail" name="resetemail" value="" />
					<input type="submit" name="submit" value="<?php echo Kohana::lang('ui_main.reset_password'); ?>" />
					<?php echo form::close(); ?>
				</a>
			</li>
		</ul>

	<?php } ?>						
	</li>
</ul>
<?php Event::run('ushahidi_action.header_nav_bar'); ?>
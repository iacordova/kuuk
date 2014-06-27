<div class="row">
	<div class="large-12 columns">
		<nav class="top-bar" data-topbar>
			<ul class="title-area">
				<li class="name"><a href="<?php echo url::site();?>"><?php echo $site_name; ?></a></li>
			</ul>
			<section class="top-bar-section">
				<ul class="right">
					<li class="has-dropdown">
					<?php if($loggedin_user != FALSE){ ?>

						<a href="<?php echo url::site().$loggedin_role;?>">
							<span class="header_nav_label"><?php echo html::escape($loggedin_user->username); ?></span>
							<img alt="<?php echo html::escape($loggedin_user->username); ?>" src="<?php echo html::escape(members::gravatar($loggedin_user->email, 20)); ?>" width="20" />
						</a>

						<ul class="header_nav_dropdown" style="display:none;">
						<?php if($loggedin_role != ""){ ?>
							<li><a href="<?php echo url::site().$loggedin_role;?>/profile"><?php echo Kohana::lang('ui_main.manage_your_account'); ?></a></li>

							<li><a href="<?php echo url::site().$loggedin_role;?>"><?php echo Kohana::lang('ui_main.your_dashboard'); ?></a></li>
						<?php } ?>
							<li><a href="<?php echo url::site();?>profile/user/<?php echo $loggedin_user->username; ?>"><?php echo Kohana::lang('ui_main.view_public_profile'); ?></a></li>

							<li><a href="<?php echo url::site();?>logout"><em><?php echo Kohana::lang('ui_admin.logout');?></em></a></li>

						</ul>

					<?php } else { ?>

						<a href="<?php echo url::site('login');?>" style="float:right;padding-top:8px;"><span class="header_nav_label"><strong><?php echo Kohana::lang('ui_main.login'); ?></strong></span></a>
						
						<div class="header_nav_dropdown" style="display:none;">
							<?php echo form::open('login/', array('id' => 'userpass_form')); ?>
							<input type="hidden" name="action" value="signin" />
				
							<ul>
								<li><label for="username"><?php echo Kohana::lang('ui_main.email');?></label><input type="text" name="username" id="username" class="" /></li>
				
								<li><label for="password"><?php echo Kohana::lang('ui_main.password');?></label><input name="password" type="password" class="" id="password" size="20" /></li>
				
								<li><input type="submit" name="submit" value="<?php echo Kohana::lang('ui_main.login'); ?>" class="header_nav_login_btn" /></li>
							</ul>
							<?php echo form::close(); ?>
							
							<ul>
				
								<li><a href="<?php echo url::site()."login/?newaccount";?>"><?php echo Kohana::lang('ui_main.login_signup_click'); ?></a></li>
				
								<li><a href="#" id="header_nav_forgot" onclick="return false"><?php echo Kohana::lang('ui_main.forgot_password');?></a>
									<?php echo form::open('login/', array('id' => 'header_nav_userforgot_form')); ?>
									<input type="hidden" name="action" value="forgot" />
									<label for="resetemail"><?php echo Kohana::lang('ui_main.registered_email');?></label>
									<input type="text" id="resetemail" name="resetemail" value="" />
				
									<input type="submit" name="submit" value="<?php echo Kohana::lang('ui_main.reset_password'); ?>" class="header_nav_login_btn" />
									<?php echo form::close(); ?>
				
								</li>
							</ul>
						</div>

					<?php } ?>						
					</li>
				</ul>
				<?php Event::run('ushahidi_action.header_nav_bar'); ?>
				<ul class="left">
				<?php
					// Action::header_nav - Add items to header nav area
					Event::run('ushahidi_action.header_nav');
				?>
				</ul>
			</section>
		</nav>
	</div><!-- / large-12 columns -->
</div><!--  / row -->
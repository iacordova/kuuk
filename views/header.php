<!doctype html>
<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->
<html class="no-js" lang="en" >

<head>
	<title><?php echo html::specialchars($page_title.$site_name); ?></title>
 	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php echo $header_block; ?>
	<?php
	// Action::header_scripts - Additional Inline Scripts from Plugins
	Event::run('ushahidi_action.header_scripts');
	?>

</head>

<?php
  // Add a class to the body tag according to the page URI

  // we're on the home page
  if (count($uri_segments) == 0)
  {
  	$body_class = "page-main";
  }
  // 1st tier pages
  elseif (count($uri_segments) == 1)
  {
    $body_class = "page-".$uri_segments[0];
  }
  // 2nd tier pages... ie "/reports/submit"
  elseif (count($uri_segments) >= 2)
  {
    $body_class = "page-".$uri_segments[0]."-".$uri_segments[1];
  }
?>

<body id="page" class="<?php echo $body_class; ?>">

	<!-- Header Nav -->
	<div class="row">
		<div class="large-12 columns">

			<div class="fixed">

				<nav class="top-bar" data-topbar="">

					<ul class="title-area">
						<li class="name"><h1><a href="<?php echo url::site();?>"><?php echo $site_name; ?></a></h1></li>
						<!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
		    			<li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
					</ul><!-- / title-area -->

					<section class="top-bar-section">
						
						<?php echo $header_nav; ?>
						
						<!-- Left Nav Section -->
					
						<ul class="left">
							<!-- searchform -->
							<li class="has-form">
								<?php echo form::open("search", array('method' => 'get', 'id' => 'site-search')); ?>
								<div class="row collapse"> 
									<div class="large-12 columns"> 
										<input id="inputIcon" type="text" name="k" value="" placeholder="<?php echo Kohana::lang('ui_main.search'); ?>">
									</div> 
								</div> 
								<?php form::close(); ?>
							</li>
							<!-- / searchform -->

							<li class="divider"></li>
							
							<!-- Main Tabs -->
							<?php nav::main_tabs($this_page); ?>
							
							<?php
								// Action::header_nav - Add items to header nav area
								Event::run('ushahidi_action.header_nav');
							?>
						</ul>
					</section><!-- / top-bar-section -->

				</nav>
			
			</div><!-- / fixed -->
		</div><!-- / large-12 columns -->
	</div><!--  / row -->

	<!-- wrapper -->
	<div class="row">

		<div class="large-12 columns">

			<!-- header -->
			<div id="header">

				
				<div class="row">

					<!-- logo -->
					<div class="large-8 columns">

						<?php if ($banner == NULL): ?>
							<h1><a href="<?php echo url::site();?>"><?php echo $site_name; ?></a></h1>
							<span><?php echo $site_tagline; ?></span>
						<?php else: ?>
							<a href="<?php echo url::site();?>"><img src="<?php echo $banner; ?>" alt="<?php echo $site_name; ?>" /></a>
						<?php endif; ?>

					</div>
					<!-- / logo -->

					<div class="large-4 columns">

						<div class="row">
							<div class="large-12 columns">
								<!-- languages -->
								<?php echo $languages;?>
								<!-- / languages -->
								<!-- submit incident -->
								<a class="button success right" href="<?php echo url::site(); ?>/reports/submit/"><?php echo Kohana::lang('ui_main.submit'); ?></a>
								<!-- / submit incident -->
							</div>

						</div>
						<!-- / row -->

					</div>

				</div>
				<!-- / row -->

			</div>
			<!-- / header -->
	        <!-- / header item for plugins -->
	        <?php
	            // Action::header_item - Additional items to be added by plugins
		        Event::run('ushahidi_action.header_item');
	        ?>

		</div>
		<!-- / large-12 columns -->

		<!-- main body -->
		<div class="row">
			<div class="large-12 columns">

				<!-- mainmenu -->
				<div id="mainmenu" class="clearingfix">
					<ul>
						<?php nav::main_tabs($this_page); ?>
					</ul>

					<?php if ($allow_feed == 1) { ?>
					<div class="feedicon"><a href="<?php echo url::site(); ?>feed/"><img alt="<?php echo html::escape(Kohana::lang('ui_main.rss')); ?>" src="<?php echo url::file_loc('img'); ?>media/img/icon-feed.png" style="vertical-align: middle;" border="0" /></a></div>
					<?php } ?>

				</div>
				<!-- / mainmenu -->

<!DOCTYPE html>
<html lang="vi">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" href="<?php bloginfo('template_directory'); ?>/favicon.png">
		<link href="https://fonts.googleapis.com/css?family=Francois+One" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/css/style.min.css">
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/style.css">
		<?php wp_head(); ?>
	</head>
	<body>
		<div class="wrapper">
			<header class="fv-header">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
							<h1 style="display: none;"><?php bloginfo( 'name' ); ?></h1>
							<div class="logo"><a href="<?php bloginfo( 'url' ); ?>"><img src="<?php the_field( "logo", 82 ); ?>" alt="<?php bloginfo( 'name' ); ?>"></a></div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
							<div class="menu-top">
								<?php wp_nav_menu( array( 'theme_location' => 'main_nav', 'container' => 'false', 'menu_id' => 'main-nav', 'menu_class' => 'menu') ); ?>
								<div class="clear"></div>
							</div>
						</div>
					</div>
				</div>
			</header>
			<?php if(!is_home()){ ?>
			<div class="bar_breadcrumb">
				<div class="container">
					<?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs"><i class="fa fa-home"></i> ','</p>');} ?>
				</div>
			</div>
			<?php } ?>
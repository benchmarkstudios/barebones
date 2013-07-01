<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0" />
		<meta name="HandheldFriendly" content="true" />
		<title><?php wp_title( ' &ndash; ', true, 'right' ); bloginfo( 'name' ); ?></title>
		<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
		<?php wp_head(); ?>
		<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<script src="<?php bloginfo( 'template_url' ); ?>/_/js/libs/respond.min.js"></script>
		<![endif]-->
	</head>
	<body <?php body_class(); ?>>
		<header class="header" role="banner">
			<div class="container">
				<a href="<?php echo site_url(); ?>"><img src="<?php header_image(); ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>
				<nav role="navigation">
					<ul class="nav">
						<?php wp_list_pages( 'title_li=' ); ?>
					</ul>
				</nav>
			</div>
		</header>
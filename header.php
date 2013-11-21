<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0">
		<meta name="HandheldFriendly" content="true">
		<!--[if IE ]>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
                <![endif]-->
		<title><?php wp_title( ' / ', true, 'right' ); bloginfo( 'name' ); ?></title>
		<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>">
		<?php wp_head(); ?>
		<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>
	<body <?php body_class(); ?>>
		<header class="header" role="banner">
			<div class="container">
				<nav role="navigation">
					<ul class="nav">
						<?php wp_list_pages( 'title_li=' ); ?>
					</ul>
				</nav>
			</div>
		</header>

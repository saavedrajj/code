<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>My Blog</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url')?>">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url')?>/css/normalize.css">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url')?>/css/responsive.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>	
	<script src="<?php bloginfo('template_url')?>/js/jquery.slides.min.js"></script>﻿	
	<script>
		$(function(){
			$("#slideshow").slidesjs({
				height: 300,
				navigation:false
			});
		});
	</script>
	<?php wp_head(); ?>
</head>
<body>
	<header>
		<div id="logo"><p>MyBlog</p><span>Juan Saavedra</span></div>




		<nav>
			<?php wp_nav_menu(
				array(
					'container'=>false,
					'items_wrap' => '<ul id="menu-top">%3$s</ul>',
					'theme_location' => 'menu'
					));?>
		</nav>
	</header>
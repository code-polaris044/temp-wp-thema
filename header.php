
<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<?php if (is_home() || is_front_page()) : ?>
		<meta name="description" content="<?php bloginfo('description'); ?>">
	<?php endif; ?>
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
	<meta name="format-detection" content="email=no,telephone=no,address=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<?php wp_head(); ?>
</head>
<?php get_header(); ?>

<body <?php body_class(); ?> id="id-<?php esc_attr(the_ID()); ?>">
	<?php wp_body_open(); ?>
	<div class="wrapper">
		<div id="loading" class="loading">
			<div class="loading__spinner">
				<span class="loading__title">LOADING</span>
				<span class="loading__circle1 loading__circle"></span>
				<span class="loading__circle2 loading__circle"></span>
				<span class="loading__circle3 loading__circle"></span>
			</div>
		</div>

		<header id="l-header" class="l-header">
			<div class="l-headerWrap">
				<div class="l-header__leftWrap">
					<div class="l-logo">
						<a href="<?php echo esc_url(home_url()); ?>/">
							<picture class="l-logo__picture">
								<source type="image/avif" srcset="<?php echo esc_url(get_template_directory_uri()); ?>/dist/images/common/logo.avif">
								<source type="image/webp" srcset="<?php echo esc_url(get_template_directory_uri()); ?>/dist/images/common/logo.webp">
								<img src="<?php echo esc_url(get_template_directory_uri()); ?>/dist/images/common/logo.png" alt="ロゴ">
							</picture>
						</a>
					</div>
					<div class="l-githubWrap">
						<a href="https://github.com/code-polaris044" target="_blank" rel="noopener noreferrer" class="l-github__link">
							<i class="fa-brands fa-github"></i>
						</a>
					</div>
				</div>
				<nav id="l-header__nav" class="l-header__nav">
					<div class="l-header__navWrap">
						<div class="l-hamburger">
							<span></span>
							<span></span>
							<span></span>
						</div>
						<?php
						wp_nav_menu(array(
							'menu' => 'menu',
							'menu_class' => 'l-menu',
						));
						?>
						<?php
						wp_nav_menu(array(
							'menu' => 'menu',
							'menu_class' => 'l-sp__menu',
						));
						?>
					</div>
				</nav>
			</div>
		</header>

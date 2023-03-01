<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package c-eight.com
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<!-- Google Tag Manager -->
	<script>
		(function(w, d, s, l, i) {
			w[l] = w[l] || [];
			w[l].push({
				'gtm.start': new Date().getTime(),
				event: 'gtm.js'
			});
			var f = d.getElementsByTagName(s)[0],
				j = d.createElement(s),
				dl = l != 'dataLayer' ? '&l=' + l : '';
			j.async = true;
			j.src =
				'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
			f.parentNode.insertBefore(j, f);
		})(window, document, 'script', 'dataLayer', 'GTM-PCVFFGM');
	</script>
	<!-- End Google Tag Manager -->
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PCVFFGM" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'whitebase'); ?></a>

		<header id="masthead" class="site-header">
			<div class="site-branding">
				<?php
				if (is_front_page() || is_home()) :
				?>
					<h1 class="site-title"><?php the_custom_logo(); ?></h1>
				<?php
				else :
				?>
					<p class="site-title"><?php the_custom_logo(); ?></p>
				<?php
				endif; ?>
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation">
				<input type="checkbox" id="menu-btn-check">
				<label for="menu-btn-check" class="menu-btn"><span class="icon"><span></span><span></span><span></span></span><span class="text"></span></label>
				<div class="menu-content">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'header-menu-pc',
							'menu_id'        => 'header-menu-pc',
							'container_class' => 'header-menu-pc-container mq-dn-down-md',
						)
					);
					?>
					<div class="header-menu-sp-container mq-dn-up-md">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'header-menu-sp',
								'menu_id'        => 'header-menu-sp',
								'container' => false,
							)
						);
						?>
						<?php if (is_active_sidebar('sp-menu-contact')) : ?>
							<div class="menu-contact">
								<?php dynamic_sidebar('sp-menu-contact'); ?>
							</div>
						<?php endif; ?>
						<?php get_template_part('template-parts/sns', null, ['class' => 'sp-menu-sns']); ?>
						<label for="menu-btn-check" class="menu-close"></label>

					</div>
				</div>
			</nav><!-- #site-navigation -->

			<div class="contact-navigation">
				<a href="#footer-cta" data-desc="CONTACT"><span class="text">お問い合わせ</span></a>
			</div><!-- /.contact-navigation -->
		</header><!-- #masthead -->

		<?php if (function_exists('bcn_display') && !is_front_page() && !is_page(array('contact', 'contact-company', 'thanks')) && !is_404()) : ?>
			<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
				<div class="container">
					<?php bcn_display(); ?>
				</div>
			</div>
		<?php endif; ?>
<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package c-eight.com
 */

get_header();
?>

<main id="primary" class="site-main">

	<section class="error-404 not-found">
		<div class="container">
			<header class="page-header">
				<h1 class="page-title" data-desc="NOT FOUND">404</h1>
			</header><!-- .page-header -->

			<div class="page-content">
				<p>あなたのプレーは失敗に終わりました。<br>
					もう一度やり直すチャンスがあります。<br>
					リクエストしますか？</p>
			</div>


			<div class="error-buttons wp-block-buttons container">
				<div class="wp-block-button is-style-parallelogram">
					<a href="<?php echo esc_url(home_url('/')); ?>" class="wp-block-button__link has-text-main-background-color wp-element-button"><strong>Not. Start again.</strong></a>
				</div>
			</div>
		</div><!-- .page-content -->
	</section><!-- .error-404 -->

</main><!-- #main -->

<?php
get_footer();

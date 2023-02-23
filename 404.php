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
				<h1 class="page-title">お探しのページは見つかりませんでした。</h1>
			</header><!-- .page-header -->

			<div class="page-content">
				<p>サイト更新などによってURLが変更になったか、URLが正しく入力されていない可能性があります。<br>
					ブラウザの再読込を行ってもこのページが表示される場合は、トップページからお探し下さい。</p>
			</div>
		</div><!-- .page-content -->
	</section><!-- .error-404 -->

</main><!-- #main -->

<?php
get_footer();

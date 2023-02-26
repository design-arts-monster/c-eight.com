<?php

/**
 * お問い合わせ系
 *
 * @package c-eight.com
 */

$data_desc = 'CONTACT';
if (is_page('thanks')) {
	$data_desc = 'THANKS';
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('content-contact'); ?>>
	<div class="container">

		<header class="entry-header">
			<?php the_title('<h1 class="entry-title" data-desc="' . $data_desc . '">', '</h1>'); ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php
			the_content();

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__('Pages:', 'whitebase'),
					'after'  => '</div>',
				)
			);
			?>
		</div><!-- .entry-content -->

		<?php if (get_edit_post_link()) : ?>
			<footer class="entry-footer">
				<?php
				edit_post_link(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__('Edit <span class="screen-reader-text">%s</span>', 'whitebase'),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						wp_kses_post(get_the_title())
					),
					'<span class="edit-link">',
					'</span>'
				);
				?>
			</footer><!-- .entry-footer -->
		<?php endif; ?>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
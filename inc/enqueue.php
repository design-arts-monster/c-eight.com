<?php

/**
 * Enqueue scripts and styles.
 */
function whitebase_scripts() {
	wp_enqueue_style('whitebase-style', get_stylesheet_uri(), array(), _C_EIGHT_VERSION);
	wp_style_add_data('whitebase-style', 'rtl', 'replace');

	wp_enqueue_script('slick', get_template_directory_uri() . '/js/script.min.js', array(), _C_EIGHT_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'whitebase_scripts');

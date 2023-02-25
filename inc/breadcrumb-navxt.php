<?php

/**
 * Breacrumb navXT のトップページの表記を書き換える
 * @see https://nskw-style.com/2015/wordpress/filtering-breacrumb-navxt-home-title.html
 */
add_filter('bcn_breadcrumb_title', 'nskw_bcn_breadcrumb_title_filter', 10, 2);
function nskw_bcn_breadcrumb_title_filter($title, $type = null) {

	if ('home' === $type[0]) {
		$title = 'TOP';
	}

	return $title;
}

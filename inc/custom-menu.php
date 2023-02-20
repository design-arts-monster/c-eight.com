<?php

/**
 * whitebase Theme Customizer
 *
 * @package c-eight.com
 */

/**
 * カスタムメニューの「説明」を使って英語表記を追加する
 * @see https://codeisle.info/blog/545/
 */
function edit_menu_link($atts, $item) {
	// メニュー項目が「説明」を持っている場合
	if (!empty($item->description)) {
		// リンクにdata-desc属性を追加する
		$atts['data-desc'] = $item->description;
	}
	return $atts;
}
add_filter('nav_menu_link_attributes', 'edit_menu_link', 10, 2);

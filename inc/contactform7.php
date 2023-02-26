<?php

/**
 * ContactForm7に項目を追加
 * @see https://senoweb.jp/note/contactform7-checkbox/
 */
//Contact Form 7 のカスタマイズ
function filter_wpcf7_form_tag($scanned_tag, $replace) {
	if (!empty($scanned_tag)) {
		//nameで判別
		if ($scanned_tag['name'] == 'event') {

			//カスタム投稿タイプの取得
			global $post;
			$args = array(
				'post_type' => 'post',
				'category__not_in' => array(6, 7),
				'posts_per_page' => -1,
				'meta_key' => 'date',
				'orderby' => 'meta_value',
				'order' => 'ASC',
			);

			$customPosts = get_posts($args);
			if ($customPosts) {
				foreach ($customPosts as $post) {
					setup_postdata($post);
					$title = get_the_title();

					//$scanned_tagに情報を追加
					$scanned_tag['values'][] = $title;
					$scanned_tag['labels'][] = $title;
				}
			}
			wp_reset_postdata();
		}
	}
	return $scanned_tag;
};
//wpcf7_add_form_tag と言う関数でショートコードと実際のフォームでどのように出力するかを決めている
add_filter('wpcf7_form_tag', 'filter_wpcf7_form_tag', 11, 2);
add_filter('protected_title_format', 'remove_protected');
function remove_protected($title) {
	return '%s';
}

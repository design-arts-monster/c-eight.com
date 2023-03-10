<?php
/* カラーパレットに色を追加 */
function editor_color_palette() {
	add_theme_support('editor-color-palette', array(
		array(
			'name'  => '黒',
			'slug'  => 'text-main',
			'color' => '#252526',
		),
		array(
			'name'  => '白',
			'slug'  => 'white',
			'color' => '#fff',
		),
		array(
			'name'  => '青',
			'slug'  => 'main',
			'color' => '#1c468b',
		),
		array(
			'name'  => '淡い青',
			'slug'  => 'main-light',
			'color' => '#335ab4',
		),
		array(
			'name'  => '黄',
			'slug'  => 'yellow',
			'color' => '#ffe241',
		),
		array(
			'name'  => '赤',
			'slug'  => 'red',
			'color' => '#ac3838',
		),
		array(
			'name'  => 'オレンジ',
			'slug'  => 'orange',
			'color' => '#cd7538',
		),
		array(
			'name'  => '灰',
			'slug'  => 'gray',
			'color' => '#adadad',
		),
		array(
			'name'  => '薄灰',
			'slug'  => 'gray-light',
			'color' => '#f7f7f7',
		),
	));
}

add_action('after_setup_theme', 'editor_color_palette');

/* カラーパレットにグラデーションを追加 */
function editor_gradient_presets() {
	add_theme_support(
		'editor-gradient-presets',
		array(
			array(
				'name'     => '黄からオレンジからの赤',
				'gradient' => 'linear-gradient(100deg,#ffe241 0%,#cd7538 60%,#ac3838 100%)',
				'slug'     => 'yellow-orange-red'
			),
		)
	);
}
add_action('after_setup_theme', 'editor_gradient_presets');

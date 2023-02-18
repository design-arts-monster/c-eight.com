<?php
/**
 * ブロックスタイルカスタマイズ
 * @see https://ja.wordpress.org/team/handbook/block-editor/reference-guides/core-blocks/ Core Block
 */
wp_register_style( 'custom-block-style', get_template_directory_uri() . '/custom-block-style.css', );

register_block_style(
	'core/button',
	array(
			'name'         => 'parallelogram',
			'label'        => '平行四辺形',
			'style_handle' => 'custom-block-style',
	)
);
register_block_style(
    'core/button',
    array(
        'name'         => 'parallelogram-line',
        'label'        => '平行四辺形輪郭',
        'style_handle' => 'custom-block-style',
    )
);
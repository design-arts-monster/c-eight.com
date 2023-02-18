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
register_block_style(
    'core/group',
    array(
        'name'         => 'parallelogram-right-fit-right',
        'label'        => '平行四辺形右-右寄せ',
        'style_handle' => 'custom-block-style',
    )
);
register_block_style(
    'core/group',
    array(
        'name'         => 'parallelogram-left-fit-right',
        'label'        => '平行四辺形左-右寄せ',
        'style_handle' => 'custom-block-style',
    )
);
register_block_style(
    'core/group',
    array(
        'name'         => 'parallelogram-right-fit-left',
        'label'        => '平行四辺形右-左寄せ',
        'style_handle' => 'custom-block-style',
    )
);
register_block_style(
    'core/group',
    array(
        'name'         => 'parallelogram-left-fit-left',
        'label'        => '平行四辺形左-左寄せ',
        'style_handle' => 'custom-block-style',
    )
);
register_block_style(
    'core/heading',
    array(
        'name'         => 'line-right',
        'label'        => '右線',
        'style_handle' => 'custom-block-style',
    )
);
register_block_style(
    'core/heading',
    array(
        'name'         => 'line-left',
        'label'        => '左線',
        'style_handle' => 'custom-block-style',
    )
);
register_block_style(
    'core/paragraph',
    array(
        'name'         => 'parallelogram',
        'label'        => '平行四辺形',
        'style_handle' => 'custom-block-style',
    )
);
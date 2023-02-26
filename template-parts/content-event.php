<?php

/**
 * イベント記事一覧表示用カード
 */
?>
<div class="content-event">
	<a href="<?php the_permalink(); ?>">
		<div class="eyecatch">
			<?php if (has_post_thumbnail()) : ?>
				<?php the_post_thumbnail(); ?>
			<?php else : ?>
				<img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/common/no_image.png" alt="No Image">
			<?php endif; ?>
		</div>
		<div class="content-data">
			<div class="category">
				<ul class="event-cat">
					<?php $categories = get_the_category();
					if ($categories) :
						// メインカテゴリ系ループ
						foreach ($categories as $cat) :
							if (!($cat->term_id === 6 || $cat->term_id === 7 || $cat->term_id === 8)) :
								$taxonomy   = 'category';
								$field_name = 'color';
								include_once(ABSPATH . 'wp-admin/includes/plugin.php');
								$scf = is_plugin_active('smart-custom-fields/smart-custom-fields.php');
								$ppf = is_plugin_active('post-expirator/post-expirator.php');
					?>
								<li class="<?php echo $scf ? 'cat-color-' . esc_html(SCF::get_term_meta($cat->term_id, $taxonomy, $field_name)) : ''; ?>"><?php echo esc_html($cat->name); ?></li>
						<?php
								break;
							endif;
						endforeach; ?>
						<?php
						// 開催状況系ループ
						foreach ($categories as $cat) :
							if ($cat->term_id === 6 || $cat->term_id === 7 || $cat->term_id === 8) :
						?>
								<li class="<?php echo $scf ? 'cat-color-' . esc_html(SCF::get_term_meta($cat->term_id, $taxonomy, $field_name)) : ''; ?>"><?php echo esc_html($cat->name); ?></li>
						<?php break;
							endif;
						endforeach; ?>
					<?php endif; ?>
				</ul>
			</div>
			<?php
			if ($scf && SCF::get('date')) {
				$timestamp = strtotime(esc_html(SCF::get('date')));
			} else if ($ppf && do_shortcode('[postexpirator type="date"]')) {
				// 期限日が設定されている場合は期限日を出力
				$timestamp =  strtotime(do_shortcode('[postexpirator type="date"]'));
			} else {
				// 期限日が設定されていない場合は投稿日を代わりに出力
				$timestamp = strtotime(get_the_date('Y-m-d'));
			}
			?>
			<div class="schedule-date">
				<p><span class="year"><?php echo date('Y', $timestamp); ?></span><span class="schedule"><span class="month"><?php echo date('n', $timestamp); ?></span>/<span class="date"><?php echo date('j', $timestamp); ?></span></span><span class="week">[ <?php _e(date('D', $timestamp)); ?> ]</span></p>
			</div>
			<h2 class="event-title"><?php the_title(); ?></h2>
			<?php if ($scf && SCF::get('venue')) : ?>
				<p class="venue"><?php echo esc_html(SCF::get('venue')); ?></p>
			<?php endif; ?>
		</div>
	</a>
</div>
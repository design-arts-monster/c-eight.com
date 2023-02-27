<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package c-eight.com
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<div class="entry-thumbnail">
			<div class="entry-thumbnail-wrap">
				<div class="entry-thumbnail-inner">
					<?php if (has_post_thumbnail()) : ?>
						<?php the_post_thumbnail(); ?>
					<?php else : ?>
						<img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/common/no_image.png" alt="No Image">
					<?php endif; ?>
				</div>
			</div>
		</div>

		<div class="entry-info">
			<div class="container">
				<?php
				if (is_singular()) :
					the_title('<h1 class="entry-title"><span class="text">', '</span></h1>');
				else :
					the_title('<h2 class="entry-title"><a class="text" href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
				endif;
				?>
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
									<li class="cat-reception <?php echo $scf ? 'cat-color-' . esc_html(SCF::get_term_meta($cat->term_id, $taxonomy, $field_name)) : ''; ?>"><?php echo esc_html($cat->name); ?></li>
							<?php break;
								endif;
							endforeach; ?>
						<?php endif; ?>
					</ul>
				</div>

				<?php
				if ($scf && SCF::get('date')) {
					$timestamp = strtotime(SCF::get('date'));
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
				<?php if ($scf && SCF::get('venue')) : ?>
					<p class="venue"><?php echo nl2br(esc_html(SCF::get('venue'))); ?></p>
				<?php endif; ?>
			</div>
		</div>

	</header><!-- .entry-header -->


	<div class="entry-content">
		<div class="container block-editor">
			<?php
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__('Continue reading<span class="screen-reader-text"> "%s"</span>', 'whitebase'),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post(get_the_title())
				)
			);
			?>
		</div>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<div class="container">
			<?php if ($scf) : ?>

				<?php $info = array(
					'date' => '日程',
					'time' => '時間',
					'reception' => '受付',
					'venue' => '会場',
					'subject' => '対象',
					'capacity' => '定員',
					'dress_code' => '服装',
					'belongings' => '持ち物',
					'organizer' => '主催'
				) ?>

				<figure class="event-infomation wp-block-table is-style-information">
					<table>
						<tbody>
							<?php foreach ($info as $key => $value) : ?>
								<?php if (SCF::get($key)) : ?>
									<tr>
										<th><?php echo nl2br(esc_html($value)); ?></th>
										<td><?php echo nl2br(esc_html(SCF::get($key))); ?></td>
									</tr>
								<?php endif; ?>
							<?php endforeach;	?>
							<?php if (SCF::get('free-info')) : ?>
								<?php foreach (SCF::get('free-info') as $key => $value) : ?>
									<tr>
										<th><?php echo nl2br(esc_html($value['heading'])); ?></th>
										<td><?php echo nl2br(esc_html($value['content'])); ?></td>
									</tr>
								<?php endforeach; ?>
							<?php endif; ?>
						</tbody>
					</table>
				</figure>
				<h2 class="caption"><span data-desc="SCHEDULE"><span class="mq-dn-down-md">/ </span><br class="mq-dn-up-md">当日のタイムスケジュール</span></h2>
				<figure class="event-schedule wp-block-table is-style-schedule">
					<table>
						<tbody>
							<?php if (SCF::get('schedule')) : ?>
								<?php foreach (SCF::get('schedule') as $key => $value) : ?>
									<tr>
										<th><?php echo nl2br(esc_html($value['time'])); ?></th>
										<td><?php echo nl2br(esc_html($value['content'])); ?></td>
									</tr>
								<?php endforeach; ?>
							<?php endif; ?>
						</tbody>
					</table>
				</figure>
			<?php endif; ?>

			<div class="entry-buttons wp-block-buttons">
				<div class="wp-block-button is-style-parallelogram">
					<a href="<?php echo esc_url(home_url('/contact/')); ?>" class="wp-block-button__link has-yellow-background-color has-text-main-color wp-element-button"><strong>参加申し込み</strong></a>
				</div>
			</div>
		</div>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
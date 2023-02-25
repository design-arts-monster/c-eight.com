<?php get_header(); ?>

<main id="primary" class="site-main">
	<div class="mainv">
		<div class="container">
			<h2 class="caption">福井県内の<br>アスリートと<br class="mq-dn-up-md">企業を繋げる<br>新たな架け橋へ</h2>
			<p class="text">引退後のアスリートが今後の目標に全力を<br class="mq-dn-up-md">尽くせるようなキャリア制度を確立し、<br> スポーツ界と一般社会のさらなる発展のため、<br class="mq-dn-up-md">私たちが、アスリートと企業を繋げる<br>新たな架け橋となります。</p>
		</div>
	</div>

	<div class="philosophy">
		<div class="container">
			<p class="contribution"><span>企業に貢献する</span><span>スポーツ界に貢献する</span><span>社会に貢献する</span></p>
			<p class="contribution-caption">アスリートの<br class="mq-dn-up-md">輝き続ける人生に<br class="mq-dn-up-md">貢献する</p>
			<p class="contribution-connect"><span>私たちシーエイトは貢献を繋ぎ続けます。</span></p>
		</div>
	</div>

	<?php get_template_part('template-parts/content', 'infinity-scroll'); ?>

	<div class="business-content">
		<div class="container">
			<h2 class="caption">事業内容</h2>
		</div>
		<div class="business-content-image">
			<p class="watermark">BUSINESS <br class="mq-dn-up-md">CONTENT</p>
			<picture>
				<source srcset="<?php echo esc_url(get_template_directory_uri()); ?>/img/pages/front-page/business_content@md.png" media="<?php echo get_media('md', 'down'); ?>" type="image/png">
				<img decoding="async" loading="lazy" src="<?php echo esc_url(get_template_directory_uri()); ?>/img/pages/front-page/business_content.png" alt="" class="img">
			</picture>
		</div>
		<div class="athlete">
			<div class="athlete-wrap">
				<div class="athlete-inner">
					<p class="athlete-service">アスリート特化型就職支援・<br class="mq-dn-up-md">人材紹介サービス</p>
					<h2 class="athlete-caption"><span>Athlete Connect</span></h2>
					<p class="athlete-text">福井県内の体育会学生やスポーツ選手などの全てのアスリート（プロ・アマチュア問わず競技経験者）を対象とした就職支援・人材紹介サービスです。<br>アスリートのセカンドキャリア支援、デュアルキャリア支援、ネクストキャリア研修のサービスを通じて、アスリートの皆様が今後の目標に全力を尽くせるようなキャリア制度を確立し、アスリートとして積み重ねてきた経験と情熱を活かせるセカンドキャリアへ、私たちがサポートします。</p>
				</div>
			</div>
		</div>
		<div class="business-buttons wp-block-buttons container">
			<div class="wp-block-button is-style-parallelogram">
				<a href="<?php echo esc_url(home_url('/student/')); ?>" class="wp-block-button__link has-text-main-background-color wp-element-button"><strong>学生・求職者の方はこちら</strong></a>
			</div>
			<div class="wp-block-button is-style-parallelogram">
				<a href="<?php echo esc_url(home_url('/corporation/')); ?>" class="wp-block-button__link has-text-main-background-color wp-element-button"><strong>法人・企業様はこちら</strong></a>
			</div>
		</div>
	</div>

	<div class="event">
		<div class="container">
			<h2 class="caption"><span data-desc="EVENT">/ 開催予定イベント</span></h2>
		</div>

		<div class="event-wrap">
			<?php
			// $has_post = false;
			$the_query = new WP_Query(array(
				'post_type' => 'post',
				'category__not_in' => array(6),
				'posts_per_page' => 6,
				'meta_key' => 'date',
				'orderby' => 'meta_value',
				'order' => 'ASC',
			)); ?>
			<?php if ($the_query->have_posts()) :
				// $has_post = true;
			?>
				<!-- pagination here -->

				<div class="event-slider is-style-carousel">
					<!-- the loop -->
					<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
						<?php
						get_template_part('template-parts/content', 'event');
						?>
					<?php endwhile; ?>
					<!-- end of the loop -->
				</div>

				<!-- pagination here -->

				<?php wp_reset_postdata(); ?>

			<?php else : ?>
				<div class="event-nothing">
					<div class="container">
						<p><?php esc_html_e('現在開催予定のイベントはありません'); ?></p>
					</div>
				</div>
			<?php endif; ?>
		</div>

		<?php $cat_end = get_category(6); ?>
		<div class="event-buttons wp-block-buttons container">
			<?php if ($has_post) : ?>
				<div class="wp-block-button is-style-parallelogram">
					<a href="<?php echo esc_url(home_url('/event/')); ?>" class="wp-block-button__link has-text-main-background-color wp-element-button"><strong>イベント一覧はこちら</strong></a>
				</div>

			<?php elseif ($cat_end->count > 0) :	?>
				<div class="wp-block-button is-style-parallelogram">
					<a href="<?php echo esc_url(home_url('/category/') . $cat_end->slug); ?>" class="wp-block-button__link has-text-main-background-color wp-element-button"><strong>過去のイベント一覧はこちら</strong></a>
				</div>
			<?php endif; ?>
		</div>
	</div>
</main><!-- #main -->

<?php
get_sidebar();
get_footer();

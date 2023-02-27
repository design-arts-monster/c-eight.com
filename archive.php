<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package c-eight.com
 */

get_header();
$tax_id = get_query_var('cat');
$post_type = get_query_var('post_type');
$cat_name = get_category($tax_id)->cat_name;
?>

<main id="primary" class="site-main">
	<header class="page-header thumb-header">
		<h1 class="page-title title" data-desc="EVENT LIST">
			<span>「<?php echo esc_html($cat_name); ?>」一覧</span>
		</h1>
		<div class="thumbnail">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/pages/event/thumbnail.jpg" alt="EVENT LIST">
		</div>
	</header><!-- .page-header -->

	<?php if (have_posts()) :
		$categories = get_categories(array(
			'exclude' => '6,7,8',
			'order' => 'ASC',
			'orderby' => 'id'
		));
	?>

		<div class="container">
			<div class="cat-nav">
				<div class="cat-nav-wrap">
					<div class="cat-nav-list">
						<a class="italic" href="<?php echo esc_url(home_url('/event/')); ?>"><span>ALL</span></a>
					</div>
					<?php foreach ($categories as $cat) : ?>
						<div class="cat-nav-list <?php echo $cat->term_id === $tax_id ? 'current' : ''; ?>">
							<a href="<?php echo esc_url(home_url('/category/') . $cat->slug); ?>"><span><?php echo esc_html($cat->name); ?></span></a>
						</div>
					<?php endforeach; ?>
				</div>
				<?php
				$cat_end = get_category(6);
				if ($cat_end->count > 0 && $tax_id !== 6) :
				?>
					<div class="cat-nav-list-end">
						<a href="<?php echo esc_url(home_url('/category/') . $cat_end->slug); ?>"><span><?php echo esc_html($cat_end->name); ?>過去のイベント一覧</span></a>
					</div>
				<?php endif; ?>
			</div>

			<div class="event-wrap">
				<?php
				/* Start the Loop */
				while (have_posts()) :
					the_post();

					/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
					get_template_part('template-parts/content', 'event');

				endwhile; ?>
			</div>
			<?php if (get_the_posts_pagination()) : ?>
				<div class="container">
					<?php the_posts_pagination(); ?>
				</div>
			<?php endif; ?>

		</div>
	<?php else : ?>
		<div class="event-nothing">
			<div class="container">
				<p><?php esc_html_e('現在表示可能なイベントはありません', 'whitebase'); ?></p>
			</div>
		</div>
		<?php
		$cat_end = get_category(6);
		if ($cat_end->count > 0 && $tax_id !== 6) :
		?>
			<div class="container">
				<div class="cat-nav-list-end">
					<a href="<?php echo esc_url(home_url('/category/') . $cat_end->slug); ?>"><span><?php echo esc_html($cat_end->name); ?>過去のイベント一覧</span></a>
				</div>
			</div>
		<?php endif; ?>
	<?php endif; ?>

</main><!-- #main -->

<?php
get_sidebar();
get_footer();

<?php
global $post;
$slug = $post->post_name;
?>
<header class="page-header thumb-header">
	<h1 class="page-title title" data-desc="<?php echo esc_html(strtoupper($slug)); ?>">
		<span><?php the_title(); ?></span>
	</h1>
	<?php if (has_post_thumbnail()) : ?>
		<div class="thumbnail">
			<?php the_post_thumbnail(); ?>
		</div>
	<?php endif; ?>
</header><!-- .page-header -->
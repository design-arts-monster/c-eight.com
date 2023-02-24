<figure class="sports-gallery wp-block-gallery is-style-infinity-scroll-right has-nested-images">
	<?php for ($i = 1; $i < 6; $i++) : ?>
		<figure class="wp-block-image">
			<img decoding="async" loading="lazy" width="640" height="416" src="<?php echo esc_url(get_template_directory_uri()); ?>/img/pages/front-page/gallery-<?php echo $i; ?>.png" alt="">
		</figure>
	<?php endfor; ?>
</figure>
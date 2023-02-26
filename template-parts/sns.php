<?php

/**
 * SNSリンクボタン
 *
 * @package c-eight.com
 */
$options = get_option('mytheme_options');
?>

<?php if ($options['sns_line'] || $options['sns_twitter'] || $options['sns_facebook']) : ?>
	<article class="sns <?php !isset($args['class']) ? '' : printf(__('%s', 'c-eight'), $args['class'], 'whitebase'); ?>">
		<?php if (!$args['hidden_folow']) : ?>
			<p class="follow">FOLLOW</p>
		<?php endif; ?>

		<div class="sns-links">
			<?php if ($options['sns_line']) : ?>
				<div class="sns-link line">
					<a href="<?php echo esc_url($options['sns_line']); ?>" target="_blank">
						<img width="30" height="30" src="<?php echo esc_url(get_template_directory_uri()); ?>/img/icon/sns/line.svg" alt="LINE" decoding="async">
					</a>
				</div>
			<?php endif; ?>
			<?php if ($options['sns_twitter']) : ?>
				<div class="sns-link twitter">
					<a href="<?php echo esc_url($options['sns_twitter']); ?>" target="_blank">
						<img width="30" height="30" src="<?php echo esc_url(get_template_directory_uri()); ?>/img/icon/sns/twitter.svg" alt="Twitter" decoding="async">
					</a>
				</div>
			<?php endif; ?>
			<?php if ($options['sns_facebook']) : ?>
				<div class="sns-link facebook">
					<a href="<?php echo esc_url($options['sns_facebook']); ?>" target="_blank">
						<img width="30" height="30" src="<?php echo esc_url(get_template_directory_uri()); ?>/img/icon/sns/facebook.svg" alt="LINE" decoding="async">
					</a>
				</div>
			<?php endif; ?>
		</div>
	</article>
<?php endif; ?>
<!-- /.sns -->
<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package c-eight.com
 */

?>
<?php get_template_part( 'template-parts/sns', null, ['class'=>'follow-sns mq-dn-md', 'hidden_folow'=>true] ); ?>

<?php if(is_active_sidebar( 'footer-cta' )) :?>
	<div class="footer-cta">
		<?php dynamic_sidebar( 'footer-cta' ); ?>
	</div>
<?php endif; ?>

	<footer id="colophon" class="site-footer">
		<div class="site-nav">
			<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer-menu',
						'menu_id'        => 'footer-menu',
						'container_class' => 'footer-menu-container',
					)
				);
			?>
			<?php get_template_part( 'template-parts/sns', null, ['class'=>'footer-menu-sns'] ); ?>
		</div>
		<!-- /.site-nav -->
		<div class="site-info">
			<p class="logo">
				<?php the_custom_logo(); ?>
			</p>
			<p class="copy">©<?php echo date("Y");?> C-EIGHT</p>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

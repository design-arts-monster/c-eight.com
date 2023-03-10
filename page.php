<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package c-eight.com
 */

get_header();
?>

<main id="primary" class="site-main">

	<?php
	while (have_posts()) :
		the_post();
		if (!is_page(array('contact', 'contact-company', 'thanks'))) {
			get_template_part('template-parts/page', 'header');
		}

		if (is_page(array('contact', 'contact-company', 'thanks'))) {
			get_template_part('template-parts/content', 'contact');
		} else if (is_page(array('student'))) {
			get_template_part('template-parts/content', 'student');
		} else if (is_page(array('about'))) {
			get_template_part('template-parts/content', 'about');
		} else if (is_page(array('corporation'))) {
			get_template_part('template-parts/content', 'corporation');
		} else {
			get_template_part('template-parts/content', 'page');
		}


	endwhile; // End of the loop.
	?>

</main><!-- #main -->

<?php
get_sidebar();
get_footer();

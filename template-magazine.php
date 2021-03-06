<?php
/**
 * Template Name: Magazine Homepage
 *
 * Description: A custom page template for displaying the magazine homepage widgets.
 *
 * @package WorldStar
 */

get_header();

// Get Theme Options from Database.
$theme_options = worldstar_theme_options();

// Display Featured Content.
if ( true === $theme_options['featured_magazine'] ) :

	get_template_part( 'template-parts/featured-content' );

endif;
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		// Display Magazine Homepage Widgets.
		worldstar_magazine_widgets();
		?>

		</main><!-- #main -->
	</section><!-- #primary -->

	<?php get_sidebar(); ?>

<?php get_footer(); ?>

<?php
/**
 * The template for displaying single posts
 *
 * @package Worldstar
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
		<header class="entry-header">
			
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			
			<?php worldstar_entry_meta(); ?>

		</header><!-- .entry-header -->
		
		<?php worldstar_post_image_single(); ?>

		<div class="entry-content clearfix">
			<?php the_content(); ?>
			<!-- <?php trackback_rdf(); ?> -->
			<div class="page-links"><?php wp_link_pages(); ?></div>
		</div><!-- .entry-content -->
		
		<footer class="entry-footer">
			
			<?php worldstar_entry_tags(); ?>
			<?php worldstar_post_navigation(); ?>
			
		</footer><!-- .entry-footer -->

	</article>
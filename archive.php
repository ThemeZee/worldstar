<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Worldstar
 */
 
get_header(); 

// Get Theme Options from Database
$theme_options = worldstar_theme_options();
?>
	
	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		
			<header class="page-header">
				<?php the_archive_title( '<h1 class="archive-title">', '</h1>' ); ?>
			</header><!-- .page-header -->
			
			<?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>
			
			<?php 
			if ( have_posts() ) : ?>
			
				<div id="archive-posts" class="post-wrapper clearfix">
						
					<?php while( have_posts() ) : the_post();
				
						get_template_part( 'template-parts/content', $theme_options['post_content'] );
				
					endwhile; ?>

				</div>
			
				<?php 
				
				// Display Pagination	
				worldstar_pagination();
			
			endif; ?>
			
		</main><!-- #main -->
	</section><!-- #primary -->

	<?php get_sidebar(); ?>

<?php get_footer(); ?>
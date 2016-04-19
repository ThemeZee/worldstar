<?php
/**
 * The template for displaying the blog index (latest posts)
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
					
			<?php
			// Display Slider
			if ( true == $theme_options['slider_blog'] ) :

				get_template_part( 'template-parts/post-slider' );
				
			endif; 

			// Display Latest Posts Title
			if ( $theme_options['blog_title'] <> '' ) : ?>
						
				<header class="page-header">
					
					<h1 class="archive-title"><?php echo wp_kses_post($theme_options['blog_title']); ?></h1>

				</header><!-- .page-header -->
		
			<?php endif; ?>
			
			<div id="homepage-posts" class="post-wrapper clearfix">
					
				<?php if (have_posts()) : while (have_posts()) : the_post();
			
					get_template_part( 'template-parts/content' );
			
					endwhile;

				endif; ?>
			
			</div>
			
			<?php worldstar_pagination(); ?>
			
		</main><!-- #main -->
	</section><!-- #primary -->
	
	<?php get_sidebar(); ?>

<?php get_footer(); ?>
<?php
/**
 * The template for displaying articles in the loop with post excerpts
 *
 * @package Worldstar
 */
?>

	<div class="post-column clearfix">
	
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
			<a href="<?php esc_url( the_permalink() ); ?>" rel="bookmark">
				<?php the_post_thumbnail(); ?>
			</a>
			
			<header class="entry-header">

				<?php worldstar_entry_categories(); ?>
				
				<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
				
				<?php worldstar_entry_meta(); ?>
			
			</header><!-- .entry-header -->

			<div class="entry-content clearfix">
				
				<?php the_excerpt(); ?>
				<?php worldstar_more_link(); ?>
				
			</div><!-- .entry-content -->
		
		</article>
		
	</div>
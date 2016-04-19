<?php
/**
 * The template for displaying articles in the loop with post excerpts
 *
 * @package zeeDynamic
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class( 'small-archive-post clearfix' ); ?>>
		
		<a href="<?php esc_url( the_permalink() ); ?>" rel="bookmark">
			<?php the_post_thumbnail( 'zeedynamic-thumbnail-archive' ); ?>
		</a>
		
		<header class="entry-header">

			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
			
			<?php zeedynamic_entry_meta(); ?>
		
		</header><!-- .entry-header -->

		<div class="entry-content clearfix">
			
			<?php zeedynamic_post_content(); ?>
		
		</div><!-- .entry-content -->

	</article>
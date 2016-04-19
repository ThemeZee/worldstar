<?php
/***
 * Theme Info
 *
 * Adds a simple Theme Info page to the Appearance section of the WordPress Dashboard. 
 *
 * @package zeeDynamic
 */


/**
 * Add Theme Info page to admin menu
 */
function zeedynamic_theme_info_menu_link() {
	
	// Get Theme Details from style.css
	$theme = wp_get_theme(); 
	
	add_theme_page( 
		sprintf( esc_html__( 'Welcome to %1$s %2$s', 'zeedynamic' ), $theme->get( 'Name' ), $theme->get( 'Version' ) ), 
		esc_html__( 'Theme Info', 'zeedynamic' ), 
		'edit_theme_options', 
		'zeedynamic', 
		'zeedynamic_theme_info_page'
	);
	
}
add_action('admin_menu', 'zeedynamic_theme_info_menu_link');


/**
 * Display Theme Info page
 */
function zeedynamic_theme_info_page() { 
	
	// Get Theme Details from style.css
	$theme = wp_get_theme(); 
	
?>
			
	<div class="wrap theme-info-wrap">

		<h1><?php printf( esc_html__( 'Welcome to %1$s %2$s', 'zeedynamic' ), $theme->get( 'Name' ), $theme->get( 'Version' ) ); ?></h1>

		<div class="theme-description"><?php echo $theme->get( 'Description' ); ?></div>
		
		<hr>		
		<div class="important-links clearfix">
			<p><strong><?php esc_html_e( 'Theme Links', 'zeedynamic' ); ?>:</strong>
				<a href="<?php echo esc_url( __( 'https://themezee.com/themes/zeedynamic/', 'zeedynamic' ) . '?utm_source=theme-info&utm_medium=textlink&utm_campaign=zeedynamic&utm_content=theme-page' ); ?>" target="_blank"><?php esc_html_e( 'Theme Page', 'zeedynamic' ); ?></a>
				<a href="<?php echo get_template_directory_uri(); ?>/changelog.txt" target="_blank"><?php esc_html_e( 'Changelog', 'zeedynamic' ); ?></a>
				<a href="<?php echo esc_url( 'http://preview.themezee.com/zeedynamic/?utm_source=theme-info&utm_medium=textlink&utm_campaign=zeedynamic&utm_content=demo' ); ?>" target="_blank"><?php esc_html_e( 'Theme Demo', 'zeedynamic' ); ?></a>
				<a href="<?php echo esc_url( __( 'https://themezee.com/docs/zeedynamic-documentation/', 'zeedynamic' ) . '?utm_source=theme-info&utm_medium=textlink&utm_campaign=zeedynamic&utm_content=documentation' ); ?>" target="_blank"><?php esc_html_e( 'Theme Documentation', 'zeedynamic' ); ?></a>
				<a href="<?php echo esc_url( 'http://wordpress.org/support/view/theme-reviews/zeedynamic?filter=5' ); ?>" target="_blank"><?php esc_html_e( 'Rate this theme', 'zeedynamic' ); ?></a>
			</p>
		</div>
		<hr>
				
		<div id="getting-started">

			<h3><?php printf( esc_html__( 'Getting Started with %s', 'zeedynamic' ), $theme->get( 'Name' ) ); ?></h3>
			
			<div class="columns-wrapper clearfix">

				<div class="column column-half clearfix">
				
					<div class="section">
						<h4><?php esc_html_e( 'Theme Documentation', 'zeedynamic' ); ?></h4>
						
						<p class="about">
							<?php esc_html_e( 'You need help to setup and configure this theme? We got you covered with an extensive theme documentation on our website.', 'zeedynamic' ); ?>
						</p>
						<p>
							<a href="<?php echo esc_url( __( 'https://themezee.com/docs/zeedynamic-documentation/', 'zeedynamic' ) . '?utm_source=theme-info&utm_medium=button&utm_campaign=zeedynamic&utm_content=documentation' ); ?>" target="_blank" class="button button-secondary">
								<?php printf( esc_html__( 'View %s Documentation', 'zeedynamic' ), 'zeeDynamic' ); ?>
							</a>
						</p>
					</div>
					
					<div class="section">
						<h4><?php esc_html_e( 'Theme Options', 'zeedynamic' ); ?></h4>
						
						<p class="about">
							<?php printf( esc_html__( '%s makes use of the Customizer for all theme settings. Click on "Customize Theme" to open the Customizer now.', 'zeedynamic' ), $theme->get( 'Name' ) ); ?>
						</p>
						<p>
							<a href="<?php echo admin_url( 'customize.php' ); ?>" class="button button-primary"><?php esc_html_e( 'Customize Theme', 'zeedynamic' ); ?></a>
						</p>
					</div>

				</div>
				
				<div class="column column-half clearfix">
					
					<img src="<?php echo get_template_directory_uri(); ?>/screenshot.jpg" />
					
				</div>
				
			</div>
			
		</div>
		
		<hr>
		
		<div id="more-features">

			<h3><?php esc_html_e( 'Get more features', 'zeedynamic' ); ?></h3>
			
			<div class="columns-wrapper clearfix">

				<div class="column column-half clearfix">
				
					<div class="section">
						<h4><?php esc_html_e( 'Pro Version', 'zeedynamic' ); ?></h4>
						
						<p class="about">
							<?php printf( esc_html__( 'Purchase the Pro Version of %s to get additional features and advanced customization options.', 'zeedynamic' ), 'zeeDynamic'); ?>
						</p>
						<p>
							<a href="<?php echo esc_url( __( 'https://themezee.com/addons/zeedynamic-pro/', 'zeedynamic' ) . '?utm_source=theme-info&utm_medium=button&utm_campaign=zeedynamic&utm_content=pro-version' ); ?>" target="_blank" class="button button-secondary">
								<?php printf( esc_html__( 'Learn more about %s Pro', 'zeedynamic' ), 'zeeDynamic'); ?>
							</a>
						</p>
					</div>

				</div>
				
				<div class="column column-half clearfix">
					
					<div class="section">
						<h4><?php esc_html_e( 'ThemeZee Plugins', 'zeedynamic' ); ?></h4>
						
						<p class="about">
							<?php esc_html_e( 'Extend the functionality of your WordPress website with our customized plugins.', 'zeedynamic' ); ?>
						</p>
						<p>
							<a href="<?php echo esc_url( __( 'https://themezee.com/plugins/', 'zeedynamic' ) . '?utm_source=theme-info&utm_medium=button&utm_campaign=zeedynamic&utm_content=plugins' ); ?>" target="_blank" class="button button-secondary">
								<?php esc_html_e( 'Browse Plugins', 'zeedynamic' ); ?>
							</a>
							<a href="<?php echo admin_url( 'plugin-install.php?tab=search&type=author&s=themezee' ); ?>" class="button button-primary">
								<?php esc_html_e( 'Install now', 'zeedynamic' ); ?>
							</a>
						</p>
					</div>
					
				</div>
				
			</div>
			
		</div>
		
		<hr>
		
		<div id="theme-author">
			
			<p><?php printf( esc_html__( '%1$s is proudly brought to you by %2$s. If you like this theme, %3$s :)', 'zeedynamic' ), 
				$theme->get( 'Name' ),
				'<a target="_blank" href="' . __( 'https://themezee.com/', 'zeedynamic' ) . '?utm_source=theme-info&utm_medium=footer&utm_campaign=zeedynamic" title="ThemeZee">ThemeZee</a>',
				'<a target="_blank" href="http://wordpress.org/support/view/theme-reviews/zeedynamic?filter=5" title="zeeDynamic Review">' . esc_html__( 'rate it', 'zeedynamic' ) . '</a>'); ?>
			</p>
		
		</div>
	
	</div>

<?php
}


/**
 * Enqueues CSS for Theme Info page
 */
function zeedynamic_theme_info_page_css( $hook ) { 

	// Load styles and scripts only on theme info page
	if ( 'appearance_page_zeedynamic' != $hook ) {
		return;
	}
	
	// Embed theme info css style
	wp_enqueue_style('zeedynamic-theme-info-css', get_template_directory_uri() .'/css/theme-info.css');

}
add_action('admin_enqueue_scripts', 'zeedynamic_theme_info_page_css');
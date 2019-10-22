<?php
/**
 * Theme Links Control for the Customizer
 *
 * @package WorldStar
 */

/**
 * Make sure that custom controls are only defined in the Customizer
 */
if ( class_exists( 'WP_Customize_Control' ) ) :

	/**
	 * Displays the theme links in the Customizer.
	 */
	class WorldStar_Customize_Links_Control extends WP_Customize_Control {
		/**
		 * Render Control
		 */
		public function render_content() {
			?>

			<div class="theme-links">

				<span class="customize-control-title"><?php esc_html_e( 'Theme Links', 'worldstar' ); ?></span>

				<p>
					<a href="<?php echo esc_url( __( 'https://themezee.com/themes/worldstar/', 'worldstar' ) ); ?>?utm_source=customizer&utm_medium=textlink&utm_campaign=worldstar&utm_content=theme-page" target="_blank">
						<?php esc_html_e( 'Theme Page', 'worldstar' ); ?>
					</a>
				</p>

				<p>
					<a href="http://preview.themezee.com/?demo=worldstar&utm_source=customizer&utm_campaign=worldstar" target="_blank">
						<?php esc_html_e( 'Theme Demo', 'worldstar' ); ?>
					</a>
				</p>

				<p>
					<a href="<?php echo esc_url( __( 'https://themezee.com/docs/worldstar-documentation/', 'worldstar' ) ); ?>?utm_source=customizer&utm_medium=textlink&utm_campaign=worldstar&utm_content=documentation" target="_blank">
						<?php esc_html_e( 'Theme Documentation', 'worldstar' ); ?>
					</a>
				</p>

				<p>
					<a href="<?php echo esc_url( __( 'https://wordpress.org/support/theme/worldstar/', 'worldstar' ) ); ?>" target="_blank">
						<?php esc_html_e( 'Support Forum', 'worldstar' ); ?>
					</a>
				</p>

				<p>
					<a href="<?php echo esc_url( __( 'https://wordpress.org/support/theme/worldstar/reviews/?filter=5', 'worldstar' ) ); ?>" target="_blank">
						<?php esc_html_e( 'Rate this theme', 'worldstar' ); ?>
					</a>
				</p>

			</div>

			<?php
		}
	}

endif;

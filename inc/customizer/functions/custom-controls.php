<?php
/**
 * Custom Controls for the Customizer
 *
 * @package zeeDynamic
 */


/**
 * Make sure that custom controls are only defined in the Customizer
 */
if ( class_exists( 'WP_Customize_Control' ) ) :

	/**
	 * Displays a bold label text. Used to create headlines for radio buttons and description sections.
	 *
	 */
	class zeeDynamic_Customize_Header_Control extends WP_Customize_Control {

		public function render_content() {  ?>
			
			<label>
				<span class="customize-control-title"><?php echo wp_kses_post( $this->label ); ?></span>
			</label>
			
			<?php
		}
	}

	/**
	 * Displays a description text in gray italic font
	 *
	 */
	class zeeDynamic_Customize_Description_Control extends WP_Customize_Control {

		public function render_content() {  ?>
			
			<span class="description"><?php echo wp_kses_post( $this->label ); ?></span>
			
			<?php
		}
	}

	/**
	 * Creates a category dropdown control for the Customizer
	 *
	 */
	class zeeDynamic_Customize_Category_Dropdown_Control extends WP_Customize_Control {
		
		public function render_content() {
				
			$categories = get_categories( array( 'hide_empty' => false ) );
			
			if( !empty( $categories ) ) : ?>
					
					<label>
					
						<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
						
						<select <?php $this->link(); ?>>
							<option value="0"><?php esc_html_e( 'All Categories', 'zeedynamic' ); ?></option>
						<?php
							foreach ( $categories as $category ) :
								
								printf(	'<option value="%s" %s>%s</option>', 
									$category->term_id, 
									selected( $this->value(), $category->term_id, false ), 
									$category->name . ' (' . $category->count . ')'
								);
								
							endforeach;
						?>
						</select>
					  
					</label>
					
				<?php
			endif;
		
		}
		
	}
	
	/**
	 * Displays the upgrade teasers in thhe Pro Version / More Features section.
	 *
	 */
	class zeeDynamic_Customize_Upgrade_Control extends WP_Customize_Control {
	
		public function render_content() {  ?>
			
			<div class="upgrade-pro-version">
			
				<span class="customize-control-title"><?php esc_html_e( 'Pro Version', 'zeedynamic' ); ?></span>
				
				<span class="textfield">
					<?php printf( esc_html__( 'Purchase the Pro Version of %s to get additional features and advanced customization options.', 'zeedynamic' ), 'Anderson'); ?>
				</span>
				
				<p>
					<a href="<?php echo esc_url( __( 'https://themezee.com/addons/zeedynamic-pro/', 'zeedynamic' ) ); ?>?utm_source=customizer&utm_medium=button&utm_campaign=zeedynamic&utm_content=pro-version" target="_blank" class="button button-secondary">
						<?php printf( esc_html__( 'Learn more about %s Pro', 'zeedynamic' ), 'zeeDynamic'); ?>
					</a>
				</p>
				
			</div>
			
			<div class="upgrade-plugins">
			
				<span class="customize-control-title"><?php esc_html_e( 'ThemeZee Plugins', 'zeedynamic' ); ?></span>
				
				<span class="textfield">
					<?php esc_html_e( 'Extend the functionality of your WordPress website with our customized plugins.', 'zeedynamic' ); ?>
				</span>
				
				<p>
					<a href="<?php echo esc_url( __( 'https://themezee.com/plugins/', 'zeedynamic' ) ); ?>?utm_source=customizer&utm_medium=button&utm_campaign=zeedynamic&utm_content=plugins" target="_blank" class="button button-secondary">
						<?php esc_html_e( 'Browse Plugins', 'zeedynamic' ); ?>
					</a>
					<a href="<?php echo admin_url( 'plugin-install.php?tab=search&type=author&s=themezee' ); ?>" class="button button-primary">
						<?php esc_html_e( 'Install now', 'zeedynamic' ); ?>
					</a>
				</p>
			
			</div>
			
			<?php
        }
	}
	
endif;
<?php
	namespace sv100;

	/**
	 * @version         4.150
	 * @author			straightvisions GmbH
	 * @package			sv100
	 * @copyright		2019 straightvisions GmbH
	 * @link			https://straightvisions.com
	 * @since			1.000
	 * @license			See license.txt or https://straightvisions.com
	 */

	class sv_branding extends init {
		public function init() {
			$this->set_module_title( __( 'SV Branding', 'sv100' ) )
				->set_module_desc( __( 'Manage Site Title & Logo', 'sv100' ) )
				->load_settings()
				->register_scripts()
				->set_section_title( __( 'Branding', 'sv100' ) )
				->set_section_desc( $this->get_module_desc() )
				->set_section_type( 'settings' )
				->set_section_template_path( $this->get_path( 'lib/backend/tpl/settings.php' ) )
				->set_section_order(21)
				->get_root()
				->add_section( $this );
		}

		protected function load_settings(): sv_branding {
			// Branding
			$this->get_setting( 'active' )
				->set_title( __( 'Branding', 'sv100' ) )
				->set_description( __( 'Activate or deactivate branding in the header.', 'sv100' ) )
				->set_default_value( 1 )
				->load_type( 'checkbox' );

			$this->get_setting( 'title' )
				->set_title( __( 'Title', 'sv100' ) )
				->set_description(
					__(
						'On default the title will be your website title,
				 	but you can change the title that will be displayed in your header.',
						'sv100'
					)
				)
				->set_default_value( get_bloginfo( 'name' ) )
				->load_type( 'text' );

			// Fonts & Colors
			$this->get_setting( 'font' )
				->set_title( __( 'Font Family', 'sv100' ) )
				->set_description( __( 'Choose a font for your text.', 'sv100' ) )
				->set_options( $this->get_module( 'sv_webfontloader' )->get_font_options() )
				->set_is_responsive(true)
				->load_type( 'select' );

			$this->get_setting( 'font_size' )
				->set_title( __( 'Font Size', 'sv100' ) )
				->set_description( __( 'Font Size in pixel.', 'sv100' ) )
				->set_default_value( 16 )
				->set_is_responsive(true)
				->load_type( 'number' );

			$this->get_setting( 'line_height' )
				->set_title( __( 'Line Height', 'sv100' ) )
				->set_description( __( 'Set line height as multiplier or with a unit.', 'sv100' ) )
				->set_is_responsive(true)
				->load_type( 'text' );

			$this->get_setting( 'text_color' )
				->set_title( __( 'Text Color', 'sv100' ) )
				->set_default_value( '#1e1e1e' )
				->set_is_responsive(true)
				->load_type( 'color' );

			$this->get_setting( 'highlight_color' )
				->set_title( __( 'Highlight Color', 'sv100' ) )
				->set_description( __( 'This color is used for highlighting elements, like links on hover/focus.', 'sv100' ) )
				->set_default_value( '#328ce6' )
				->set_is_responsive(true)
				->load_type( 'color' );

			$this->get_setting( 'logo_width' )
				->set_title( __( 'Logo width', 'sv100' ) )
				->set_description( __( 'Width in pixel. 0 = auto', 'sv100' ) )
				->set_default_value( 0 )
				->set_min( 0 )
				->load_type( 'number' );

			$this->get_setting( 'logo_height' )
				->set_title( __( 'Logo height', 'sv100' ) )
				->set_description( __( 'Height in pixel. 0 = auto', 'sv100' ) )
				->set_default_value( 0 )
				->set_min( 0 )
				->load_type( 'number' );

			$this->get_setting( 'logo_width_mobile' )
				->set_title( __( 'Logo width (mobile)', 'sv100' ) )
				->set_description( __( 'Width in pixel. 0 = auto', 'sv100' ) )
				->set_default_value( 0 )
				->set_min( 0 )
				->load_type( 'number' );

			$this->get_setting( 'logo_height_mobile' )
				->set_title( __( 'Logo height (mobile)', 'sv100' ) )
				->set_description( __( 'Height in pixel. 0 = auto', 'sv100' ) )
				->set_default_value( 0 )
				->set_min( 0 )
				->load_type( 'number' );

			return $this;
		}

		protected function register_scripts(): sv_branding {
			$this->get_script( 'common' )
				->set_path( 'lib/frontend/css/common.css' )
				->set_inline( true )
				->set_is_enqueued();

			$this->get_script( 'config' )
				->set_path( 'lib/frontend/css/config.php' )
				->set_inline( true )
				->set_is_enqueued();

			return $this;
		}

		public function load( $settings = array() ): string {
			$settings								= shortcode_atts(
				array(
					'inline'						=> true,
					'template'                      => false,
				),
				$settings,
				$this->get_module_name()
			);

			ob_start();

			$this->get_script( 'common' )->set_inline( $settings['inline'] )->set_is_enqueued();
			$this->get_script( 'config' )->set_inline( $settings['inline'] )->set_is_enqueued();

			require ($this->get_path('lib/frontend/tpl/default.php' ));

			$output							        = ob_get_contents();
			ob_end_clean();

			return $output;
		}
		public function has_logo(): bool{
			if ( get_header_image() ) {
				return true;
			}
			if ( get_custom_logo() ) {
				return true;
			}
			return false;
		}
	}
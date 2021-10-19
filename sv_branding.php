<?php
	namespace sv100;

	class sv_branding extends init {
		public function init() {
			$this->set_module_title( __( 'SV Branding', 'sv100' ) )
				->set_module_desc( __( 'Manage Site Title & Logo', 'sv100' ) )
				->set_css_cache_active()
				->set_section_title( $this->get_module_title() )
				->set_section_desc( $this->get_module_desc() )
				->set_section_template_path()
				->set_section_order(2150)
				->set_section_icon('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M2.597 7.81l4.911 13.454c-3.434-1.668-5.802-5.19-5.802-9.264 0-1.493.32-2.91.891-4.19zm16.352 3.67c0-1.272-.457-2.153-.849-2.839-.521-.849-1.011-1.566-1.011-2.415 0-.978.747-1.88 1.862-1.819-1.831-1.677-4.271-2.701-6.951-2.701-3.596 0-6.76 1.845-8.601 4.64.625.02 1.489.032 3.406-.118.555-.034.62.782.066.847 0 0-.558.065-1.178.098l3.749 11.15 2.253-6.756-1.604-4.394c-.555-.033-1.08-.098-1.08-.098-.555-.033-.49-.881.065-.848 2.212.17 3.271.171 5.455 0 .555-.033.621.783.066.848 0 0-.559.065-1.178.098l3.72 11.065 1.027-3.431c.444-1.423.783-2.446.783-3.327zm-6.768 1.42l-3.089 8.975c.922.271 1.898.419 2.908.419 1.199 0 2.349-.207 3.418-.583-.086-.139-3.181-8.657-3.237-8.811zm8.852-5.839c.224 1.651-.099 3.208-.713 4.746l-3.145 9.091c3.061-1.784 5.119-5.1 5.119-8.898 0-1.79-.457-3.473-1.261-4.939zm2.967 4.939c0 6.617-5.384 12-12 12s-12-5.383-12-12 5.383-12 12-12 12 5.383 12 12zm-.55 0c0-6.313-5.137-11.45-11.45-11.45s-11.45 5.137-11.45 11.45 5.137 11.45 11.45 11.45 11.45-5.137 11.45-11.45z"/></svg>')
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
				->set_options( $this->get_module( 'sv_webfontloader' ) ? $this->get_module( 'sv_webfontloader' )->get_font_options() : array('' => __('Please activate module SV Webfontloader for this Feature.', 'sv100')) )
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
				->set_description( __( 'Width', 'sv100' ) )
				->set_is_responsive(true)
				->load_type( 'number' );

			$this->get_setting( 'logo_height' )
				->set_title( __( 'Logo height', 'sv100' ) )
				->set_description( __( 'Height', 'sv100' ) )
				->set_default_value( '80' )
				->set_is_responsive(true)
				->load_type( 'number' );

			return $this;
		}
		public function load( $settings = array() ): string {
			if(!is_admin()){
				$this->load_settings()->register_scripts();
			}

			$settings								= shortcode_atts(
				array(
					'inline'						=> true,
					'template'					  => false,
				),
				$settings,
				$this->get_module_name()
			);

			ob_start();

			$this->get_script( 'common' )->set_inline( $settings['inline'] )->set_is_enqueued();
			$this->get_script( 'config' )->set_inline( $settings['inline'] )->set_is_enqueued();

			require ($this->get_path('lib/tpl/frontend/default.php' ));

			$output									= ob_get_contents();
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
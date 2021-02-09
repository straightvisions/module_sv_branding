<?php
	if ( $this->get_setting( 'active' )->get_data() ) { ?>
		<div class="<?php echo $this->get_prefix( ); ?> <?php echo $this->get_prefix( 'bar_column' ); ?>">
			<?php
				if ( get_header_image() ) {
					echo '<a href="' . get_home_url() . '"><img src="' . get_header_image() . '" alt="' . get_bloginfo( 'title' ) . '" /></a>';
				} elseif ( get_custom_logo() ) {
					$custom_logo_id		= get_theme_mod( 'custom_logo' );
					//var_dump($custom_logo_id);
					$logo				= wp_get_attachment_url( $custom_logo_id );
					$logo_width			= $this->get_setting('logo_width')->get_data();
					$logo_height		= $this->get_setting('logo_height')->get_data();

					$width				= intval(str_replace('px','',reset($logo_width)));
					$height				= intval(str_replace('px','',reset($logo_height)));

					echo '<a href="' . get_home_url() . '"><img src="' . esc_url( $logo ) . '" alt="' . get_bloginfo( 'name' ) . '" width="'.($width > 1 ? $width : '').'" height="'.($height > 1 ? $height : '').'"></a>';
				} else {
					$post_title = empty( $this->get_setting( 'title' )->get_data() )
						? get_bloginfo( 'name' )
						: $this->get_setting( 'title' )->get_data();
					echo '<a href="' . home_url() . '" class="' . $this->get_prefix( 'title' ) . '"><h3>' . $post_title . '</h3></a>';
				}
			?>
		</div>
		<?php
	}
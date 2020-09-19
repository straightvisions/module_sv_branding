<?php
	if ( $this->get_setting( 'active' )->get_data() ) { ?>
		<div class="<?php echo $this->get_prefix( ); ?> <?php echo $this->get_prefix( 'bar_column' ); ?>">
			<?php
				if ( get_header_image() ) {
					echo '<a href="' . get_home_url() . '"><img src="' . get_header_image() . '" alt="' . get_bloginfo( 'title' ) . '" /></a>';
				} elseif ( get_custom_logo() ) {
					echo get_custom_logo();
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
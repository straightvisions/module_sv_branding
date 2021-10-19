<?php if ( current_user_can( 'activate_plugins' ) ) { ?>
	<div class="sv_setting_subpage">
		<h2><?php _e('General', 'sv100'); ?></h2>
		<div class="sv_setting_flex">
			<?php
				echo $module->get_setting( 'active' )->form();
				echo $module->get_setting( 'title' )->form();
			?>
		</div>
		<h3 class="divider"><?php _e( 'Fonts', 'sv100' ); ?></h3>
		<div class="sv_setting_flex">
			<?php
				echo $module->get_setting( 'font' )->form();
				echo $module->get_setting( 'font_size' )->form();
				echo $module->get_setting( 'line_height' )->form();
			?>
		</div>
		<h3 class="divider"><?php _e( 'Colors', 'sv100' ); ?></h3>
		<div class="sv_setting_flex">
			<?php
				echo $module->get_setting( 'text_color' )->form();
				echo $module->get_setting( 'highlight_color' )->form();
			?>
		</div>
			<h3 class="divider"><?php _e( 'Logo', 'sv100' ); ?></h3>
			<p><a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" target="_blank"><?php _e('Set Site Logo in Customizer', 'sv100'); ?></a></p>
			<div class="sv_setting_flex">
				<?php
					echo $module->get_setting( 'logo_width' )->form();
					echo $module->get_setting( 'logo_height' )->form();
				?>
			</div>
	</div>
<?php } ?>
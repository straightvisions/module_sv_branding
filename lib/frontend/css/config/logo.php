<?php
	// Fetches all settings and creates new variables with the setting ID as name and setting data as value.
	// This reduces the lines of code for the needed setting values.
	foreach ( $script->get_parent()->get_settings() as $setting ) {
		${ $setting->get_ID() } = $setting->get_data();
	}
?>

<?php $logo_height = $logo_height > 0 ? $logo_height + 20 : 0; ?>

<?php if($logo_height){ ?>
.sv100_sv_branding .sv100_sv_branding_bar {
	max-height: <?php echo $logo_height + 20; ?>px;
}
<?php } ?>

.sv100_sv_branding .sv100_sv_branding_branding a {
	height: <?php echo $logo_height < 1 ? 'auto' : $logo_height . 'px'; ?>;
}

@media ( min-width: 1350px ) {
	.sv100_sv_branding .sv100_sv_branding_branding a {
		height: <?php echo $logo_height < 1 ? 'auto' : $logo_height . 'px'; ?>;
	}
}

.sv100_sv_branding img {
	width: <?php echo $logo_width_mobile < 1 ? 'auto' : $logo_width_mobile . 'px'; ?>;
	height: <?php echo $logo_height_mobile < 1 ? '100%' : $logo_height_mobile . 'px'; ?>;
	max-height: <?php echo $logo_height_mobile < 1 ? '60px' : $logo_height_mobile . 'px'; ?>;
}

@media ( min-width: 1350px ) {
	.sv100_sv_branding img {
		width: <?php echo $logo_width < 1 ? 'auto' : $logo_width . 'px'; ?>;
		height: <?php echo $logo_height < 1 ? '100%' : $logo_height . 'px'; ?>;
		max-height: <?php echo $logo_height < 1 ? '100px' : $logo_height . 'px'; ?>;
	}
}
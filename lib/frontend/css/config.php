<?php
	// Fetches all settings and creates new variables with the setting ID as name and setting data as value.
	// This reduces the lines of code for the needed setting values.
	foreach ( $script->get_parent()->get_settings() as $setting ) {
		${ $setting->get_ID() } = $setting->get_data();

		// If setting is color, it gets the value in the RGB-Format
		if ( $setting->get_type() === 'setting_color' ) {
			${ $setting->get_ID() } = $setting->get_rgb( ${ $setting->get_ID() } );
		}
	}

	if($script->get_parent()->has_logo()){
		require($script->get_parent()->get_path( 'lib/frontend/css/config/logo.php' ));
	}else{
		require($script->get_parent()->get_path( 'lib/frontend/css/config/title.php' ));
	}
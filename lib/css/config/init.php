<?php
	if($module->has_logo()){
		require($module->get_path( 'lib/css/config/general.php' ));
	}else{
		require($module->get_path( 'lib/css/config/title.php' ));
	}
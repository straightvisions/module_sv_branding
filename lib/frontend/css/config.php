<?php
	if($script->get_parent()->has_logo()){
		require($script->get_parent()->get_path( 'lib/frontend/css/config/logo.php' ));
	}else{
		require($script->get_parent()->get_path( 'lib/frontend/css/config/title.php' ));
	}
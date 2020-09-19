<?php
	if($script->get_parent()->has_logo()){
		require($script->get_parent()->get_path( 'lib/css/config/general.php' ));
	}else{
		require($script->get_parent()->get_path( 'lib/css/config/title.php' ));
	}
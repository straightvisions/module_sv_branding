<?php
	echo $_s->build_css(
		'.sv100_sv_branding img',
		array_merge(
			$module->get_setting('logo_width')->get_css_data('width','','px'),
			$module->get_setting('logo_height')->get_css_data('height','','px')
		)
	);
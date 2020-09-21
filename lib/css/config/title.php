<?php
	echo $_s->build_css(
		'.sv100_sv_branding_title h3',
		array_merge(
			$module->get_setting('font')->get_css_data('font-family'),
			$module->get_setting('font_size')->get_css_data('font-size','','px'),
			$module->get_setting('line_height')->get_css_data('line-height'),
			$module->get_setting('text_color')->get_css_data()
		)
	);

	echo $_s->build_css(
		'.sv100_sv_branding_title:hover h3, .sv100_sv_branding_title:focus h3',
		$module->get_setting('highlight_color')->get_css_data()
	);
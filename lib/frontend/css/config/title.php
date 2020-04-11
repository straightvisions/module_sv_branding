<?php
	$properties						= array();

	if($font_size) {
		$properties['font-size']	= $setting->prepare_css_property_responsive($font_size,'','px');
	}

	if($line_height) {
		$properties['line-height']	= $setting->prepare_css_property_responsive($line_height);
	}

	if($text_color){
		$properties['color']		= $setting->prepare_css_property($text_color,'rgba(',')');
	}

	if(isset($font['family'])){
		$properties['font-family']	= $setting->prepare_css_property($font['family'],'',', sans-serif;');
	}

	echo $setting->build_css(
			'.sv100_sv_branding_title h3',
			$properties
	);
?>

.sv100_sv_branding_title:hover h3,
.sv100_sv_branding_title:focus h3 {
	color: rgba(<?php echo $highlight_color; ?>);
}
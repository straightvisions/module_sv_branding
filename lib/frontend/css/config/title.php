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

	// Font
	// @todo: double code
	$value						= $font;
	$font_family				= false;
	$font_weight				= false;
	foreach($value as $breakpoint => $val) {
		if($val) {
			$f							= $setting->get_parent()->get_module('sv_webfontloader')->get_font_by_label($val);
			$font_family[$breakpoint]	= $f['family'];
			$font_weight[$breakpoint]	= $f['weight'];
		}else{
			$font_family[$breakpoint]	= false;
			$font_weight[$breakpoint]	= false;
		}
	}
	if($font_family){
		$properties['font-family']	= $setting->prepare_css_property_responsive($font_family,'',', sans-serif;');
		$properties['font-weight']	= $setting->prepare_css_property_responsive($font_weight,'','');
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
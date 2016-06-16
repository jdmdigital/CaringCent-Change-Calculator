<?php
// == CaringCent Handy Functions
// @since v0.3

if(!function_exists('get_ccalc_option')) {
	function get_ccalc_option($option = 'none') {
		
		$options 			= get_option( 'ccalc_settings' );
		$performanceoptions	= get_option( 'ccalc_performance_settings' );
		
		switch ($option) {
			case 'style':
				if(isset($options['ccalc_accentcolor']) && $options['ccalc_accentcolor'] != strtolower('#0092ae')) {
					return '<style>.text-primary{color:'.$options['ccalc_accentcolor'].'} .btn-primary, .question-circle{opacity:1; background-color:'.$options['ccalc_accentcolor'].'; border-color:'.$options['ccalc_accentcolor'].';}.btn-primary:hover, .btn-primary:focus, .btn-primary:active, .question-circle:hover, .question-circle:focus, .question-circle:active{opacity:0.8; color:#eee; background-color:'.$options['ccalc_accentcolor'].'; border-color:'.$options['ccalc_accentcolor'].'; transition:0.2s; -webkit-transition:0.2s;}</style>';
				} else {
					return ''; // nada
				}
			break;
			
			
			case 'desc_yearone':
				if(isset($options['ccalc_yearone']) && !empty($options['ccalc_yearone']) ) {
					return $options['ccalc_yearone'];
				} else {
					// Return default
					return 'We don\'t want to oversell you. This estimate is based on a very conservative monthly roll-up to the year end usage percentage you provided.';
				}
			break;
			case 'desc_futureyears':
				if(isset($options['ccalc_futureyears']) && !empty($options['ccalc_futureyears']) ) {
					return $options['ccalc_futureyears'];
				} else {
					// Return default
					return 'This estimate is very conservative and assumes you add no new donors to your CaringCent program in future years--which is unlikely.';
				}
			break;
			
			case 'label_existing_donors':
				if(isset($options['ccalc_existinglabel']) && !empty($options['ccalc_existinglabel']) ) {
					return $options['ccalc_existinglabel'];
				} else {
					// Return default
					return 'Existing Donors';
				}
			break;
			case 'num_existing_donors':
				if(isset($options['ccalc_existingnumber']) && !empty($options['ccalc_existingnumber'])) {
					return $options['ccalc_existingnumber'];
				} else {
					// Return default
					return '2000';
				}
			break;
			case 'desc_existing_donors':
				if(isset($options['ccalc_existing_desc']) && !empty($options['ccalc_existing_desc']) ) {
					return $options['ccalc_existing_desc'];
				} else {
					// Return default
					return 'How large is your current donor base?';
				}
			break;
			
			case 'label_new_donors':
				if(isset($options['ccalc_newlabel']) && !empty($options['ccalc_newlabel'])) {
					return $options['ccalc_newlabel'];
				} else {
					// Return default
					return 'New Donors';
				}
			break;
			case 'num_new_donors':
				if(isset($options['ccalc_newnumber']) && !empty($options['ccalc_newnumber'])) {
					return $options['ccalc_newnumber'];
				} else {
					// Return default
					return '0';
				}
			break;
			case 'desc_new_donors':
				if(isset($options['ccalc_new_desc']) && !empty($options['ccalc_new_desc'])) {
					return $options['ccalc_new_desc'];
				} else {
					// Return default
					return 'CaringCent helps you attract new donors--how many might we get?';
				}
			break;
			
			case 'label_usage':
				if(isset($options['ccalc_usagelabel']) && !empty($options['ccalc_usagelabel'])) {
					return $options['ccalc_usagelabel'];
				} else {
					// Return default
					return 'Usage (%)';
				}
			break;
			case 'num_usage':
				if(isset($options['ccalc_usagenumber']) && !empty($options['ccalc_usagenumber'])) {
					return $options['ccalc_usagenumber'];
				} else {
					// Return default
					return '6';
				}
			break;
			case 'desc_usage':
				if(isset($options['ccalc_usage_desc']) && !empty($options['ccalc_usage_desc'])) {
					return $options['ccalc_usage_desc'];
				} else {
					// Return default
					return 'What percentage of your donors do you estimate will sign up for CaringCent?';
				}
			break;
			
			case 'label_charge':
				if(isset($options['ccalc_chargelabel']) && !empty($options['ccalc_chargelabel'])) {
					return $options['ccalc_usagelabel'];
				} else {
					// Return default
					return 'Charge per card ($)';
				}
			break;
			case 'num_charge':
				if(isset($options['ccalc_chargenumber']) && !empty($options['ccalc_chargenumber'])) {
					return $options['ccalc_chargenumber'];
				} else {
					// Return default
					return '20.00';
				}
			break;
			case 'desc_charge':
				if(isset($options['ccalc_charge_desc']) && !empty($options['ccalc_charge_desc'])) {
					return $options['ccalc_charge_desc'];
				} else {
					// Return default
					return 'Based on national estimates, we\'d expect at least $20.00 in change per card.';
				}
			break;
			
			case 'label_fee':
				if(isset($options['ccalc_ccfeelabel']) && !empty($options['ccalc_ccfeelabel'])) {
					return $options['ccalc_ccfeelabel'];
				} else {
					// Return default
					return 'CaringCent Fee (%)';
				}
			break;
			case 'num_fee':
				if(isset($options['ccalc_ccfeenumber']) && !empty($options['ccalc_ccfeenumber'])) {
					return $options['ccalc_ccfeenumber'];
				} else {
					// Return default
					return '5';
				}
			break;
			case 'desc_fee':
				if(isset($options['ccalc_ccfee_desc']) && !empty($options['ccalc_ccfee_desc'])) {
					return $options['ccalc_ccfee_desc'];
				} else {
					// Return default
					return 'This provides for the ongoing development and support of this product.';
				}
			break;
			
			case 'label_process':
				if(isset($options['ccalc_processlabel']) && !empty($options['ccalc_processlabel'])) {
					return $options['ccalc_processlabel'];
				} else {
					// Return default
					return 'Processing Fee (%)';
				}
			break;
			case 'num_process':
				if(isset($options['ccalc_processnumber']) && !empty($options['ccalc_processnumber'])) {
					return $options['ccalc_processnumber'];
				} else {
					// Return default
					return '2.5';
				}
			break;
			case 'desc_process':
				if(isset($options['ccalc_process_desc']) && !empty($options['ccalc_process_desc'])) {
					return $options['ccalc_process_desc'];
				} else {
					// Return default
					return 'Can\'t avoid this fee -- Sorry!';
				}
			break;
			
			
			case 'before':
				if(isset($options['ccalc_textarea_before']) && !empty($options['ccalc_textarea_before'])) {
					return $options['ccalc_textarea_before'];
				} else {
					// Return default
					return '';
				}
			break;
			case 'after':
				if(isset($options['ccalc_textarea_after']) && !empty($options['ccalc_textarea_after'])) {
					return $options['ccalc_textarea_after'];
				} else {
					// Return default
					return '';
				}
			break;
			
			
			case 'minify-css':
				if(isset($performanceoptions['ccalc_checkbox_field_css']) && $performanceoptions['ccalc_checkbox_field_css'] == 1) {
					return true;
				} else {
					return false;
				}
			break;
			case 'minify-js':
				if(isset($performanceoptions['ccalc_checkbox_field_js']) && $performanceoptions['ccalc_checkbox_field_js'] == 1) {
					return true;
				} else {
					return false;
				}
			break;
			
			default:
				// No option passed; return automatic with error default.
				return get_option($option, 'Handy Function Error');
			break;
		} // end SWITCH		
	}
}
<?php
// == CaringCent Change Calculator Options
// @since v0.2

add_action( 'admin_menu', 'ccalc_add_admin_menu' );
add_action( 'admin_init', 'ccalc_settings_init' );

function ccalc_add_admin_menu(  ) { 
	add_options_page( 'CaringCent Change Calculator', 'Change Calc', 'manage_options', 'ccalc-plugin', 'ccalc_options_page' );
}

function ccalc_settings_init(  ) { 
	register_setting( 'ccalc_plugin_page', 'ccalc_settings' );
	register_setting( 'ccalc_plugin_page', 'ccalc_performance_settings' );

	// Global Settings
	add_settings_section(
		'ccalc_ccalc_plugin_page_section', 
		__( 'Global Settings', 'caringcent' ), 
		'ccalc_settings_section_callback', 
		'ccalc_plugin_page'
	);
	
	add_settings_field( 
		'ccalc_accentcolor', 
		__( 'Accent Color', 'caringcent' ), 
		'ccalc_accentcolor_render', 
		'ccalc_plugin_page', 
		'ccalc_ccalc_plugin_page_section' 
	);
	
	// Right-side content
	add_settings_field( 
		'ccalc_yearone', 
		__( 'Year One Desc', 'caringcent' ), 
		'ccalc_yearone_render', 
		'ccalc_plugin_page', 
		'ccalc_ccalc_plugin_page_section' 
	);
	add_settings_field( 
		'ccalc_futureyears', 
		__( 'Future Years Desc', 'caringcent' ), 
		'ccalc_futureyears_render', 
		'ccalc_plugin_page', 
		'ccalc_ccalc_plugin_page_section' 
	);
	
	// Existing Donors
	add_settings_field( 
		'ccalc_existinglabel', 
		__( 'Existing Donors Label', 'caringcent' ), 
		'ccalc_existinglabel_render', 
		'ccalc_plugin_page', 
		'ccalc_ccalc_plugin_page_section' 
	);
	add_settings_field( 
		'ccalc_existingnumber', 
		__( 'Existing Donors Number', 'caringcent' ), 
		'ccalc_existingnumber_render', 
		'ccalc_plugin_page', 
		'ccalc_ccalc_plugin_page_section' 
	);
	add_settings_field( 
		'ccalc_existing_desc', 
		__( 'Existing Donor Desc', 'caringcent' ), 
		'ccalc_existing_desc_render', 
		'ccalc_plugin_page', 
		'ccalc_ccalc_plugin_page_section' 
	);
	
	// New Donors
	add_settings_field( 
		'ccalc_newlabel', 
		__( 'New Donors Label', 'caringcent' ), 
		'ccalc_newlabel_render', 
		'ccalc_plugin_page', 
		'ccalc_ccalc_plugin_page_section' 
	);
	add_settings_field( 
		'ccalc_newnumber', 
		__( 'New Donors Number', 'caringcent' ), 
		'ccalc_newnumber_render', 
		'ccalc_plugin_page', 
		'ccalc_ccalc_plugin_page_section' 
	);
	add_settings_field( 
		'ccalc_new_desc', 
		__( 'New Donors Desc', 'caringcent' ), 
		'ccalc_new_desc_render', 
		'ccalc_plugin_page', 
		'ccalc_ccalc_plugin_page_section' 
	);
	
	// Usage %
	add_settings_field( 
		'ccalc_usagelabel', 
		__( 'Usage Percent Label', 'caringcent' ), 
		'ccalc_usagelabel_render', 
		'ccalc_plugin_page', 
		'ccalc_ccalc_plugin_page_section' 
	);
	add_settings_field( 
		'ccalc_usagenumber', 
		__( 'Usage Percent', 'caringcent' ), 
		'ccalc_usagenumber_render', 
		'ccalc_plugin_page', 
		'ccalc_ccalc_plugin_page_section' 
	);
	add_settings_field( 
		'ccalc_usage_desc', 
		__( 'Usage Desc', 'caringcent' ), 
		'ccalc_usage_desc_render', 
		'ccalc_plugin_page', 
		'ccalc_ccalc_plugin_page_section' 
	);
	
	// Charge per Card
	add_settings_field( 
		'ccalc_chargelabel', 
		__( 'Charge per Card Label', 'caringcent' ), 
		'ccalc_chargelabel_render', 
		'ccalc_plugin_page', 
		'ccalc_ccalc_plugin_page_section' 
	);
	add_settings_field( 
		'ccalc_chargenumber', 
		__( 'Charge per Card ($)', 'caringcent' ), 
		'ccalc_chargenumber_render', 
		'ccalc_plugin_page', 
		'ccalc_ccalc_plugin_page_section' 
	);
	add_settings_field( 
		'ccalc_charge_desc', 
		__( 'Charge per Card Desc', 'caringcent' ), 
		'ccalc_charge_desc_render', 
		'ccalc_plugin_page', 
		'ccalc_ccalc_plugin_page_section' 
	);
	
	// CaringCent Fee (%)
	add_settings_field( 
		'ccalc_ccfeelabel', 
		__( 'CaringCent Fee Label', 'caringcent' ), 
		'ccalc_ccfeelabel_render', 
		'ccalc_plugin_page', 
		'ccalc_ccalc_plugin_page_section' 
	);
	add_settings_field( 
		'ccalc_ccfeenumber', 
		__( 'CaringCent Fee (%)', 'caringcent' ), 
		'ccalc_ccfeenumber_render', 
		'ccalc_plugin_page', 
		'ccalc_ccalc_plugin_page_section' 
	);
	add_settings_field( 
		'ccalc_ccfee_desc', 
		__( 'CaringCent Fee Desc', 'caringcent' ), 
		'ccalc_ccfee_desc_render', 
		'ccalc_plugin_page', 
		'ccalc_ccalc_plugin_page_section' 
	);
	
	// Processing Fee (%)
	add_settings_field( 
		'ccalc_processlabel', 
		__( 'Process Fee Label', 'caringcent' ), 
		'ccalc_processlabel_render', 
		'ccalc_plugin_page', 
		'ccalc_ccalc_plugin_page_section' 
	);
	add_settings_field( 
		'ccalc_processnumber', 
		__( 'Processing Fee (%)', 'caringcent' ), 
		'ccalc_processnumber_render', 
		'ccalc_plugin_page', 
		'ccalc_ccalc_plugin_page_section' 
	);
	add_settings_field( 
		'ccalc_process_desc', 
		__( 'Processing Fee Desc', 'caringcent' ), 
		'ccalc_process_desc_render', 
		'ccalc_plugin_page', 
		'ccalc_ccalc_plugin_page_section' 
	);

	//Markup Styling
	add_settings_field( 
		'ccalc_textarea_before', 
		__( 'HTML Before', 'caringcent' ), 
		'ccalc_textarea_before_render', 
		'ccalc_plugin_page', 
		'ccalc_ccalc_plugin_page_section' 
	);
	add_settings_field( 
		'ccalc_textarea_after', 
		__( 'HTML After', 'caringcent' ), 
		'ccalc_textarea_after_render', 
		'ccalc_plugin_page', 
		'ccalc_ccalc_plugin_page_section' 
	);
	
	// Performance Settings
	add_settings_section(
		'ccalc_plugin_page_performance_section', 
		__( 'Performance Settings', 'caringcent' ), 
		'ccalc_performance_settings_section_callback', 
		'ccalc_plugin_page'
	);

	add_settings_field( 
		'ccalc_checkbox_field_css', 
		__( 'Use Minified CSS?', 'caringcent' ), 
		'ccalc_checkbox_field_css_render', 
		'ccalc_plugin_page', 
		'ccalc_plugin_page_performance_section' 
	);
	
	add_settings_field( 
		'ccalc_checkbox_field_js', 
		__( 'Use Minified JS?', 'caringcent' ), 
		'ccalc_checkbox_field_js_render', 
		'ccalc_plugin_page', 
		'ccalc_plugin_page_performance_section' 
	);

}

function ccalc_accentcolor_render(  ) { 
	$options = get_option( 'ccalc_settings' );
	?>
	<input type='text' class='regular-text' name='ccalc_settings[ccalc_accentcolor]' value='<?php if(isset($options['ccalc_accentcolor'])) echo $options['ccalc_accentcolor']; ?>' placeholder="#0092ae">
	<p class="description group-end"><?php echo __( 'The accent color (in hexidecimal) or leave blank to use the default.', 'caringcent' ); ?></p>
	<?php
}

// Years
function ccalc_yearone_render( ) {
	$options = get_option( 'ccalc_settings' );
	?>
	<textarea cols='37' rows='3' id="ccalc_settings[ccalc_yearone]" name='ccalc_settings[ccalc_yearone]' placeholder="We don't want to oversell you. This estimate is based on a very conservative monthly roll-up to the year end usage percentage you provided."><?php if(isset($options['ccalc_yearone'])) { echo $options['ccalc_yearone']; } ?></textarea>
	<p class="description"><?php echo __( 'Description shown below Year One Raised on the right.', 'caringcent' ); ?></p>
	<?php
}
function ccalc_futureyears_render( ) {
	$options = get_option( 'ccalc_settings' );
	?>
	<textarea cols='37' rows='3' id="ccalc_settings[ccalc_futureyears]" name='ccalc_settings[ccalc_futureyears]' placeholder="This estimate is very conservative and assumes you add no new donors to your CaringCent program in future years--which is unlikely."><?php if(isset($options['ccalc_futureyears'])) { echo $options['ccalc_futureyears']; } ?></textarea>
	<p class="description group-end"><?php echo __( 'Description shown below Future Years on the right.', 'caringcent' ); ?></p>
	<?php
}

// Existing Donors
function ccalc_existinglabel_render(  ) { 
	$options = get_option( 'ccalc_settings' );
	?>
	<input type='text' class='regular-text' name='ccalc_settings[ccalc_existinglabel]' value='<?php if(isset($options['ccalc_existinglabel'])) echo $options['ccalc_existinglabel']; ?>' placeholder="Existing Donors">
	<p class="description"><?php echo __( 'Field label defaults to "Existing Donors."', 'caringcent' ); ?></p>
	<?php
}
function ccalc_existingnumber_render(  ) { 
	$options = get_option( 'ccalc_settings' );
	?>
	<input type='number' class='regular-text' name='ccalc_settings[ccalc_existingnumber]' value='<?php if(isset($options['ccalc_existingnumber'])) echo $options['ccalc_existingnumber']; ?>' placeholder="2000">
	<p class="description"><?php echo __( 'The default value (number) for current donor base.', 'caringcent' ); ?></p>
	<?php
}
function ccalc_existing_desc_render( ) {
	$options = get_option( 'ccalc_settings' );
	?>
	<textarea cols='37' rows='2' id="ccalc_settings[ccalc_existing_desc]" name='ccalc_settings[ccalc_existing_desc]' placeholder="How large is your current donor base?"><?php if(isset($options['ccalc_existing_desc'])) { echo trim($options['ccalc_existing_desc'], 'HdWr'); } ?></textarea>
	<p class="description group-end"><?php echo __( 'Description shown below Existing Donors input.', 'caringcent' ); ?></p>
	<?php
}

// New Donors
function ccalc_newlabel_render(  ) { 
	$options = get_option( 'ccalc_settings' );
	?>
	<input type='text' class='regular-text' name='ccalc_settings[ccalc_newlabel]' value='<?php if(isset($options['ccalc_newlabel'])) echo $options['ccalc_newlabel']; ?>' placeholder="New Donors">
	<p class="description"><?php echo __( 'Field label defaults to "New Donors."', 'caringcent' ); ?></p>
	<?php
}
function ccalc_newnumber_render(  ) { 
	$options = get_option( 'ccalc_settings' );
	?>
	<input type='number' class='regular-text' name='ccalc_settings[ccalc_newnumber]' value='<?php if(isset($options['ccalc_newnumber'])) echo $options['ccalc_newnumber']; ?>' placeholder="0">
	<p class="description"><?php echo __( 'The default value (number) for possible new donors.', 'caringcent' ); ?></p>
	<?php
}
function ccalc_new_desc_render( ) {
	$options = get_option( 'ccalc_settings' );
	?>
	<textarea cols='37' rows='2' id="ccalc_settings[ccalc_new_desc]" name='ccalc_settings[ccalc_new_desc]' placeholder="CaringCent helps you attract new donors--how many might we get?"><?php if(isset($options['ccalc_new_desc'])) { echo trim($options['ccalc_new_desc'], 'HdWr'); } ?></textarea>
	<p class="description group-end"><?php echo __( 'Description shown below New Donors input.', 'caringcent' ); ?></p>
	<?php
}

// Usage Percent
function ccalc_usagelabel_render(  ) { 
	$options = get_option( 'ccalc_settings' );
	?>
	<input type='text' class='regular-text' name='ccalc_settings[ccalc_usagelabel]' value='<?php if(isset($options['ccalc_usagelabel'])) echo $options['ccalc_usagelabel']; ?>' placeholder="Usage (%)">
	<p class="description"><?php echo __( 'Field label defaults to "Usage (%)."', 'caringcent' ); ?></p>
	<?php
}
function ccalc_usagenumber_render(  ) { 
	$options = get_option( 'ccalc_settings' );
	if(isset($options['ccalc_usagenumber'])) {
		$usagenumval = str_replace('%','',$options['ccalc_usagenumber']);
	}
	?>
	<input type='number' class='regular-text' name='ccalc_settings[ccalc_usagenumber]' value='<?php if(isset($options['ccalc_usagenumber'])) echo $usagenumval; ?>' placeholder="6">
	<p class="description"><?php echo __( 'The default value (percent without the %-sign) for default usage percent.', 'caringcent' ); ?></p>
	<?php
}
function ccalc_usage_desc_render( ) {
	$options = get_option( 'ccalc_settings' );
	?>
	<textarea cols='37' rows='2' id="ccalc_settings[ccalc_usage_desc]" name='ccalc_settings[ccalc_usage_desc]' placeholder="What percentage of your donors do you estimate will sign up for CaringCent?"><?php if(isset($options['ccalc_usage_desc'])) { echo trim($options['ccalc_usage_desc'], 'HdWr'); } ?></textarea>
	<p class="description group-end"><?php echo __( 'Description shown below Usage Percent input.', 'caringcent' ); ?></p>
	<?php
}

// Charge per Card ($)
function ccalc_chargelabel_render(  ) { 
	$options = get_option( 'ccalc_settings' );
	?>
	<input type='text' class='regular-text' name='ccalc_settings[ccalc_chargelabel]' value='<?php if(isset($options['ccalc_chargelabel'])) echo $options['ccalc_chargelabel']; ?>' placeholder="Charge per card ($)">
	<p class="description"><?php echo __( 'Field label defaults to "Charge per card ($)."', 'caringcent' ); ?></p>
	<?php
}
function ccalc_chargenumber_render(  ) { 
	$options = get_option( 'ccalc_settings' );
	if(isset($options['ccalc_chargenumber'])) {
		$chargenumval = str_replace('$','',$options['ccalc_chargenumber']);
	}
	?>
	<input type='number' class='regular-text' name='ccalc_settings[ccalc_chargenumber]' value='<?php if(isset($options['ccalc_chargenumber'])) echo $chargenumval; ?>' placeholder="20.00">
	<p class="description"><?php echo __( 'The default value (without the $-sign) for default charge per card.', 'caringcent' ); ?></p>
	<?php
}
function ccalc_charge_desc_render( ) {
	$options = get_option( 'ccalc_settings' );
	?>
	<textarea cols='37' rows='2' id="ccalc_settings[ccalc_charge_desc]" name='ccalc_settings[ccalc_charge_desc]' placeholder="Based on national estimates, we'd expect at least $20.00 in change per card."><?php if(isset($options['ccalc_charge_desc'])) { echo trim($options['ccalc_charge_desc'], 'HdWr'); } ?></textarea>
	<p class="description group-end"><?php echo __( 'Description shown below Charge per Card readonly input.', 'caringcent' ); ?></p>
	<?php
}

// CaringCent Fee (%)
function ccalc_ccfeelabel_render(  ) { 
	$options = get_option( 'ccalc_settings' );
	?>
	<input type='text' class='regular-text' name='ccalc_settings[ccalc_ccfeelabel]' value='<?php if(isset($options['ccalc_ccfeelabel'])) echo $options['ccalc_ccfeelabel']; ?>' placeholder="CaringCent Fee (%)">
	<p class="description"><?php echo __( 'Field label defaults to "CaringCent Fee (%)."', 'caringcent' ); ?></p>
	<?php
}
function ccalc_ccfeenumber_render(  ) { 
	$options = get_option( 'ccalc_settings' );
	if(isset($options['ccalc_ccfeenumber'])) {
		$feenumval = str_replace('%','',$options['ccalc_ccfeenumber']);
	}
	?>
	<input type='number' class='regular-text' name='ccalc_settings[ccalc_ccfeenumber]' value='<?php if(isset($options['ccalc_ccfeenumber'])) echo $feenumval; ?>' placeholder="5">
	<p class="description"><?php echo __( 'The default value (without the %-sign) for CaringCent fee.', 'caringcent' ); ?></p>
	<?php
}
function ccalc_ccfee_desc_render( ) {
	$options = get_option( 'ccalc_settings' );
	?>
	<textarea cols='37' rows='2' id="ccalc_settings[ccalc_ccfee_desc]" name='ccalc_settings[ccalc_ccfee_desc]' placeholder="This provides for the ongoing development and support of this product."><?php if(isset($options['ccalc_ccfee_desc'])) { echo trim($options['ccalc_ccfee_desc'], 'HdWr'); } ?></textarea>
	<p class="description group-end"><?php echo __( 'Description shown below CaringCent fee readonly input.', 'caringcent' ); ?></p>
	<?php
}

// Processing Fee (%)
function ccalc_processlabel_render(  ) { 
	$options = get_option( 'ccalc_settings' );
	?>
	<input type='text' class='regular-text' name='ccalc_settings[ccalc_processlabel]' value='<?php if(isset($options['ccalc_processlabel'])) echo $options['ccalc_processlabel']; ?>' placeholder="Processing Fee (%)">
	<p class="description"><?php echo __( 'Field label defaults to "Processing Fee (%)."', 'caringcent' ); ?></p>
	<?php
}
function ccalc_processnumber_render(  ) { 
	$options = get_option( 'ccalc_settings' );
	if(isset($options['ccalc_processnumber'])) {
		$feenumval = str_replace('%','',$options['ccalc_processnumber']);
	}
	?>
	<input type='number' class='regular-text' name='ccalc_settings[ccalc_processnumber]' value='<?php if(isset($options['ccalc_processnumber'])) echo $feenumval; ?>' placeholder="2.5">
	<p class="description"><?php echo __( 'The default credit card processing fee (without the %-sign).', 'caringcent' ); ?></p>
	<?php
}
function ccalc_process_desc_render( ) {
	$options = get_option( 'ccalc_settings' );
	?>
	<textarea cols='37' rows='2' id="ccalc_settings[ccalc_process_desc]" name='ccalc_settings[ccalc_process_desc]' placeholder="Can't avoid this fee -- Sorry!"><?php if(isset($options['ccalc_process_desc'])) { echo trim($options['ccalc_process_desc'], 'HdWr'); } ?></textarea>
	<p class="description group-end"><?php echo __( 'Description shown below Processing fee readonly input.', 'caringcent' ); ?></p>
	<?php
}

function ccalc_textarea_before_render( ) {
	$options = get_option( 'ccalc_settings' );
	?>
	<textarea cols='37' rows='5' name='ccalc_settings[ccalc_textarea_before]' placeholder="</section><section>"><?php if(isset($options['ccalc_textarea_before'])) { echo trim($options['ccalc_textarea_before'], 'HdWr'); } ?></textarea>
	<p class="description"><?php echo __( 'OPTIONAL: HTML placed before calculator.', 'caringcent' ); ?></p>
	<?php
}

function ccalc_textarea_after_render( ) {
	$options = get_option( 'ccalc_settings' );
	?>
	<textarea cols='37' rows='5' name='ccalc_settings[ccalc_textarea_after]' placeholder="</section><section>"><?php if(isset($options['ccalc_textarea_after'])) { echo trim($options['ccalc_textarea_after'], 'HdWr'); } ?></textarea>
	<p class="description group-end"><?php echo __( 'OPTIONAL: HTML placed after calculator.', 'caringcent' ); ?></p>
	<?php
}


// PERFORMACE
function ccalc_checkbox_field_css_render(  ) { 
	$options = get_option( 'ccalc_performance_settings' );
	if(isset($options['ccalc_checkbox_field_css']) && $options['ccalc_checkbox_field_css'] == 1) {$ccalc_checkbox_field_css_check = true;} else {$ccalc_checkbox_field_css_check = false;}
	?>
	<input type='checkbox' id="ccalc_performance_settings[ccalc_checkbox_field_css]" name='ccalc_performance_settings[ccalc_checkbox_field_css]' <?php if ($ccalc_checkbox_field_css_check) echo 'checked="checked"'; ?> value='1'>
	<label for="ccalc_checkbox_field_js">Yes</label>
	<?php
}
function ccalc_checkbox_field_js_render(  ) { 
	$options = get_option( 'ccalc_performance_settings' );
	if(isset($options['ccalc_checkbox_field_js']) && $options['ccalc_checkbox_field_js'] == 1) {$ccalc_checkbox_field_js_check = true;} else {$ccalc_checkbox_field_js_check = false;}
	?>
	<input type='checkbox' id="ccalc_performance_settings[ccalc_checkbox_field_js]" name='ccalc_performance_settings[ccalc_checkbox_field_js]' <?php if ($ccalc_checkbox_field_js_check) echo 'checked="checked"'; ?> value='1'>
	<label for="ccalc_checkbox_field_js">Yes</label>
	<?php
}


function ccalc_settings_section_callback(  ) { 
	echo '<p>'. __( 'Use these settings to set the global defaults.  You can overwrite these using shortcode arguments, or just asking <a href="http://jdmdigital.co/beer" target="_blank" rel="nofollow">Justin Downey</a>.', 'caringcent' ).'</p>';
	echo '<style>.form-table th{padding-top:15px;}.form-table td{padding-top:7px; padding-bottom:5px;} .form-table td p.group-end{margin-bottom:35px;}</style>';
}

function ccalc_performance_settings_section_callback(  ) { 
	echo '<p>'. __( 'Fast loading speed matters. Here are some performance optimization settings (for advanced users).  Check both of these for maximum speed!', 'caringcent' ).'</p>';
}


function ccalc_options_page(  ) { 
	?>
	<div id="calc-page" class="wrap">
		<h1>CaringCent Change Calculator <small style="color:#888">v<?php echo ccalc_get_version(); ?></small></h1>
		<p>To use the Change Calculator, simply paste the shortcode below anywhere in the page or post editor where you'd like it displayed.  More information in the <a href="https://github.com/jdmdigital/CaringCent-Change-Calculator/" target="_blank">GitHub README</a>, if you're feeling nerdy.  Otherwise, it should be fairly self-explanatory.</p>
		<table class="form-table" style="margin-bottom:60px;">
			<tr>
				<th scope="row">Copy &amp; Paste Shortcode:</th>
				<td><input type="text" value="[changecalculator]" readonly="readonly" class="regular-text" style="background-color:#0073aa; color:#fff;" /></td>
			</tr>
		</table>
		<form action='options.php' method='post'>
			<?php
			settings_fields( 'ccalc_plugin_page' );
			do_settings_sections( 'ccalc_plugin_page' );
			submit_button();
			?>
		</form>

	</div>
	<?php
}
// == END OPTIONS

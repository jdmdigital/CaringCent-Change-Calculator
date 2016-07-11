<?php
// == CaringCent Shortcode
// @since v0.1

// == Change Calc Shortcode ==
// [changecalculator existingdonors="2000" newdonors="0" usage="6" changepercard="20.00" caringcentfee="5" processingfee="2.5"]
if(!function_exists('ccalc_changecalculator_shortcode') && !shortcode_exists('changecalculator') ) {
	function ccalc_changecalculator_shortcode($atts) {
		extract( shortcode_atts( array(
			'label_existing_donors' => '',
			'num_existing_donors' 	=> '',
			'desc_existing_donors' 	=> '',
			'label_new_donors'		=> '',
			'num_new_donors' 		=> '',
			'desc_new_donors' 		=> '',
			'label_usage' 			=> '',
			'num_usage' 			=> '',
			'desc_usage' 			=> '',
			'label_charge' 			=> '',
			'num_charge' 			=> '',
			'desc_charge' 			=> '',
			'label_fee' 			=> '',
			'num_fee' 				=> '',
			'desc_fee' 				=> '',
			'label_process' 		=> '',
			'num_process' 			=> '',
			'desc_process'			=> '',
			'yearonetext' 			=> '',
			'futureyearstext'		=> '',
		), $atts ) );
		
		//$options = get_option( 'ccalc_settings' );
		

		if($yearonetext == '') {$yearonetext = get_ccalc_option('desc_yearone');}
		if($futureyearstext == '') {$futureyearstext = get_ccalc_option('desc_futureyears');} 
		
		/* == Grab data based on options with defaults for all variables no overridden in shortcode atts */
		
		// Existing Donors
		if($label_existing_donors == '')	{$label_existing_donors	= get_ccalc_option('label_existing_donors');}
		if($num_existing_donors == '') 		{$num_existing_donors 	= get_ccalc_option('num_existing_donors');}
		if($desc_existing_donors == '') 	{$desc_existing_donors	= get_ccalc_option('desc_existing_donors');}
		
		// New Donors
		if($label_new_donors == '') 		{$label_new_donors 		= get_ccalc_option('label_new_donors');}
		if($num_new_donors == '') 			{$num_new_donors 		= get_ccalc_option('num_new_donors');}
		if($desc_new_donors == '') 			{$desc_new_donors		= get_ccalc_option('desc_new_donors');}
		
		// Usage %
		if($label_usage == '') 				{$label_usage 			= get_ccalc_option('label_usage');}
		if($num_usage == '') 				{$num_usage 			= get_ccalc_option('num_usage');}
		if($desc_usage == '') 				{$desc_usage			= get_ccalc_option('desc_usage');}
		
		// Charge per Card
		if($label_charge == '') 			{$label_charge 			= get_ccalc_option('label_charge');}
		if($num_charge == '') 				{$num_charge 			= get_ccalc_option('num_charge');}
		if($desc_charge == '') 				{$desc_charge			= get_ccalc_option('desc_charge');}
		
		// CC Fee
		if($label_fee == '') 				{$label_fee 			= get_ccalc_option('label_fee');}
		if($num_fee == '') 					{$num_fee 				= get_ccalc_option('num_fee');}
		if($desc_fee == '') 				{$desc_fee				= get_ccalc_option('desc_fee');}
		
		// Processing Fee
		if($label_process == '') 			{$label_process 		= get_ccalc_option('label_process');}
		if($num_process == '') 				{$num_process 			= get_ccalc_option('num_process');}
		if($desc_process == '') 			{$desc_process			= get_ccalc_option('desc_process');}
		
		//if($accentcolor == '') {$accentcolor = get_option('ccalc_accentcolor', '#0171BC');}
		
		/*$boldthis = "no new donors" ;
		$replacepattern = "<b>$0<\/b>";
		preg_replace($boldthis, $replacepattern, $futureyearstext);*/
		
		$changepercardNUM = floatval($num_charge);
		$changepercardUSD = number_format($changepercardNUM, 2, '.',',');
		
		$usagepercent = floatval($num_usage) / 100;
		$caringcentfeepercent = floatval($num_fee) / 100;
		$processingfeepercent = floatval($num_process) / 100;
		$fees = $caringcentfeepercent + $processingfeepercent;
		
		$totaldonorsN = floatval($num_existing_donors) + floatval($num_new_donors);
		$totaldonors1 = floatval($num_existing_donors) + ( floatval($num_new_donors) / 2 );
		
		$yearonetotal = (( ($totaldonors1 * $usagepercent * $changepercardUSD) ) * 12) * 0.55; // 0.55 is linear average uptake
		$yearonetotal = $yearonetotal - ($fees * $yearonetotal);
		
		$futureyears = ($totaldonorsN * $usagepercent * $changepercardUSD) * 12;
		$futureyears = $futureyears - ($fees * $futureyears);
		
		$html  = '';
		$html .= get_ccalc_option('before');
		$html .= '
		<div id="changecalc" class="row">
			'.get_ccalc_option('style').'
			<div class="col-sm-6">
				<form class="form-horizontal" role="form" autocomplete="off">
					<input type="hidden" id="existingdonors0" value="'.$num_existing_donors.'" tabindex="-1" />
					<input type="hidden" id="newdonors0" value="'.$num_new_donors.'"  tabindex="-2" />
					<input type="hidden" id="usage0" value="'.$num_usage.'"  tabindex="-3" />
					<input type="hidden" id="changepercard0" value="'.$num_charge.'"  tabindex="-4" />
					<input type="hidden" id="caringcentfee0" value="'.$num_fee.'"  tabindex="-5" />
					<input type="hidden" id="processingfee0" value="'.$num_process.'"  tabindex="-6" />
					
					<input type="hidden" id="yearonetotal0" value="'.$yearonetotal.'"  tabindex="-7" />
					<input type="hidden" id="futureyears0" value="'.$futureyears.'" tabindex="-8" />
					<div class="form-group">
						<label for="existingdonors" class="col-sm-5 control-label">'.$label_existing_donors.'</label>
						<div class="col-sm-7">
							<input type="number" class="form-control" id="existingdonors" aria-describedby="existingdonorsHelp" value="'.$num_existing_donors.'" required/>
							<span id="existingdonorsHelp" class="help-block">'.$desc_existing_donors.'</span>
						</div>
					</div>
					<div class="form-group">
						<label for="newdonors" class="col-sm-5 control-label">'.$label_new_donors.'</label>
						<div class="col-sm-7">
							<input type="number" class="form-control" id="newdonors" aria-describedby="newdonorsHelp" value="'.$num_new_donors.'" required/>
							<span id="newdonorsHelp" class="help-block">'.$desc_new_donors.'</span>
						</div>
					</div>
					<div class="form-group">
						<label for="usage" class="col-sm-5 control-label">'.$label_usage.'</label>
						<div class="col-sm-7">
							<div class="input-group">
								<input type="number" class="form-control percent" id="usage" aria-describedby="usageHelp" value="'.$num_usage.'" required/>
								<span class="input-group-addon">%</span>
							</div>
							<span id="usageHelp" class="help-block">'.$desc_usage.'</span>
							<input type="hidden" id="usageNum" value="'.$usagepercent.'" />
						</div>
					</div>
					<div id="assumptions" style="display:none">
						<div class="form-group">
							<label for="changepercard" class="col-sm-5 control-label">'.$label_charge.'</label>
							<div class="col-sm-7">
								<input type="text" class="form-control" id="changepercard" aria-describedby="changepercardHelp" value="$'.$changepercardUSD.'" readonly="readonly" />
								<span id="changepercardHelp" class="help-block">'.$desc_charge.'</span>
								<input type="hidden" id="changepercardNum" value="'.$changepercardUSD.'" />
							</div>
						</div>
						<div class="form-group">
							<label for="caringcentfee" class="col-sm-5 control-label">'.$label_fee.'</label>
							<div class="col-sm-7">
								<input type="text" class="form-control percent" id="caringcentfee" aria-describedby="caringcentfeeHelp" value="'.$num_fee.'%" readonly="readonly" />
								<span id="caringcentfeeHelp" class="help-block">'.$desc_fee.'</span>
								<input type="hidden" id="caringcentfeeNum" value="'.$caringcentfeepercent.'" />
							</div>
						</div>
						<div class="form-group">
							<label for="processingfee" class="col-sm-5 control-label">'.$label_process.'</label>
							<div class="col-sm-7">
								<input type="text" class="form-control percent" id="processingfee" aria-describedby="processingfeeHelp" value="'.$num_process.'%" readonly="readonly"/>
								<span id="processingfeeHelp" class="help-block">'.$desc_process.'</span>
								<input type="hidden" id="processingfeeNum" value="'.$processingfeepercent.'" />
							</div>
						</div>
					</div>
					<div class="clearfixer">
						<button class="btn btn-sm btn-default btn-dark pull-right" id="resetrecalc">Reset</button><button class="btn btn-sm btn-primary pull-right" id="showassumptions">Show Assumptions</button>
					</div>
				</form>
			</div>
			<div class="col-sm-6">
				<div class="yearone">
					<h3 id="yearonetotal" class="no-top-margin">Year One Raised: <b class="text-primary">$<span>0</span></b> <small>/year (net)</small></h3>
					<p>'.$yearonetext.'</p>
				</div>
				<div class="futureyears">
					<h3 id="futureyearstotal">Future Years: <b class="text-primary">$<span>0</span></b> <small>/year (net)</small></h3>
					<p>'.$futureyearstext.'</p>
				</div>
			</div>
		</div>
		';
		
		$html .= get_ccalc_option('after');
		
		return $html;
	} // End function
	
	add_shortcode( 'changecalculator', 'ccalc_changecalculator_shortcode' );

} //end if exists checks

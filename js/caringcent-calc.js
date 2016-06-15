/* 
 * CaringCent Change Calculator JS - v0.5
 * Includes: animateNumber v 0.0.13, and jQuery Percentage
 */
 
/*
 jQuery animateNumber plugin v0.0.13
 (c) 2013, Alexandr Borisov.
 https://github.com/aishek/jquery-animateNumber
*/
(function(d){var q=function(b){return b.split("").reverse().join("")},m={numberStep:function(b,a){var e=Math.floor(b);d(a.elem).text(e)}},h=function(b){var a=b.elem;a.nodeType&&a.parentNode&&(a=a._animateNumberSetter,a||(a=m.numberStep),a(b.now,b))};d.Tween&&d.Tween.propHooks?d.Tween.propHooks.number={set:h}:d.fx.step.number=h;d.animateNumber={numberStepFactories:{append:function(b){return function(a,e){var g=Math.floor(a);d(e.elem).prop("number",a).text(g+b)}},separator:function(b,a,e){b=b||" ";
a=a||3;e=e||"";return function(g,k){var c=Math.floor(g).toString(),t=d(k.elem);if(c.length>a){for(var f=c,l=a,m=f.split("").reverse(),c=[],n,r,p,s=0,h=Math.ceil(f.length/l);s<h;s++){n="";for(p=0;p<l;p++){r=s*l+p;if(r===f.length)break;n+=m[r]}c.push(n)}f=c.length-1;l=q(c[f]);c[f]=q(parseInt(l,10).toString());c=c.join(b);c=q(c)}t.prop("number",g).text(c+e)}}}};d.fn.animateNumber=function(){for(var b=arguments[0],a=d.extend({},m,b),e=d(this),g=[a],k=1,c=arguments.length;k<c;k++)g.push(arguments[k]);
if(b.numberStep){var h=this.each(function(){this._animateNumberSetter=b.numberStep}),f=a.complete;a.complete=function(){h.each(function(){delete this._animateNumberSetter});f&&f.apply(this,arguments)}}return e.animate.apply(e,g)}})(jQuery);

 
/*
jQuery Percentage on GitHub http://amatellanes.github.io/jquery-percentage/
https://github.com/amatellanes/jquery-percentage/blob/master/jquery-percentage.min.js
*/
!function(a){var b=function(a,b,c){return this.slice(0,a)+c+this.slice(b)};a.fn.percentage=function(c,d){return c===!0&&this.is("input:text")?this.on({"keydown.format":function(c){var e=a(this),f=c.keyCode?c.keyCode:c.which,g=this.selectionStart,h=this.selectionEnd,i=this.value.length,j=e.data("percentage")||{};if(!(46==f||9==f||27==f||13==f||(65==f||82==f)&&(c.ctrlKey||c.metaKey)===!0||(86==f||67==f)&&(c.ctrlKey||c.metaKey)===!0||f>=35&&39>=f)){if((48>f||f>57)&&(96>f||f>105)&&8!==f||c.shiftKey)return void c.preventDefault();if(a.isNumeric(d)){var k=b.call(e.val(),g,h,String.fromCharCode(c.keyCode));if(k>d)return void c.preventDefault()}return 8===c.keyCode?(g>=i&&c.preventDefault(),void(j.c=g===h?g-1:g)):""!==this.value&&g>=i?void c.preventDefault():(j.c=g+1,a(this).data("percentage",j),!0)}},"keyup.format":function(b){var c=a(this),d=b.keyCode?b.keyCode:b.which,e=c.data("percentage");""===this.value||(48>d||d>57)&&(96>d||d>105)&&8!==d||(c.val(c.val()),this.setSelectionRange(e.c,e.c))},"paste.format":function(b){var c=a(this),d=b.originalEvent,e=null;return window.clipboardData&&window.clipboardData.getData?e=window.clipboardData.getData("Text"):d.clipboardData&&d.clipboardData.getData&&(e=d.clipboardData.getData("text/plain")),e>2&&c.val(e),b.preventDefault(),!1}}).each(function(){a(this).data("percentage",{init:!0,max:d})}):this.text(a.percentage.apply(window,arguments))};var c,d;a.isPlainObject(a.valHooks.text)?(a.isFunction(a.valHooks.text.get)&&(c=a.valHooks.text.get),a.isFunction(a.valHooks.text.set)&&(d=a.valHooks.text.set)):a.valHooks.text={},a.valHooks.text.get=function(b){var d=a(b),e=d.data("percentage");return e?""===b.value?"":parseFloat(b.value).toString():a.isFunction(c)?c(b):void 0},a.valHooks.text.set=function(b,c){var e=a(b),f=e.data("percentage");return f?b.value=""===c?"":a.percentage(c,f.max):a.isFunction(d)?d(b,c):void 0},a.percentage=function(b,c){return a.isNumeric(b)||(b=0),a.isNumeric(c)&&b>c&&(b=0),b+"%"}}(jQuery);


// calcObject is initial values
var calcObject = {
	amountNull : '0.00',
	amountY1 : '0.00', // first year
	amountYn : '0.00', // nth year
	
	runcalc : function() {
		var existingdonors = parseFloat(jQuery('#existingdonors').val());
		var newdonors = parseFloat(jQuery('#newdonors').val());
		
		var totaldonorsN = existingdonors + newdonors;
		var totaldonors1 = existingdonors + ( newdonors / 2 );
		var usage  = parseFloat(jQuery('#usageNum').val());
		var changeamt = parseFloat(jQuery('#changepercardNum').val());
		var caringfee = parseFloat(jQuery('#caringcentfeeNum').val());
		var processfee = parseFloat(jQuery('#processingfeeNum').val());
		//var included = $('#tax_included').is(':checked');
		var fees = caringfee + processfee;
		
		// Using Linear Equasion: y = 0.0818x + 0.0182
		var y1rev = (( (totaldonors1 * usage * changeamt) ) * 12) * 0.55; // 0.55 is linear average uptake
		calcObject.amountY1 = (parseFloat(y1rev) - (fees * parseFloat(y1rev)));
		
		var yNrev = (totaldonorsN * usage * changeamt) * 12;
		calcObject.amountYn = (parseFloat(yNrev) - (fees * parseFloat(yNrev)));
		
		// Animate and output
		var comma_separator_number_step = jQuery.animateNumber.numberStepFactories.separator(',')
		jQuery('#yearonetotal span').animateNumber({ number: calcObject.amountY1, numberStep: comma_separator_number_step });
		jQuery('#futureyearstotal span').animateNumber({ number: calcObject.amountYn, numberStep: comma_separator_number_step});
	} // end "runcalc" method
};



jQuery( document ).ready(function() {
	// Ready!
	var comma_separator_number_step = jQuery.animateNumber.numberStepFactories.separator(',')
	var yearonetotal0 = parseFloat(jQuery('#yearonetotal0').val());
	var futureyears0 = parseFloat(jQuery('#futureyears0').val());
	jQuery('#yearonetotal span').animateNumber({ number: yearonetotal0, numberStep: comma_separator_number_step });
	jQuery('#futureyearstotal span').animateNumber({ number: futureyears0, numberStep: comma_separator_number_step});
	jQuery('#changecalc form input').keydown( function(e) {
        var key = e.charCode ? e.charCode : e.keyCode ? e.keyCode : 0;
        if(key == 13) {
            e.preventDefault();
            var inputs = jQuery(this).closest('form').find(':input:not([disabled])');
            inputs.eq( inputs.index(this)+ 1 ).focus();
        }
    });
	jQuery('#showassumptions').click(function (evt) {
		evt.preventDefault();
		jQuery('#assumptions').toggle("fast"); 
		if (jQuery.trim(jQuery(this).text()) === 'Show Assumptions') {
			jQuery(this).text('Hide Assumptions');
		} else {
			jQuery(this).text('Show Assumptions');        
		}
		return false;
	});
	
	jQuery('#resetrecalc').click(function (evt) {
		evt.preventDefault();
		var existingdonors0 = jQuery('#existingdonors0').val();
		var newdonors0 = jQuery('#newdonors0').val();
		var usage0 = jQuery('#usage0').val();
		jQuery('#existingdonors').val(existingdonors0);
		jQuery('#newdonors').val(newdonors0);
		jQuery('#usage').val(usage0);
		calcObject.runcalc();
	});
	
	jQuery('#usage').keyup(function() {
        var value = jQuery(this).val();
		value = value / 100;
		jQuery('#usageNum').val(value);
		calcObject.runcalc();
    });
	
	jQuery('#usage').change(function() {
        var value = jQuery(this).val();
		value = value / 100;
		jQuery('#usageNum').val(value);
		calcObject.runcalc();
    });
	
	jQuery('#existingdonors').keyup(function() {
		calcObject.runcalc();
	});
	
	jQuery('#existingdonors').change(function() {
		calcObject.runcalc();
	});
	
	jQuery('#newdonors').keyup(function() {
		calcObject.runcalc();
	});
	
	jQuery('#newdonors').change(function() {
		calcObject.runcalc();
	});
	
}); // end doc.ready

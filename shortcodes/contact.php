<?php
/**
 * Shortcode Contact
 *
 * Usage: [contact email="email@address.com"]
 *
 * Only enqueues jquery-form & our contact.js IF shortcode [contact email="email@address.com"] is present in the page.
 * Based on: http://scribu.net/wordpress/optimal-script-loading.html
 *
 * @package 	WordPress
 * @subpackage	Leonardo
 * @since		1.0
 * @updated		03.11.2014
 */


add_shortcode('contact', 'leo_contact_form_shortcode');

function leo_contact_form_shortcode($atts, $content = null)
{

	//http://scribu.net/wordpress/optimal-script-loading.html
	global $contact_shortcode;

	$contact_shortcode = true;


	//========================================================

	extract( shortcode_atts(array(
		'email' => false
	), $atts));

	$email = ($email) ? $email  : '';

	$number1 = rand(1,9);
	$number2 = rand(1,9);
	$sum = $number1 + $number2;

	//$output = "";
	$output ='<p id="success" class="successmsg alert alert-success" style="display:none;"><a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>' . __('Message Sent! Thanks!<br> We\'ll get back shortly.','pablo-tools').'</p>

<p id="bademail" class="errormsg alert alert-warning" style="display:none;"><a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>' . __('Please enter your name, a <b>valid email address</b> and message.','pablo-tools').'</p>

<p id="badserver" class="errormsg alert alert-warning" style="display:none;"><a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>' . __('Auch... Something went wrong. Is the sum of the 2 numbers correct?<br>Please try again.','pablo-tools').'</p>

<form id="quick-contact" method="post" class="form" action="'. PABLO_SENDMAIL_URI .'">

<input type="hidden" name="sitename" value="'. get_bloginfo('name') .'" />

<div class="row">
	<div class="col-sm-6 col-md-6 form-group">
		<input class="form-control" id="nameinput" name="name" placeholder="' . __('Your name','pablo-tools').'" type="text" required />
	</div>
	<div class="col-sm-6 col-md-6 form-group">
		<input class="form-control" id="emailinput" name="email" placeholder="' . __('Your email','pablo-tools').'" type="email" required />
	</div>
</div>

<textarea class="form-control" id="commentinput" name="comment" placeholder="' . __('Your message','pablo-tools').'" rows="5"></textarea>
<br />
<div class="row">
	<input type="hidden" name="correctsum" value="'. $sum.'"/>

	<div class="col-xs-4 col-md-4 form-group">
		<input type="text" class="form-control" placeholder="'. $number1.' + '.$number2.' = ?'.'" name="captcha" />
	</div>

	<div class="col-xs-8 col-md-8 form-group">
		<button id="submitinput" class="submit btn btn-line theme-bg theme-color pull-right" type="submit">' . __('Send','pablo-tools').'</button>
	</div>
</div>

<input type="hidden" id="receiver" name="receiver" value="'. antispambot(''.$email.'').'"/>

</form>';

	return $output;
}



//==============================================================================================================================
// Only enqueues jquery-form & our contact.js IF shortcode [contact email="email@address.com"] is present in the page.
//
// Based on: http://scribu.net/wordpress/optimal-script-loading.html

//add_action('init', 'register_contact_scripts');
//add_action('wp_footer', 'print_contact_scripts');

function register_contact_scripts() {

	//wp_register_script('quick-contact', ASH_SYS_JS_URI . 'quick.contact.1.5.min.js', array('jquery','jquery-form'), '1.0', true);
}

function print_contact_scripts()
{

	global $contact_shortcode;

	if ( ! $contact_shortcode )
	return;

	wp_print_scripts('jquery-form'); 	// Packed WordPress Version - needed for our quick-contact script to work
	wp_print_scripts('quick-contact'); 	// Our quick-contact script
}
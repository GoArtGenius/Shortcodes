<?php
/*
 *	PHP Mailer
 *
 *
 * @based on:	---
 * @depends on: jquery-form
 * @credits		---
 * @licence		http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @author		Alex Ferreira
 * @author-url	http://artgeni.us/team
 * @copyright	Copyright (c) 2014, ArtGeni.us
 * @link        http://artgeni.us/plugins/genius-shortcodes
 * @package 	Genius Shortcodes
 * @since		1.0
 */





/*
 *	The Captcha Code
 *	Based on: http://cube3x.com/2014/01/how-to-create-simple-sum-captcha-in-php/
 *
 *	Now we created the numbers, displayed the captcha in the form and next step is to validate the captcha on form submission.
 */

 //if (isset($_POST)) {

$correctsum = $_POST['correctsum'];
$captcha = $_POST['captcha'];
/* End Captcha Code */

//}


error_reporting(E_NOTICE);
function valid_email($str)
{
	return ( ! preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
}


if($_POST['name']!='' && $_POST['email']!='' && valid_email($_POST['email'])==TRUE && strlen($_POST['comment'])>1)
{
	$to = $_POST['receiver'];
	$headers =  'From: '.$_POST['email'].''. "\r\n" .
		'Reply-To: '.$_POST['email'].'' . "\r\n" .
		'X-Mailer: PHP/' . phpversion();
	$subject = $_POST['sitename'] . " new message from " . $_POST['name'];
	//$subject ="New Message from"; //Original
	//$message = htmlspecialchars($_POST['comment']) . "<br>------------------------";
	$message = htmlspecialchars($_POST['comment']);


	/*	The Captcha Code
	 *	Based on: http://cube3x.com/2014/01/how-to-create-simple-sum-captcha-in-php/
	 *
	 *	Now add the $correctsum to the If Statment. Mail will validate if captcha is correct.
	 */

	if( mail( $to, $subject, $message, $headers ) && ( $correctsum == $captcha ) )
	{
		echo 1; //SUCCESS

	} else {

		echo 2; //FAILURE - server failure

	}


} else {

	echo 3; //FAILURE - not a valid email

}
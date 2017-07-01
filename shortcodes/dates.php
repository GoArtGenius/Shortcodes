<?php
/**
 * Dates Shortcodes
 *
 *
 *
 * @package 	WordPress
 * @subpackage	Leonardo
 * @since		1.0
 * @updated		03.02.2016
 */





/*
 * [current-year] Shortcode
 *
 * Returns the Current Year as a string in four digits.
 *
 * @package 	WordPress
 * @subpackage	Leonardo
 * @since		1.0
 * @updated		05.04.2017
 */

if ( ! shortcode_exists( 'current-year' ) )
{

	add_shortcode( 'current-year', 'leo_get_current_year_shortcode' );

	function leo_get_current_year_shortcode()
	{
		return date('Y');
	}

}





/*
 * [current-month] Shortcode
 *
 * Returns the Current Moth as a string.
 *
 * @package 	WordPress
 * @subpackage	Leonardo
 * @since		1.0
 * @updated		05.04.2017
 */

if ( ! shortcode_exists( 'current-month' ) )
{

	add_shortcode( 'current-month', 'leo_get_current_month_shortcode');

	function leo_get_current_month_shortcode()
	{
		return date('F');
	}

}
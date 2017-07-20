<?php
/*
 * Icon Font
 *
 * Usage: [icon-font name="flaticon-home" size="40" color="#333333"]
 *
 * @package 	WordPress
 * @subpackage	Leonardo
 * @since		1.0
 * @updated		19.05.201
 */

if ( ! shortcode_exists( 'icon-font' ) )
{

	add_shortcode('icon-font', 'leo_icon_font_shortcode');

	function leo_icon_font_shortcode( $atts )
	{

	    extract( shortcode_atts( array (
	        'name'		=> '',
	        'color'		=> '',
	        'size'		=> '',
	    ), $atts ) );

	    return '<i class="'.$name.'" style="font-size:'.$size.'px;color:'.$color.'"></i>';

	}

}
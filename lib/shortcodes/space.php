<?php
/*
 * Space
 *
 * Usage: [space height="250"]
 *
 *
 * @package 	WordPress
 * @subpackage	Leonardo
 * @since		1.0
 * @updated		04.04.2017
 */

if ( ! shortcode_exists( 'space' ) )
{

	add_shortcode('space', 'leo_space_shortcode');

	function leo_space_shortcode( $atts, $content = null )
	{

		extract( shortcode_atts( array(
			'height' => '60'
		), $atts ) );

		return '<div style="clear:both; width:100%; height:'.$height.'px"></div>';

	}

}
<?php
/**
 * Bloginfo
 *
 * Usage: [bloginfo value='name']
 *
 * The bloginfo() function in WordPress gives you access to lots of useful information about your site
 *
 * @package 	WordPress
 * @subpackage	Leonardo
 * @since		1.0
 * @updated		03.02.2016
 */

if ( ! shortcode_exists( 'bloginfo' ) )
{

	add_shortcode('bloginfo', 'leo_bloginfo_shortcode');

	function leo_bloginfo_shortcode( $atts )
	{

		extract(shortcode_atts(array(
			'value' => '',
		), $atts));

		return get_bloginfo( $value );

	}

}
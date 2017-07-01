<?php
/*
 * Button - Create a shortcode for bootstrap buttons.
 *
 * Usage: [button link="#" text="download" size="large" type="success" icon="envelope" white="1"]
 *
 * @package 	WordPress
 * @subpackage	Leonardo
 * @since		1.0
 * @updated		05.04.2017
 */

if ( ! shortcode_exists( 'button' ) )
{

	add_shortcode('button', 'leo_button_shortcode');

	function leo_button_shortcode( $atts, $content = null )
	{

	    extract(shortcode_atts(array(
	        'link'      => '#',
	        'text'      => 'Button Text',
			'size'		=> 'default',
			'block'		=> '',
			//'white'		=> '',
			'type'		=> 'info',
	    ), $atts));

	    if ( $type != '' ) $type = "btn-$type";
	    if ( $size != '' ) $size = "btn-$size";
	    if ( $block != '' ) $block = "btn-block";

		$out = "<a class=\"btn $type $size $block\" href=\"" .$link. "\">";
		$out .= $text . "</a>";

	    return $out;

	}

}
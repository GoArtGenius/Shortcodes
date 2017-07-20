<?php
/*
 * Container (bootstrap)
 *
 * Usage:	[container class=null fluid=false] ... [/container]
 *
 *
 * @package 	WordPress
 * @subpackage	Leonardo
 * @since		1.0
 * @updated		11.07.2017
 */





if ( ! shortcode_exists( 'container' ) )
{

	add_shortcode( 'container', 'leo_bs_container_shortcode' );

	function leo_bs_container_shortcode($atts, $content = null)
	{

		extract(
			shortcode_atts(
				array(
					'class' => '',
					'fluid' => false
				),
				$atts
			)
		);

		if ( $fluid === true ) {
			$divclass = "-fluid";
		} else {
			$divclass = "";
		}

		if ( $class !== '' ) {
			$divclass = " " . $class;
		}

		$container_content = '<div class="container' . $divclass . '">' . do_shortcode($content) . '</div>';

		return $container_content;

	}


}
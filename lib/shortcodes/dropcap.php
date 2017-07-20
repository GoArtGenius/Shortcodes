<?php
/**
 * Dropcap
 *
 * Usage: [dropcap]word[/dropcap]
 *
 * @package 	WordPress
 * @subpackage	Leonardo
 * @since		1.0
 * @updated		03.02.2016
 */

if ( ! shortcode_exists( 'dropcap' ) )
{

	add_shortcode( 'dropcap', 'leo_dropcap_shortcode' );

	function leo_dropcap_shortcode( $args, $content )
	{

		// left trim $content
		$leo_shortcoded_content = ltrim ( $content );

		// select first letter of shortcoded $content
		$leo_first_letter_of_shortcoded_content = mb_substr( $leo_shortcoded_content, 0, 1 );

		// select remaining letters of shortcoded content
		$leo_remaining_letters_of_shortcoded_content = mb_substr( $leo_shortcoded_content, 1 );

		// add <span class="wpsdc"> to the first letter for shortcoded content
		$leo_spanned_first_letter = '<span class="drop-cap">' . $leo_first_letter_of_shortcoded_content . '</span>';


		// return the spanned first letter and remaining letters
		return $leo_spanned_first_letter . $leo_remaining_letters_of_shortcoded_content;

	}

}
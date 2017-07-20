<?php
/*
 * Row (bootstrap)
 *
 * Usage:	[row class=null rowid=null] ... [/row]
 *
 *
 * @package 	WordPress
 * @subpackage	Leonardo
 * @since		1.0
 * @updated		11.07.2017
 */





if ( ! shortcode_exists( 'row' ) )
{

	add_shortcode( 'row', 'leo_bs_row_shortcode' );

	function leo_bs_row_shortcode($atts, $content = null)
	{

        extract(
            shortcode_atts(
                array(
                    'class' => '',
                    'rowid' => ''
                ),
                $atts
            )
        );

        if ( $class != '' ) {
            $class = " " . $class;
        }

        if ( $rowid != '' ) {
            $rowid = " id='" . $rowid . "'";
        }

        $row_content = '<div class="row ' . $class . '' . $rowid . '">' . do_shortcode($content) . '</div>';

        return $row_content;

    }

}
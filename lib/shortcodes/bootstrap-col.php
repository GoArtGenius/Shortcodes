<?php
/*
 * Col (bootstrap)
 *
 * Usage:	[col width=12 offset=0 class=null spanid=null][/col]
 *
 *
 * @package 	WordPress
 * @subpackage	Leonardo
 * @since		1.0
 * @updated		11.07.2017
 */





if ( ! shortcode_exists( 'col' ) )
{

	add_shortcode( 'col', 'leo_bs_col_shortcode' );

	function leo_bs_col_shortcode($atts, $content = null)
	{

		extract(
            shortcode_atts(
                array(
                    'width' => 12,
                    'offset' => 0,
                    'class' => '',
                    'spanid' => ''
                ),
                $atts
            )
        );

        $offset != '0' ? $offset = " col-md-offset-" . $offset : $offset = "";

        if ( $class != '' ) {
            $class = " " . $class;
        }

        if ( $spanid != '' ) {
            $spanid = " id='" . $spanid . "'";
        }

        $span_content = '<div class="col-md-' . $width . $offset . $class . '' . $spanid . '">' . do_shortcode($content) . '</div>';

        return $span_content;


	}


}
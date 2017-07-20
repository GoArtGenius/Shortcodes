<?php
/*
 * Collapse (bootstrap)
 *
 * Usage:	[accordion-group]
 *				[accordion title="The title" id="unique-id"]
 *					this is the content part
 *				[/accordion]
 *			[/accordion-group]
 *
 *
 * @package 	WordPress
 * @subpackage	Leonardo
 * @since		1.0
 * @updated		20.06.2017
 */





if ( ! shortcode_exists( 'accordion-group' ) )
{

    add_shortcode( 'accordion-group', 'leo_accordion_group_shortcode' );

	function leo_accordion_group_shortcode( $atts , $content = null )
	{

		extract ( shortcode_atts(

            array(
                'class'	=> '',
                'type'	=> '',
                'title'	=> '',
                'id'	=> ''
            ),

            $atts )

        );


		$out = '';

        $out .='<div class="panel-group panel-flat" id="accordion'.$id.'" role="tablist" aria-multiselectable="true">';
        	$out .= do_shortcode($content) ;
        $out .='</div>';


		return $out;

    }

}





if ( ! shortcode_exists( 'accordion' ) )
{

	add_shortcode( 'accordion', 'leo_accordion_shortcode' );

    function leo_accordion_shortcode( $atts , $content = null )
	{

		extract ( shortcode_atts(

            array(
                'class'	=> '',
                'type'	=> '',
                'title'	=> '',
                'id'	=> ''
            ),

            $atts )

        );

		$out = '';

		$out .='<div class="panel panel-flat panel-default">';

			$out .='<div class="panel-heading panel-flat" role="tab" id="headingOne">';
				$out .='<h4 class="panel-title">';
					$out .='<a role="button" data-toggle="collapse" data-parent="#accordion" href="#'. $id .'" aria-expanded="true" aria-controls="collapseOne">';
						$out .= $title;
					$out .='</a>';
				$out .='</h4>';
			$out .='</div>';

	        $out .='<div id="'. $id .'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">';
				$out .='<div class="panel-body">';
					$out .= do_shortcode($content) ;
				$out .='</div>';
			$out .='</div>';

		$out .='</div>';


		return $out;

	}

}
<?php
/**
 * Social icons shortcode - to be used wit the kirki "Social Networks" section.
 *
 * Usage: [social-icons]
 *
 *
 * @package 	Leonardo
 * @since		1.0
 * @updated		03.02.2016
 */

if ( ! shortcode_exists( 'social-icons' ) )
{

	add_shortcode('social-icons', 'leo_social_icons_shortcode');

	function leo_social_icons_shortcode( $atts , $content = null )
	{
		?>
		<span class="social-icons-shortcode">
			<?php do_action('show_social_icons');?>
		</span>
		<?php
	}

}
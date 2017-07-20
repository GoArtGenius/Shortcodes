<?php
/*
 * Responsive Videos
 *
 *
 * @package 	WordPress
 * @subpackage	Leonardo
 * @since		1.0
 */





/*
 * Responsive Youtube video
 *
 * Usage: [fluid-youtube-video video_id="sd0grLQ4voU"]
 *
 *
 * @package 	Leonardo
 * @since		1.0
 * @updated		29.06.2017
 */

if ( ! shortcode_exists( 'fluid-youtube-video' ) )
{

	add_shortcode('fluid-youtube-video', 'leo_responsive_youtube_video_shortcode');

	function leo_responsive_youtube_video_shortcode( $atts )
	{

		extract( shortcode_atts( array (
			'video_id' => ''
		), $atts ) );

		return '<div class="video-container"><iframe src="//www.youtube.com/embed/' . $video_id . '" height="240" width="320" allowfullscreen="" frameborder="0"></iframe></div>';

	}

}





/*
 * Responsive Vimeo video
 *
 * Usage: [fluid-vimeo-video video_id="sd0grLQ4voU"]
 *
 *
 * @package 	Leonardo
 * @since		1.0
 * @updated		29.06.2017
 */

if ( ! shortcode_exists( 'fluid-vimeo-video' ) )
{

	add_shortcode('fluid-vimeo-video', 'leo_responsive_vimeo_video_shortcode');

	function leo_responsive_vimeo_video_shortcode( $atts )
	{

		extract( shortcode_atts( array (
			'video_id' => ''
		), $atts ) );

		return '<div class="video-container"><iframe src="https://player.vimeo.com/video/' . $video_id . '" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div>';

	}

}





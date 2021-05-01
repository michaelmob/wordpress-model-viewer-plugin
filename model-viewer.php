<?php
/**
 * @package ModelViewer
 * @version 1.7.2
 */
/*
Plugin Name: Model Viewer
Plugin URI: 
Description: 
Author: michaelmob
Version: 0.0.1
Author URI: https://michaelmob.com
*/

// add shortcode
function Model_Viewer_shortcode( $atts )
{
    wp_enqueue_script(
        'custom-model-viewer',
        plugins_url('/assets/model-viewer.js', __FILE__)
    );
    $atts = shortcode_atts(array('src' => ''), $atts);
    $src = $atts['src'];

    return "
    <div class='model-viewer-container'></div>
    <script>
    window.addEventListener('load', function () {
        const modelViewerWrapper = new ModelViewerWrapper({
            target: document.querySelector('.model-viewer-container'),
            props: { src: '" . $src . "' }
        });
    });
    </script>";
}
add_shortcode('model_viewer', 'Model_Viewer_shortcode');

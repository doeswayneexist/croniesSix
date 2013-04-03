<?php 
// Hooking my own style sheet into the header
function add_10k_css() {

		$css_URL = get_stylesheet_directory_uri(). '/style-custom.css';
    echo '<link rel="stylesheet" href="'.$css_URL.'" type="text/css" class="10k"/>' . "\n";
}
add_action( 'wp_head', 'add_10k_css' ); ?>
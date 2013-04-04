<?php 

// Hooking my own style sheet into the header
function add_10k_css() {

		$css_URL = get_stylesheet_directory_uri(). '/style-custom.css';
    echo '<link rel="stylesheet" href="'.$css_URL.'" type="text/css" class="10k"/>' . "\n";
}
add_action( 'wp_head', 'add_10k_css' ); 

// Hooking in hard coded custom fonts
function add_10k_font_oswald() {

    echo '<link rel="stylesheet" id="Google-Font-Oswald-css"  href="http://fonts.googleapis.com/css?family=Oswald%3An%2Ci%2Cb%2Cbi&#038;subset=latin&#038;ver=3.5.1" type="text/css" media="all" />' . "\n";
}
add_action( 'wp_head', 'add_10k_font_oswald' ); 

// Hooking in hard coded custom fonts
function add_10k_favicon() {

    $favicon_URL = get_stylesheet_directory_uri(). '/favicon.ico';
    echo '<link rel="shortcut icon" href="'.$favicon_URL.'" type="image/x-icon" />' . "\n";
}
add_action( 'wp_head', 'add_10k_favicon' ); 
?>


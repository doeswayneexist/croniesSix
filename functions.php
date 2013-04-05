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


//creat a function that will run and echo the social media box
function build_social_bar() {

	//what does get_stylesheet_directory_uri() return
	//echo get_stylesheet_directory_uri();
	//returns: http://localhost/html/wp_fresh/wp-content/themes/croniesSix;

	$fbApp = get_stylesheet_directory_uri(). '/img10k/facebook_app_icon.jpg';
	$twitApp = get_stylesheet_directory_uri(). '/img10k/twitter_app_icon.jpg';
	$instaApp = get_stylesheet_directory_uri(). '/img10k/instagram_app_icon.jpg';
	$tubeApp = get_stylesheet_directory_uri(). '/img10k/youtube_app_icon.jpg';

	$fbUrl = 'https://www.facebook.com/pages/Cronies-Sports-Grill-Newbury-Park-TO/172362129477183';
	$twitUrl = 'https://twitter.com/originalcronies';
	$instaUrl = 'http://instagram.com/eatatcronies';
	$tubeUrl = 'http://www.youtube.com/eatatcronies';

	echo 	"<div class='socialBar'>
	<a href='$fbUrl'><img src='$fbApp'></a> 
	<a href='$instaUrl'><img src='$instaApp'></a>
	<a href='$twitUrl'><img src='$twitApp'></a>
	<a href='$tubeUrl'><img src='$tubeApp'></a>
	</div>";
}
?>
<!DOCTYPE html>

<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->

<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->

<!--[if IE 8]>    <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->

<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->

<head>



	<!-- Basic Page Needs

  ================================================== -->

	<meta charset="<?php bloginfo( 'charset' ); ?>" />

	<!-- <title><?php bloginfo('name'); ?>  <?php wp_title(); ?></title> -->

	<title><?php wp_title(''); ?></title>


	<!--[if lt IE 9]>

		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>

	<![endif]-->



	<!-- CSS

  ================================================== -->

	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />

	

	<?php global $gdl_is_responsive ?>

	<?php if( $gdl_is_responsive ){ ?>

		<meta name="viewport" content="width=device-width, user-scalable=no">

		<link rel="stylesheet" href="<?php echo GOODLAYERS_PATH; ?>/stylesheet/foundation-responsive.css">

	<?php }else{ ?>

		<link rel="stylesheet" href="<?php echo GOODLAYERS_PATH; ?>/stylesheet/foundation.css">

	<?php } ?>

	

	<!--[if IE 7]>

		<link rel="stylesheet" href="<?php echo GOODLAYERS_PATH; ?>/stylesheet/ie7-style.css" /> 

	<![endif]-->	

	

	<?php

	

		// include favicon in the header

		if(get_option( THEME_SHORT_NAME.'_enable_favicon','disable') == "enable"){

			$gdl_favicon = get_option(THEME_SHORT_NAME.'_favicon_image');

			if( $gdl_favicon ){

				$gdl_favicon = wp_get_attachment_image_src($gdl_favicon, 'full');

				echo '<link rel="shortcut icon" href="' . $gdl_favicon[0] . '" type="image/x-icon" />';

			}

		} 

		

		// add facebook thumbnail to this page

		$thumbnail_id = get_post_thumbnail_id();

		if( !empty($thumbnail_id) ){

			$thumbnail = wp_get_attachment_image_src( $thumbnail_id , '150x150' );

			echo '<link rel="image_src" href="' . $thumbnail[0] . '" />';		

		}

		

		// start calling header script

		wp_head();		



	?>

	<link rel="stylesheet" type="text/css" href="/style-custom.css" class="10k">

</head>

<body <?php echo body_class(); ?>>

<!-- body-wrapper is the root div-->
<div class="body-wrapper">



	<div class="header-wrapper" >



		<?php $gdl_enable_top_navigation = get_option(THEME_SHORT_NAME.'_enable_top_navigation'); ?>

		<?php if ( $gdl_enable_top_navigation == '' || $gdl_enable_top_navigation == 'enable' ){  ?>

			<div class="top-navigation-wrapper">

				<div class="top-navigation container">

					<?php

						// get top navigation left text

						$top_navigation_left_text = do_shortcode( __(get_option(THEME_SHORT_NAME.'_top_navigation_left_text'), 'gdl_front_end') );

						if( !empty($top_navigation_left_text) ){

							echo '<div class="top-navigation-left">' . $top_navigation_left_text . '</div>';

						}		

					?>

					

					<div class="top-navigation-right">

						<!-- Get Social Icons -->

						<div id="gdl-social-icon" class="social-wrapper">

							<div class="social-icon-wrapper">


								<!-- 10k Add my own social media stuff here -->

								<img src="http://placehold.it/150x150">

								<?php

								$gdl_icon_type = get_option(THEME_SHORT_NAME.'_social_icon_type', true);

								$gdl_social_icon = array(

									'delicious'=> array('name'=>THEME_SHORT_NAME.'_delicious', 'url'=> GOODLAYERS_PATH.'/images/icon/' . $gdl_icon_type . '/social/delicious.png'),

									'deviantart'=> array('name'=>THEME_SHORT_NAME.'_deviantart', 'url'=> GOODLAYERS_PATH.'/images/icon/' . $gdl_icon_type . '/social/deviantart.png'),

									'digg'=> array('name'=>THEME_SHORT_NAME.'_digg', 'url'=> GOODLAYERS_PATH.'/images/icon/' . $gdl_icon_type . '/social/digg.png'),

									'facebook' => array('name'=>THEME_SHORT_NAME.'_facebook', 'url'=> GOODLAYERS_PATH.'/images/icon/' . $gdl_icon_type . '/social/facebook.png'),

									'flickr' => array('name'=>THEME_SHORT_NAME.'_flickr', 'url'=> GOODLAYERS_PATH.'/images/icon/' . $gdl_icon_type . '/social/flickr.png'),

									'lastfm'=> array('name'=>THEME_SHORT_NAME.'_lastfm', 'url'=> GOODLAYERS_PATH.'/images/icon/' . $gdl_icon_type . '/social/lastfm.png'),

									'linkedin' => array('name'=>THEME_SHORT_NAME.'_linkedin', 'url'=> GOODLAYERS_PATH.'/images/icon/' . $gdl_icon_type . '/social/linkedin.png'),

									'picasa'=> array('name'=>THEME_SHORT_NAME.'_picasa', 'url'=> GOODLAYERS_PATH.'/images/icon/' . $gdl_icon_type . '/social/picasa.png'),

									'rss'=> array('name'=>THEME_SHORT_NAME.'_rss', 'url'=> GOODLAYERS_PATH.'/images/icon/' . $gdl_icon_type . '/social/rss.png'),

									'stumble-upon'=> array('name'=>THEME_SHORT_NAME.'_stumble_upon', 'url'=> GOODLAYERS_PATH.'/images/icon/' . $gdl_icon_type . '/social/stumble-upon.png'),

									'tumblr'=> array('name'=>THEME_SHORT_NAME.'_tumblr', 'url'=> GOODLAYERS_PATH.'/images/icon/' . $gdl_icon_type . '/social/tumblr.png'),

									'twitter' => array('name'=>THEME_SHORT_NAME.'_twitter', 'url'=> GOODLAYERS_PATH.'/images/icon/' . $gdl_icon_type . '/social/twitter.png'),

									'vimeo' => array('name'=>THEME_SHORT_NAME.'_vimeo', 'url'=> GOODLAYERS_PATH.'/images/icon/' . $gdl_icon_type . '/social/vimeo.png'),

									'youtube' => array('name'=>THEME_SHORT_NAME.'_youtube', 'url'=> GOODLAYERS_PATH.'/images/icon/' . $gdl_icon_type . '/social/youtube.png'),

									'google_plus' => array('name'=>THEME_SHORT_NAME.'_google_plus', 'url'=> GOODLAYERS_PATH.'/images/icon/' . $gdl_icon_type . '/social/google-plus.png'),

									'email' => array('name'=>THEME_SHORT_NAME.'_email', 'url'=> GOODLAYERS_PATH.'/images/icon/' . $gdl_icon_type . '/social/email.png'),

									'pinterest' => array('name'=>THEME_SHORT_NAME.'_pinterest', 'url'=> GOODLAYERS_PATH.'/images/icon/' . $gdl_icon_type . '/social/pinterest.png')

									);

									

									foreach( $gdl_social_icon as $social_name => $social_icon ){

										$social_link = get_option($social_icon['name']);

										

										if( !empty($social_link) ){

											echo '<div class="social-icon"><a target="_blank" href="' . $social_link . '">' ;

											echo '<img src="' . $social_icon['url'] . '" alt="' . $social_name . '"/>';

											echo '</a></div>';

										}

									}

								?>

							</div> <!-- social icon wrapper -->

						</div> <!-- social wrapper -->	



					</div> <!-- top navigation right -->

					

					<div class="clear"></div>

				</div> <!-- top navigation container -->

				<div class="top-navigation-wrapper-gimmick"></div>

			</div> <!-- top navigation wrapper -->

		<?php } ?> 

	

		<!-- Get Logo -->

		<div class="logo-area-wrapper container">

			<?php

				$logo_id = get_option(THEME_SHORT_NAME.'_logo');

				if( empty($logo_id) ){	

					$alt_text = 'default-logo';	

					$logo_attachment = GOODLAYERS_PATH . '/images/default-logo.png';

				}else{

					$alt_text = get_post_meta($logo_id , '_wp_attachment_image_alt', true);	

					$logo_attachment = wp_get_attachment_image_src($logo_id, 'full');

					$logo_attachment = $logo_attachment[0];

				}

				

				echo '<div class="logo-wrapper">';

				echo '<div class="logo-inner">';

				if( is_front_page() ){

					echo '<h1><a href="'; 

					echo home_url();

					echo '"><img src="http://cronies.com/wp-content/uploads/2013/01/cronies-logo-registered-small.png" alt="Cronies Sports Grill"></a></h1>';	

				}else{

					echo '<a href="'; 

					echo home_url();

					echo '"><img src="' . $logo_attachment . '" alt="' . $alt_text . '"/></a>';				

				}

				echo '</div>'; // logo-inner

				echo '</div>';

			

				echo '<div class="logo-right-text">';

				echo do_shortcode( __(get_option(THEME_SHORT_NAME . '_logo_right_text'), 'gdl_front_end') );

				echo '</div>';

				

				echo '<div class="clear"></div>';

			?>

		</div>

		<?php

			

			// Responsive Menu

			if( $gdl_is_responsive ){

				echo '<div class="responsive-menu-container container">';

				dropdown_menu( array('dropdown_title' => '-- Main Menu --', 'indent_string' => '- ', 'indent_after' => '','container' => 'div', 'container_class' => 'responsive-menu-wrapper', 'theme_location'=>'main_menu') );	

				echo '</div>';

			}			

			

		?>

		

	</div> <!-- header wrapper container -->

	

	<?php 

		$content_outer_class = '';

		// Header Part

		if( is_page() ){

			global $gdl_top_slider_type, $gdl_top_slider_xml;

			if ($gdl_top_slider_type != "No Slider" && $gdl_top_slider_type != '' && 

				$gdl_top_slider_type != 'Title / Caption' && $gdl_top_slider_type != 'None'){

				

				echo '<div class="gdl-navigation-wrapper no-background">';

				

				echo '<div class="gdl-top-slider">';

				$slider_xml = "<Slider>" . create_xml_tag('size', 'full-width');

				$slider_xml = $slider_xml . create_xml_tag('slider-type', $gdl_top_slider_type);

				$slider_xml = $slider_xml . $gdl_top_slider_xml;

				$slider_xml = $slider_xml . "</Slider>";

				$slider_xml_dom = new DOMDocument();

				$slider_xml_dom->loadXML($slider_xml);

				print_slider_item($slider_xml_dom->documentElement);

				echo '<div class="clear"></div>';

				echo '</div>';

					

				// Main Menu

				echo '<div class="navigation-wrapper" id="sticky_navigation">';

				echo '<div class="navigation-wrapper-background"></div>';

				echo '<div class="navigation-container container">';

				wp_nav_menu( array('container' => 'div', 'container_class' => 'menu-wrapper', 'container_id' => 'main-superfish-wrapper', 'menu_class'=> 'sf-menu',  'theme_location' => 'main_menu' ) );

				echo '</div>';

				echo '</div>';

				

				echo '</div>'; // gdl-navigation-wrapper

				

				$content_outer_class = 'no-background';

				$enable_stunning_text = get_post_meta($post->ID, 'enable-stunning-text', true);

				if( $enable_stunning_text == 'Yes' ){

					$stunning_text_image = get_post_meta($post->ID, 'stunning-text-image', true);

					$stunning_text_title = get_post_meta($post->ID, 'stunning-text-title', true);

					$stunning_text_caption = get_post_meta($post->ID, 'stunning-text-caption', true);

					

					$stunning_text_button_text = get_post_meta($post->ID, 'stunning-text-button-text', true);

					$stunning_text_button_link = get_post_meta($post->ID, 'stunning-text-button-link', true);

					

					echo '<div class="stunning-text-wrapper">';

					echo '<div class="stunning-text-inner-wrapper">';

					echo '<div class="stunning-text-container container">';

					

					if( !empty($stunning_text_image) ){	

						$thumbnail = wp_get_attachment_image_src( $stunning_text_image , 'full' );

						$alt_text = get_post_meta($stunning_text_image , '_wp_attachment_image_alt', true);						

						echo '<img class="stunning-text-image" src="' . $thumbnail[0] . '" alt="' . $alt_text . '" />';

					}


					
					if( !empty($stunning_text_button_link) ){
	
						/*WAS Change: removed class: button-enable*/
						echo '<div class="stunning-text-content">';

					}else{

						echo '<div class="stunning-text-content">';

					}					

					echo '<p class="stunning-text-title">' . $stunning_text_title . '</p>';

					echo '<div class="stunning-text-caption">' . do_shortcode($stunning_text_caption) . '</div>';

					

					if( !empty($stunning_text_button_link) ){
						
						/* WAS change: removing button
						echo '<a class="stunning-text-button" href="' . $stunning_text_button_link . '" >'; 

						echo $stunning_text_button_text;

						echo '</a>'; 
*/

					}

					

					echo '</div>';

					

					

					echo '</div>'; // stunning text container

					echo '</div>'; // stunning text inner wrapper					

					echo '</div>'; // stunning text wrapper

					

					$content_outer_class = 'stunning-text-on';

				}

			}else{

			

				$page_header_bg = get_post_meta($post->ID, 'page-option-header-background', true);

			

				// Main Menu

				if( $gdl_top_slider_type != 'None' ){

					$title = get_the_title();

					$caption = get_post_meta($post->ID, 'page-option-caption', true);

					print_page_header($title, $caption, true, $page_header_bg);

				}else{

					print_page_header($title, $caption, false, $page_header_bg);

				}



			}	

			

								

		}else if( is_single() ){

			

			$title = get_post_meta( $post->ID, "post-option-blog-header-title", true);

			$caption = get_post_meta( $post->ID, "post-option-blog-header-caption", true);

			

			if( $post->post_type == 'post' ){

				if( empty($title) ){

					$title = get_option(THEME_SHORT_NAME.'_default_post_header');

					$caption = get_option(THEME_SHORT_NAME.'_default_post_caption');

				}

			}else if( $post->post_type == 'food' ){

				if( empty($title) ){

					$title = get_option(THEME_SHORT_NAME.'_default_food_header');

					$caption = get_option(THEME_SHORT_NAME.'_default_food_caption');

				}			

			}else if( $post->post_type == 'portfolio' ){

				$current_page_style = get_option(THEME_SHORT_NAME.'_use_portfolio_as', 'portfolio style');

				if( $current_page_style == 'portfolio style' ){

					$title = get_the_title();

				}else if( empty($title) ){

					$title = get_option(THEME_SHORT_NAME.'_default_post_header');

					$caption = get_option(THEME_SHORT_NAME.'_default_post_caption');

				}

			}

			print_page_header($title, $caption);

			

		}else if( is_search() ){

			

			$title = __('Search', 'gdl_front_end');

			$caption = get_search_query();

			print_page_header($title, $caption);

		

		}else if( is_archive() ){

			if( is_category() || is_tax('portfolio-category') ){

				$title = __('Category', 'gdl_front_end');

				$caption = single_cat_title('', false);

			}else if( is_tag() || is_tax('portfolio-tag') ){

				$title = __('Tag', 'gdl_front_end');

				$caption = single_cat_title('', false);

			}else if( is_day() ){

				$title =  __('Day', 'gdl_front_end');

				$caption = get_the_date('F j, Y');

			}else if( is_month() ){

				$title =  __('Month', 'gdl_front_end');

				$caption = get_the_date('F Y');

			}else if( is_year() ){

				$title = __('Year', 'gdl_front_end');

				$caption = get_the_date('Y');

			}

			print_page_header($title, $caption);

		}else if( is_404() ){

			global $gdl_admin_translator;

			if( $gdl_admin_translator == 'enable' ){

				$translator_404_title = get_option(THEME_SHORT_NAME.'_404_title', 'Page Not Found');

			}else{

				$translator_404_title = __('Page Not Found','gdl_front_end');

			}

			

			print_page_header($translator_404_title, '');

		}

		



		

	?>

	<div class="gdl-content-outer-wrapper <?php echo $content_outer_class; ?>">

		<div class="gdl-content-wrapper">

			<div class="content-wrapper container">

	

		
			</div> <!-- content wrapper -->

			<div class="clear height"></div>

		</div> <!-- gdl content wrapper -->

	</div> <!-- gdl content outer wrapper -->

	

	<?php 

		$gdl_show_twitter = (get_option(THEME_SHORT_NAME.'_show_twitter_bar','enable') == 'enable')? true: false; 

		$gdl_homepage_twitter = (get_option(THEME_SHORT_NAME.'_show_twitter_only_homepage','disable') == 'enable')? true: false; 

		

		if( $gdl_show_twitter && ( ($gdl_homepage_twitter && is_front_page()) || !$gdl_homepage_twitter )){

			$twitter_id = get_option(THEME_SHORT_NAME.'_twitter_bar_id'); 

			$num_fetch = get_option(THEME_SHORT_NAME.'_twitter_num_fetch'); 

	?>

	<div class="twitter-bar-wrapper">

		<div class="twitter-bar-inner-wrapper">

			<div class="container twitter-container">

				<div class="gdl-twitter-wrapper">

					<div class="gdl-twitter-navigation">

						<div class="prev"></div>

						<div class="next"></div>

					</div>					

					<ul id="gdl-twitter" ></ul>	

					<script type="text/javascript">

						function gdl_twitter_callback(twitters){			

							var statusHTML = '';

							for (var i=0; i<twitters.length; i++){

								var username = twitters[i].user.screen_name;

								var status = twitters[i].text.replace(/((https?|s?ftp|ssh)\:\/\/[^"\s\<\>]*[^.,;'">\:\s\<\>\)\]\!])/g, function(url) {

									return '<a href="'+url+'">'+url+'</a>';

								}).replace(/\B@([_a-z0-9]+)/ig, function(reply) {

									return  reply.charAt(0)+'<a href="http://twitter.com/'+reply.substring(1)+'">'+reply.substring(1)+'</a>';

								});

								statusHTML = statusHTML + '<li style="width: <?php echo $width; ?>px;"><span>'+status+' by <a href="http://twitter.com/'+username+'">'+username+'</a></span></li>';

							}

							

							jQuery(window).load(function(){

								var twitter_wrapper = jQuery('ul#gdl-twitter');

								twitter_wrapper.each(function(){

									jQuery(this).html(statusHTML);

									

									var fetch_num = jQuery(this).children().length;

									var twitter_nav = jQuery(this).siblings('div.gdl-twitter-navigation');



									if( fetch_num > 0 ){ 

										gdl_cycle_resize(twitter_wrapper);

										twitter_wrapper.cycle({ fx: 'fade', slideResize: 1, fit: true, width: '100%', timeout: 4000, speed: 1000,

											next: twitter_nav.children('.next'),  prev: twitter_nav.children('.prev') });

									}

								});	



								jQuery(window).resize(function(){ 

									if( twitter_wrapper ){ gdl_cycle_resize(twitter_wrapper); }

								});								

							});				

						}

					</script>

					<script type="text/javascript" src="http://api.twitter.com/1/statuses/user_timeline/<?php echo $twitter_id;?>.json?callback=gdl_twitter_callback&amp;count=<?php echo $num_fetch;?>"></script>				

				</div>

			</div>

		</div>

	</div>

	<?php 

			wp_deregister_script('jquery-cycle');

			wp_register_script('jquery-cycle', GOODLAYERS_PATH.'/javascript/jquery.cycle.js', false, '1.0', true);

			wp_enqueue_script('jquery-cycle');	

		} // $gdl-show-twitter 

		

		$gdl_show_footer = get_option(THEME_SHORT_NAME.'_show_footer','enable');

		if( $gdl_show_footer == 'enable' ){ 

	?>	

<!-- Two footer wrappers? -->

	<div class="footer-wrapper">

		<div class="footer-inner-wrapper">



		<!-- Get Footer Widget -->

			<div class="container footer-container">

				<div class="footer-widget-wrapper">

					<div class="row">

						<?php

							$gdl_footer_class = array(

								'footer-style1'=>array('1'=>'three columns', '2'=>'three columns', '3'=>'three columns', '4'=>'three columns'),

								'footer-style2'=>array('1'=>'six columns', '2'=>'three columns', '3'=>'three columns', '4'=>''),

								'footer-style3'=>array('1'=>'three columns', '2'=>'three columns', '3'=>'six columns', '4'=>''),

								'footer-style4'=>array('1'=>'four columns', '2'=>'four columns', '3'=>'four columns', '4'=>''),

								'footer-style5'=>array('1'=>'eight columns', '2'=>'four columns', '3'=>'', '4'=>''),

								'footer-style6'=>array('1'=>'four columns', '2'=>'eight columns', '3'=>'', '4'=>''),

								);

							$gdl_footer_style = get_option(THEME_SHORT_NAME.'_footer_style', 'footer-style1');

						 

							for( $i=1 ; $i<=4; $i++ ){

								$footer_class = $gdl_footer_class[$gdl_footer_style][$i];

									if( !empty($footer_class) ){

									echo '<div class="' . $footer_class . ' gdl-footer-' . $i . ' mb0">';

									dynamic_sidebar('Footer ' . $i);

									echo '</div>';

								}

							}

						?>

						<div class="clear"></div>

					</div> <!-- close row -->

				</div>

			</div> 

			<?php build_social_bar(); ?>

		</div><!-- footer innerwrapper -->

	</div><!-- footer wrapper -->

	

	<?php } ?>

	

	<!-- Get Copyright Text -->

	<?php $gdl_show_copyright = get_option(THEME_SHORT_NAME.'_show_copyright','enable'); ?>

	<?php if( $gdl_show_copyright == 'enable' ){ ?>

		<div class="copyright-outer-wrapper">

			<div class="copyright-wrapper">

				<div class="container copyright-container">

					<div class="copyright-left">

						<?php echo do_shortcode( __(get_option(THEME_SHORT_NAME.'_copyright_left_area'), 'gdl_front_end') ); ?>

					</div> 

					<div class="copyright-right">

						<?php echo do_shortcode( __(get_option(THEME_SHORT_NAME.'_copyright_right_area'), 'gdl_front_end') ); ?>

					</div> 

					<div class="clear"></div>

				</div>

			</div>

		</div>

	<?php } ?>	

</div> <!-- body wrapper -->

	

<?php wp_footer(); ?>


<script type="text/javascript">
	
	jQuery(function() {
 
    // grab the initial top offset of the navigation 
    var sticky_navigation_offset_top = jQuery('#sticky_navigation').offset().top;
     
    // our function that decides weather the navigation bar should have "fixed" css position or not.
    var sticky_navigation = function(){
        var scroll_top = jQuery(window).scrollTop(); // our current vertical position from the top
         
        // if we've scrolled more than the navigation, change its position to fixed to stick to top,
        // otherwise change it back to relative
        if (scroll_top > sticky_navigation_offset_top) { 
            jQuery('#sticky_navigation').css({ 'position': 'fixed', 'top':0, 'left':0 });
        } else {
            jQuery('#sticky_navigation').css({ 'position': 'absolute' }); 
        }   
    };
     
    // run our function on load
    sticky_navigation();
     
    // and run it again every time you scroll
    jQuery(window).scroll(function() {
         sticky_navigation();
    });
 
});

/*
 * Instagram jQuery plugin
 * v0.2.1
 * http://potomak.github.com/jquery-instagram/
 * Copyright (c) 2012 Giovanni Cappellotto
 * Licensed MIT
 */

(function ($){
  window.$ = $;
  $.fn.instagram = function (options) {
    var that = this,
        apiEndpoint = "https://api.instagram.com/v1",
        settings = {
            hash: null
          , userId: null
          , locationId: null
          , search: null
          , accessToken: null
          , clientId: null
          , show: null
          , onLoad: null
          , onComplete: null
          , maxId: null
          , minId: null
          , next_url: null
          , image_size: null
          , photoLink: true
        };
        
    options && $.extend(settings, options);
    
    function createPhotoElement(photo) {
      var image_url = photo.images.thumbnail.url;
      
      if (settings.image_size == 'low_resolution') {
        image_url = photo.images.low_resolution.url;
      }
      else if (settings.image_size == 'thumbnail') {
        image_url = photo.images.thumbnail.url;
      }
      else if (settings.image_size == 'standard_resolution') {
        image_url = photo.images.standard_resolution.url;
      }

      var innerHtml = $('<img>')
        .addClass('instagram-image')
        .attr('src', image_url);

      if (settings.photoLink) {
        innerHtml = $('<a>')
          .attr('target', '_blank')
          .attr('href', photo.link)
          .append(innerHtml);
      }

      return $('<div>')
        .addClass('instagram-placeholder')
        .attr('id', photo.id)
        .append(innerHtml);
    }
    
    function createEmptyElement() {
      return $('<div>')
        .addClass('instagram-placeholder')
        .attr('id', 'empty')
        .append($('<p>').html('No photos for this query'));
    }
    
    function composeRequestURL() {

      var url = apiEndpoint,
          params = {};
      
      if (settings.next_url != null) {
        return settings.next_url;
      }

      if (settings.hash != null) {
        url += "/tags/" + settings.hash + "/media/recent";
      }
      else if (settings.search != null) {
        url += "/media/search";
        params.lat = settings.search.lat;
        params.lng = settings.search.lng;
        settings.search.max_timestamp != null && (params.max_timestamp = settings.search.max_timestamp);
        settings.search.min_timestamp != null && (params.min_timestamp = settings.search.min_timestamp);
        settings.search.distance != null && (params.distance = settings.search.distance);
      }
      else if (settings.userId != null) {
        url += "/users/" + settings.userId + "/media/recent";
      }
      else if (settings.locationId != null) {
        url += "/locations/" + settings.locationId + "/media/recent";
      }
      else {
        url += "/media/popular";
      }
      
      settings.accessToken != null && (params.access_token = settings.accessToken);
      settings.clientId != null && (params.client_id = settings.clientId);
      settings.minId != null && (params.min_id = settings.minId);
      settings.maxId != null && (params.max_id = settings.maxId);
      settings.show != null && (params.count = settings.show);

      url += "?" + $.param(params)
      
      return url;
    }
    
    settings.onLoad != null && typeof settings.onLoad == 'function' && settings.onLoad();
    
    $.ajax({
      type: "GET",
      dataType: "jsonp",
      cache: false,
      url: composeRequestURL(),
      success: function (res) {
        var length = typeof res.data != 'undefined' ? res.data.length : 0;
        var limit = settings.show != null && settings.show < length ? settings.show : length;
        
        if (limit > 0) {
          for (var i = 0; i < limit; i++) {
            that.append(createPhotoElement(res.data[i]));
          }
        }
        else {
          that.append(createEmptyElement());
        }

        settings.onComplete != null && typeof settings.onComplete == 'function' && settings.onComplete(res.data, res);
      }
    });
    
    return this;
  };
})(jQuery);
</script>
</body>

</html>
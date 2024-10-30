<?php
/*
Plugin Name: Jeba Plus Slider
Plugin URI: http://prowpexpert.com
Description: This is Jeba Plus Multi wordpress slider plugin really looking awesome sliding. Everyone can use the cute slider plugin easily like other wordpress plugin. Here everyone can slide image from post, page or other custom post. Also can use slide from every category. By using [jeba_pslider] shortcode use the slider every where post, page and template.
Author: Md Jahed
Version: 1.0
Author URI: http://prowpexpert.com/
*/
function jeba_wps_latest_jquery_d() {
	wp_enqueue_script('jquery');
}
add_action('init', 'jeba_wps_latest_jquery_d');

function plugin_functions_jeba_slider() {
    wp_enqueue_script( 'jeba-js-d', plugins_url( '/js/jquery.easing.1.3.js', __FILE__ ), true);
    wp_enqueue_script( 'jeba-js-dss', plugins_url( '/js/jquery.plusslider.js', __FILE__ ), true);
    wp_enqueue_style( 'jebacss-d', plugins_url( '/js/plusslider.css', __FILE__ ));
}

add_action('init','plugin_functions_jeba_slider');
function jeba_script_sliderss_function () {?>
	<script type="text/javascript">
    var slider;
    jQuery(document).ready(function(){

        slider = new jQuery.plusSlider(jQuery('#slider'), {
            autoPlay: false,
            sliderEasing: 'easeInOutExpo', // Anything other than 'linear' and 'swing' requires the easing plugin
            paginationPosition: 'append',
            sliderType: 'slider' // Choose whether the carousel is a 'slider' or a 'fader'
        });

        jQuery('#slider2').plusSlider({
            autoPlay: false,
            displayTime: 2000, // The amount of time the slide waits before automatically moving on to the next one. This requires 'autoPlay: true'
            sliderType: 'fader' // Choose whether the carousel is a 'slider' or a 'fader'
        });

        jQuery('#slider3').plusSlider({
            sliderEasing: 'easeInOutExpo', // Anything other than 'linear' and 'swing' requires the easing plugin
            autoPlay: false,
            sliderType: 'slider' // Choose whether the carousel is a 'slider' or a 'fader'
        });

    });
    </script>
	

<?php
}
add_action('wp_footer','jeba_script_sliderss_function');
function jeba_script_sliderdd_function () {?>
	<style>
		.plusslider{background:gray;}
        /* Custom Slider Styling */
        img { border: 0; display: block; margin: 0 auto; }
        .slide1 { background: #171105 url(./images/image1.jpg) no-repeat center top; padding: 20px 40px; width: 550px; }
        .slide1 > div { margin: 0 auto; width: 630px; }
        .slide1 h2 {padding-left: 15px; color: #fff; font-size: 20px; margin: 0 0 20px 0; text-align: left; }
        .slide1 p { border-left: 3px solid #fff; color: #fff; padding: 0 0 0 10px; margin-bottom: 25px; }
      /* Page Styling */
        .quote, .quote2, .quote3 { padding: 20px 0; width: 580px; font: 24px Georgia, serif; text-align: center; width: 100%; position: relative; }
        .quote {
			  background: #333 none repeat scroll 0 0;
			  color: #f1f1f1;
			  padding-left: 40px;
			  padding-right: 40px;
			}
        .plusslider.slider3, .plusslider.slider3 .plusslider-pagination-wrapper { border: none; border-radius: 0; }
		.link {
		  border: 1px solid #fff;
		  color: #fff;
		  font-size: 16px;
		  margin-left: 10px;
		  padding: 3px 10px;
		}
    </style>
	

<?php
}
add_action('wp_head','jeba_script_sliderdd_function');

function jeba_slider_shortcode_d($atts){
	extract( shortcode_atts( array(
		'category' => '',
		'post_type' => 'jeba-pitems',
		'count' => '5',
	), $atts) );
	
    $q = new WP_Query(
        array('posts_per_page' => $count, 'post_type' => $post_type, 'category_name' => $category)
        );		
		
		$plugins_url = plugins_url();
		
	$list = ' <div id="slider">';
	while($q->have_posts()) : $q->the_post();
		$idd = get_the_ID();
		$jeba_img_large = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large-portfolio' );
		
		$list .= '
			<div data-title="PlusSlider" style="background: url('.$jeba_img_large[0].') no-repeat scroll center top;" class="slide1">
                    <div>
                        <h2>'.get_the_title().'</h2>
                        <p>
                           '.get_the_excerpt().'
                        </p>
						<a class="link" href="'.get_permalink().'">View More</a>
                    </div>
                </div>
				
		
		';        
	endwhile;
	$list.= '</div>
		';
	wp_reset_query();
	return $list;
}
add_shortcode('jeba_pslider', 'jeba_slider_shortcode_d');
function jeba_slider_shortcode_dd($atts){
	extract( shortcode_atts( array(
		'category' => '',
		'post_type' => 'jeba-pitems',
		'count' => '5',
	), $atts) );
	
    $q = new WP_Query(
        array('posts_per_page' => $count, 'post_type' => $post_type, 'category_name' => $category)
        );		
		
		$plugins_url = plugins_url();
		
	$list = '<div id="slider2">';
	while($q->have_posts()) : $q->the_post();
		$idd = get_the_ID();
		$jeba_img_large = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large-portfolio' );
		
		$list .= '
			
			<img src="'.$jeba_img_large[0].'" alt="" height="250" width="630" />
			
			
		
		';        
	endwhile;
	$list.= '</div>
		';
	wp_reset_query();
	return $list;
}
add_shortcode('jeba_pslider1', 'jeba_slider_shortcode_dd');


function jeba_slider_shortcode_ddd($atts){
	extract( shortcode_atts( array(
		'category' => '',
		'post_type' => 'jeba-pitems',
		'count' => '5',
	), $atts) );
	
    $q = new WP_Query(
        array('posts_per_page' => $count, 'post_type' => $post_type, 'category_name' => $category)
        );		
		
		$plugins_url = plugins_url();
		
	$list = ' <div id="slider3">';
	while($q->have_posts()) : $q->the_post();
		$idd = get_the_ID();
		$jeba_img_large = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large-portfolio' );
		
		$list .= '
			<div data-title="Quote" class="quote">
                    '.get_the_content().'
					<br />
                    - '.get_the_title().'
                </div>
			
				
		
		';        
	endwhile;
	$list.= '</div>
		';
	wp_reset_query();
	return $list;
}
add_shortcode('jeba_testimonial', 'jeba_slider_shortcode_ddd');



add_action( 'init', 'jeba_siler_custom_post_d' );
function jeba_siler_custom_post_d() {

	register_post_type( 'jeba-pitems',
		array(
			'labels' => array(
				'name' => __( 'JebaSliders' ),
				'singular_name' => __( 'JebaSlider' )
			),
			'public' => true,
			'supports' => array('title', 'editor', 'thumbnail'),
			'has_archive' => true,
			'rewrite' => array('slug' => 'jeba-plider'),
			'taxonomies' => array('category', 'post_tag') 
		)
	);	
	}

add_theme_support( 'post-thumbnails', array( 'post', 'jeba-eitems' ) );

add_image_size( 'large-portfolio', 630, 250, true );
?>
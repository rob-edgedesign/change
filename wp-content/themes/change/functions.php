<?php
/**
 * edge_starter functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package edge_starter
 */

function register_my_menus() {
   register_nav_menus(
      array(
         'top-menu' => __('Top Menu'),
		 'mobile-menu' => __('Mobile Menu'),
      )
   );
}

add_action( 'init', 'register_my_menus' );
add_theme_support( 'post-thumbnails' );
 if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 400, 300 ); // default Post Thumbnail dimensions
}

if ( function_exists( 'add_image_size' ) ) {
   add_image_size( 'home_banner', 1600, 800, true );
}

function edge_images($image_size) {
$thumb_ID = get_post_thumbnail_id( $post->ID );
$image_count = 0;

$args = array(
	'post_type' => 'attachment',
	'post_mime_type' => 'image',
	'caption' => $attachment->post_excerpt,
	'numberposts' => -1,
	'post_status' => null,
	'post_parent' => get_the_ID(),
	'order' => 'ASC',
	'exclude' => $thumb_ID,
);
$attachments = get_posts( $args );
   if ( $attachments ) {
      foreach ( $attachments as $attachment ) {
           $image_count++;
	        $img_url = wp_get_attachment_url($attachment->ID); // url of the full size image.
	        $caption = $attachment->post_excerpt;
           $description = $attachment->post_content;
           $preview_array = image_downsize( $attachment->ID, $image_size );
           $img_preview = $preview_array[0]; // thumbnail or medium image to use for preview.
?>
<div>
<?php echo wp_get_attachment_image( $attachment->ID, $image_size ); ?>
  <div class="slide-content-title">
  	<div class="inner-content">
    	<?php echo $caption; ?>
  	</div>
  </div>
</div>
<?php }
   } else { echo "Sorry no images..."; }
}

function collections_banner($image_size) {
$banner_counter = 0;
$thumb_ID = get_post_thumbnail_id($post->ID);
$args = array(
  'post_type' => 'attachment',
  'post_mime_type' => 'image',
  'caption' => $attachment->post_excerpt,
  'numberposts' => 1,
  'post_status' => null,
  'post_parent' => get_the_ID(),
  'order' => 'ASC',
   'orderby' => 'menu_order',
);
$attachments = get_posts( $args );
   if ( $attachments ) {

      foreach ( $attachments as $attachment ) {
          $img_url = wp_get_attachment_url($attachment->ID); // url of the full size image.
          $caption = $attachment->post_excerpt;
           $description = $attachment->post_content;
           $preview_array = image_downsize( $attachment->ID, $image_size );
           $img_preview = $preview_array[0]; // thumbnail or medium image to use for preview.
           $banner_counter++;
?>
<div class="collections_banner-img" style="background-image:url(<?php echo $img_preview; ?>);">
   <div class="banner-outer-container">
      <div class="slider-text-container right">
         <div class="inner-content">
               <h3><?php echo $caption; ?></h3>
         </div>
      </div>
   </div>
</div>

<?php }

   } else { echo "Sorry no images..."; }

}

function excerpt($limit) {
      $excerpt = explode(' ', get_the_excerpt(), $limit);
      if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
      } else {
        $excerpt = implode(" ",$excerpt);
      }
      $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
      return $excerpt;
    }

    function content($limit) {
      $content = explode(' ', get_the_content(), $limit);
      if (count($content)>=$limit) {
        array_pop($content);
        $content = implode(" ",$content).'...';
      } else {
        $content = implode(" ",$content);
      }
      $content = preg_replace('/\[.+\]/','', $content);
      $content = apply_filters('the_content', $content);
      $content = str_replace(']]>', ']]&gt;', $content);
      return $content;
    }

    function custom_excerpt_length( $length ) {
      return 25;
    }
    add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

    function new_excerpt_more( $more ) {
      return '...';
    }
    add_filter('excerpt_more', 'new_excerpt_more');

// Custom general settings

add_filter('admin_init', 'my_general_settings_register_fields');
function my_general_settings_register_fields() {
	register_setting('general', 'admin_telephone', 'esc_attr');
	add_settings_field('admin_telephone', '<label for="admin_telephone">'.__('Telephone' , 'admin_telephone' ).'</label>' , 'my_general_phone_settings_fields_html', 'general');

	register_setting('general', 'admin_sales_email', 'esc_attr');
	add_settings_field('admin_sales_email', '<label for="admin_sales_email">'.__('Sales Email' , 'sales_marketing_email' ).'</label>' , 'my_general_sales_email_settings_fields_html', 'general');
	
		register_setting('general', 'admin_press_email', 'esc_attr');
	add_settings_field('admin_press_email', '<label for="admin_press_email">'.__('Press Email' , 'press_marketing_email' ).'</label>' , 'my_general_press_email_settings_fields_html', 'general');

   register_setting('general', 'admin_facebook_link', 'esc_attr');
   add_settings_field('admin_facebook_link', '<label for="admin_facebook_link">'.__('Facebook URL' , 'admin_facebook_link' ).'</label>' , 'my_general_facebook_link_settings_fields_html', 'general');

	register_setting('general', 'admin_twitter_link', 'esc_attr');
	add_settings_field('admin_twitter_link', '<label for="admin_twitter_link">'.__('Twitter URL' , 'admin_twitter_link' ).'</label>' , 'my_general_twitter_link_settings_fields_html', 'general');
	
	register_setting('general', 'admin_instagram_link', 'esc_attr');
	add_settings_field('admin_instagram_link', '<label for="admin_instagram_link">'.__('Instagram URL' , 'admin_instagram_link' ).'</label>' , 'my_general_instagram_link_settings_fields_html', 'general');

	register_setting('general', 'admin_linkedin_link', 'esc_attr');
	add_settings_field('admin_linkedin_link', '<label for="admin_linkedin_link">'.__('LinkedIn URL' , 'admin_linkedin_link' ).'</label>' , 'my_general_linkedin_link_settings_fields_html', 'general');

   register_setting('general', 'admin_youtube_link', 'esc_attr');
   add_settings_field('admin_youtube_link', '<label for="admin_youtube_link">'.__('Youtube URL' , 'admin_youtube_link' ).'</label>' , 'my_general_youtube_link_settings_fields_html', 'general');
}

function my_general_phone_settings_fields_html() {
   $value = get_option( 'admin_telephone', '' );
   echo '<input type="text" class="regular-text" id="admin_telephone" name="admin_telephone" value="' . $value . '" />';
}

function my_general_sales_email_settings_fields_html() {
   $value = get_option( 'admin_sales_email', '' );
   echo '<input type="text" class="regular-text" id="admin_sales_email" name="admin_sales_email" value="' . $value . '"/>';
}

function my_general_press_email_settings_fields_html() {
   $value = get_option( 'admin_press_email', '' );	
   echo '<input type="text" class="regular-text" id="admin_press_email" name="admin_press_email" value="' . $value . '"/>';
}

function my_general_facebook_link_settings_fields_html() {
   $value = get_option( 'admin_facebook_link', '' );
   echo '<input type="text" class="regular-text" id="admin_facebook_link" name="admin_facebook_link" value="' . $value . '"/>';
}

function my_general_twitter_link_settings_fields_html() {
   $value = get_option( 'admin_twitter_link', '' );
   echo '<input type="text" class="regular-text" id="admin_twitter_link" name="admin_twitter_link" value="' . $value . '"/>';
}

function my_general_instagram_link_settings_fields_html() {
   $value = get_option( 'admin_instagram_link', '' );
   echo '<input type="text" class="regular-text" id="admin_instagram_link" name="admin_instagram_link" value="' . $value . '"/>';
}

function my_general_linkedin_link_settings_fields_html() {
   $value = get_option( 'admin_linkedin_link', '' );
   echo '<input type="text" class="regular-text" id="admin_linkedin_link" name="admin_linkedin_link" value="' . $value . '"/>';
}

function my_general_youtube_link_settings_fields_html() {
   $value = get_option( 'admin_youtube_link', '' );
   echo '<input type="text" class="regular-text" id="admin_youtube_link" name="admin_youtube_link" value="' . $value . '"/>';
}

function js_defer_attr($tag) {
   $scripts_to_exclude = array('');

   foreach($scripts_to_exclude as $exclude_script){
   	if(true == strpos($tag, $exclude_script ) )
   	return $tag;
   }
   return str_replace( ' src', ' defer="defer" src', $tag );
}
add_filter( 'script_loader_tag', 'js_defer_attr', 10 );


function add_async_forscript($url) {
   if (strpos($url, '#asyncload')===false)
      return $url;
   else if (is_admin())
      return str_replace('#asyncload', '', $url);
   else
      return str_replace('#asyncload', '', $url)."' async='async";
}
add_filter('clean_url', 'add_async_forscript', 11, 1);

// Load styles and scripts
add_action('wp_print_scripts', 'enqueueMyScripts');
add_action('wp_print_styles', 'enqueueMyScripts');

function enqueueMyScripts() {
   	 // Load these scripts if not in admin area:
   if( !is_admin() ) {
      wp_enqueue_style('style', get_stylesheet_directory_uri() . '/style.css#asyncload', false );
      // wp_enqueue_style('style-min', get_stylesheet_directory_uri() . '/style.min.css#asyncload', false );
      wp_enqueue_style('fonts', '//fast.fonts.net/cssapi/ddc123fc-1e57-4c0d-bfd0-2d034d28a811.css#asyncload#asyncload', false );
      wp_enqueue_style('google-fonts', '//fonts.googleapis.com/css?family=Work+Sans:400,600#asyncload', false );
      wp_enqueue_script('scripts', get_template_directory_uri() . '/assets/js/theme.js', array('jquery'), '', true );
      wp_enqueue_script('slick-min', '//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js', array('jquery'), '', true );
      wp_enqueue_style('slick-style-min', '//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.css#asyncload', false );
   }

   /* if ( is_singular('property') ) {
   } */
}

add_filter( 'wp_get_attachment_image_attributes', function( $attr ){
    if( isset( $attr['sizes'] ) )
        unset( $attr['sizes'] );

    if( isset( $attr['srcset'] ) )
        unset( $attr['srcset'] );

    return $attr;

 }, PHP_INT_MAX );

add_filter( 'wp_calculate_image_sizes', '__return_false',  PHP_INT_MAX );
add_filter( 'wp_calculate_image_srcset', '__return_false', PHP_INT_MAX );

remove_filter( 'the_content', 'wp_make_content_images_responsive' );
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );


?>

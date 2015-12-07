<?php
 
register_nav_menus(); 
add_theme_support('post-thumbnails'); 
set_post_thumbnail_size(200,200, true);
add_post_type_support( 'page', 'excerpt' );
add_filter( 'wp_title','braincancer_filter_wp_title', 10, 3 );

?>


    <?php //rip out sidebars and footers you're not using.  All widgetized areas are "sidebars"

// support HTML5 semantic markup
$args = array(
	'search-form',
	'comment-form',
	'comment-list',
	'gallery',
	'caption'
);
add_theme_support( 'html5', $args );

// add RSS feed links to <head> tag
add_theme_support( 'automatic-feed-links' );

//for security, hide wp version in web pages and feeds
function remove_version_info() {
     return '';
}
add_filter('the_generator', 'remove_version_info');

// set Media Library image link default to "none"
function wpb_imagelink_setup() {
	$image_set = get_option( 'image_default_link_type' );
	
	if ($image_set !== 'none') {
		update_option('image_default_link_type', 'none');
	}
}
add_action('admin_init', 'wpb_imagelink_setup', 10);

// use shortcodes in widgets
add_filter( 'widget_text', 'shortcode_unautop');
add_filter( 'widget_text', 'do_shortcode');

//Register custom menus
if ( function_exists( 'register_nav_menus' ) ) {
	register_nav_menus(
        array(
            'main-menu' => 'Main Menu',
            'social-menu' => 'Social Media Menu'
		)
	);
}   
   
//Register sidebars
add_action( 'widgets_init', 'my_register_sidebars' );

function my_register_sidebars() {

	/* Register the Shows (calendar) sidebar. */
	register_sidebar(
		array(
			'id' => 'shows',
			'name' => __( 'Shows Sidebar for Calendar Widget' ), //name appears in the dashboard, use to tell clients what this is about. Make sure your sidebar names match your HTML. Describe the role, not the position/appearance.
			'before_widget' => '<div id="%1$s" class="widget %2$s">', //we changed from li to div, look out for themes that change it back.
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);
    
    /* Register the Contact widgetized area. */
	register_sidebar(
		array(
			'id' => 'contact',
			'name' => __( 'Contact Form Widgetized Area' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);

    /* Register the Newsletter widgetized area. */
	register_sidebar(
		array(
			'id' => 'newsletter',
			'name' => __( 'Newsletter Sign-Up Widgetized Area' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);
    
    /* Register the Category sidebar. */
	register_sidebar(
		array(
			'id' => 'primary',
			'name' => __( 'Primary Sidebar' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);
    
}


// Remove rel attribute from the category list
function remove_category_list_rel($output)
{
  $output = str_replace(' rel="category tag"', '', $output);
  return $output;
}
add_filter('wp_list_categories', 'remove_category_list_rel');
add_filter('the_category', 'remove_category_list_rel');



/* 
 * from Mike Sinkula's: http://www.premiumdw.com/2014/11/19/search-engine-optimization-seo-in-wordpress-without-using-a-plugin/#my-awesome-title-tag
 *
 */

// Get My Title Tag 
function get_my_title_tag() {
    
    global $post;
    
    if ( is_front_page() ) {  // for site’s Front Page
    
        bloginfo('description'); // retrieve the site tagline
    
    } 
    
    elseif ( is_page() || is_single() ) { // for your site’s Pages or Postings
    
        the_title(); // retrieve the page or posting title 
    
    } 

    else { // for everything else
        
        bloginfo('description'); // retrieve the site tagline
        
    }
    
    if ( $post->post_parent ) { // for your site’s Parent Pages
    
        echo ' | '; // separator with spaces
        echo get_the_title($post->post_parent); // retrieve the parent page title
        
    }

    echo ' | '; // separator with spaces
    bloginfo('name'); // retrieve the site name
    echo ' | '; // separator with spaces
    echo 'Seattle, WA.'; // write in the location
    
}
// end get_my_title_tag() function
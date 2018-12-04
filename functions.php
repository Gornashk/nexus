<?php

require_once('bones.php'); // if you remove this, bones will break

// ACF commands
require_once( 'inc/class-acf-commands.php' ); // ACF fields syncing

// Add php components
require_once( __DIR__ . '/components/bootstrap.php' );

/************* THUMBNAIL SIZE OPTIONS *************/

/* NOTE: Only use thumbnails if you need to, to stop digital waste */

//add_image_size( '300x300', 300, 300, true );

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas

function bones_register_sidebars() {

    register_sidebar(array(

    	'id' => 'sidebar1',

    	'name' => __('Default Sidebar', 'bonestheme'),

    	'description' => __('The first (primary) sidebar.', 'bonestheme'),

    	'before_widget' => '<div id="%1$s" class="widget %2$s">',

    	'after_widget' => '</div>',

    	'before_title' => '<h3 class="widgettitle">',

    	'after_title' => '</h3>',

    ));  

} // don't remove this bracket!

/************* SEARCH FORM LAYOUT *****************/

function bones_wpsearch($form) {

    $form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >

    <label class="screen-reader-text" for="s">' . __('Search for:', 'bonestheme') . '</label>

    <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="'.esc_attr__('Search the Site...','bonestheme').'" />

    <input type="submit" id="searchsubmit" value="'. esc_attr__('Search') .'" />

    </form>';

    return $form;

} // don't remove this bracket!

//* Add Vue to Project
require_once( get_stylesheet_directory() . '/vue/bootstrap.php' );

function crafted_var_dump($var)
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}


/*
** Wrap post images in <figure>
** Allows for fun things like image color overlays
*/
// unautop for images     
function fb_unautop_4_img( $content )
{ 
    $content = preg_replace( 
        '/<p>\\s*?(<a rel=\"attachment.*?><img.*?><\\/a>|<img.*?>)?\\s*<\\/p>/s', 
        '<figure class="postImg postImgNoCap">$1</figure>', 
        $content 
    ); 
    return $content; 
} 
add_filter( 'the_content', 'fb_unautop_4_img', 99 );


// unautop for images w/ caption   
function ks_figure_4_captioned_img( $content )
{ 
    $content = preg_replace( 
        '/<div id="(.*)" style="(.*)" class="wp-caption (.*)">\\s*?(<a rel=\"attachment.*?><img.*?><\\/a>|<img.*?>)?\\s*<p class="wp-caption-text">(.*)<\/p><\\/div>/s', 
        '<div id="$1" style="$2" class="wp-caption $3"><figure class="postImg">$4</figure><p class="wp-caption-text">$5</p></div>', 
        $content 
    ); 
    return $content; 
} 
add_filter( 'the_content', 'ks_figure_4_captioned_img', 99 );
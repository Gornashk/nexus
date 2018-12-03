<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">	
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	
	<title><?php wp_title();?></title>
	<?php wp_head();?>
	<script defer src="https://pro.fontawesome.com/releases/v5.3.1/js/all.js" integrity="sha384-eAVkiER0fL/ySiqS7dXu8TLpoR8d9KRzIYtG0Tz7pi24qgQIIupp0fn2XA1H90fP" crossorigin="anonymous"></script>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'crafted_before' ); ?>
<div id="mobile-nav-wrap" class="mobile-nav-wrap" :class="{ opened : mobileMenu }" v-show="mobileMenu">
	<nav id="mobile-navigation-top" class="navigation-mobile" role="navigation">
    <ul>
     	<?php wp_nav_menu( array( 'theme_location' => 'mobile-menu', 'items_wrap' => '%3$s', 'container' => '' ) ); ?>
		</ul>
	</nav><!-- #mobile-navigation -->
</div> <!-- #mobile-nav-wrap -->
<div id="page" :class="{ opened : mobileMenu }">
<?php
$front = '';
if(is_front_page()) {
	$front = 'front';
} ?>
	<header class="site-header <?php echo $front; ?>" itemscope="" itemtype="http://schema.org/WPHeader">
		<div class="topBar">
			<div class="container">
				<div class="row">
					<form class="trackOrder">
						<input type="text" placeholder="Enter order tracking number" />
						<button>Track Order</button>
					</form>
					<div class="topContact">
						<p>315-555-1234<a href="/contact-us/">Contact Us</a></p>
					</div>
				</div>
			</div>
		</div>
	  <div class="container mainBar">
	    <div class="row">
	      <div class="col-md-4">
	        <a href="/" class="site-logo"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/nexus-web-logo.svg"></a>
	      </div>
	      <div class="col-md-8">
	        <?php wp_nav_menu( array( 'theme_location' => 'main-nav' ) ); ?>
	        
	        <div class="navicon-wrap">
	        	<button class="lines-button x" :class="{ close: mobileMenu }"  @click="mobileMenu = !mobileMenu" type="button" role="button" aria-label="Toggle Navigation">
	        		<span class="lines"></span>
	        	</button>
	        </div>

	      </div>
	    </div>
	  </div>
	</header>

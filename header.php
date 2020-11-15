<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">	
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	
	<title><?php wp_title();?></title>
	<?php wp_head();?>
	<script defer src="<?php echo get_stylesheet_directory_uri(); ?>/js/all.min.js"></script>
	<!-- <script defer src="https://pro.fontawesome.com/releases/v5.3.1/js/all.js" integrity="sha384-eAVkiER0fL/ySiqS7dXu8TLpoR8d9KRzIYtG0Tz7pi24qgQIIupp0fn2XA1H90fP" crossorigin="anonymous"></script> -->
</head>

<body <?php body_class(); ?>>
<?php // do_action( 'crafted_before' ); ?>
<div id="page">
<?php
$front = '';
if(is_front_page()) {
	$front = 'front';
} ?>
	<header class="site-header <?php echo $front; ?>" id="site-header" itemscope="" itemtype="http://schema.org/WPHeader">
		<?php cr_mobile_menu(); ?>
		<div class="topBar" :class="{ opened : mobileMenu }">
			<div class="container">
				<div class="row">
					<form class="trackOrder">
						<input type="text" placeholder="Enter order tracking number" />
						<button>Track Order</button>
					</form>
					<div class="topContact">
						<p>317-851-8798<a href="/connect-with-us/">Connect With Us</a></p>
					</div>
				</div>
			</div>
		</div>
	  <div class="container mainBar" :class="{ opened : mobileMenu }">
	    <div class="row">
	      <div class="col-md-4">
					<a href="/" class="site-logo"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/nexus-web-logo.svg"></a>
					<div class="navicon-wrap">
	        	<button class="lines-button x" :class="{ close: mobileMenu }"  @click="mobileMenu = !mobileMenu" type="button" role="button" aria-label="Toggle Navigation">
	        		<span class="lines"></span>
	        	</button>
	        </div>
	      </div>
	      <div class="col-md-8">
	        <?php wp_nav_menu( array( 'theme_location' => 'main-nav' ) ); ?>
	      </div>
	    </div>
	  </div>
	</header>

	<footer class="site-footer" itemscope="" itemtype="http://schema.org/WPFooter">
	  <div class="container">
      <div class="row footTop">
        <div class="col-md-4">
          <a href="/" class="site-logo"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/nexus-web-logo-white.svg"></a>
        </div>
        <div class="col-md-8">
          <?php wp_nav_menu( array( 'theme_location' => 'main-nav' ) ); ?>
        </div>
      </div>
	    <div class="row">
	      <div class="col-md-12">&copy; <?php echo date('Y'); ?></div>
	    </div>
	  </div>
	</footer>

</div><!-- #page -->
<?php wp_footer(); ?>


<script>
/*
// this might change in the future
Modernizr.addTest('mobilesafari', function() {
  return /iP(ad|hone|od).+Version\/[\d\.]+.*Safari/i.test(navigator.userAgent);
});

var orientation = window.screen.msOrientation || (window.screen.orientation || window.screen.mozOrientation || {}).type;
var windowHeight = window.innerHeight - 70;
var mobileMenu = document.querySelector("#mobile-nav-wrap");

if (orientation === "landscape-primary" || orientation === "landscape-secondary" || orientation == 90) {
    if(Modernizr.mobilesafari) {
      var safariSpecialHeight = windowHeight - 50;
      window.mobileMenu.style.height = safariSpecialHeight + 'px';
    } else {
      window.mobileMenu.style.height = windowHeight + 'px';
    }
    
} else if (orientation === "portrait-secondary" || orientation === "portrait-primary" || orientation == 0) {
    window.windowHeight = window.innerHeight - 85;
    window.mobileMenu.style.height = window.windowHeight + 'px';
} else if (orientation === undefined) {

}

// Note that "orientationchange" and screen.orientation are unpre fixed in the following
// code although this API is still vendor-prefixed browsers implementing it.
window.addEventListener("orientationchange", () => {
  setTimeout(() => {
    var mobileMenuNew = document.querySelector("#mobile-nav-wrap");
    var windowHeightNew = window.innerHeight - 70;
    if (orientation === "landscape-primary" || orientation === "landscape-secondary" || orientation == 90) {
        mobileMenuNew.style.height = windowHeightNew + 'px';
    } else if (orientation === "portrait-secondary" || orientation === "portrait-primary" || orientation == 0) {
        windowHeightNew = window.innerHeight - 85;
        mobileMenuNew.style.height = windowHeightNew + 'px';
    } else if (orientation === undefined) {

    }
  }, 500)

});
*/
</script>

</body>
</html> <!-- end page. what a ride! -->
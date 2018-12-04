<?php
function cr_mobile_menu() { 
?>

<div id="mobile-nav-wrap" class="mobile-nav-wrap" :class="{ opened : mobileMenu }">
  <nav id="mobile-navigation-top" class="navigation-mobile" role="navigation">
    <!-- <div class="navClose" @click="menuToggle">
      <i class="fas fa-times"></i>
    </div> -->
    <ul>
      <?php wp_nav_menu( array( 'theme_location' => 'main-nav', 'items_wrap' => '%3$s', 'container' => '' ) ); ?>
    </ul>
  </nav><!-- #mobile-navigation -->
</div> <!-- #mobile-nav-wrap -->

<?php } ?>
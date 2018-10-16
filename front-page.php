<?php 
get_header();

$dir = get_stylesheet_directory_uri();
?>

<div class="fullscreenVid">
  <div class="vidOver"></div>
  <video loop muted autoplay poster="<?php echo $dir; ?>/img/350x350.png" class="fullscreen-bg__video">
    <source src="<?php echo $dir; ?>/img/indy_vid.webm" type="video/webm">
  </video>
</div>

<div class="container vidOverCont">
  <div class="row">
    <div class="col-sm-4">
      <h2>The Link and Connections to your Customers</h2>
    </div>
    <div class="vidOver_btm">
      <h2>Experience the Difference</h2>
    </div>
  </div>
</div>




<?php
get_footer();
?>
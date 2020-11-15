<?php 
get_header();

$dir = get_stylesheet_directory_uri();
?>

<div class="fullscreenVid">
  <div class="vidOver"></div>
  <video loop muted autoplay poster="<?php echo $dir; ?>/img/videoStill.jpg" class="fullscreen-bg__video">
    <source src="<?php echo $dir; ?>/img/Indy-encoded.mp4" type="video/mp4">
  </video>
  <!-- <img src="<?php echo $dir; ?>/img/video-still.jpg" alt="Indianapolis Skyline"> -->
</div>

<div class="vidOverCont">
  <div class="container">
    <div class="row">
      <div class="col-sm-4">
        <h2>Be Connected &#183; Be Linked &#183; Be Calm</h2>
      </div>
    </div>
  </div>
  <div class="vidOverMain">
    <div class="container">
      <div class="row">
        <div class="col-sm-10 col-sm-push-1 col-md-8 col-md-push-2">
          <?php the_content(); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="vidOver_btm">
    <h2>Experience the Difference</h2>
  </div>
</div>

<?php if(have_rows('icon_links')): ?>
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <div class="linkIcons">
        <?php while( have_rows('icon_links')) : the_row(); 
        $awesomeIcon = get_sub_field('font_awesome_icon');
        $imgIcon = get_sub_field('image_icon');
        $title = get_sub_field('title');
        $link = get_sub_field('page_link'); ?>
        <div class="iconBox">
          <a href="<?php echo $link; ?>" title="<?php echo $title; ?>">
            <?php
            if($awesomeIcon) : 
              echo $awesomeIcon;
            elseif($imgIcon):
              echo '<img src="'.$imgIcon.'" alt="'.$title.'">';
            endif; ?>
            <h4><?php echo $title; ?></h4>
          </a>
        </div>
        <?php endwhile; ?>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>




<?php
get_footer();
?>
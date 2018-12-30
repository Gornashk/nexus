<?php get_header(); ?>

<?php 
if(have_posts()) : while(have_posts()) : the_post(); 
	$intro = get_field('page_intro');
	// $sections = get_field('content_section'); ?>
	<div class="pageIntro">
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<h1 class="page-title"><?php echo the_title();?></h1>
					<?php if($intro) {
						echo '<p class="introP">'. $intro .'</p>';
					} ?>
				</div>
			</div>
		</div>
	</div>

	<?php
	if( have_rows('content_sections') ):
		while( have_rows('content_sections') ) : the_row();

			// FEATURED IMAGE SECTION
			if( get_row_layout() == 'featured_image' ):
				$image = get_sub_field('image'); ?>

				<div class="pageImg">
					<img src="<?php echo $image['sizes']['large']; ?>">
				</div><!-- End Featured Image -->

				<!--<div class="featImg" style="background-image:url(<?php echo $image['sizes']['banner']; ?>);"></div> End Featured Image -->

			<?php // FEATURED VIDEO SECTION
			elseif( get_row_layout() == 'featured_video' ):
				$iframe = get_sub_field('youtube_embed');
				preg_match('/src="(.+?)"/', $iframe, $matches);
				$vidId = $matches[1];
				$vidImg = get_sub_field('video_image'); ?>

				<a data-fancybox="gallery" href="<?php echo $vidId; ?>" class="vidLink">
					<i class="fal fa-play-circle"></i>
					<img src="<?php echo $vidImg['sizes']['large']; ?>">
				</a><!-- End Featured Video -->

				<!--<a href="" class="videoLink" style="background-image:url(<?php echo $vidImg['sizes']['large']; ?>);">
					<i class="fal fa-play-circle"></i>
				</a> End Featured Video -->

			
			<?php // FULL WIDTH FEATURED CONTENT SECTION
			elseif( get_row_layout() == 'featured_content' ): 
				$title = get_sub_field('header');
				$content = get_sub_field('content');
				$image = get_sub_field('image');
				$noImg = '';
				if(!$image) {
					$noImg = 'noImg';
				} ?>

				<div class="featCont <?php echo $noImg; ?>">
					<div class="container">
						<div class="row">
							<?php if($image) { ?>
								<div class="col-sm-4 sideImg">
									<div class="imgWrap">
										<img src="<?php echo $image['sizes']['large']; ?>">
										<img class="shadow" src="<?php echo $image['sizes']['large']; ?>">
									</div>
								</div>
								<div class="col-sm-7 col-sm-push-1">
									<?php if($title) {
										echo '<h2>'. $title .'</h2>';
									} if($content) {
										echo '<span>'.$content .'</span>';
									} ?>
								</div>
							<?php }
							else { ?>
								<div class="col-sm-6 col-sm-push-3">
									<?php if($title) {
										echo '<h2>'. $title .'</h2>';
									} if($content) {
										echo '<span>'.$content .'</span>';
									} ?>
								</div>
							<?php } ?>
						</div>
					</div>
				</div><!-- End Featured Content -->

			<?php // MAIN CONTENT SECTION
			elseif( get_row_layout() == 'content_section' ):
				$secBG = get_sub_field('section_background_color');
				$secHead = get_sub_field('section_header');
				$secSubHead = get_sub_field('section_sub_header');
				$subHead = get_sub_field('sub_header');
				$secContent = get_sub_field('section_content'); ?>
				<div class="mainContent <?php echo $secBG; ?>">
					<div class="container">
						<div class="row">
							<div class="col-md-8 col-md-push-2">
								<?php if($secHead) { ?>
								<h1 class="secHead"><?php echo $secHead; ?></h1>
								<?php } 
								if($secSubHead) { ?>
								<h2 class="secSubHead"><?php echo $secSubHead; ?></h2>
								<?php } ?>
								<?php if($secHead || $secSubHead) { ?>
									<div class="sectionLine"></div>
								<?php } ?>
								<div class="sectionContent">
									<?php if($subHead) { ?>
									<h2 class="subHead"><?php echo $subHead; ?></h2>
									<?php } 
									if($secContent) { 
										echo $secContent;
									} ?>
								</div>
							</div>
						</div>
					</div>
				</div><!-- End Main Content -->
			
			<?php // TWO COLUMN SECTION
			elseif( get_row_layout() == 'two_column_section' ):
				$secHead = get_sub_field('section_header');
				$secSubHead = get_sub_field('section_sub_header');
				$leftCol = get_sub_field('left_column');
				$rightCol = get_sub_field('right_column'); ?>

				<div class="container">
					<div class="row">
						<div class="col-md-8 col-md-push-2">
							<?php if($secHead) { ?>
								<h1 class="secHead"><?php echo $secHead; ?></h1>
							<?php } 
							if($secSubHead) { ?>
								<h2 class="secSubHead"><?php echo $secSubHead; ?></h2>
							<?php } ?>
							<div class="twoColWrap">
							<?php if($leftCol) { ?>
								<div class="col-sm-5">
									<?php echo $leftCol; ?>
								</div>
							<?php }
							if($rightCol) {
								if($leftCol) { 
									$offset = 'col-sm-offset-2';
								} else {
									$offset = '';
								} ?>
								<div class="col-sm-5 <?php echo $offset; ?>">
									<?php echo $rightCol; ?>
								</div>
							<?php } ?>
							</div>
						</div>
					</div>
				</div><!-- End Main Content -->

			<?php // INLINE IMAGE SECTION
			elseif( get_row_layout() == 'inline_image' ):
				$image = get_sub_field('image');
				$imgCap = get_sub_field('image_caption'); ?>

				<div class="container">
					<div class="row">
						<div class="col-md-8 col-md-push-2">
							<?php if($image && $imgCap) { ?>
								<div class="wp-caption alignnone">
									<figure class="postImg">
										<img class="size-large" src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $imgCap; ?>" 
										srcset="<?php echo $image['sizes']['large']; ?> 1024w,
										<?php echo $image['sizes']['medium']; ?> 300w,
										<?php echo $image['sizes']['medium_large']; ?> 768w"
										sizes="(max-width:1024px) 100vw, 1024px" >
									</figure>
									<p class="wp-caption-text"><?php echo $imgCap; ?></p>
								</div>
							<?php } elseif($image) { ?>
								<figure class="postImg">
									<img class="size-large" src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['caption']; ?>" 
									srcset="<?php echo $image['sizes']['large']; ?> 1024w,
									<?php echo $image['sizes']['medium']; ?> 300w,
									<?php echo $image['sizes']['medium_large']; ?> 768w"
									sizes="(max-width:1024px) 100vw, 1024px" >
								</figure>
							<?php } ?>
						</div>
					</div>
				</div><!-- End Inline Image -->

			<?php // INLINE VIDEO SECTION
			elseif( get_row_layout() == 'inline_video' ):
				 $vid = get_sub_field('youtube_embed');
				 $vidCap = get_sub_field('video_caption'); ?>

				<div class="container inlineVid">
					<div class="row">
						<div class="col-md-8 col-md-push-2">
							<?php echo $vid; ?>
							<p class="wp-caption-text"><?php echo $vidCap; ?></p>
						</div>
					</div>
				</div><!-- End Inline Video -->

			<?php // FULL WIDTH CTA SECTION
			elseif( get_row_layout() == 'full-width_cta' ):
				$secBG = get_sub_field('section_background_color');
				$title = get_sub_field('title');
				$content = get_sub_field('content');
				$btnTxt = get_sub_field('button_text');
				$btnLink = get_sub_field('button_link'); ?>

				<div class="fullCta <?php echo $secBG; ?>">
					<div class="container">
						<div class="row">
							<div class="col-md-8 col-md-push-2">
								<?php if($title) {
									echo '<h1>'. $title .'</h1>';
								} if($content) {
									echo '<span>'.$content .'</span>';
								} if($btnTxt && $btnLink) {
									echo '<a href="'. $btnLink .'" class="btn">'.$btnTxt.'</a>';
								} ?>
							</div>
						</div>
					</div>
				</div>

			<?php // SLIDING GALLERY SECTION
			elseif( get_row_layout() == 'gallery' ): 
				$images = get_sub_field('image_gallery'); 
				if($images) : ?>

					<div class="container">
						<div class="row">
							<div class="col-md-8 col-md-push-2">
								<div class="gallery">
									<?php foreach($images as $img): ?>
										<dl class="gallery-item">
											<dt class="gallery-icon">
												<img class="size-large" src="<?php echo $img['image']['sizes']['large']; ?>" alt="<?php echo $img['image']['image_caption']; ?>" 
												srcset="<?php echo $img['image']['sizes']['large']; ?> 1024w,
												<?php echo $img['image']['sizes']['medium']; ?> 300w,
												<?php echo $img['image']['sizes']['medium_large']; ?> 768w"
												sizes="(max-width:1024px) 100vw, 1024px" >
												<?php if($img['image_caption']) { ?>
													<dd class="wp-caption-text gallery-caption"><?php echo $img['image_caption']; ?></dd>
												<?php } ?>
											</dt>
										</dl>
									<?php endforeach; ?>
								</div>
							</div>
						</div>
					</div><!-- End Sliding Gallery -->

			<?php 
				endif;
				
				// QUOTE SECTION
			elseif( get_row_layout() == 'quote' ): 
				$quote = get_sub_field('quote'); ?>

				<div class="container">
					<div class="row">
						<div class="col-md-8 col-md-push-2">
							<h1 class="quoteSection"><?php echo $quote; ?></h1>
						</div>
					</div>
				</div><!-- End Quote Section -->

			<?php 
			endif;
		endwhile;

	else:
		// No layouts found

	endif; ?>
	

<?php endwhile; 

	// if(is_page(41)) {
	// 	ks_forms('contact');
	// } else {
	// 	ks_forms('page');
	// }

endif; ?>

<?php get_footer(); ?>
<?php $this->load->view('fincludes/header'); ?>
	<section class="banner-video-section">
    <?php if(!empty($banners)){ foreach($banners as $banner){ ?>
        <div class="va-promo-text wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.5s">
            <?php if(!empty($banner->description_one)){ ?>
            <h3><span><?=$banner->description_one?></span></h3>
            <?php } if(!empty($banner->description_two)){ ?>
            <div class="promo-sub"><?=$banner->description_two?></div>
            <?php } if(!empty($banner->link)){ ?>
            <a href="<?=$banner->link?>" class="read-more">Read More<i class="fa fa-chevron-right" aria-hidden="true"></i></a>
            <?php } ?>
        </div>
        <img src="<?php echo base_url().'uploads/'.$banner->image; ?>">
        <!-- <video autoplay="autoplay" loop="loop" muted defaultMuted playsinline oncontextmenu="return false;"
            preload="auto" id="myVideo">
            <source src="<?php echo assets_url();?>fassets/video/file.mp4" type="video/mp4">
        </video> -->
    <?php } } ?>
    </section>

	
	<section class="team-section">
		<div class="container">
			<div class="section-title text-center wow bounceInUp">
				<div class="row">
					<div class="col-md-12 text-center">
						<h2 class="title text-uppercase">Our <span class="text-black font-weight-300">Team</span></h2>
						<p class="text-uppercase letter-space-1">Join our Training Club and Rise to a New Challenge</p>
					</div>
				</div>
			</div>
			<div class="row">
				<?php if(!empty($teams)){ $i=1; foreach($teams as $team){ 
                    if($i == 1) { $delay = '0.2s'; $pos = 'slideInLeft'; }
                    if($i == 2) { $delay = '0.4s'; $pos = 'bounceInUp'; }
                    if($i == 3) { $delay = '0.6s'; $pos = 'slideInRight'; $i==1; }
                ?>
				<div class="col-md-6 col-xl-4 wow <?=$pos?>" data-wow-duration="1s" data-wow-delay="<?php echo $delay; $i++; ?>">
					<div class="card mb-20">
						<div class="card-body">
					  		<img class="rounded-circle w-15 mb-4" src="<?php echo base_url().'uploads/'.$team->image; ?>" height="100" width="100" alt="">
					  		<h4 class="mb-1"><?=$team->title?></h4>
					  		<div class="meta mb-2"><?=$team->designation?></div>
				  			<?php echo limit_text_team($team->description, 65); ?>
							<nav class="nav social mb-0">
								<?php if(!empty($team->fb_link)){ ?>
									<a href="<?=$team->fb_link?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
								<?php } if(!empty($team->twitter_link)){ ?>
									<a href="<?=$team->twitter_link?>" target="_blank"><i class="fab fa-twitter"></i></a>
								<?php } if(!empty($team->instagram_link)){ ?>
									<a href="<?=$team->instagram_link?>" target="_blank"><i class="fab fa-instagram"></i></a>
								<?php } if(!empty($team->linkedin_link)){ ?>
									<a href="<?=$team->linkedin_link?>" target="_blank"><i class="fab fa-linkedin"></i></a>
								<?php } ?>
							</nav>
						</div>
				  	</div>
			 	</div>
			 	<?php } } ?>
		   	</div>
		</div>
	</section>


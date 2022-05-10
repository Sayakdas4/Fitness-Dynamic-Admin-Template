<?php $this->load->view('fincludes/header'); ?>
    <!-- <section class="carousel slide" id="banner">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <?php if(!empty($banners)) { foreach($banners as $banner){ ?>
            <div class="carousel-inner">
                <div class="carousel-item active" style="background: url();"><img src="<?php echo base_url().'uploads/'.$banner->image; ?>">
                    <div class="banner-caption">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-10 mx-auto">
                                    <div class="hero-text">
                                        <h6 class="animated fadeInDown">Welcome to</h6>
                                        <h1 class="animated fadeInUp">Lorem Ipsum is simply dummy text of the printing</h1>
                                        <a href="#" class="btn btn-primary btn-1 mt-2 animated fadeInUp">Contact Us</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } } ?>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <i class="fal fa-chevron-left"></i>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <i class="fal fa-chevron-right"></i>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section> -->

    <section class="carousel slide" id="banner">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" style="background: url(<?php echo base_url().'uploads/'.$about_us_banner->image; ?>);" style="display: none;">
                </div>
                <?php if(!empty($banners)) { foreach($banners as $banner){ if($banner->banner_id == 2){} else { ?>
                <div class="carousel-item" style="background: url(<?php echo base_url().'uploads/'.$banner->image; ?>);">
                </div>
                <?php } } } ?>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <i class="fal fa-chevron-left"></i>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <i class="fal fa-chevron-right"></i>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>
		
	<section class="about-us">
		<div class="container">
			<div class="row">
				<div class="col-md-7">
				<h1><?=$cms2->title?> </h1>
				<?=$cms2->description?>
				
				</div>
				<div class="col-md-5">
					<div class="profile-box">
					<img src="<?php echo base_url().'uploads/'.$cms2->image; ?>" />
					</div>
				</div>
			</div>
		</div>
	</section>

    <section class="certificate-sec ptb-100">
        <div class="section-heading text-center pb-30">
            <h1>OUR CERTIFICATIONS</h1>
            <p class="text-center">what we achieve</p>
        </div>
        <div class="certificate">
        	<?php if(!empty($certificationss)) { foreach($certificationss as $certifications){ ?>
            <div class="item text-center">
                <img src="<?php echo base_url().'uploads/'.$certifications->image; ?>" width="283" height="400"/>
        	</div>
        	<?php } } ?>
            <?php if(!empty($certificationss)) { foreach($certificationss as $certifications){ ?>
            <div class="item text-center">
                <img src="<?php echo base_url().'uploads/'.$certifications->image; ?>" width="283" height="400"/>
            </div>
            <?php } } ?>

            <!-- <div class="item text-center">
                <img src="<?php echo assets_url();?>fassets/images/c-1.jpeg" />
            </div>
            <div class="item text-center">
                <img src="<?php echo assets_url();?>fassets/images/about-certi-2.jpg" />
            </div> -->

        </div>
    </section>

    <section class="team-sec ptb-100">
        <div class="container-fluid">
            <div class="section-heading text-center pb-30">
                <h1>OUR BEST TEAM</h1>
                <p class="text-center">Meet with our professionals</p>
            </div>
            <div class="carousel5">
            	<?php if(!empty($teams)) { foreach($teams as $team){ ?>
                <div class="item text-center">
                    <div class="team-box">
                        <img src="<?php echo base_url().'uploads/'.$team->image; ?>" />
                        <div class="team-info">
                            <h3><?=$team->title?></h3>
                            <h5><?=$team->designation?></h5>
                        </div>
                    </div>
                </div>
                <?php } } ?>
                <?php if(!empty($teams)) { foreach($teams as $team){ ?>
                <div class="item text-center">
                    <div class="team-box">
                        <img src="<?php echo base_url().'uploads/'.$team->image; ?>" />
                        <div class="team-info">
                            <h3><?=$team->title?></h3>
                            <h5><?=$team->designation?></h5>
                        </div>
                    </div>
                </div>
                <?php } } ?>

                <!-- <div class="item text-center">
                    <div class="team-box">
                        <img src="<?php echo assets_url();?>fassets/images/3.jpg" />
                        <div class="team-info">
                            <h3>VANDANA</h3>
                            <h5>Customer Support</h5>
                        </div>
                    </div>
                </div> -->

            </div>
        </div>
    </section>

	<section class="usp">
		<div class="container">
			<div class="section-heading text-center pb-30">
                <h1>OUR USP</h1>
            </div>
			<div class="row">
				<?php if(!empty($usps)) { foreach($usps as $usp){ ?>
				<div class="col-md-2">
					<div class="usp-icon">
						<div class="usp-icon-bg">
							<img src="<?php echo base_url().'uploads/'.$usp->image; ?>" />
						</div>
						<h6><?=$usp->title?></h6>
					</div>
				</div>
				<?php } } ?>				
			</div>
		</div>
	</section>

	<section class="adv-sec">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1><?=$cms3->title?></h1>
					<h5>MILITARY SPECIFICATION CONFORMANCE PAINTS</h5>
				</div>
				<div class="col-md-6">
					<img src="<?php echo base_url().'uploads/'.$cms3->image; ?>" />
				</div>
				<?=$cms3->description?>
			</div>
		</div>
	</section>
<?php $this->load->view('fincludes/footer'); ?>
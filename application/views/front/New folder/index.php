<?php $this->load->view('fincludes/header'); ?>
    

    <section class="banner" id="home">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <!-- <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div> -->
            <div class="carousel-inner">
                <div class="carousel-item active" style="background: url(<?php echo base_url().'uploads/'.$home_banner->image; ?>);">
                    <div class="carousel-caption d-none d-md-block va-promo-text wow bounceInUp">
                        <?php if(!empty($home_banner->description_one)){ ?>
                        <h3><span><?=$home_banner->description_one?></span></h3>
                        <?php } if(!empty($home_banner->description_two)){ ?>
                        <div class="promo-sub"><?=$home_banner->description_two?></div>
                        <?php } if(!empty($home_banner->link)){ ?>
                        <a href="<?=$home_banner->link?>" class="read-more">Read More<i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                        <?php } ?>
                    </div>
                </div>
                <?php if(!empty($banners)) { foreach($banners as $banner){ if($banner->banner_id == 1){} else { ?>
                <div class="carousel-item" style="background: url(<?php echo base_url().'uploads/'.$banner->image; ?>);">
                    <!-- <img src="<?php echo base_url().'uploads/'.$banner->image; ?>" class="d-block w-100" alt="..."> -->
                    <div class="carousel-caption d-none d-md-block va-promo-text wow bounceInUp">
                        <?php if(!empty($banner->description_one)){ ?>
                        <h3><span><?=$banner->description_one?></span></h3>
                        <?php } if(!empty($banner->description_two)){ ?>
                        <div class="promo-sub"><?=$banner->description_two?></div>
                        <?php } if(!empty($banner->link)){ ?>
                        <a href="<?=$banner->link?>" class="read-more">Read More<i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                        <?php } ?>
                    </div>
                </div>
                <?php } } } ?>
                <!-- <div class="carousel-item">
                    <img src="<?php echo assets_url();?>fassets/images/slider.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block va-promo-text wow bounceInUp">
                        <h3>Life is <span>About NFL</span></h3>
                        <div class="promo-sub">Just play. <span>Have fun.</span> Enjoy the game</div>
                        <a href="#" class="read-more">Read More<i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                    </div>
                </div> -->
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <section id="about" class="bg-lighter" id="about">
        <div class="container pb-70">
            <div class="section-title text-center wow bounceInUp">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2 class="title text-uppercase">Welcome to <span class="text-black font-weight-300">Pinnacle Performance Group 
                            </span></h2>
                        <p class="text-uppercase letter-space-1">Join our Training Club and Rise to a New Challenge</p>
                    </div>
                </div>
            </div>
            <div class="section-content">
                <div class="row">
                    <!-- <div class="col-md-6 wow slideInLeft" data-wow-duration="1s" data-wow-delay="0.2s"> 
                        <img class="img-fullwidth" src="<?php echo base_url().'uploads/'.$about_us_data->image; ?>" alt=""> 
                    </div> -->
                    <div class="col-md-12 wow slideInRight" data-wow-duration="1s" data-wow-delay="0.4s">
                        <div class="events-venue border-theme-colored border-5px p-40 pt-0 mt-50 ml-sm-0 mt-sm-20 mt-xs-0 pt-sm-20">
                            <h2 class="events-trainer-title text-uppercase letter-space-1 text-theme-colored bg-lighter mb-20 mb-sm-0"><?=$about_us_data->title?></h2>
                            <div class="pl-50 pl-sm-0 mb-20 mt-20 mt-sm-0">
                                <p class="text-justify"><?=$about_us_data->description?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- <section id="services">
        <div class="container">
            <div class="section-title wow bounceInDown">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2 class="title text-uppercase">Our <span class="text-black font-weight-300">Services</span>
                        </h2>
                        <p class="text-uppercase letter-space-1">Join our Training Club and Rise to a New Challenge</p>
                    </div>
                </div>
            </div>
            <div class="service-box owl-carousel owl-theme">
                <?php if(!empty($services)){ $i=1; $delay=0.2; foreach($services as $service){ 
                    if($i == 1) { $pos = 'slideInLeft'; }
                    if($i == 2) { $pos = 'bounceInUp'; }
                    if($i == 3) { $pos = 'slideInRight'; }
                ?>
                <div class="item wow <?php echo $pos; ?>" data-wow-duration="1s" data-wow-delay="<?php echo $delay.'s'; if($i==3) {$i=1;} else {$i++;} $delay+=0.2 ?>">
                    <div class="class-item box-hover-effect effect1 mb-sm-30">
                        <div class="thumb">
                            <a href="#"><img class="img-fullwidth mb-20" src="<?php echo base_url().'uploads/'.$service->image; ?>" alt="..."></a>
                        </div>
                        <div class="caption"> <span class="text-uppercase letter-space-1 mb-10 font-12 text-gray-silver"></span>
                            <h3 class="text-uppercase letter-space-1 mt-0"><span class="text-theme-colored"><?=$service->title?></span></h3>
                            <?php echo limit_text($service->description, 40); ?>
                        </div>
                    </div>
                </div>
                <?php } } ?>
            </div>
        </div>
    </section> -->

    <!-- <div class="tm-top-c-box tm-full-width  home-about" id="team">
        <div class="uk-container uk-container-center">
            <section id="tm-top-c" class="tm-top-c uk-grid uk-grid-collapse"
                data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin="">
                <div class="product-owl-img fadeOut owl-carousel owl-theme">
                    <?php if(!empty($teams)){ foreach($teams as $team){ ?>
                    <div class="item">
                        <div class="team-sec row">
                            <div class="uk-width-1-1 uk-width-large-1-2 uk-row-first col-md-6">
                                <div class="uk-panel">
                                    <div class="va-about-wrap clearfix uk-cover-background uk-position-relative">
                                        <div class="container">
                                        <div class="va-about-text wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.2s">
                
                                            <h2 class="title text-uppercase">Our <span
                                                    class="text-black font-weight-300">Team</span>
                                            </h2>
                                            <p><?php echo limit_text_team($team->description, 60); ?></p>
                                            <a data-bs-toggle="modal" data-bs-target="#teamModal" onclick="read_more_team(<?php echo $team->team_id; ?>)" class="read-more" href="#">read more</a>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-width-1-1 uk-width-large-1-2 col-md-6">
                                <div style="" class="uk-panel">
                                    <div class="trainers-module tm-trainers-slider ">
                                        <div class="trainer-wrapper">
                                            <div data-uk-slideset="{default: 1, animation: 'fade', duration: 400}" dir="ltr"
                                                 class="wow bounceInDown" data-wow-duration="1s" data-wow-delay="0.4s">
                                                <div class="trainer-top">
                                                    <h3><?=$team->designation?></h3>
                                                </div>
                                                <ul class="uk-grid uk-slideset uk-grid-width-1-1">
                                                    <li class="uk-active">
                                                        <div class="img-wrap"><img height="250" width="250" src="<?php echo base_url().'uploads/'.$team->image; ?>" alt="">
                                                        </div>
                                                        <div class="name"><span><?=$team->title?></span>
                                                        </div>
                                                    </li>
                                                    <li style="display: none;" class="">
                                                        <div class="img-wrap"><img src="<?php echo assets_url();?>fassets/images/home-about-bg.jpg"
                                                                alt="">
                                                        </div>
                                                        <div class="name">Fernand <br><span>Bernardez</span>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } } ?>
                </div>
            </section>
        </div>
    </div> -->

    <section class="team-sec" id="team">
        <div class="container">
            <h2 class="title text-uppercase">Our <span class="font-weight-300">Team</span></h2>
            <div class="team-owl-img fadeOut owl-carousel owl-theme">
                <?php if(!empty($teams)){ foreach($teams as $team){ ?>
                <div class="item">
                    <div class="team-text-ar">
                        <h2><?php echo $team->title; ?></h2>
                        <h4 class="text-white"><b><?php echo $team->designation; ?></b></h4>
                        <p><?php echo $team->description; ?></p>
                    </div>
                </div>
                <?php } } ?>
            </div>
        </div>
    </section>





















    <!-- <div class="modal fade" id="teamModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl contact-popup">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Get In Touch</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="team_detail_data">
                    <div class="col-md-6 col-xl-4  wow slideInLeft"  data-wow-duration="1s" data-wow-delay="0.2s">
                        <div class="card mb-20" id="team_detail_data">
                            <div class="card-body">
                                <img class="rounded-circle w-15 mb-4" src="<? //echo base_url(); ?>fassets/images/cc1.jpg" alt="">
                                <h4 class="mb-1">Coriss Ambady</h4>
                                <div class="meta mb-2">Financial Analyst</div>
                                <p class="mb-2">
                                  It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. 
                                  The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here,
                                   content here', making it look like readable English.</p>
                                <nav class="nav social mb-0">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <p>If you're reading this, we know you're in a high intensity, high contact world. You are expected to perform at almost unattainable levels of excellence at all times. Physical injuries, mental and emotional strain take a toll on success of the team at all levels.
                         What losses are your organization accustomed to facing? Imagine minimizing all of these factors using powerful and proven technologies.</p>
                </div>
            </div>
        </div>
    </div> -->

    <!-- <div class="tm-top-c-box tm-full-width  home-about">
        <div class="uk-container uk-container-center">
            <section id="tm-top-c" class="tm-top-c uk-grid uk-grid-collapse"
                data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin="">

                <div class="uk-width-1-1 uk-width-large-1-2 uk-row-first">
                    <div class="uk-panel" style="min-height: 497px;">
                        <div class="va-about-wrap clearfix uk-cover-background uk-position-relative">
                            <div class="va-about-text wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.2s">

                                <h2 class="title text-uppercase">Our <span
                                        class="text-black font-weight-300">Team</span>
                                </h2>
                                <p>Nam quis purus sed est interdum sagittis sed in leo. Nunc feugiat enim nunc, sit amet
                                    placerat erat consectetur in. Cras consequat enim nunc, sit amet venenatis massa
                                    volutpat ut. Cras vitae facilisis nulla. </p>
                                <p>Nulla pharetra lobortis nisl, vitae pretium nunc congue eget. Nunc imperdiet
                                    consequat nibh pharetra venenatis. Duis vitae lacinia nibh, et egestas leo. Proin
                                    sed mi sit amet dolor rhoncus tristique. Maecenas rhoncus felis vel congue commodo.
                                </p>
                                <a class="read-more" href="about.html">read more</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="uk-width-1-1 uk-width-large-1-2">
                    <div style="min-height: 497px;" class="uk-panel">
                        <div class="trainers-module tm-trainers-slider ">
                            <div class="trainer-wrapper">
                                <div data-uk-slideset="{default: 1, animation: 'fade', duration: 400}" dir="ltr"
                                    style="" class="wow bounceInDown" data-wow-duration="1s" data-wow-delay="0.4s">
                                    <div class="trainer-top">
                                        <div class="trainers-btn">
                                            <a href="/" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous"
                                                data-uk-slideset-item="previous"></a>
                                            <a href="/" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next"
                                                data-uk-slideset-item="next"></a>
                                        </div>
                                        <h3>Trainers</h3>
                                    </div>
                                    <ul class="uk-grid uk-slideset uk-grid-width-1-1">
                                        <li class="uk-active">
                                            <div class="img-wrap"><img src="<?php echo assets_url();?>fassets/images/cc1.jpg" alt="">
                                            </div>
                                            <div class="name">Bernard <br><span>Fernandez</span>
                                            </div>
                                        </li>
                                        <li style="display: none;" class="">
                                            <div class="img-wrap"><img src="<?php echo assets_url();?>fassets/images/trainer-slider/trainer-img1.jpg"
                                                    alt="">
                                            </div>
                                            <div class="name">Fernand <br><span>Bernardez</span>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div> -->

    <section class="divider bg-lighter booking-sec" id="book-consultation">
        <div class="container pb-50">
            <div class="section-title wow bounceInUp">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2 class="text-uppercase title">Book <span class="text-black font-weight-300"> Consultation</span>
                        </h2>
                        <p class="text-uppercase letter-space-1">JOIN OUR TRAINING CLUB AND RISE TO A NEW CHALLENGE</p>
                    </div>
                </div>
            </div>
            <center>
                <div class="col-md-6">
                    <?php
                        $this->load->helper('form');
                        $error = $this->session->flashdata('error');
                        if($error)
                        {
                    ?>
                    <div class="alert alert-danger alert-dismissable">
                        <!-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> -->
                        <?php echo $this->session->flashdata('error'); ?>                    
                    </div>
                    <?php } ?>
                    <?php  
                        $success = $this->session->flashdata('success');
                        if($success)
                        {
                    ?>
                    <div class="alert alert-success alert-dismissable">
                        <!-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> -->
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                    <?php } ?>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', '</div>'); ?>
                        </div>
                    </div>
                </div>
            </center>
            <div id="successmessage">
                <div class="alert alert-success col-md-6 text-center">Your booking request has been submitted successfully...</div>
            </div>
            <div id="errormessage">
                <div class="alert alert-danger col-md-6 text-center">Some problems occured, please try again...</div>
            </div>
            <div class="section-content" id="booking_section">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="contact-wrapper">

                            <!-- Contact Form -->
                            <form id="booking" name="contactForm" class="form-transparent" enctype="multipart/form-data" action="" method="post" novalidate="novalidate">
                                <div class="row">
                                    <center>
                                    <div class="col-sm-8 wow bounceInLeft mb-3">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input id="form_name" name="name" class="form-control required" type="text" placeholder="Enter Name" aria-required="true" value="<?php echo !empty($postData['name'])?$postData['name']:''; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <input id="form_email" name="email" class="form-control required email" type="email" placeholder="Enter Email" aria-required="true" value="<?php echo !empty($postData['email'])?$postData['email']:''; ?>">
                                                </div>
                                                <div class="form-group" style="display: none;">
                                                    <input type="text" id="form_date" name="date" placeholder="Select Date"  class="datepicker" value="<?php echo !empty($postData['date'])?$postData['date']:''; ?>" readonly><span class="archive__separator"></span>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input id="form_subject" name="subject" class="form-control required" type="text" placeholder="Enter Subject" aria-required="true" value="Intro Consultation" >
                                                    <?php //echo !empty($postData['subject'])?$postData['subject']:''; ?>
                                                </div>
                                                <div class="form-group">
                                                    <input id="form_phone" name="phone" class="form-control number digits required" type="text" placeholder="Enter Phone" aria-required="true" value="<?php echo !empty($postData['phone'])?$postData['phone']:''; ?>" maxlength="15">
                                                </div>
                                                <div class="form-group" style="display: none;">
                                                    <input type="text" id="form_time" class="timepicker" name="time" placeholder="Select Time" value="<?php echo !empty($postData['time'])?$postData['time']:''; ?>" readonly><span class="archive__separator"></span>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <textarea id="form_message" name="message" class="form-control required" rows="5" placeholder="Enter Message" style="height: 165px;" aria-required="true">I would like to book an intro consultation. Please have a the team PPG concierge reach out to me.</textarea>
                                                </div>
                                                <div class="form-group mt-20">
                                                    <!-- <input type="submit" id="form_botcheck" name="contactSubmit" class="btn btn-theme-colored mr-5" value="Book your slot"> -->
                                                    <button type="submit" id="form_botcheck" class="btn btn-theme-colored mr-5" data-loading-text="Please wait...">Book your slot</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </center>
                                    <!-- <div class="col-sm-4 wow bounceInRight">
                                        <h3 class="mt-0 text-theme-colored font-weight-300">Booking info</h3>
                                        <p>Integer tincidunt Cras dapibus Vivamus elementum semper nisi Aenean vulputate
                                            eleifend tellus.</p>
                                    </div> -->
                                </div>
                            </form>
                            <!-- Contact Form Validation-->
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- <script src="<?php echo base_url(); ?>assets/js/booking.js" type="text/javascript"></script> -->
    <!-- <script type="text/javascript">
        function myFunction() {
          let x = document.getElementById("form_name").value;
          let text;
          if (x===null) {
            text = "Required";
          } 
          // else {
          //   text = "Input OK";
          // }
          document.getElementById("demo").innerHTML = text;
        }
    </script> -->


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-xl contact-popup">
		  <div class="modal-content">
			<div class="modal-header">
			  <h5 class="modal-title" id="exampleModalLabel">Contact Us</h5>
			  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<section id="contact" class="">
					<div class="pt-5 pb-50">
						<div class="wow bounceInUp">
							<div class="row">
								<div class="col-md-12 text-center">
									<!-- <h2 class="text-uppercase title">Get In  <span class="text-black font-weight-300">Touch</span>
									</h2> -->
									<!-- <p class="text-uppercase letter-space-1">JOIN OUR TRAINING CLUB AND RISE TO A NEW CHALLENGE</p> -->
								</div>
							</div>
						</div>
                        <div id="contact_us_successmessage">
                            <div class="alert alert-success col-md-6 text-center">Your request has been submitted successfully...</div>
                        </div>
                        <div id="contact_us_errormessage">
                            <div class="alert alert-danger col-md-6 text-center">Some problems occured, please try again...</div>
                        </div>
						<div class="section-content" id="contact_us_section">
							<div class="row">
								<div class="col-sm-12 col-md-12">
									<div class="contact-wrapper">
			
										<!-- Contact Form -->
										<form id="contact_form" name="contact_form" class="form-transparent" action="" enctype="multipart/form-data" method="post" novalidate="novalidate">
											<div class="row">
												<div class="col-sm-8 wow bounceInLeft">
													<div class="row">
														<div class="col-sm-6">
															<div class="form-group">
																<input id="contact_us_name" name="name" class="form-control required" type="text" placeholder="Enter Name" required="" aria-required="true" value="<?php echo !empty($postData['name'])?$postData['name']:''; ?>">
															</div>
															<div class="form-group">
																<input id="contact_us_email" name="email" class="form-control required email" type="email" placeholder="Enter a Email" aria-required="true" value="<?php echo !empty($postData['email'])?$postData['email']:''; ?>">
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<input id="contact_us_subject" name="subject" class="form-control required" type="text" placeholder="Enter Subject" aria-required="true" value="<?php echo !empty($postData['subject'])?$postData['subject']:''; ?>">
															</div>
															<div class="form-group">
																<input id="contact_us_phone" name="phone" class="form-control required digits" type="text" placeholder="Enter Phone" aria-required="true" value="<?php echo !empty($postData['phone'])?$postData['phone']:''; ?>">
															</div>
														</div>
														<div class="col-sm-12">
															<div class="form-group">
																<textarea id="contact_us_message" name="message" class="form-control required" rows="5" placeholder="Enter Message" style="height: 165px;" aria-required="true"><?php echo !empty($postData['message'])?$postData['message']:''; ?></textarea>
															</div>
															<div class="form-group mt-20">
																<!-- <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value=""> -->
																<!-- <button type="submit" class="btn btn-theme-colored mr-5" data-loading-text="Please wait...">Send</button> -->
                                                                <button type="submit" id="form_contact_us_check" class="btn btn-theme-colored mr-5" data-loading-text="Please wait...">Send Query</button>
															</div>
														</div>
			
			
			<!-- 
														<div class="form-group col-md-6">
															<label>Date and time</label>
															<input type="text" class="form-control datetimepicker-input" id="datetimepicker1" data-toggle="datetimepicker" data-target="#datetimepicker1" />
														  </div> -->
			
			
			
													</div>
												</div>
												<div class="col-sm-4 wow bounceInRight">
													<div class="cinkes_contact_info mb-40">
														<div class="cinkes_contact-single_info mb-40">
															<span class="cinkes_contact_single_icon"><i class="fas fa-map-marker-alt"></i></span>
															<div class="cinkes_contact_single_text cinkes_contact_single_address_text">
																<h4 class="cinkes_contact_single_title">Address</h4>
																<p class="mb-0"><?=$contact->address?></p>
															</div>
														</div>
														<div class="cinkes_contact-single_info mb-40">
															<span class="cinkes_contact_single_icon"><i class="fas fa-phone-alt"></i></span>
															<div class="cinkes_contact_single_text cinkes_contact_single_phone_text">
																<h4 class="cinkes_contact_single_title">Phone</h4>
																<a href="tel:<?=$contact->phone?>"><?=$contact->phone?></a>
															</div>
														</div>
														<div class="cinkes_contact-single_info mb-40">
															<span class="cinkes_contact_single_icon"><i class="fas fa-envelope"></i></span>
															<div class="cinkes_contact_single_text cinkes_contact_single_email_text" >
																<h4 class="cinkes_contact_single_title">Email</h4>
																<a href="mailto:<?=$contact->email?>" style="font-size: 14px;"><?=$contact->email?></a>
															</div>
														</div>
							
							
													</div>
			
						
												</div>
											</div>
										</form>
										<!-- Contact Form Validation-->
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
			
		  </div>
		</div>
	  </div>

    
<?php $this->load->view('fincludes/footer'); ?>
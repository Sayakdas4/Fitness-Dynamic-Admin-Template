<?php $this->load->view('fincludes/header'); ?>
<section class="banner-video-section">
    <?php if(!empty($banners)){ foreach($banners as $banner){ ?>
        <div class="va-promo-text wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.5s">
            <?=$banner->description?>
            <a href="#" class="read-more">Read More<i class="fa fa-chevron-right" aria-hidden="true"></i></a>
        </div>
        <img src="<?php echo base_url().'uploads/'.$banner->image; ?>">
        <!-- <video autoplay="autoplay" loop="loop" muted defaultMuted playsinline oncontextmenu="return false;"
            preload="auto" id="myVideo">
            <source src="<?php echo assets_url();?>fassets/video/file.mp4" type="video/mp4">
        </video> -->
    <?php } } ?>
    </section>

    <section id="about" class="bg-lighter">
        <div class="container pb-70">
            <div class="section-title text-center wow bounceInUp">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2 class="title text-uppercase">Welcome to <span class="text-black font-weight-300">PPG Sports
                            </span></h2>
                        <p class="text-uppercase letter-space-1">Join our Training Club and Rise to a New Challenge</p>
                    </div>
                </div>
            </div>
            <div class="section-content">
                <div class="row">
                    <div class="col-md-6 wow slideInLeft" data-wow-duration="1s" data-wow-delay="0.2s"> 
                        <img class="img-fullwidth" src="<?php echo base_url().'uploads/'.$cms1->image; ?>" alt=""> 
                    </div>
                    <div class="col-md-6 wow slideInRight" data-wow-duration="1s" data-wow-delay="0.4s">
                        <div class="events-venue border-theme-colored border-5px p-40 pt-0 mt-50 ml-sm-0 mt-sm-20 mt-xs-0 pt-sm-20" data-margin-left="-60px" style="margin-left: -60px;">
                            <?=$cms1->description?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- <section id="courses">
        <div class="container pb-40">
            <div class="section-title text-center">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2 class="text-uppercase title">Our <span class="text-black font-weight-300">Services</span>
                        </h2>
                        <p class="text-uppercase letter-space-1">Join our Training Club and Rise to a New Challenge</p>
                    </div>
                </div>
            </div>
            <div class="section-content">
                <div class="row">
                    <div class="col-sm-6 col-md-4 mb-30">
                        <div class="card effect__hover">
                            <div class="card__front bg-theme-colored">
                                <div class="card__text">
                                    <div class="icon-box mb-0 mt-0 p-0">
                                        <img class="img-responsive img-fullwidth" src="<?php echo assets_url();?>fassets/images/1.jpg" alt="">
                                        <h3 class="icon-box-title text-uppercase text-white letter-space-2">Therapists</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card__back bg-black">
                                <div class="card__text">
                                    <div class="display-table-parent p-30">
                                        <div class="display-table">
                                            <div class="display-table-cell">
                                                <h4 class="text-uppercase text-white">Therapists</h4>
                                                <div class="text-gray-lightgray">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam
                                                        laborum deserunt debitis fuga aliquid dolor ullam sed.</p>
                                                </div>
                                                <a href="#" class="btn btn-sm btn-flat btn-theme-colored mt-10"> Read
                                                    More </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 mb-30">
                        <div class="card effect__hover">
                            <div class="card__front bg-theme-colored">
                                <div class="card__text">
                                    <div class="icon-box mb-0 mt-0 p-0"> 
                                        <img class="img-responsive img-fullwidth" src="<?php echo assets_url();?>fassets/images/2.jpg" alt="">
                                        <h3 class="icon-box-title text-uppercase text-white letter-space-2">
                                            Holistic Doctors
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card__back bg-black">
                                <div class="card__text">
                                    <div class="display-table-parent p-30">
                                        <div class="display-table">
                                            <div class="display-table-cell">
                                                <h4 class="text-uppercase text-white">Holistic Doctors</h4>
                                                <div class="text-gray-lightgray">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam
                                                        laborum deserunt debitis fuga aliquid dolor ullam sed.</p>
                                                </div>
                                                <a href="#" class="btn btn-sm btn-flat btn-theme-colored"> Read More
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 mb-30">
                        <div class="card effect__hover">
                            <div class="card__front bg-theme-colored">
                                <div class="card__text">
                                    <div class="icon-box mb-0 mt-0 p-0"> 
                                        <img class="img-responsive img-fullwidth" src="<?php echo assets_url();?>fassets/images/3.jpg" alt="">
                                        <h3 class="icon-box-title text-uppercase text-white letter-space-2">
                                            Performance Coaches
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card__back bg-black">
                                <div class="card__text">
                                    <div class="display-table-parent p-30">
                                        <div class="display-table">
                                            <div class="display-table-cell">
                                                <h4 class="text-uppercase text-white">Performance Coaches</h4>
                                                <div class="text-gray-lightgray">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam
                                                        laborum deserunt debitis fuga aliquid dolor ullam sed.</p>
                                                </div>
                                                <a href="#" class="btn btn-sm btn-flat btn-theme-colored mt-10"> Read
                                                    More </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section> -->

    <section id="services">
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
            <div class="section-content">
                <div class="row">
                    <?php if(!empty($services)){ $i=1; foreach($services as $service){ 
                        if($i == 1) { $delay = '0.2s'; $pos = 'slideInLeft'; }
                        if($i == 2) { $delay = '0.4s'; $pos = 'bounceInUp'; }
                        if($i == 3) { $delay = '0.6s'; $pos = 'slideInRight'; $i==1; }
                    ?>
                    <div class="col-sm-6 col-md-4 wow <?php echo $pos; ?>" data-wow-duration="1s" data-wow-delay="<?php echo $delay; $i++; ?>">
                        <div class="class-item box-hover-effect effect1 mb-sm-30">
                            <div class="thumb">
                                <a href="#"><img class="img-fullwidth mb-20" src="<?php echo base_url().'uploads/'.$service->image; ?>" alt="..."></a>
                            </div>
                            <div class="caption"> <span class="text-uppercase letter-space-1 mb-10 font-12 text-gray-silver">ipsum fugit</span>
                                <h3 class="text-uppercase letter-space-1 mt-0"><span class="text-theme-colored"><?=$service->title?></span></h3>
                                <?=$service->short_description?>

                                <p><a href="#" class="btn btn-theme-colored btn-flat mt-10 btn-sm" role="button">Read More</a></p>
                            </div>
                        </div>
                    </div>
                    <?php } } ?>
                </div>
            </div>
        </div>
    </section>

    <div class="tm-top-c-box tm-full-width  home-about">
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
    </div>

    <section id="contact" class="divider bg-lighter">
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
            <div class="section-content">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="contact-wrapper">

                            <!-- Contact Form -->
                            <form id="contact_form" name="contactForm" class="form-transparent" enctype="multipart/form-data" action="" method="post" novalidate="novalidate">
                                <div class="row">
                                    <div class="col-sm-8 wow bounceInLeft">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input id="form_name" name="name" class="form-control required" type="text" placeholder="Enter Name" aria-required="true" value="<?php echo !empty($postData['name'])?$postData['name']:''; ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <input id="form_email" name="email" class="form-control required email" type="email" placeholder="Enter Email" aria-required="true" value="<?php echo !empty($postData['email'])?$postData['email']:''; ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input id="form_subject" name="subject" class="form-control required" type="text" placeholder="Enter Subject" aria-required="true" value="<?php echo !empty($postData['subject'])?$postData['subject']:''; ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <input id="form_phone" name="phone" class="form-control digits required" type="text" placeholder="Enter Phone" aria-required="true" value="<?php echo !empty($postData['phone'])?$postData['phone']:''; ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <textarea id="form_message" name="message" class="form-control required" rows="5" placeholder="Enter Message" style="height: 165px;" aria-required="true" required><?php echo !empty($postData['message'])?$postData['message']:''; ?></textarea>
                                                </div>
                                                <div class="form-group mt-20">
                                                    <input type="submit" id="form_botcheck" name="contactSubmit" class="btn btn-theme-colored mr-5" type="hidden" value="Book your slot">
                                                    <!-- <button type="submit" class="btn btn-theme-colored mr-5" data-loading-text="Please wait...">Book your slot</button> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 wow bounceInRight">
                                        <h3 class="mt-0 text-theme-colored font-weight-300">Booking info</h3>
                                        <p>Integer tincidunt Cras dapibus Vivamus elementum semper nisi Aenean vulputate
                                            eleifend tellus.</p>
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
    <script src="<?php echo base_url(); ?>assets/js/query.js" type="text/javascript"></script>
<?php $this->load->view('fincludes/footer'); ?>
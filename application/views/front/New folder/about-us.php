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

    <section id="about" class="bg-lighter">
        <div class="container pb-70">
            <div class="section-title text-center wow bounceInUp">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2 class="title text-uppercase"><?=$about_us_data->title?></h2>
                        <p class="text-uppercase letter-space-1">Join our Training Club and Rise to a New Challenge</p>
                    </div>
                </div>
            </div>
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12 wow bounceInDown" data-wow-duration="1s" data-wow-delay="0.4s">
                        <div class="events-venue border-theme-colored pt-0 ml-sm-0 mt-sm-20 mt-xs-0 pt-sm-20">
                            <?=$about_us_data->description?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- <section id="about" class="bg-lighter">
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
                        <img class="img-fullwidth" src="<?php echo base_url().'uploads/'.$about_us_data->image; ?>" alt=""> 
                    </div>
                    <div class="col-md-6 wow slideInRight" data-wow-duration="1s" data-wow-delay="0.4s">
                        <div class="events-venue border-theme-colored border-5px p-40 pt-0 mt-50 ml-sm-0 mt-sm-20 mt-xs-0 pt-sm-20" data-margin-left="-60px" style="margin-left: -60px;">
                            <h2 class="events-trainer-title text-uppercase letter-space-1 text-theme-colored bg-lighter mb-20 mb-sm-0"><?=$about_us_data->title?></h2>
                            <?=$about_us_data->description?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->


    <section class="who-we-are">
        <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-md-6">
                        <div class="section-content">
                            <div class="content-text">
                                <div class="section-title wow bounceInUp">
                                    <h2 class="title text-uppercase"><?=$about_us_data_2->title?></h2>
                                    <p class="text-uppercase letter-space-1">Join our Training Club and Rise to a New Challenge</p>
                                </div>
                                <div class="wow bounceInUp">
                                    <?=$about_us_data_2->description?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 position-relative order-lg-2 p-0">
                        <div class="overlap-grid">
                            <div class="item">
                            <img src="<?php echo base_url().'uploads/'.$about_us_data_2->image; ?>" alt="">
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
                                        <img class="img-responsive img-fullwidth" src="images/1.jpg" alt="">
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
                                        <img class="img-responsive img-fullwidth" src="images/2.jpg" alt="">
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
                                        <img class="img-responsive img-fullwidth" src="images/3.jpg" alt="">
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
                            <form id="contact_query" name="contactForm" class="form-transparent" enctype="multipart/form-data" action="" method="post" novalidate="novalidate">
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
                                                <div class="form-group">
                                                    <input type="text" id="form_date" name="date" placeholder="Select Date"  class="datepicker required" value="<?php echo !empty($postData['date'])?$postData['date']:''; ?>" required><span class="archive__separator"></span>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input id="form_subject" name="subject" class="form-control required" type="text" placeholder="Enter Subject" aria-required="true" value="<?php echo !empty($postData['subject'])?$postData['subject']:''; ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <input id="form_phone" name="phone" class="form-control digits required" type="text" placeholder="Enter Phone" aria-required="true" value="<?php echo !empty($postData['phone'])?$postData['phone']:''; ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" id="form_time" class="timepicker required" name="time" placeholder="Select Time" value="<?php echo !empty($postData['time'])?$postData['time']:''; ?>" required><span class="archive__separator"></span>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <textarea id="form_message" name="message" class="form-control required" rows="5" placeholder="Enter Message" style="height: 165px;" aria-required="true" required><?php echo !empty($postData['message'])?$postData['message']:''; ?></textarea>
                                                </div>
                                                <div class="form-group mt-20">
                                                    <input type="submit" id="form_botcheck" name="contactSubmit" class="btn btn-theme-colored mr-5" value="Book your slot">
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
<?php $this->load->view('fincludes/footer'); ?>
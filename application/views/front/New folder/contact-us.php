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

        <section id="contact" class="divider bg-lighter">
        <div class="container pb-50">
            <div class="section-title wow bounceInUp">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2 class="text-uppercase title">Get In  <span class="text-black font-weight-300">Touch</span>
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
                                                    <input type="submit" id="form_botcheck" name="contactSubmit" class="btn btn-theme-colored mr-5" value="Book your slot">
                                                    <!-- <button type="submit" class="btn btn-theme-colored mr-5" data-loading-text="Please wait...">Book your slot</button> -->
                                                </div>
                                            </div>
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
                                                <div class="cinkes_contact_single_text cinkes_contact_single_email_text">
                                                    <h4 class="cinkes_contact_single_title">Email</h4>
                                                    <a href="mailto:<?=$contact->email?>"><?=$contact->email?></a>
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
    <!-- <script src="<?php echo base_url(); ?>assets/js/query.js" type="text/javascript"></script> -->
<?php $this->load->view('fincludes/footer'); ?>

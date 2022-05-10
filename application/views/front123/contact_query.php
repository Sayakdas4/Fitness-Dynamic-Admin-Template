<?php $this->load->view('fincludes/header'); ?>
        <!-- <section class="carousel slide" id="banner">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <?php if(!empty($banners)) { foreach($banners as $banner){ ?>
                    <div class="carousel-item active" style="background: url(<?php echo base_url().'uploads/'.$banner->image ?>);">
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
                    <?php } } ?>
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
        </section> -->

        <section class="carousel slide" id="banner">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active" style="background: url(<?php echo base_url().'uploads/'.$contact_banner->image; ?>);" style="display: none;">
                    </div>
                    <?php if(!empty($banners)) { foreach($banners as $banner){ if($banner->banner_id == 6){} else { ?>
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

        <section class="info-sec ptb-100">
            <div class="section-heading text-center pb-30">
                <h1>GET IN TOUCH</h1>
                <p class="text-center">SEND US A MESSAGE</p>
            </div>
            <center>
			<div class="col-md-4">
                <?php
                    $this->load->helper('form');
                    $error = $this->session->flashdata('error');
                    if($error)
                    {
                ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('error'); ?>                    
                </div>
                <?php } ?>
                <?php  
                    $success = $this->session->flashdata('success');
                    if($success)
                    {
                ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php } ?>
                
                <div class="row">
                    <div class="col-md-12">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                    </div>
                </div>
            </div>
            </center>
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-10 ">
                        <form role="form" name="contactForm" id="contact_form" enctype='multipart/form-data' action="" method="post">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" placeholder="Your Name *" value="<?php echo !empty($postData['name'])?$postData['name']:''; ?>" required />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="email" class="form-control" placeholder="Your Email *" value="<?php echo !empty($postData['email'])?$postData['email']:''; ?>" required />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="phone" class="form-control" placeholder="Your Phone Number *" value="<?php echo !empty($postData['phone'])?$postData['phone']:''; ?>" required />
                                    </div>
                                    <div class="form-group">
                                        <textarea name="message" class="form-control" placeholder="Your Message *" style="width: 100%; height: 150px;"><?php echo !empty($postData['message'])?$postData['message']:''; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
            						<div class="form-group">
                                        <input type="submit" name="contactSubmit" class="btnContact" value="Send Message" />
                                    </div>
                                </div>
                            </div>
                        </form>
					</div>
				</div>
			</div>
            
        </section>
<?php $this->load->view('fincludes/footer'); ?>

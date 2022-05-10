<?php $this->load->view('fincludes/header'); ?>
    <!-- ======= Banner Start ======= -->
    <section class="inner-banner dark-grey-bg ">
        <div class="container">
            <div class="row align-items-center mh-100">
                <div class="col-12">
                    <div class="text-center top-banner-text">
                        <h4 class="text-uppercase text-secondary font-weight-300 mb-0 font-22">Plans &amp; Pricing</h4>
                        <h1 class="hero-txt"><?php echo $coaching_banner->description_one ?></h1>
                        <h5 class="hero-subtext maxw-565"><?php echo $coaching_banner->description_two ?></h5>
                    </div>
                    <div class="light-grey-bg border-rounded-2 dark-grey-text payment-box">
                        <?php $this->load->helper("form"); ?>
                        <div class="row">
                            <?php 
                              $this->load->helper('form');
                              $error = $this->session->flashdata('error');
                              if($error) {
                            ?>
                            <div class="alert alert-danger alert-dismissable text-center"> <?php echo $this->session->flashdata('error'); ?> </div>
                            <?php } ?>
                            <?php 
                              $success = $this->session->flashdata('success');
                              if($success) { 
                            ?>  
                            <div class="alert alert-success alert-dismissable text-center"> <?php echo $this->session->flashdata('success'); ?> </div>
                            <?php } ?>

                            <div class="row">
                              <div class="col-md-12">
                                  <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                              </div>
                            </div>
                        </div>
                        <!-- <form role="form" class="validate-form" id="kick_starter_pricing" enctype='multipart/form-data' action="<?php echo base_url() ?>addkick_starter_pricingConfig" method="post"> -->
                        <div class="d-flex justify-content-between mx-auto">
                            <div class="text-center">
                                <h6 class="font-semibold">Duration</h6>
                                <select name="duration" class="border-rounded-5" class="form-control" id="duration" value = "<?php echo set_value('duration') ?>" required>
                                    <?php if(!empty($coaching_pricings)) { foreach($coaching_pricings as $coaching_pricing) { ?>
                                        <option value="<?php echo $coaching_pricing->coaching_pricing_id; ?>">
                                        <?php echo $coaching_pricing->duration; echo " "; echo $coaching_pricing->duration_format ?>  
                                        </option>
                                    <?php } } ?>
                                </select>
                            </div>
                            <div class="text-center ms-2">
                                <h6 class="font-semibold">Price (&#8377;)</h6>
                                <input type="text" class="form-control border-rounded-5 text-center" id="price" placeholder="₹ 3,500" name="price" value="<?php echo set_value('price') ?>" readonly required>
                            </div>
                        </div>
                        <form role="form" class="validate-form" id="coaching_pricing" enctype='multipart/form-data' action="<?php echo base_url() ?>razorpay/payment_coaching" method="post">
                            <div class="mt-20 mb-10 pricing-button-green">
                                <input type="hidden" id="pricingID" name="pricingID" value="">
                                <input type="submit" value="Proceed To Payment" class="btn btn-success text-uppercase border-rounded-5 w-100">
                            </div>
                        </form>
                        <p class="btn-up-text xx-small text-center mb-0">* Your coach will be assigned after payment</p>
                    </div>

                    <div class="anchor-text green-anchor text-center">
                        <ul class="d-inline-flex p-0 m-0">
                            <li class="mr-40"><a href="#how_it_works" class="active howitworks">How it works 
                            <svg width="9" height="15" viewBox="0 0 9 15" fill="none" xmlns="http://www.w3.org/2000/svg" class="arrow-position">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.845496 1.19493C1.26319 0.782679 1.9404 0.782679 2.35809 1.19493L8.06246 6.82499C8.48016 7.23725 8.48016 7.90564 8.06246 8.31789L2.35809 13.948C1.9404 14.3602 1.26319 14.3602 0.845496 13.948C0.427803 13.5357 0.427803 12.8673 0.845496 12.4551L5.79356 7.57144L0.845496 2.68783C0.427803 2.27557 0.427803 1.60718 0.845496 1.19493Z" fill="#24BA78"/>
                            </svg>


                            </a> 
                        </li>
                            <li>
                            <a href="#req_callback" class="request-callback" data-bs-toggle="modal" data-bs-target="#req_callback">Request a callback <span>
                                <svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg" class="arrow-position">
                                    <path d="M1.13664 12.3486C0.746119 12.7391 0.746119 13.3722 1.13664 13.7628C1.52717 14.1533 2.16033 14.1533 2.55086 13.7628L1.13664 12.3486ZM13.9352 1.9642C13.9352 1.41191 13.4875 0.964195 12.9352 0.964195L3.93522 0.964195C3.38293 0.964195 2.93522 1.41191 2.93522 1.9642C2.93522 2.51648 3.38293 2.96419 3.93522 2.9642L11.9352 2.96419L11.9352 10.9642C11.9352 11.5165 12.3829 11.9642 12.9352 11.9642C13.4875 11.9642 13.9352 11.5165 13.9352 10.9642L13.9352 1.9642ZM2.55086 13.7628L13.6423 2.6713L12.2281 1.25709L1.13664 12.3486L2.55086 13.7628Z" fill="#A1A2A6"></path>
                                </svg>
                            </span>
                            </a></li>
                            <!-- <div class="modal" id="req_callback" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="calendly-inline-widget" data-url="https://calendly.com/thefitchase-callback/call?month=2022-03" style="min-width:640px;height:600px;"></div>
                                            <script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js" async></script>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </ul>
                    </div>
            
                </div>
            </div>
        </div>
    </section>
    <!-- ======= Banner end ======= -->
    <!-- ======= Body Conter Start ======= -->
    <section class="bg-white how-to-work" id="how_it_works">
        <div class="container">
            <!-- ======= Timeline Start ======= -->
        <div class="row" >
            <div class="col-lg-12">
                <ul class="custom-timeline-green">
                    <li>
                        <div class="timeline-desc">
                            <h4 class="timeline-title font-25 dark-bold-text"><?php echo $coaching_work->title_one ?></h4>
                            <p class="timeline-info"><?php echo $coaching_work->section_one ?></p>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-desc">
                            <h4 class="timeline-title font-25 dark-bold-text"><?php echo $coaching_work->title_three ?></h4>
                            <p class="timeline-info"><?php echo $coaching_work->section_three ?></p>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-desc">
                            <h4 class="timeline-title font-25 dark-bold-text"><?php echo $coaching_work->title_two ?></h4>
                            <p class="timeline-info"><?php echo $coaching_work->section_two ?></p>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-desc">
                            <h4 class="timeline-title font-25 dark-bold-text"><?php echo $coaching_work->title_four ?></h4>
                            <p class="timeline-info"><?php echo $coaching_work->section_four ?></p>
                        </div>
                    </li>
                </ul>
                <!-- end card -->
            </div>
        </div>   
        </div>
    </section>
    <section class="light-grey-bg what-included">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 mx-auto plan-inner">
                        <h2 class="hero-txt text-dark font-weight-bold text-center">What’s Included</h2>
                        
                        <ul class="nav nav-tabs three-nav-sec justify-content-center border-0">
                            <li class="nav-item ">
                              <a class="nav-link active border-0" data-bs-toggle="tab" href="#nutrition">Nutrition</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link border-0" data-bs-toggle="tab" href="#workout">Workout</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link border-0" data-bs-toggle="tab" href="#mentorship">Mentorship</a>
                            </li>
                          </ul>
                          <!-- Tab panes -->
                          <div class="tab-content text-center dark-bold-text">
                            <div class="tab-pane container active" id="nutrition">
                                <div class="phone-outer">
                                    <div class="phone-img">
                                        <div class="all-info">
                                            <div class="phone-info text-right info-one">
                                                Cooked & uncooked<br>
                                                food measuring options,<br>
                                                including bowls, pieces,<br>
                                                katories, spoons, grams
                                            </div>
                                            <div class="phone-info text-left info-two">
                                                Change in diet based on<br> metabolism to keep seeing<br> results
                                            </div>
                                            <div class="phone-info text-left info-three">
                                                Quantified nutrition plan<br> based on scientific &<br> research-backed methods,<br> no FAD diet
                                            </div>
                                            <div class="phone-info text-right info-four">
                                                Multiple alternatives & food<br> replacement options with<br> realistic-yet-tasty recipe<br> ideas & suggestions
                                            </div>
                                        </div>
                                        <div class="img-full"><img src="<?php echo base_url(); ?>fassets/images/phone-image.png" class="img-fluid" alt=""></div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane container fade" id="workout">
                                <div class="phone-outer">
                                    <div class="phone-img">
                                        <div class="all-info">
                                            <div class="phone-info text-right info-one">
                                                Workout plan either at<br> 
                                                home/gym based on<br>  preference, with demo<br>
                                                exercise links attached
                                            </div>
                                            <div class="phone-info text-left info-two">
                                                Technique & form correction<br> over WhatsApp, no separate<br> personal trainer needed
                                            </div>
                                            <div class="phone-info text-left info-three">
                                                Exercises customised to your<br> starting level, taking into<br> consideration your<br> pre-existing injuries
                                            </div>
                                        
                                            <div class="phone-info text-right info-four">
                                                Change in intensity & weekly<br> targets based on progress  
                                            </div>
                                        </div>
                                        <div class="img-full"><img src="<?php echo base_url(); ?>fassets/images/phone-image1.png" class="img-fluid" alt=""></div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane container fade" id="mentorship">
                                <div class="phone-outer">
                                    <div class="phone-img">
                                        <div class="all-info">
                                            <div class="phone-info text-right info-one">
                                                Habit tools, trackers &<br> journals to ensure<br> constant motivation &<br> sustainable results
                                            </div>
                                            <div class="phone-info text-left info-two">
                                                Progress tracker that<br> helps capture data such as<br> change in weight, body<br> measurements & pictures
                                            </div>
                                            <div class="phone-info text-left info-three">
                                                 In-depth discussions on<br> qualitative parameters such<br> as hunger & cravings, sleep<br> quality, adherence levels
                                            </div>

                                            <div class="phone-info text-right info-four">
                                                Weekly video check-ins<br> with the coach for long term<br> strategy building
                                            </div>
                                        </div>
                                        <div class="img-full"><img src="<?php echo base_url(); ?>fassets/images/phone-image2.png" class="img-fluid" alt=""></div>
                                    </div>
                                </div>
                            </div>
                            </div>
                          </div>
                          
                    </div>
                </div>
            </div>
        </section>
    <!-- ======= Body Conter End ======= -->
<?php $this->load->view('fincludes/footer'); ?>
<script src="<?php echo assets_url(); ?>assets/js/jQuery-2.1.4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        coaching_duration_pricing();
        $('select[name="duration"]').on('change', function() {
            coaching_duration_pricing();
        });

        function coaching_duration_pricing(coaching_pricing_id){
            var coaching_pricing_id = $("#duration").val();
            if(coaching_pricing_id) {
                $.ajax({
                    url: '<?php echo base_url() ?>home/coaching_pricing_details',
                    data: {'coaching_pricing_id': coaching_pricing_id},
                    type: "POST",
                    dataType: "json",
                    success:function(data) {
                        var price = parseFloat(data.price).toFixed(2);
                        var pricingID = data.coaching_pricing_id;
                        $('#price').val(price);
                        $('#pricingID').val(pricingID);
                    }
                });
            }
        }
    });
</script>
<?php $this->load->view('fincludes/header'); ?>
    <!-- ======= Banner Start ======= -->
    <section class="inner-banner dark-grey-bg">
        <div class="container">
          <div class="inner-banner-text">
            <div class="w-100">
            <div class="text-center w-75 mx-auto plans-detail">
                <h4 class="text-uppercase text-secondary font-weight-300">Plans &amp; Pricing</h4>
                <h1 class="hero-txt"><?php echo $coaching_banner->description_one ?></h1>
                <h5 class="hero-subtext"><?php echo $coaching_banner->description_two ?></h5>
            </div>
            <div class="light-grey-bg border-rounded-2 dark-grey-text payment-box">
                <!-- <form role="form" class="validate-form" id="kick_starter_pricing" enctype='multipart/form-data' action="<?php echo base_url() ?>addkick_starter_pricingConfig" method="post"> -->
                <div class="d-flex justify-content-between mx-auto">
                    <div class="text-center">
                        <h6 class="font-semibold">Duration</h6>
                        <select name="duration" class="border-rounded-5 border-secondary" class="form-control" id="duration" required>
                            <!-- <option value="">Select</option> -->
                            <?php if(!empty($coaching_pricings)) { foreach($coaching_pricings as $coaching_pricing) { ?>
                                <option value="<?php echo $coaching_pricing->coaching_pricing_id; ?>">
                                <?php echo $coaching_pricing->duration; echo " "; echo $coaching_pricing->duration_format ?>  
                                </option>
                            <?php } } ?>
                        </select>
                    </div>
                    <div class="text-center ms-4">
                        <h6 class="font-semibold">Price</h6>
                        <input type="text" class="form-control border-rounded-5 text-center" id="price" placeholder="₹ 3,500" name="price" readonly required>
                    </div>
                </div>
                <div class="mt-20 mb-10">
                    <button type="submit" class="btn btn-success text-uppercase border-rounded-5 w-100">Proceed To Payment</button>
                </div>
                <p class="btn-up-text xx-small text-center mb-0">* Your coach will be assigned after payment</p>
            </div>
            
            <div class="anchor-text green-anchor text-center">
                    <ul class="d-inline-flex p-0 m-0">
                        <li class="mr-40"><a href="javascript:;" class="active">How it works <i class="fal fa-angle-right align-middle"></i></a> </li>
                        <li>
                        <a href="javascript:;">Request a callback <span><svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.13664 12.3486C0.746119 12.7391 0.746119 13.3722 1.13664 13.7628C1.52717 14.1533 2.16033 14.1533 2.55086 13.7628L1.13664 12.3486ZM13.9352 1.9642C13.9352 1.41191 13.4875 0.964195 12.9352 0.964195L3.93522 0.964195C3.38293 0.964195 2.93522 1.41191 2.93522 1.9642C2.93522 2.51648 3.38293 2.96419 3.93522 2.9642L11.9352 2.96419L11.9352 10.9642C11.9352 11.5165 12.3829 11.9642 12.9352 11.9642C13.4875 11.9642 13.9352 11.5165 13.9352 10.9642L13.9352 1.9642ZM2.55086 13.7628L13.6423 2.6713L12.2281 1.25709L1.13664 12.3486L2.55086 13.7628Z" fill="#A1A2A6"></path>
                            </svg>
                            </span>
                        </a></li>
                    </ul>
            </div>
            </div>
            </div>
        </div>
    </section>
    <!-- ======= Banner end ======= -->
    <!-- ======= Body Conter Start ======= -->
    <section class="bg-white how-to-work">
        <div class="container">
            <!-- ======= Timeline Start ======= -->
        <div class="row">
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
                                            <?php echo $coaching_nutrition->left_top ?> 
                                        </div>
                                        <div class="phone-info text-left info-two">
                                            <?php echo $coaching_nutrition->right_top ?>
                                        </div>
                                        <div class="phone-info text-left info-three">
                                            <?php echo $coaching_nutrition->right_bottom ?>  
                                        </div>
                                    
                                        <div class="phone-info text-right info-four">
                                            <?php echo $coaching_nutrition->left_bottom ?>
                                        </div>
                                    </div>
                                    <div class="img-full"><img src="<?php echo base_url().'uploads/'.$coaching_nutrition->image; ?>" class="img-fluid" alt=""></div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane container fade" id="workout">
                            <div class="phone-outer">
                                <div class="phone-img">
                                    <div class="all-info">
                                        <div class="phone-info text-right info-one">
                                            <?php echo $coaching_workout->left_top ?> 
                                        </div>
                                        <div class="phone-info text-left info-two">
                                            <?php echo $coaching_workout->right_top ?>
                                        </div>
                                        <div class="phone-info text-left info-three">
                                            <?php echo $coaching_workout->right_bottom ?>  
                                        </div>
                                    
                                        <div class="phone-info text-right info-four">
                                            <?php echo $coaching_workout->left_bottom ?>
                                        </div>
                                    </div>
                                    <div class="img-full"><img src="<?php echo base_url().'uploads/'.$coaching_workout->image; ?>" class="img-fluid" alt=""></div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane container fade" id="mentorship">
                            <div class="phone-outer">
                                <div class="phone-img">
                                    <div class="all-info">
                                        <div class="phone-info text-right info-one">
                                            <?php echo $coaching_mentorship->left_top ?> 
                                        </div>
                                        <div class="phone-info text-left info-two">
                                            <?php echo $coaching_mentorship->right_top ?>
                                        </div>
                                        <div class="phone-info text-left info-three">
                                            <?php echo $coaching_mentorship->right_bottom ?>  
                                        </div>
                                    
                                        <div class="phone-info text-right info-four">
                                            <?php echo $coaching_mentorship->left_bottom ?>
                                        </div>
                                    </div>
                                    <div class="img-full"><img src="<?php echo base_url().'uploads/'.$coaching_mentorship->image; ?>" class="img-fluid" alt=""></div>
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
                        $('#price').val(price);
                    }
                });
            }
        }
    });
</script>
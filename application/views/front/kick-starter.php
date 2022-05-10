<?php $this->load->view('fincludes/header'); ?>
    <!-- ======= Banner Start ======= -->
        <section class="inner-banner dark-grey-bg">
            <div class="container">
                <div class="row align-items-center mh-100">
                    <div class="col-12">
                        <div class="text-center top-banner-text">
                            <h4 class="text-uppercase text-secondary font-weight-300 mb-0 font-22">Plans &amp; Pricing</h4>
                            <h1 class="hero-txt"><?php echo $kick_starter_banner->description_one ?></h1>
                            <h5 class="hero-subtext maxw-780"><?php echo $kick_starter_banner->description_two ?></h5>
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
                            <!-- <form role="form" class="validate-form" id="kick_starter_pricing" enctype='multipart/form-data' action="<?php echo base_url() ?>home/proceed_payment" method="post"> -->
                                <div class="d-flex justify-content-between mx-auto">
                                    <div class="text-center">
                                        <h6 class="font-semibold">Duration</h6>
                                        <select name="duration" class="border-rounded-5" class="form-control" value = "<?php echo set_value('duration') ?>" id="duration" required>
                                            <?php if(!empty($kick_starter_pricings)) { foreach($kick_starter_pricings as $kick_starter_pricing) { ?>
                                                <option value="<?php echo $kick_starter_pricing->kick_starter_pricing_id; ?>">
                                                <?php echo $kick_starter_pricing->duration; echo " "; echo $kick_starter_pricing->duration_format ?>  
                                                </option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                    <div class="text-center ms-2">
                                        <h6 class="font-semibold">Price (&#8377;)</h6>
                                        <input type="text" class="form-control border-rounded-5 text-center" id="price" placeholder="₹ 3,500" name="price" value="<?php echo set_value('price') ?>" readonly required>
                                    </div>
                                </div>
                                <form role="form" class="validate-form" id="kick_starter_pricing" enctype='multipart/form-data' action="<?php echo base_url() ?>razorpay/payment_kick_starter" method="post">
                                    <div class="mt-20 mb-10 pricing-button">
                                        <input type="hidden" id="pricingID" name="pricingID" value="">
                                        <input type="submit" name="" value="Proceed To Payment" class="btn btn-primary text-uppercase border-rounded-5 w-100">
                                    </div>
                                </form>
                            <p class="btn-up-text xx-small text-center mb-0">* Your coach will be assigned after payment</p>
                        </div>
                        <div class="anchor-text text-center">
                            <ul class="d-inline-flex p-0 m-0">
                                <li class="mr-40"><a href="#how_it_works" class="active mb-3 plans-pricing" >How it works <svg width="8" height="13" class="arrow-position" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0.31327 0.300601C0.730962 -0.1002 1.40818 -0.1002 1.82587 0.300601L7.53024 5.77429C7.94793 6.17509 7.94793 6.82491 7.53024 7.22572L1.82587 12.6994C1.40818 13.1002 0.730962 13.1002 0.31327 12.6994C-0.104423 12.2986 -0.104423 11.6488 0.31327 11.248L5.26134 6.5L0.31327 1.75203C-0.104423 1.35123 -0.104423 0.701402 0.31327 0.300601Z" fill="#4B97F7"/>
                                    </svg>
                                    </a> </li>
                                <li>
                                    <a href="#req_callback" class="request-callback" data-bs-toggle="modal" data-bs-target="#req_callback">Request a callback <span>
                                        <svg width="14" height="15" class="arrow-position" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1.13664 12.3486C0.746119 12.7391 0.746119 13.3722 1.13664 13.7628C1.52717 14.1533 2.16033 14.1533 2.55086 13.7628L1.13664 12.3486ZM13.9352 1.9642C13.9352 1.41191 13.4875 0.964195 12.9352 0.964195L3.93522 0.964195C3.38293 0.964195 2.93522 1.41191 2.93522 1.9642C2.93522 2.51648 3.38293 2.96419 3.93522 2.9642L11.9352 2.96419L11.9352 10.9642C11.9352 11.5165 12.3829 11.9642 12.9352 11.9642C13.4875 11.9642 13.9352 11.5165 13.9352 10.9642L13.9352 1.9642ZM2.55086 13.7628L13.6423 2.6713L12.2281 1.25709L1.13664 12.3486L2.55086 13.7628Z" fill="#A1A2A6"/>
                                        </svg>
                                        </span>
                                    </a>
                                </li>
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
                    <ul class="custom-timeline">
                        <li>
                            <div class="timeline-desc">
                                <h4 class="timeline-title font-25 dark-bold-text"><?php echo $kick_starter_work->title_one ?></h4>
                                <p class="timeline-info"><?php echo $kick_starter_work->section_one ?></p>
                            </div>
                        </li>
                        <li>
                            <div class="timeline-desc">
                                <h4 class="timeline-title font-25 dark-bold-text"><?php echo $kick_starter_work->title_three ?></h4>
                                <p class="timeline-info"><?php echo $kick_starter_work->section_three ?></p>
                            </div>
                        </li>
                        <li>
                            <div class="timeline-desc">
                                <h4 class="timeline-title font-25 dark-bold-text"><?php echo $kick_starter_work->title_two ?></h4>
                                <p class="timeline-info"><?php echo $kick_starter_work->section_two ?></p>
                            </div>
                        </li>
                        <li>
                            <div class="timeline-desc">
                                <h4 class="timeline-title font-25 dark-bold-text"><?php echo $kick_starter_work->title_four ?></h4>
                                <p class="timeline-info"><?php echo $kick_starter_work->section_four ?></p>
                            </div>
                        </li>
                    </ul>
                    <!-- end card -->
                </div>
            </div>
            <!-- ======= Timeline end ======= -->
            </div>    
        </section>
        <section class="light-grey-bg what-included">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 mx-auto plan-inner">
                        <h2 class="hero-txt text-dark font-weight-bold text-center">What’s Included</h2>
                        
                        <ul class="nav nav-tabs justify-content-center border-0 mt-50">
                            <li class="nav-item ">
                              <a class="nav-link active border-0" data-bs-toggle="tab" href="#nutrition">Nutrition</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link border-0" data-bs-toggle="tab" href="#workout">Workout</a>
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
                                                Realistic-yet-tasty recipe <br>ideas & suggestions
                                            </div>
                                            <div class="phone-info text-left info-three">
                                                Multiple alternatives & food <br>replacement options
                                            </div>
                                        
                                            <div class="phone-info text-right info-four">
                                                Quantified nutrition plan <br>based on scientific & <br>research-backed methods, <br>no FAD diet
                                            </div>
                                        </div>
                                        <div class="img-full"><img src="<?php echo base_url() ?>fassets/images/phone-image.png" class="img-fluid" alt=""></div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane container fade" id="workout">
                                <div class="phone-outer">
                                    <div class="phone-img">
                                        <div class="all-info">
                                            <div class="phone-info text-right info-one">
                                                Workout plan either at <br>
                                                home/gym based on<br>  
                                                preference,with demo<br>  
                                                exercise links attached
                                            </div>
                                            <div class="phone-info text-left info-two">
                                                No separate personal<br> trainer’s assistance needed<br> to workout
                                            </div>
                                            <div class="phone-info text-left info-three">
                                                Exercises customised to your<br> 
                                                starting level,taking into<br> 
                                                consideration your<br>
                                                pre-existing injuries
                                            </div>
                                        
                                            <div class="phone-info text-right info-four">
                                                Technique & form correction <br>
                                                over WhatsApp
                                            </div>
                                        </div>
                                        <div class="img-full"><img src="<?php echo base_url() ?>fassets/images/phone-image1.png" class="img-fluid" alt=""></div>
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
        kick_starter_duration_pricing();
        $('select[name="duration"]').on('change', function() {
            kick_starter_duration_pricing();
        });

        function kick_starter_duration_pricing(kick_starter_pricing_id){
            var kick_starter_pricing_id = $("#duration").val();
            if(kick_starter_pricing_id) {
                $.ajax({
                    url: '<?php echo base_url() ?>home/kick_starter_pricing_details',
                    data: {'kick_starter_pricing_id': kick_starter_pricing_id},
                    type: "POST",
                    dataType: "json",
                    success:function(data) {
                        var price = parseFloat(data.price).toFixed(2);
                        var pricingID = data.kick_starter_pricing_id;
                        $('#price').val(price);
                        $('#pricingID').val(pricingID);
                    }
                });
            }
        }
    });
</script>
<?php $this->load->view('fincludes/header'); ?>
      <!-- ======= Body Container Start ======= -->
      <section class="bg-grey padtop-160 faq-sec">
        <div class="container">
          <div class="padbot75">
            <h1 class="section-title dark-bold-text">
              Frequently <br />asked questions.
            </h1>
          </div>
          <div class="single-section faq-ar">
            <div class="row">
              <div class="col-sm-12 col-md-6 first-child">
                <div class="padbot-50">
                  <div
                    class="btn btn-outline-secondary double-boder border-rounded-2 font-semibold px-3 py-2 font-20 font-normal"
                  >
                    GENERAL FAQ’s
                  </div>
                </div>
                <?php if(!empty($faq_type_1)){ foreach($faq_type_1 as $faq1){ ?>
                <div class="mb-50">
                  <h6 class="dark-bold-text font-20 question"><?php echo $faq1->question; ?></h6>
                  <div class="faq-dark-text font-20 ans"><?php echo $faq1->answer; ?></div>
                </div>
                <?php } } ?>
                <div class="pt-80 d-flex justify-content-between pricing-button">
                  <h6 class="query-text">
                    Have any other queries?
                  </h6>
                  <button type="button" class="btn btn-primary btn-rounded px-5 font-20 ht-44">
                    <a style="color: #f5f5f7;" href="#req_callback" data-bs-toggle="modal" data-bs-target="#req_callback">
                    Request a callback</a>
                  </button>
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
                </div>
              </div>
              <div class="col-sm-12 col-md-6 second-child">
                <div class="padbot-50">
                  <div
                    class="btn btn-outline-primary double-boder border-rounded-2 font-semibold px-3 py-2 font-20 font-normal"
                  >
                    KICK-STARTER FAQ’s
                  </div>
                </div>
                <?php if(!empty($faq_type_2)){ foreach($faq_type_2 as $faq2){ ?>
                <div class="mb-50">
                  <h6 class="dark-bold-text font-20 question"><?php echo $faq2->question; ?></h6>
                  <div class="faq-dark-text font-20 ans"><?php echo $faq2->answer; ?></div>
                </div>
                <?php } } ?>

                <div class="mb-50">
                  <div
                    class="btn btn-outline-success double-boder border-rounded-2 font-semibold font-20"
                  >
                    COACHING FAQ’s
                  </div>
                </div>
                <?php if(!empty($faq_type_3)){ $i=1; foreach($faq_type_3 as $faq3){ 
                  if($i==$faq_type_3_count){$mb_50 = "";} else{$mb_50 = "mb-50";}
                  ?>
                <div class="<?=$mb_50?>">
                  <h6 class="dark-bold-text font-20 question"><?php echo $faq3->question; ?></h6>
                  <div class="faq-dark-text font-20 ans"><?php echo $faq3->answer; ?></div>
                </div>
                <?php $i++; } } ?>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- ======= Body Container End ======= -->
<?php $this->load->view('fincludes/footer'); ?>
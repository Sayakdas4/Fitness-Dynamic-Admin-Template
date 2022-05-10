<?php $this->load->view('fincludes/header'); ?>
    <!-- ======= Banner Start ======= -->
      <section class="inner-banner dark-grey-bg">
        <div class="container">
          <div class="inner-banner-text about">
            <div class="w-100">
              <div class="text-center w-75 mx-auto team-page-banner-text">
                <h4 class="text-uppercase text-secondary font-weight-300 font-22 mb-0">
                  About Us
                </h4>
                <h1 class="hero-txt"><?php echo $about_us_banner->description_one ?></h1>
                <h5 class="hero-subtext mb-0 font-weight-300"><?php echo $about_us_banner->description_two ?></h5>
              </div>

            <div class="d-md-block d-lg-flex justify-content-between team-count mobile-owl">
                <?php if(!empty($featured_in)){ foreach($featured_in as $rec){ ?>
                <div class="box-logo">
                    <div class="text-center f-logo ">
                        <a href="<?=$rec->link?>" target="_blank"><img src="<?php echo base_url().'uploads/'.$rec->image; ?>" class="img-fluid" alt=""></a>
                    </div>
                    <div class="text-center padtop-20 font-10"><?php echo $rec->description; ?></div>
                </div>
                <?php } } ?>
            </div>
            </div>
          </div>
        </div>
      </section>
      <!-- ======= Banner end ======= -->
      <!-- ======= Body Content Start ======= -->
      <section class="bg-grey">
        <div class="container">
         <div class="row about-section">
            <?php if(!empty($about_us_data)){ $i=1; foreach($about_us_data as $data){ if($data->about_us_management_id != 3 && $data->about_us_management_id != 4 && $data->about_us_management_id != 5 && $data->about_us_management_id != 6) {
                if($i==1) { $order2 = 'order-lg-2'; $order1 =""; }
                if($i==2) { $order1 = 'order-lg-2'; $order2 =""; }
            ?>
            <div class="d-sm-block d-md-flex justify-content-md-between about-block">
              <div class="text-part <?=$order1?>">
                <div class="box-bold-text"><?php echo $data->title ?></div>
                <div class="box-normal-text"><?php echo $data->description ?></div>
              </div>
              <div class="image-part <?php echo $order2; if($i==1) {$i++;} else {$i=1;} ?>"> 
                <img src="<?php echo base_url().'uploads/'.$data->image; ?>" class="img-fluid" alt="">
              </div>
            </div>
            <?php } } } ?>

            <div class="about-large-text about-block">After starting, we asked hundreds <br>of our clients a simple question.</div>
            <div class="d-sm-block d-md-flex justify-content-md-between about-block">
              <div class="text-part">
                <div class="box-bold-text margin-top-23"><?php echo $about_us_data_4->title ?></div>
                <div class="box-normal-text"><?php echo $about_us_data_4->description ?></div>
              </div>
              <div class="image-part-small"> 
                <img src="<?php echo base_url().'uploads/'.$about_us_data_4->image; ?>" class="img-fluid" alt="">
              </div>
            </div>
            <div class="about-large-text about-block">Soon after thefitchase.com <br>took off & we were official!</div>
            <div class="d-md-flex justify-content-md-evenly justify-content-lg-between about-block">
                <?php if(!empty($performance_states)){ foreach($performance_states as $performance_state){ ?>
                <div class="text-center mb-3 ltext">
                    <p class="font-70 font-weight-700 mb-0 pb-0 dark-text"><?php echo $performance_state->count ?></p>
                    <h6 class="light-grey-text font-weight-300 font-18"><?php echo $performance_state->title ?></h6>
                </div>
                <?php } } ?>
            </div>
            <div class="about-large-text about-block">With word-of-mouth, high referrals <br>& soaring customer satisfaction scores we have been growing organically.</div>
         </div>
        </div>
      </section>
      <!-- ======= Body Content End ======= -->
<?php $this->load->view('fincludes/footer'); ?>
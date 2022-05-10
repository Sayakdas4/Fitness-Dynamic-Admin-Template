<?php $this->load->view('fincludes/header'); ?>
    <!-- ======= Banner Start ======= -->
      <section class="inner-banner dark-grey-bg">
        <div class="container">
          <div class="inner-banner-text">
            <div class="w-100">
              <div class="text-center w-75 mx-auto team-page-banner-text">
                <h4
                  class="text-uppercase text-secondary font-weight-300 font-22 mb-0"
                ><?php echo $team_banner->title ?></h4>
                <h1 class="hero-txt"><?php echo $team_banner->description_one ?></h1>
                <h5 class="hero-subtext mb-0 font-300"><?php echo $team_banner->description_two ?></h5>
              </div>
              <div class="d-md-flex justify-content-md-evenly justify-content-lg-between team-count" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="100">
                <?php if(!empty($performance_states)){ foreach($performance_states as $performance_state){ ?>
                <div class="text-center ltext">
                  <p class="font-70 font-weight-700 mb-0 pb-0"><?php echo $performance_state->count ?></p>
                  <h6 class="grey-text font-weight-300 font-18"><?php echo $performance_state->title ?></h6>
                </div>
                <?php } } ?>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- ======= Banner end ======= -->
      <!-- ======= Body Conter Start ======= -->
      <section class="bg-grey">
        <div class="container">
          <div class="row padtop-140 pb-25 mobile-pad-35">
            <?php if(!empty($teams)){ foreach($teams as $team){ ?>
            <div class="col-sm-12 col-md-4 text-center">
              <div class="team-cat">
                <div class="mb-10">
                  <div class="img-holder">
                    <img
                      src="<?php echo base_url().'uploads/'.$team->image; ?>"
                      class="rounded img-fluid"
                      alt="TFC"
                    />
                  </div>
                </div>
                <h3 class="text-uppercase dark-grey-text font-29 title"><?php echo $team->title; ?></h3>
                <div class="desig">
                  <h6 class="light-grey-text mb-0 mt-2 font-15 font-weight-400"><?php echo $team->certified_by; ?></h6>
                  <h6 class="light-grey-text pb-2 font-15 font-weight-400"><?php echo $team->education_short; ?></h6>
                </div>
                <h4 class="text-center tean-learn-more font-weight-300 font-25">
                  <a href="<?php echo base_url().'team-details/'.$team->username; ?>" class="text-decoration-none"
                    >Learn more
                    <svg
                      width="8"
                      height="13"
                      class="arrow-position"
                      viewBox="0 0 8 13"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M0.46952 0.300601C0.887212 -0.1002 1.56443 -0.1002 1.98212 0.300601L7.68649 5.77429C8.10418 6.17509 8.10418 6.82491 7.68649 7.22572L1.98212 12.6994C1.56443 13.1002 0.887212 13.1002 0.46952 12.6994C0.0518268 12.2986 0.0518268 11.6488 0.46952 11.248L5.41759 6.5L0.46952 1.75203C0.0518268 1.35123 0.0518268 0.701402 0.46952 0.300601Z"
                        fill="#4B97F7"
                      />
                    </svg>
                  </a>
                </h4>
              </div>
            </div>
            <?php } } ?>
          </div>
        </div>
      </section>
      <!-- ======= Body Conter End ======= -->
<?php $this->load->view('fincludes/footer'); ?>
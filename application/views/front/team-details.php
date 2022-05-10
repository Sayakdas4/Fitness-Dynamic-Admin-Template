<?php $this->load->view('fincludes/header'); ?>
    <!-- ======= Body Content Start ======= -->
    <section class="bg-grey single-team-one">
        <div class="container">
            <div class="vh-100 d-flex align-items-center justify-content-center">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <div class="mb-3"><div class="img-holder"><img src="<?php echo base_url().'uploads/'.$team_detail->image; ?>" class=" img-fluid rounded" alt="TFC"></div></div>
                        <p class="xxl-text dark-bold-text mt-60 mb-0"><?php echo $team_detail->title; ?></p>
                        <p class="light-grey-text font-normal font-18 font-300"><?php echo $team_detail->designation; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="dark-grey-bg ">
        <div class="container">
            <div class="pad-top75 single-team">
                <div class="row">
                    <div class="col-sm-12 col-md-6 first-child mb-5" data-aos="zoom-in-right">
                        <div class="team-about font-300">
                            <h5>About</h5>
                            <p class="grey-text"><?php echo $team_detail->about; ?></p>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 second-child font-300">
                        <div class="w-75">
                            <h5 class="font-22 grey-white-txt">Certifications</h5>
                            <p class="grey-text"><?php echo $team_detail->certifications; ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-50 font-300">
                <div class="five-col d-md-flex justify-content-md-evenly justify-content-lg-between border-top border-secondary">
                    <div class="mb-4">
                        <h5 class="font-20 grey-white-txt">Education</h5>
                        <h6 class="grey-text"><?php echo $team_detail->education; ?></h6>

                    </div>
                    <div class="mb-4">
                        <h5 class="font-20 grey-white-txt">Industry Experience</h5>
                        <h6 class="grey-text"><?php echo $team_detail->industry_experience; ?>+ years</h6>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-20 grey-white-txt">Clients Coached</h4>
                        <h6 class="grey-text"><?php echo $team_detail->clients_coached; ?>+</h6>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-20 grey-white-txt">Current Location</h5>
                        <h6 class="grey-text"><?php echo $team_detail->current_location; ?></h6>
                    </div>
                    <div class="mb-4">
                        <h5 class="font-20 grey-white-txt">Social</h5>
                        <ul class="list-inline-group d-flex s-media">
                            <?php if(!empty($team_detail->fb_link)){ ?>
                            <li class="me-2">
                               <a href="<?=$team_detail->fb_link?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            </li>
                            <?php } if(!empty($team_detail->twitter_link)){ ?>
                            <li class="me-2">
                                <a href="<?=$team_detail->twitter_link?>" target="_blank"><i class="fab fa-twitter"></i></a>
                            </li>
                            <?php } if(!empty($team_detail->instagram_link)){ ?>
                            <li class="me-2">    
                                <a href="<?=$team_detail->instagram_link?>" target="_blank"><i class="fab fa-instagram"></i></a>
                            </li>
                            <?php } if(!empty($team_detail->linkedin_link)){ ?>
                            <li class="mse-2">    
                                <a href="<?=$team_detail->linkedin_link?>" target="_blank"><i class="fab fa-linkedin"></i></a>
                            </li>    
                            <?php } ?>
                        </ul>
                        
                    </div>
                </div>    
            </div>
        </div>
    </section>
    <section class="bg-grey plans-pricing-ar">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-9 mx-auto plan-inner">
                    <h2 class="text-center mb-66 dark-bold-text font-50">Plans &amp; Pricing</h2>
                    
                    <ul class="nav nav-tabs justify-content-center border-0 custom-nav">
                        <li class="nav-item ">
                        <a class="nav-link active border-0" data-bs-toggle="tab" href="#kick-starter">Kick-starter</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link border-0" data-bs-toggle="tab" href="#Coaching">Coaching</a>
                        </li>
                    </ul>
                
                    <div class="tab-content padtop-57 mb-60 text-center dark-bold-text">
                        <div class="tab-pane container active" id="kick-starter">
                            <div class="pb-2"><span class="font-semibold font-35 me-2">₹</span><span class="font-55 font-bold700"><?php echo (int)$kick_starter_pricing->price; ?></span><span  class="font-normal font-20">/ <?php echo $kick_starter_pricing->duration; echo " "; echo $kick_starter_pricing->duration_format; ?> Program</span></div>
                            <p class="pb-0 font-normal font-20">Not ready for a long term commitment? Let this plan give<br> you a taste of what quick-yet-sustainable progress looks like.</p>
                            <h4 class="text-center py-4 font-25"><a href="<?php echo base_url() ?>kick-starter" class="text-decoration-none font-weight-300">Learn more <svg width="8" height="13" class="arrow-position" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.46952 0.300601C0.887212 -0.1002 1.56443 -0.1002 1.98212 0.300601L7.68649 5.77429C8.10418 6.17509 8.10418 6.82491 7.68649 7.22572L1.98212 12.6994C1.56443 13.1002 0.887212 13.1002 0.46952 12.6994C0.0518268 12.2986 0.0518268 11.6488 0.46952 11.248L5.41759 6.5L0.46952 1.75203C0.0518268 1.35123 0.0518268 0.701402 0.46952 0.300601Z" fill="#4B97F7"/>
                                </svg>
                                </a>
                            </h4>
                        </div>
                        <div class="tab-pane container fade" id="Coaching">
                            <div class="pb-2"><span class="font-semibold  font-35 me-2">₹</span><span class="font-55 font-bold700"><?php echo (int)$coaching_pricing->price; ?></span><span  class="font-normal font-20">/ <?php echo $coaching_pricing->duration; echo " "; echo $coaching_pricing->duration_format; ?> Program</span></div>
                            <p class="pb-0 font-normal font-20">Sit back & experience the power of hyper-personalized one-to-one<br> ongoing-mentorship, where an expert hand-holds you & takes care of everything.</p>
                            <h4 class="text-center py-4 font-25"><a href="<?php echo base_url() ?>coaching" class="text-decoration-none font-weight-300">Learn more <svg width="8" height="13" class="arrow-position" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.46952 0.300601C0.887212 -0.1002 1.56443 -0.1002 1.98212 0.300601L7.68649 5.77429C8.10418 6.17509 8.10418 6.82491 7.68649 7.22572L1.98212 12.6994C1.56443 13.1002 0.887212 13.1002 0.46952 12.6994C0.0518268 12.2986 0.0518268 11.6488 0.46952 11.248L5.41759 6.5L0.46952 1.75203C0.0518268 1.35123 0.0518268 0.701402 0.46952 0.300601Z" fill="#4B97F7"/>
                                </svg>
                                </a>
                            </h4>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- ======= Body Content End ======= -->
<?php $this->load->view('fincludes/footer'); ?>
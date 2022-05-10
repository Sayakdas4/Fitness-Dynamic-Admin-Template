<?php $this->load->view('fincludes/header'); ?>
<!-- ======= Banner Start ======= -->
        <section class="banner-wrap">
            <div class="hero-bg" >
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-9 col-lg-7 text-md-start">
                            <h1 class="hero-txt text-gap"><?php echo $home_banner->description_one ?></h1>
                               <h5 class="hero-subtext"><?php echo $home_banner->description_two ?></h5>
                                <div class="anchor-text">
                                    <ul class="d-flex p-0 m-0">
                                        <li class="mr-40"><a href="#req_callback" class="mb-3 plans-pricing" data-bs-toggle="modal" data-bs-target="#req_callback">Request a callback <span>
                                            <svg width="14" height="15" class="arrow-position" viewBox="0 0 14 15" fill="#a1a2a6" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.13664 12.3486C0.746119 12.7391 0.746119 13.3722 1.13664 13.7628C1.52717 14.1533 2.16033 14.1533 2.55086 13.7628L1.13664 12.3486ZM13.9352 1.9642C13.9352 1.41191 13.4875 0.964195 12.9352 0.964195L3.93522 0.964195C3.38293 0.964195 2.93522 1.41191 2.93522 1.9642C2.93522 2.51648 3.38293 2.96419 3.93522 2.9642L11.9352 2.96419L11.9352 10.9642C11.9352 11.5165 12.3829 11.9642 12.9352 11.9642C13.4875 11.9642 13.9352 11.5165 13.9352 10.9642L13.9352 1.9642ZM2.55086 13.7628L13.6423 2.6713L12.2281 1.25709L1.13664 12.3486L2.55086 13.7628Z" fill="#4b97f7"/>
                                            </svg>
                                            </span>
                                            </a> 
                                        </li>
                                        <li>
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
                                        <a href="#plans-pricing" class="request-callback">Plans & pricing <span><svg width="8" height="13" class="arrow-position" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0.31327 0.300601C0.730962 -0.1002 1.40818 -0.1002 1.82587 0.300601L7.53024 5.77429C7.94793 6.17509 7.94793 6.82491 7.53024 7.22572L1.82587 12.6994C1.40818 13.1002 0.730962 13.1002 0.31327 12.6994C-0.104423 12.2986 -0.104423 11.6488 0.31327 11.248L5.26134 6.5L0.31327 1.75203C-0.104423 1.35123 -0.104423 0.701402 0.31327 0.300601Z" fill="#a1a2a6"/>
                                            </svg></span>
                                        </a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3 col-lg-5 padtop-70 banpic"><img src="<?php echo base_url().'uploads/'.$home_banner->image; ?>" class="img-fluid" alt=""></div>
                        </div>
                </div>
            </div>
        </section>
        <!-- ======= Banner end ======= -->
         <!--======== Featured Logo Start=====--> 
         <section class="featured-logo-ar">
            <div class="container">
                <div class="featured-logo">
                    <h3 class="text-uppercase d-block text-lg-start font-400">Featured In</h3>
                    <div class="d-md-block d-lg-flex justify-content-between mobile-owl">
                        <?php if(!empty($featured_in)){ foreach($featured_in as $rec){ ?>
                        <div class="box-logo">
                            <div class="text-center f-logo ">
                                <a href="<?=$rec->link?>" target="_blank"><img src="<?php echo base_url().'uploads/'.$rec->image; ?>" class="img-fluid" alt="" ></a>
                            </div>
                            <div class="text-center padtop-20 font-10"><?php echo $rec->description; ?></div>
                        </div>
                        <?php } } ?>

                    </div>
        
                </div>
            </div>
        </section>
        <!--======== Featured Logo End=====--> 
        <!--======Box-section start====-->
        <section class="container-fluid p-0">
            <div class="box-section">
                <div class="row">
                    <?php if(!empty($home_datas)){ foreach($home_datas as $home_data){ ?>
                    <div class="col-sm-12 col-md-12 col-lg-4 pr-15">
                        <div class="card bg-secondary">
                            <div class="card-body">
                                <div class="icon text-center text-lg-start "><img src="<?php echo base_url().'uploads/'.$home_data->image; ?>" class="img-fluid" alt="" ></div>
                                <div class="card-title h1 text-center text-md-center text-lg-start mb-0"><?php echo $home_data->title; ?></div>
                                <div class="text-secondary icontxt text-sm-center text-md-center text-lg-start mb-0"><?php echo $home_data->description; ?></div>
                            </div>
                        </div>
                    </div>
                    <?php } } ?>
                </div>
            </div>
        </section>
        <!--Box-section end-->
        <!--======Support-section start====-->
        <section class="bg-secondary padtop90 team-sec">
            <div class="container">
                <div class="support">
                    <div class="text-center">
                        <div class="text-uppercase text-secondary font-weight-300 mb-0 font-22"><?php echo $home_team->title ?></div>
                        <h2 class="section-title mt10-mb25">We’ve supported 3000+ <br>success stories globally.</h2>
                        <h4 class="text-secondary font-weight-300"><?php echo $home_team->subtitle_two ?></h4>
                        <div class="team-sec d-md-block d-lg-flex justify-content-between border-bottom-grey">
                            <div class="position-relative">
                                <div class="picbox">
                                    <a href="<?php echo base_url() ?>team-details/mukund" class="text-white"><img src="<?php echo base_url() ?>fassets/images/person-1.png" class="img-fluid" alt="" ></a>
                                    
                                </div>
                                <div class="info position-absolute">
                                    <a href="<?php echo base_url() ?>team-details/mukund" class="text-white"><h5 class="mb-0">Mukund</h5></a>
                                    <small class="info-text">PTC Certified<br> MBA - SP Jain,<br> Mumbai</small>
                                </div>
                            </div>
                            <div class="position-relative">
                                <div class="picbox">
                                    <a href="<?php echo base_url() ?>team-details/vishwa" class="text-white"><img src="<?php echo base_url() ?>fassets/images/person-2.png" class="img-fluid" alt="" ></a>
                                </div>
                                <div class="info position-absolute rn20">
                                    <a href="<?php echo base_url() ?>team-details/vishwa" class="text-white"><h5 class="mb-0">Vishwa</h5></a>
                                    <small class="info-text">ISSA Certified<br> PG HRM - Trent,<br> Canada</small>
                                </div>
                            </div>

                            <div class="position-relative">
                                <div class="picbox">
                                    <a href="<?php echo base_url() ?>team-details/suprotim" class="text-white"><img src="<?php echo base_url() ?>fassets/images/person-3.png" class="img-fluid" alt="" ></a>
                                    
                                </div>
                                <div class="info position-absolute rn40">
                                    <a href="<?php echo base_url() ?>team-details/suprotim" class="text-white"><h5 class="mb-0">Suprotim</h5></a>
                                    <small class="info-text">INFS Certified<br> MBA - IMT,<br> Ghaziabad</small>
                                </div>
                            </div>
                            <div class="position-relative">
                                <div class="picbox">
                                    <a href="<?php echo base_url() ?>team-details/priyanka" class="text-white"><img src="<?php echo base_url() ?>fassets/images/person-4.png" class="img-fluid" alt="" ></a>
                                </div>
                                <div class="info position-absolute rn40">
                                    <a href="<?php echo base_url() ?>team-details/priyanka" class="text-white"><h5 class="mb-0">Priyanka</h5></a>
                                    <small class="info-text">Precision Nutrition<br> PGDM - XIM,<br> Bhubaneshwar</small>
                                </div>
                            </div>
                            <div class="position-relative">
                                <div class="picbox">
                                    <a href="<?php echo base_url() ?>team-details/shrey" class="text-white"><img src="<?php echo base_url() ?>fassets/images/person-5.png" class="img-fluid" alt="" ></a>
                                </div>
                                <div class="info position-absolute rn20">
                                    <a href="<?php echo base_url() ?>team-details/shrey" class="text-white"><h5 class="mb-0">Shrey</h5></a>
                                    <small class="info-text">INFS Certified<br> MBA - NMIMS,<br> Mumbai </small>
                                </div>
                            </div>
                            
                        </div>
                        <h4 class="text-center ptb80 font-25 mb-0">
                            <a href="<?php echo base_url(); ?>team" class="text-decoration-none font-weight-300">Learn more <svg width="8" height="13" class="arrow-position" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.46952 0.300601C0.887212 -0.1002 1.56443 -0.1002 1.98212 0.300601L7.68649 5.77429C8.10418 6.17509 8.10418 6.82491 7.68649 7.22572L1.98212 12.6994C1.56443 13.1002 0.887212 13.1002 0.46952 12.6994C0.0518268 12.2986 0.0518268 11.6488 0.46952 11.248L5.41759 6.5L0.46952 1.75203C0.0518268 1.35123 0.0518268 0.701402 0.46952 0.300601Z" fill="#4B97F7"/>
                                </svg>
                            </a>
                    </h4>
                    </div>
                </div>
            </div>
        </section>
        <!--Support-section end-->
        <!--======Testimonial start====-->
        <section class="bg-grey padtop90">
            <div class="container">
                <div class="text-center testimonials">
                    <div class="text-uppercase light-grey-text font-weight-300 mb-0 font-22">Success Stories</div>
                    <h2 class="section-title dark-text font-weight-bold mt10-mb25">Real People <br>Real Reviews.</h2>
                    <h4 class="light-grey-text text-sub-heading font-25 font-weight-300"><?php echo $home_sucess->subtitle_two ?></h4>
                     <!--carousel slider start-->
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <?php if(!empty($success_stories)){ $i=1; foreach($success_stories as $success_story){ 
                                if($i==1){$active = "active";} else{$active="";}?>
                            <div class="carousel-item <?=$active?>" >
                                <div class="row d-flex justify-content-center padtop-50">
                                    <div class="col-md-10 col-lg-12">
                                        <div class="card media-wrap">
                                            <div class="card-body p-0">
                                                <div class="row">
                                                    <div class="col-sm-12 col-lg-5 d-flex justify-content-center align-items-center mb-0 p-0">
                                                        <div class="media text-xl-start  d-sm-block d-lg-flex">
                                                            <div class="media-left">
                                                                <img src="<?php echo base_url().'uploads/'.$success_story->image_two; ?>" class="rounded img-fluid" alt="">                                     
                                                            </div>
                                                            <div class="media-body">
                                                                <div class="overview">
                                                                    <h5 class="media-title"><?php echo $success_story->title_two ?></h5>
                                                                    <div class="light-grey-text font-15 font-weight-300"><?php echo $success_story->designation_two ?>, <?php echo $success_story->location_two ?></div>
                                                                    <div class="star-rating pt-2">
                                                                        <ul class="list-inline">
                                                                            <?php if($success_story->rating_two) ?>
                                                                            <?php for($i=1; $i<=$success_story->rating_two; $i++){ ?>
                                                                            <li class="list-inline-item"><svg width="26" height="24" viewBox="0 0 26 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                <path d="M13 0L15.9187 8.98278H25.3637L17.7225 14.5344L20.6412 23.5172L13 17.9656L5.35879 23.5172L8.27747 14.5344L0.636266 8.98278H10.0813L13 0Z" fill="#FF9529"/>
                                                                                </svg>
                                                                            </li>
                                                                            <?php } ?>
                                                                        </ul>
                                                                    </div>
                                                                </div>                                      
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-lg-7 testimonial-details mt-2 p-0">
                                                        <!-- <div class="font-20 text-dark text-lg-start mb-0 font-weight-400"><?php echo $success_story->description_two ?></div>   -->
                                                        <div class="text-lg-start testimonial-details font-20 m-0 p-0"><?php echo $success_story->description_two ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php $i++; } } ?>
                        </div>
                    </div>
                      <!--carousel slider end-->
                      <h4 class="text-center pt72 pb105 font-25 mb-0"><a href="<?php echo base_url() ?>success-stories" class="text-decoration-none font-weight-300">Learn more <svg width="8" height="13" class="arrow-position" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0.46952 0.300601C0.887212 -0.1002 1.56443 -0.1002 1.98212 0.300601L7.68649 5.77429C8.10418 6.17509 8.10418 6.82491 7.68649 7.22572L1.98212 12.6994C1.56443 13.1002 0.887212 13.1002 0.46952 12.6994C0.0518268 12.2986 0.0518268 11.6488 0.46952 11.248L5.41759 6.5L0.46952 1.75203C0.0518268 1.35123 0.0518268 0.701402 0.46952 0.300601Z" fill="#4B97F7"/>
                        </svg>
                        </a>
                    </h4>
                </div>
            </div> 
        </section>
        <!--======Testimonial end====-->
        <!--======Tab section start====-->
        <section class="bg-secondary padtop90" id="plans-pricing">
            <div class="container">
                <div class="text-center plans-price">
                    <div class="text-uppercase text-secondary font-weight-300 mb-0 font-22"><?php echo $home_pricing->title ?></div>
                    <h1 class="section-title mt10-mb25">Make this one <br>decision today.</h1>
                    <h4 class="text-secondary font-weight-300 font-25 mb-0"><?php echo $home_pricing->subtitle_two ?></h4>
                </div>
                <div class="row" id="plans-pricing">
                    <div class="col-md-12 mx-auto plan">
                        <ul class="nav nav-tabs justify-content-center mobile-scroll-nav">
                            <li class="nav-item ">
                              <a class="nav-link active border-0" data-bs-toggle="tab" href="#kick-starter">Kick-starter</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link border-0" data-bs-toggle="tab" href="#Coaching">Coaching</a>
                            </li>
                          </ul>
                          
                          <!-- Tab panes -->
                          <div class="tab-content padtop-57 text-center">
                            <div class="tab-pane container active" id="kick-starter">
                                <div class="pb-10 ft-tab"><span class="font-normal font-35 me-2">₹</span><span class="font-55 font-weight-600"><?php echo (int)$kick_starter_pricing->price; ?></span><span  class="font-normal font-20">/ <?php echo $kick_starter_pricing->duration; echo " "; echo $kick_starter_pricing->duration_format; ?> Program</span></div>
                                <p class="pb-0 font-20">Not ready for a long term commitment? Let this plan give<br> you a taste of what quick-yet-sustainable progress looks like.</p>
                                <h4 class="text-center ptb80 font-25"><a href="<?php echo base_url() ?>kick-starter" class="text-decoration-none font-weight-300">Learn more <svg width="8" height="13" class="arrow-position" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0.46952 0.300601C0.887212 -0.1002 1.56443 -0.1002 1.98212 0.300601L7.68649 5.77429C8.10418 6.17509 8.10418 6.82491 7.68649 7.22572L1.98212 12.6994C1.56443 13.1002 0.887212 13.1002 0.46952 12.6994C0.0518268 12.2986 0.0518268 11.6488 0.46952 11.248L5.41759 6.5L0.46952 1.75203C0.0518268 1.35123 0.0518268 0.701402 0.46952 0.300601Z" fill="#4B97F7"/>
                                    </svg>
                                    </a>
                                </h4>
                                
                            </div>
                            <div class="tab-pane container fade" id="Coaching">
                                <div class="pb-10"><span class="font-normal font-35 me-2">₹</span><span class="font-55 font-weight-600"><?php echo (int)$coaching_pricing->price; ?></span><span  class="font-normal font-20">/ <?php echo $coaching_pricing->duration; echo " "; echo $coaching_pricing->duration_format; ?> Program</span></div>
                                <p class="pb-0 font-20">Sit back & experience the power of hyper-personalized one-to-one<br> ongoing-mentorship, where an expert hand-holds you & takes care of everything.</p>
                                <h4 class="text-center ptb80 font-25"><a href="<?php echo base_url() ?>coaching" class="text-decoration-none font-weight-300">Learn more <svg width="8" height="13" class="arrow-position" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
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
        <!--======Tab section end====-->
        <!--======Price compare section start====-->
        <section class="bg-grey padtop90">
            <div class="container">
                <div class="text-center compare">
                    <h4 class="text-uppercase light-grey-text font-weight-300 mb-0 font-22"><?php echo $home_compare->title ?></h4>
                    <h1 class="section-title dark-text font-weight-bold mt10-mb25">Our plans are <br>easy to follow.</h1>
                    <h4 class="text-secondary font-weight-300 font-25 mb-0 light-grey-text"><?php echo $home_compare->subtitle_two ?></h4>
                </div>
                    <div class="full-relative mobile-padding-left-right-30">
                        <div class="mobile-arrow mobile-arrow-left">
                            <img src="<?php echo base_url() ?>fassets/images/arrow_left_icon.png" class="img-fluid" alt="" >
                        </div>
                        <div class="mobile-arrow mobile-arrow-right">
                            <img src="<?php echo base_url() ?>fassets/images/arrow_right_icon.png" class="img-fluid" alt="" >
                        </div>
                        <div id="scroll-on-mobile" class="table-responsive-lg mx-auto padtop-64 padbot106">
                            
                            <table class="table pricing-table scroll-on-mobile">
                                <tbody>
                                    <tr>
                                        <td >&nbsp;</td>
                                        <td class="text-center fade-blue md-text text-secondary font-20 font-semibold line-height-40 light-grey-text">Kick-starter</td>
                                        <td class="text-center md-text text-secondary font-20 font-semibold line-height-40 light-grey-text">Coaching</td>
                                    </tr>
                                    <tr>
                                        <td class="shade-grey" >Diet, Recipies & Alternatives</td>
                                        <td class="text-center fade-blue"><span class="text-primary large-txt"><svg width="24" height="17" viewBox="0 0 24 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M23.3381 1.14723C23.8873 1.69641 23.8873 2.5868 23.3381 3.13597L10.2131 16.261C9.66395 16.8101 8.77356 16.8101 8.22438 16.261L0.724381 8.76097C0.175206 8.2118 0.175206 7.32141 0.724381 6.77223C1.27356 6.22306 2.16394 6.22306 2.71312 6.77223L9.21875 13.2779L21.3494 1.14723C21.8986 0.598058 22.7889 0.598058 23.3381 1.14723Z" fill="#4B97F7"/>
                                            </svg>
                                            </span></td>
                                        <td class="text-center"><span class="text-success large-txt"><svg width="25" height="16" viewBox="0 0 25 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M23.8381 0.444108C24.3873 0.993282 24.3873 1.88367 23.8381 2.43285L10.7131 15.5578C10.1639 16.107 9.27356 16.107 8.72438 15.5578L1.22438 8.05785C0.675206 7.50867 0.675206 6.61828 1.22438 6.06911C1.77356 5.51993 2.66394 5.51993 3.21312 6.06911L9.71875 12.5747L21.8494 0.444108C22.3986 -0.105067 23.2889 -0.105067 23.8381 0.444108Z" fill="#24BA78"/>
                                            </svg>
                                            </span></td>
                                    </tr>
                                    <tr>
                                        <td class="shade-grey" >Exercise & Form Correction</td>
                                        <td class="text-center fade-blue"><span class="text-primary large-txt"><svg width="24" height="17" viewBox="0 0 24 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M23.3381 1.14723C23.8873 1.69641 23.8873 2.5868 23.3381 3.13597L10.2131 16.261C9.66395 16.8101 8.77356 16.8101 8.22438 16.261L0.724381 8.76097C0.175206 8.2118 0.175206 7.32141 0.724381 6.77223C1.27356 6.22306 2.16394 6.22306 2.71312 6.77223L9.21875 13.2779L21.3494 1.14723C21.8986 0.598058 22.7889 0.598058 23.3381 1.14723Z" fill="#4B97F7"/>
                                            </svg></span></td>
                                        <td class="text-center"><span class="text-success large-txt"><svg width="25" height="16" viewBox="0 0 25 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M23.8381 0.444108C24.3873 0.993282 24.3873 1.88367 23.8381 2.43285L10.7131 15.5578C10.1639 16.107 9.27356 16.107 8.72438 15.5578L1.22438 8.05785C0.675206 7.50867 0.675206 6.61828 1.22438 6.06911C1.77356 5.51993 2.66394 5.51993 3.21312 6.06911L9.71875 12.5747L21.8494 0.444108C22.3986 -0.105067 23.2889 -0.105067 23.8381 0.444108Z" fill="#24BA78"/>
                                            </svg>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="shade-grey" >Habit & Adherence Tools</td>
                                        <td class="text-center fade-blue">
                                            <span>
                                                <svg width="16" height="5" viewBox="0 0 16 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M14.1167 0.722656C15.0333 0.722656 15.7763 1.52867 15.7763 2.52295C15.7763 3.51722 15.0333 4.32324 14.1168 4.32324H8.03171H1.94667C1.03012 4.32324 0.287109 3.51722 0.287109 2.52295C0.287109 1.52867 1.03012 0.722656 1.94667 0.722656H14.1167Z" fill="#A1A2A6"/>
                                                </svg>
                                            </span>
                                        </td>
                                        <td class="text-center"><span class="text-success large-txt"><svg width="25" height="16" viewBox="0 0 25 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M23.8381 0.444108C24.3873 0.993282 24.3873 1.88367 23.8381 2.43285L10.7131 15.5578C10.1639 16.107 9.27356 16.107 8.72438 15.5578L1.22438 8.05785C0.675206 7.50867 0.675206 6.61828 1.22438 6.06911C1.77356 5.51993 2.66394 5.51993 3.21312 6.06911L9.71875 12.5747L21.8494 0.444108C22.3986 -0.105067 23.2889 -0.105067 23.8381 0.444108Z" fill="#24BA78"/>
                                            </svg>
                                            </span></td>
                                    </tr>
                                    <tr>
                                        <td class="shade-grey" >Weekly Video Progress</td>
                                        <td class="text-center fade-blue">
                                            <span>
                                                <svg width="16" height="5" viewBox="0 0 16 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M14.1167 0.722656C15.0333 0.722656 15.7763 1.52867 15.7763 2.52295C15.7763 3.51722 15.0333 4.32324 14.1168 4.32324H8.03171H1.94667C1.03012 4.32324 0.287109 3.51722 0.287109 2.52295C0.287109 1.52867 1.03012 0.722656 1.94667 0.722656H14.1167Z" fill="#A1A2A6"/>
                                                </svg>
                                            </span>
                                        </td>
                                        <td class="text-center"><span class="text-success large-txt"><svg width="25" height="16" viewBox="0 0 25 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M23.8381 0.444108C24.3873 0.993282 24.3873 1.88367 23.8381 2.43285L10.7131 15.5578C10.1639 16.107 9.27356 16.107 8.72438 15.5578L1.22438 8.05785C0.675206 7.50867 0.675206 6.61828 1.22438 6.06911C1.77356 5.51993 2.66394 5.51993 3.21312 6.06911L9.71875 12.5747L21.8494 0.444108C22.3986 -0.105067 23.2889 -0.105067 23.8381 0.444108Z" fill="#24BA78"/>
                                            </svg>
                                            </span></td>
                                    </tr>
                                    <tr>
                                        <td class="shade-grey" >Long-term Strategy & Mentorship</td>
                                        <td class="text-center fade-blue">
                                            <span>
                                                <svg width="16" height="5" viewBox="0 0 16 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M14.1167 0.722656C15.0333 0.722656 15.7763 1.52867 15.7763 2.52295C15.7763 3.51722 15.0333 4.32324 14.1168 4.32324H8.03171H1.94667C1.03012 4.32324 0.287109 3.51722 0.287109 2.52295C0.287109 1.52867 1.03012 0.722656 1.94667 0.722656H14.1167Z" fill="#A1A2A6"/>
                                                </svg>
                                            </span>
                                        </td>
                                        <td class="text-center"><span class="text-success large-txt"><svg width="25" height="16" viewBox="0 0 25 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M23.8381 0.444108C24.3873 0.993282 24.3873 1.88367 23.8381 2.43285L10.7131 15.5578C10.1639 16.107 9.27356 16.107 8.72438 15.5578L1.22438 8.05785C0.675206 7.50867 0.675206 6.61828 1.22438 6.06911C1.77356 5.51993 2.66394 5.51993 3.21312 6.06911L9.71875 12.5747L21.8494 0.444108C22.3986 -0.105067 23.2889 -0.105067 23.8381 0.444108Z" fill="#24BA78"/>
                                            </svg>
                                            </span></td>
                                    </tr>
                                    <tr>
                                        <td class="shade-grey">Coach Proactive Reach Out</td>
                                        <td class="text-center fade-blue">
                                            <span>
                                                <svg width="16" height="5" viewBox="0 0 16 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M14.1167 0.722656C15.0333 0.722656 15.7763 1.52867 15.7763 2.52295C15.7763 3.51722 15.0333 4.32324 14.1168 4.32324H8.03171H1.94667C1.03012 4.32324 0.287109 3.51722 0.287109 2.52295C0.287109 1.52867 1.03012 0.722656 1.94667 0.722656H14.1167Z" fill="#A1A2A6"/>
                                                </svg>
                                            </span>
                                        </td>
                                        <td class="text-center"><span class="text-success large-txt"><svg width="25" height="16" viewBox="0 0 25 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M23.8381 0.444108C24.3873 0.993282 24.3873 1.88367 23.8381 2.43285L10.7131 15.5578C10.1639 16.107 9.27356 16.107 8.72438 15.5578L1.22438 8.05785C0.675206 7.50867 0.675206 6.61828 1.22438 6.06911C1.77356 5.51993 2.66394 5.51993 3.21312 6.06911L9.71875 12.5747L21.8494 0.444108C22.3986 -0.105067 23.2889 -0.105067 23.8381 0.444108Z" fill="#24BA78"/>
                                            </svg>
                                            </span></td>
                                    </tr>
                                    <tr>
                                        <td  class="border-0 shade-grey">Choose This If You</td>
                                        <td class="text-center fade-blue border-0 dark-grey-text-200">
                                            <span class="dark-grey-text-300">
                                                Just need a<br> plan to follow
                                            </span>
                                        </td>
                                        <td class="text-center border-0"><span class="font-weight-300 last-td">Need sustainable<br> results</span></td>
                                    </tr>
        
                                </tbody>
                            </table>
                        </div>
                    </div>  
            </div>
        </section>
        <!--======Price compare section end====-->
        <!--======Gradient section start====-->
        <section class="gradient-primary d-flex">
            <div class="container approach">
                <div class="text-center py-5 grd">
                    <h4 class="text-uppercase grey-white-txt font-weight-300 mb-0 font-22"><?php echo $home_book->title ?></h4>
                    <h2 class="section-title text-white font-weight-bold mt10-mb25">Book a call <br>with our advisor.</h2>
                    <h4 class="font-weight-300 grey-white-txt font-29 line-height-40">To understand how we take fitness to a <br>deeper, more sustainable level!</h3>
                    <h4 class="text-center padtop-50 font-25"><a href="#req_callback" class="text-decoration-none font-weight-300" data-bs-toggle="modal" data-bs-target="#req_callback">Learn more <svg width="8" height="14" class="arrow-position" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0.46952 0.318282C0.887212 -0.106094 1.56443 -0.106094 1.98212 0.318282L7.68649 6.11392C8.10418 6.5383 8.10418 7.22635 7.68649 7.65072L1.98212 13.4464C1.56443 13.8707 0.887212 13.8707 0.46952 13.4464C0.0518268 13.022 0.0518268 12.3339 0.46952 11.9096L5.41759 6.88232L0.46952 1.85508C0.0518268 1.43071 0.0518268 0.742658 0.46952 0.318282Z" fill="white"/>
                        </svg>
                        
                        </a></h4>
                </div>
            </div>
        </section>
        <!--======Gradient section end====-->
<?php $this->load->view('fincludes/footer'); ?>


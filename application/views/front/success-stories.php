<?php $this->load->view('fincludes/header'); ?>
        <!-- ======= Body Container Start ======= -->
        <section class="bg-grey">
            <div class="container">
                <!-- ======= Banner Start ======= -->
               <div class="w-100">
                        <div class="text-center mx-auto team-page-banner-text padbot-170 success-stories-banner-text">
                            <h4 class="text-uppercase light-grey-text font-weight-300 mb-0 font-22"><?php echo $success_stories_banner->title ?></h4>
                            <h1 class="section-title dark-bold-text">Results that <br>stand the test of time.</h1>
                            <h5 class="mb-0 light-grey-text font-29 font-weight-300"><?php echo $success_stories_banner->description_two ?></h5>
                        </div>
                    </div>
                <!-- ======= Banner End ======= -->
                <!--main-page-container start-->
                <?php if(!empty($success_stories)){ foreach($success_stories as $success_story){ ?>
                <div class="marbot-25">
                    <div class="bg-white border-rounded-7 dark-grey-text p-35">
                        <div class="d-md-block d-lg-flex align-items-end">
                            <div class="success-pic">
                                <img src="<?php echo base_url().'uploads/'.$success_story->image_one; ?>" class="img-fluid" alt="TFC">
                                <!-- <div class="left-radius-blogpic">
                                    <img src="<?php //echo base_url().'uploads/'.$success_story->image_one; ?>" class="img-fluid" alt="TFC">
                                </div> -->
                                <!-- <div class="space">&nbsp;</div>
                                <div class="right-radius-blogpic">
                                    <img src="<?php //echo assets_url();?>fassets/images/ss-2.png" class="img-fluid" alt="TFC">
                                </div> -->
                                
                            </div>
                            <div class="boxtext"><?php echo $success_story->description_one ?>
                                <p class="blog-holder-name"><span><?php echo $success_story->title_one ?></span>, <span><?php echo $success_story->age_one ?></span>, <span><?php echo $success_story->lkd_one ?></span></p>
                                <p class="font-15 font-italic mb-0 small-text"> 
                                    <?php 
                                        if(!empty($teams)){ 
                                            foreach($teams as $team){ 
                                                if($team->team_id == $success_story->teamID_one) {echo "Coach ".$team->title;}
                                            } 
                                        } 
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-6 ">
                        <div class="img-container align-items-lg-end marbot-25"> 
                            <div class="bg-white border-rounded-7 dark-grey-text pad-60">
                                <div class="text-secondary text-xl-start d-md-block d-lg-flex padtop-70">
                                    <div class="row">
                                        <div class="col-md-12 col-lg-4 text-center text-lg-start">
                                            <div class="testimonial-img-holder "><img src="<?php echo base_url().'uploads/'.$success_story->image_two; ?>" class="rounded img-fluid" alt=""></div>	
                                        </div>
                                        <div class="col-md-12 col-lg-8 text-center  text-lg-start">
                                            <div class="pt-2">
                                                <h5 class="name dark-text-normal font-20"><?php echo $success_story->title_two ?></h5>
                                                <div class="light-grey-text font-15 font-weight-300"><?php echo $success_story->designation_two ?>, <?php echo $success_story->location_two ?></div>
                                                <div class="star-rating pt-1">
                                                    <ul class="list-inline">
                                                        <?php if($success_story->rating_two) ?>
                                                        <?php for($i=1; $i<=$success_story->rating_two; $i++){ ?>
                                                            <li class="list-inline-item"><svg width="26" height="24" viewBox="0 0 26 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M13 0L15.9187 8.98278H25.3637L17.7225 14.5344L20.6412 23.5172L13 17.9656L5.35879 23.5172L8.27747 14.5344L0.636266 8.98278H10.0813L13 0Z" fill="#FF9529"></path>
                                                                </svg>
                                                            </li>
                                                        <?php } ?>
                                                    </ul>
                                                </div>
                                            </div>										
                                        </div>  
                                    </div>
                                </div>
                                <div class="padtop40-padbot40 text-lg-start">
                                    <!-- <h5 class="blog-post mb-0"><strong>Understood the science behind the plan.</strong></h5> -->
                                    <div class="blog-post"><?php echo $success_story->description_two ?></div>
                                </div>
                                <p class="font-15 font-italic mb-0 small-text">
                                    <?php 
                                        if(!empty($teams)){ 
                                            foreach($teams as $team){ 
                                                if($team->team_id == $success_story->teamID_two) {echo "Coach ".$team->title;}
                                            } 
                                        } 
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="img-container">
                            <div class="bg-white border-rounded-7 dark-grey-text info-box marbot-25">
                                <div class="d-sm-block d-lg-flex justify-content-between align-items-top">
                                    <div class="d-flex align-items-top">
                                        <div class="me-3 blog-img"><img src="<?php echo base_url().'uploads/'.$success_story->image_three; ?>" class="rounded img-fluid" alt=""></div>
                                        <div class="self-designation">
                                            <h4 class="side-bloger-name"><?php echo $success_story->title_three ?></h4>
                                            <p class="designation"><?php echo $success_story->designation_three ?>, <?php echo $success_story->location_three ?></p>
                                        </div>
                                        
                                    </div>
                                    <div class="coach-info">
                                        <?php 
                                            if(!empty($teams)){ 
                                                foreach($teams as $team){ 
                                                    if($team->team_id == $success_story->teamID_three) {echo "Coach ".$team->title;}
                                                } 
                                            } 
                                        ?>
                                    </div>
                                </div>
                                <div class="padtop-12">
                                    <!-- <h6 class="text-lg-start mb-0 blog-post"><strong>Off my medications within 6 months</strong></h6>   -->
                                    <div class="blog-post"><?php echo $success_story->description_three ?></div>
                                </div>
                            </div>
                            <div class="bg-white border-rounded-7 dark-grey-text info-box marbot-25">
                                <div class="d-sm-block d-lg-flex justify-content-between align-items-top">
                                    <div class="d-flex align-items-top">
                                        <div class="me-3 blog-img"><img src="<?php echo base_url().'uploads/'.$success_story->image_four; ?>" class="rounded img-fluid" alt=""></div>
                                        <div class="self-designation">
                                            <h4 class="side-bloger-name"><?php echo $success_story->title_four ?></h4>
                                            <p class="designation"><?php echo $success_story->designation_four ?>, <?php echo $success_story->location_four ?></p>
                                        </div>
                                    </div>
                                    <div class="coach-info">
                                        <?php 
                                            if(!empty($teams)){ 
                                                foreach($teams as $team){ 
                                                    if($team->team_id == $success_story->teamID_four) {echo "Coach ".$team->title;}
                                                } 
                                            } 
                                        ?>
                                    </div>
                                </div>
                                <div class="padtop-12">
                                    <!-- <h6 class="text-lg-start mb-0 blog-post"><strong>Habits are going to stay with me</strong></h6> -->
                                    <div class="blog-post"><?php echo $success_story->description_four ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
                <?php } } ?>      
                <!--main-page-container end-->
                <div class="next-prev d-flex justify-content-between pt-2 padbot-135">
                    <?php echo $this->pagination->create_links(); ?>
                    <!-- <div class="flex-end">  <a href="javascript:;" class="dark-grey-text text-decoration-none small-text"><i class="fal fa-angle-left pe-2"></i>Previous Page </a></div>
                    <div class="flex-end">  <a href="javascript:;" class="dark-grey-text text-decoration-none small-text"> Next Page <i class="fal fa-angle-right ps-2"></i></a></div> -->
                </div> 
            </div>
        </section>       
        <!-- ======= Body Container End ======= -->
<?php $this->load->view('fincludes/footer'); ?>
<?php $this->load->view('fincludes/header'); ?>
    <!-- ======= Body Container Start ======= -->
    <section class="bg-grey padtopbot-126">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="bg-white border-rounded-7">
                        <ul class="page-indicator mobile-dd">
                            <li><a href="<?php echo base_url() ?>fitness-recipe">Fitness Recipes</a></li>
                            <li><a href="<?php echo base_url() ?>exercise-video" class="active">Exercise Videos</a></li>
                            <li><a href="<?php echo base_url() ?>knowledge-library">Knowledge Library</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-3 section-spacer">
                    <div class="search-holder">
                        <form action="<?php echo base_url() ?>exercise-video" method="POST" id="searchList">
                            <div class="input-group">
                                <input class="form-control border-0" type="search" placeholder="<?=$exercise_video_details->title?>" name="searchText" value="<?php echo $searchText; ?>" id="example-search-input">
                                <span class="input-group-append">
                                    <button class="btn border-0">
                                        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_0_3494)">
                                                <path d="M6.04129 0C2.71205 0 0 2.71205 0 6.0413C0 9.37054 2.71243 12.0826 6.04129 12.0826C7.42701 12.0832 8.77034 11.6048 9.84375 10.7284L13.9315 14.8166C14.0491 14.9338 14.2083 14.9997 14.3743 14.9997C14.5402 14.9997 14.6994 14.9338 14.817 14.8166C14.875 14.7591 14.921 14.6906 14.9525 14.6152C14.9839 14.5398 15.0001 14.4589 15.0001 14.3772C15.0001 14.2955 14.9839 14.2147 14.9525 14.1392C14.921 14.0638 14.875 13.9954 14.817 13.9379L10.7288 9.8497C11.6058 8.77438 12.0841 7.42891 12.0826 6.0413C12.0826 2.71205 9.37053 0 6.04129 0ZM6.04129 1.25C6.98892 1.25 7.91527 1.531 8.70319 2.05748C9.49112 2.58395 10.1052 3.33225 10.4679 4.20775C10.8305 5.08324 10.9254 6.04661 10.7405 6.97603C10.5557 7.90545 10.0993 8.75918 9.42925 9.42925C8.75918 10.0993 7.90545 10.5557 6.97603 10.7405C6.04661 10.9254 5.08324 10.8305 4.20775 10.4679C3.33225 10.1052 2.58395 9.49112 2.05748 8.7032C1.531 7.91527 1.25 6.98892 1.25 6.0413C1.24873 5.41174 1.37179 4.78812 1.61212 4.20624C1.85245 3.62436 2.20533 3.09566 2.6505 2.6505C3.09566 2.20533 3.62436 1.85245 4.20624 1.61212C4.78812 1.37179 5.41174 1.24873 6.04129 1.25Z" fill="#1D1D1F"/>
                                            </g>
                                            <defs>
                                            <clipPath id="clip0_0_3494">
                                                <rect width="15" height="14.9996" fill="white"/>
                                            </clipPath>
                                            </defs>
                                        </svg>
                                    </button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-12 col-md-8 col-lg-9 section-spacer">
                    <div class="right-pan">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a></li>
                                <li class="breadcrumb-item">></li> 
                                <li class="breadcrumb-item"><a href="javascript:;">Explore</a> </li>
                                <li class="breadcrumb-item">></li> 
                                <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo base_url() ?>exercise-video">Exercise Videos</a></li>
                                <li class="breadcrumb-item">></li> 
                                <li class="breadcrumb-item active" aria-current="page"><?=$exercise_video_details->title?></li>
                            </ol>
                        </nav>
                    </div>
                </div> 
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-3 hide-mobile">
                    <div class="recepie-block sticky">
                        <div class="recepie-section">
                            <div class="title">Body part</div>
                            <div class="items">
                                <ul class="list-inline mb-0 item-block-multiple">
                                    <?php if(!empty($body_parts)){ $i=1; foreach($body_parts as $body_part){ 
                                        if($i==1) { $number = 'three'; }
                                        if($i==2) { $number = 'three'; }
                                        if($i==3) { $number = 'three'; }
                                        if($i==4) { $number = 'three'; }
                                        if($i==5) { $number = 'three'; }
                                        if($i==6) { $number = 'three'; }
                                        if($i==7) { $number = 'two'; }
                                        if($i==8) { $number = 'two'; }
                                        if($i==9) { $number = 'two'; }
                                        if($i==10) { $number = 'two'; }
                                    ?>
                                    <li class="item list-inline-item <?=$number?>"><a href="javascript:;"><?=$body_part->body_part_title?></a></li>
                                    <?php $i++; } } ?>
                                </ul>
                            </div>
                        </div>
                        <div class="recepie-section">
                            <div class="title">Equipment availability</div>
                            <div class="items">
                                <ul class="list-inline mb-0 item-block-multiple">
                                    <?php if(!empty($equipments)){ $i=1; foreach($equipments as $equipment){ 
                                        if($i==1) { $number = 'three'; }
                                        if($i==2) { $number = 'three'; }
                                        if($i==3) { $number = 'three'; }
                                        if($i==4) { $number = 'three'; }
                                        if($i==5) { $number = 'three'; }
                                        if($i==6) { $number = 'three'; }
                                        if($i==7) { $number = 'two'; }
                                        if($i==8) { $number = 'two'; }
                                    ?>
                                    <li class="item list-inline-item <?=$number?>"><a href="javascript:;"><?=$equipment->equipment_title?></a></li>
                                    <?php $i++; } } ?>
                                </ul>
                            </div>
                        </div>
                        <div class="recepie-section border-bottom-0 mb-0 pb-0">
                            <div class="title">Level</div>
                            <div class="items">
                                <ul class="list-inline mb-0 item-block-2">
                                    <?php if(!empty($levels)){ foreach($levels as $level){ ?>
                                    <li class="item list-inline-item"><a href="javascript:;"><?=$level->level_title?></a></li>
                                    <?php } } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-8 col-lg-9">
                <!--top part start-->
                    <div class="row">
                        <div class="col-sm-12 col-lg-12">
                            <div class="detail-block">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-4">
                                        <div class="details-top">
                                            <div class="pd-details border-bottom">
                                                <div class="pd-title-holder justify-content-between">
                                                    <div class="pd-title"><?=$exercise_video_details->title?></div>
                                                </div>
                                                <div class="border-bottom">
                                                    <div class="pd-details-info justify-content-between">
                                                        <div class="info-block">
                                                            <p>Muscle Group</p>
                                                            <p class="font-weight-300"><?=$exercise_video_details->body_part_title?></p>
                                                        </div>
                                                        <div class="info-block">
                                                            <p>Equipment</p>
                                                            <p class="font-weight-300"><?=$exercise_video_details->equipment_title?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="exercise-btn">
                                                    <ul>
                                                        <?php if($exercise_video_details->lvt){ $lvt = explode(",", $exercise_video_details->lvt); foreach($lvt as $lvt_data){
                                                            $curr_lvt_data = explode("-", $lvt_data);
                                                            $level_id = $curr_lvt_data[1];
                                                            $level_name = $curr_lvt_data[0];
                                                        ?>
                                                            <?php if($level_id == 1){ ?>
                                                            <li><a href="javascript::" class="light-sky"><?=$level_name?></a></li>
                                                            <?php } if($level_id == 2){ ?>
                                                            <li><a href="javascript::" class="deep-sky"><?=$level_name?></a></li>
                                                            <?php } if($level_id == 3){ ?>
                                                            <li><a href="javascript::" class="teal"><?=$level_name?></a></li>
                                                            <?php } if($level_id == 4){ ?>
                                                            <li><a href="javascript:;" class="navy-blue"><?=$level_name?></a></li>
                                                        <?php } } } ?>
                                                    </ul>  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-8">
                                        <div class="pd-details-imgholder">
                                            <iframe width="530" height="430" src="<?=$exercise_video_details->image?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="details-right-bottom">
                                            <ul class="list-group prepartation-text ">
                                                <?=$exercise_video_details->description?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--top part end-->
                    <div class="next-prev d-flex justify-content-between pt-2">
                        <!-- <div class="flex-end"><a href="javascript:;" class="dark-grey-text text-decoration-none small-text"><i class="fal fa-angle-left pe-2"></i>Previous Page </a></div>
                        <div class="flex-end"><a href="javascript:;" class="dark-grey-text text-decoration-none small-text"> Next Page <i class="fal fa-angle-right ps-2"></i></a></div> -->
                    </div>     
                </div>
            </div>
        </div>
    </section>
      <!-- ======= Body Container End ======= -->
<?php $this->load->view('fincludes/footer'); ?>

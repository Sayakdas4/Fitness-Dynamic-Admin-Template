<?php $this->load->view('fincludes/header'); ?>
    <!-- ======= Body Container Start ======= -->
    <section class="bg-grey padtopbot-126">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="bg-white border-rounded-7">
                        <ul class="page-indicator mobile-dd">
                            <li><a href="<?php echo base_url() ?>fitness-recipe">Fitness Recipes</a></li>
                            <li><a href="<?php echo base_url() ?>exercise-video">Exercise Videos</a></li>
                            <li><a href="<?php echo base_url() ?>knowledge-library" class="active">Knowledge Library</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-3 section-spacer">
                    <div class="search-holder">
                        <form action="<?php echo base_url() ?>knowledge-library" method="POST" id="searchList">
                            <div class="input-group">
                                <input class="form-control border-0" type="search" placeholder="<?=$knowledge_library_details->title?>" name="searchText" value="<?php echo $searchText; ?>" id="example-search-input">
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
                                <li class="breadcrumb-item" ><a href="<?php echo base_url() ?>knowledge-library">Blogs</a></li>
                                <li class="breadcrumb-item">></li>
                                <li class="breadcrumb-item active" aria-current="page"><?=$knowledge_library_details->title?></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-3 hide-mobile">
                    <div class="recepie-block sticky">
                        <div class="recepie-section">
                            <div class="title">Content preference</div>
                            <div class="items">
                                <ul class="list-inline mb-0 item-block-2">
                                    <?php if(!empty($content_preferences)){ foreach($content_preferences as $content_preference){ ?>
                                    <li class="item list-inline-item"><a href="javascript:;"><?=$content_preference->content_preference_title?></a></li>
                                    <?php } } ?>
                                </ul>
                            </div>
                        </div>
                        <div class="recepie-section border-bottom-0 mb-0 pb-0">
                            <div class="title">Categories</div>
                            <div class="items">
                                <ul class="list-inline mb-0 item-block-2">
                                    <?php if(!empty($categoriess)){ foreach($categoriess as $categories){ ?>
                                    <li class="item list-inline-item"><a href="javascript:;"><?=$categories->categories_title?></a></li>
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
                                    <div class="col-sm-12">
                                        <div class="details-top">
                                            <div class="kl-container">
                                                <div class="kl-carouser-container custom-round">
                                                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                                        <div class="carousel-inner">
                                                            <?php 
                                                                if(!empty($getknowledge_library_multi_fileInfo)){ 
                                                                $i=1; 
                                                                foreach($getknowledge_library_multi_fileInfo as $multi_file){ 
                                                                    if($i==1){$active = "active";} else{$active="";}
                                                                    if($multi_file->content_preference_imageID == 2){ 
                                                            ?>
                                                                <div class="carousel-item <?=$active?>">
                                                                    <img src="<?php echo assets_url(); ?>uploads/<?php echo $multi_file->image_files; ?>" class="d-block w-100" alt="...">
                                                                </div>
                                                            <?php } $i++; } } ?>
                                                            <?php if($knowledge_library_details->content_preference_id == 1){ ?>
                                                            <iframe width="530" height="430" src="<?=$knowledge_library_details->image?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                            <?php } ?>
                                                        </div>
                                                        <?php if($knowledge_library_details->content_preference_id == 2){ ?>
                                                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                            <span class="carousel-control-prev-icon" aria-hidden="true">
                                                                <svg width="37" height="37" viewBox="0 0 37 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <circle cx="18.1758" cy="18.1758" r="18.1757" transform="rotate(-180 18.1758 18.1758)" fill="#1D1D1F"/>
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M22.8199 27.1899C22.2125 27.7727 21.2278 27.7727 20.6205 27.1899L12.326 19.2308C11.7186 18.648 11.7186 17.7031 12.326 17.1203L20.6205 9.16127C21.2278 8.57848 22.2125 8.57848 22.8199 9.16127C23.4272 9.74406 23.4272 10.6889 22.8199 11.2717L15.6251 18.1756L22.8199 25.0794C23.4272 25.6622 23.4272 26.6071 22.8199 27.1899Z" fill="#F5F5F7"/>
                                                                </svg>
                                                            </span>
                                                            <span class="visually-hidden">Previous</span>
                                                        </button>
                                                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                            <span class="carousel-control-next-icon" aria-hidden="true">
                                                                <svg width="37" height="37" viewBox="0 0 37 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <circle cx="18.5273" cy="18.1757" r="18.1757" fill="#1D1D1F"/>
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M13.9106 9.16121C14.5179 8.57842 15.5027 8.57842 16.11 9.16121L24.4045 17.1203C25.0118 17.7031 25.0118 18.648 24.4045 19.2307L16.11 27.1898C15.5027 27.7726 14.5179 27.7726 13.9106 27.1898C13.3032 26.607 13.3032 25.6621 13.9106 25.0793L21.1054 18.1755L13.9106 11.2717C13.3032 10.6889 13.3032 9.744 13.9106 9.16121Z" fill="#F5F5F7"/>
                                                                </svg>
                                                            </span>
                                                            <span class="visually-hidden">Next</span>
                                                        </button>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <div class="carousel-title"><?=$knowledge_library_details->title?></div>
                                                <div class="vid-details">
                                                    <div class="details-one text-center">
                                                        <p class="font-weight-500">Content</p>
                                                        <p class="font-weight-300"><?=$knowledge_library_details->content_preference_title?></p>
                                                    </div>
                                                    <div class="details-two text-center">
                                                        <p class="font-weight-500">Time</p>
                                                        <p class="font-weight-300"><?=$knowledge_library_details->time?></p>
                                                    </div>
                                                    <div class="details-btns" style="display: none;">
                                                        <ul>
                                                            <?php if($knowledge_library_details->lvt){ $lvt = explode(",", $knowledge_library_details->lvt); foreach($lvt as $lvt_data){
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
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="details-right-bottom padbot-50 ">
                                            <div class="kl-container border-bottom-0">
                                                <?=$knowledge_library_details->description?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--top part end-->
                    <div class="next-prev d-flex justify-content-between pt-2">
                        <?php //echo $this->pagination->create_links(); ?>
                        <!-- <div class="flex-end"><a href="javascript:;" class="dark-grey-text text-decoration-none small-text"><i class="fal fa-angle-left pe-2"></i>Previous Page </a></div>
                        <div class="flex-end"><a href="javascript:;" class="dark-grey-text text-decoration-none small-text"> Next Page <i class="fal fa-angle-right ps-2"></i></a></div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ======= Body Container End ======= -->
<?php $this->load->view('fincludes/footer'); ?>

<?php $this->load->view('fincludes/header'); ?>
    <!-- ======= Body Container Start ======= -->
    <section class="bg-grey padtopbot-126">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="bg-white border-rounded-7">
                        <ul class="page-indicator mobile-dd">
                            <li><a href="<?php echo base_url() ?>fitness-recipe" class="active">Fitness Recipes</a></li>
                            <li><a href="<?php echo base_url() ?>exercise-video">Exercise Videos</a></li>
                            <li><a href="<?php echo base_url() ?>knowledge-library">Knowledge Library</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-3 section-spacer">
                    <div class="search-holder">
                        <form action="<?php echo base_url(); ?>fitness-recipe" method="POST" id="searchList">
                            <div class="input-group">
                                <input class="form-control border-0" type="search" placeholder="<?=$fitness_recipe_details->title?>" name="searchText" value="<?php echo $searchText; ?>" id="example-search-input">
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
                                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                                <li class="breadcrumb-item">></li> 
                                <li class="breadcrumb-item"><a href="javascript:;">Explore</a> </li>
                                <li class="breadcrumb-item">></li> 
                                <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo base_url() ?>fitness-recipe">Recipes</a></li>
                                <li class="breadcrumb-item">></li> 
                                <li class="breadcrumb-item active" aria-current="page"><?=$fitness_recipe_details->title?></li>
                            </ol>
                        </nav>
                    </div>
                </div> 
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-3 hide-mobile">
                  <div class="recepie-block sticky">
                        <div class="recepie-section">
                            <div class="title">Choose your preference</div>
                            <div class="items">
                                <ul class="d-flex list-inline mb-0 item-block-3">
                                    <?php if(!empty($preferences)){ $i=1; foreach($preferences as $preference){ 
                                        if($i==1) { $color = 'green'; }
                                        if($i==2) { $color = 'orange'; }
                                        if($i==3) { $color = 'purple-red'; }
                                    ?>
                                    <li class="item list-inline-item highlighted"><a href="javascript:;>" class="<?=$color?>"><?=$preference->preference_title?></a></li>
                                    <?php $i++; } } ?>
                                </ul>
                            </div>
                        </div>
                        <div class="recepie-section">
                            <div class="title">Recepie type</div>
                            <div class="items">
                                <ul class="list-inline mb-0 item-block-multiple">
                                    <?php if(!empty($recipe_types)){ $i=1; foreach($recipe_types as $recipe_type){ 
                                        if($i==1) { $number = 'three'; }
                                        if($i==2) { $number = 'three'; }
                                        if($i==3) { $number = 'three'; }
                                        if($i==4) { $number = 'two'; }
                                        if($i==5) { $number = 'two'; }
                                    ?>
                                    <li class="item list-inline-item <?=$number?>"><a href="javascript:;"><?=$recipe_type->recipe_type_title?></a></li>
                                    <?php $i++; } } ?>
                                </ul>
                            </div>
                        </div>
                        <div class="recepie-section">
                            <div class="title">Macro preference</div>
                            <div class="items">
                                <ul class="list-inline mb-0 item-block-2 ">
                                    <?php if(!empty($macro_preferences)){ foreach($macro_preferences as $macro_preference){ ?>
                                    <li class="item list-inline-item"><a href="javascript:;"><?=$macro_preference->macro_preference_title?></a></li>
                                    <?php } } ?>
                                </ul>
                            </div>
                        </div>
                        <div class="recepie-section border-bottom-0 mb-0 pb-0">
                            <div class="title">Simplicity factor</div>
                            <div class="items">
                                <ul class="list-inline mb-0 item-block-multiple">
                                    <?php if(!empty($simplicity_factors)){ $i=1; foreach($simplicity_factors as $simplicity_factor){ 
                                        if($i==1) { $number = 'two'; }
                                        if($i==2) { $number = 'two'; }
                                        if($i==3) { $number = 'one'; }
                                        if($i==4) { $number = 'one'; }
                                    ?>
                                    <li class="item list-inline-item <?=$number?>"><a href="javascript:;"><?=$simplicity_factor->simplicity_factor_title?></a></li>
                                    <?php $i++; } } ?>
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
                                                    <div class="pd-title"><?=$fitness_recipe_details->title?></div>
                                                    <div class="availity-icon">
                                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect x="1" y="1" width="18" height="18" rx="2" stroke="#24BA78" stroke-width="2"/>
                                                            <circle cx="10" cy="10" r="4" fill="#24BA78"/>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="border-bottom">
                                                    <div class="pd-details-info justify-content-between">
                                                        <div class="info-block">
                                                            <p>Total Time</p>
                                                            <p class="font-weight-300"><?=$fitness_recipe_details->total_time?></p>
                                                        </div>
                                                        <div class="info-block">
                                                            <p>Difficulty</p>
                                                            <p class="font-weight-300"><?=$fitness_recipe_details->difficulty?></p>
                                                        </div>
                                                    </div>
                                                    <div class="pd-details-info justify-content-between">
                                                        <div class="info-block">
                                                            <p>Makes</p>
                                                            <p class="font-weight-300"><?=$fitness_recipe_details->makes?></p>
                                                        </div>
                                                        <div class="info-block">
                                                            <p>Cuisine</p>
                                                            <p class="font-weight-300"><?=$fitness_recipe_details->cuisine?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="nutrition-info">
                                                    <div class="nutrition-title">Nutrition Info</div>
                                                    <div class="pd-details-info justify-content-between">
                                                        <div class="nutri-info-block">
                                                            <p>Calories</p>
                                                            <p class="font-weight-300"><?=$fitness_recipe_details->calories?></p>
                                                        </div>
                                                        <div class="nutri-info-block">
                                                            <p>Fats</p>
                                                            <p class="font-weight-300"><?=$fitness_recipe_details->fats?></p>
                                                        </div>
                                                    </div>
                                                    <div class="pd-details-info justify-content-between">
                                                        <div class="nutri-info-block">
                                                            <p>Carb</p>
                                                            <p class="font-weight-300"><?=$fitness_recipe_details->carb?></p>
                                                        </div>
                                                        <div class="nutri-info-block">
                                                            <p>Protein</p>
                                                            <p class="font-weight-300"><?=$fitness_recipe_details->protein?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-8">
                                        <div class="pd-details-imgholder">
                                           <img src="<?php echo base_url().'uploads/'.$fitness_recipe_details->image; ?>" alt="TFC" class="img-fluid" />
                                            <div class="small-btn ht-btn">
                                                <ul>
                                                    <?php if($fitness_recipe_details->mct){ $mct = explode(",", $fitness_recipe_details->mct); foreach($mct as $mct_data){
                                                        $curr_mct_data = explode("-", $mct_data);
                                                        $macro_preference_id = $curr_mct_data[1];
                                                        $macro_preference_name = $curr_mct_data[0];
                                                    ?>
                                                        <?php if($macro_preference_id == 1){ ?>
                                                        <li class="sky"><a href="javascript::"><?=$macro_preference_name?></a></li>
                                                        <?php } if($macro_preference_id == 2){ ?>
                                                        <li class="strawbery"><a href="javascript::"><?=$macro_preference_name?></a></li>
                                                        <?php } if($macro_preference_id == 3){ ?>
                                                        <li class="pink-violet"><a href="javascript::"><?=$macro_preference_name?></a></li>
                                                        <?php } if($macro_preference_id == 4){ ?>
                                                        <li class="brown"><a href="javascript:;"><?=$macro_preference_name?></a></li>
                                                        <?php } if($macro_preference_id == 5){ ?>
                                                        <li class="green-priority"><a href="javascript:;"><?=$macro_preference_name?></a></li>
                                                        <?php } if($macro_preference_id == 6){ ?>
                                                        <li class="yellow"><a href="javascript:;"><?=$macro_preference_name?></a></li>
                                                    <?php } } } ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-4">
                                        <div class="details-bottom">
                                            <div class="bottom-title">Ingredients</div>
                                            <ul class="list-group ingredients-text">
                                                <?=$fitness_recipe_details->ingredients?>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-8">
                                        <div class="details-right-bottom border-bottom">
                                            <div class="bottom-title">Preparation</div>
                                            <ul class="list-group prepartation-text-number">
                                                <?=$fitness_recipe_details->preparations?>
                                            </ul>
                                        </div>
                                        <div class="tip-text">
                                            <div class="tip-title">
                                                <span>
                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_0_3988)">
                                                        <path d="M9.38919 4.73684C6.96814 5.01052 4.9907 6.94737 4.69446 9.36843C4.57549 10.3484 4.72865 11.3422 5.13714 12.2409C5.54563 13.1396 6.19369 13.9084 7.01025 14.4632C7.21729 14.5972 7.38743 14.7809 7.50512 14.9977C7.62281 15.2144 7.68429 15.4572 7.68393 15.7038V16.1474H12.2523V15.7263C12.2523 15.2421 12.4839 14.7579 12.905 14.4857C13.6462 14.0009 14.2541 13.3382 14.6733 12.5581C15.0926 11.7779 15.3097 10.9052 15.305 10.0196C15.326 6.88271 12.6102 4.37744 9.38919 4.73534V4.73684Z" fill="#FF9529"/>
                                                        <path d="M7.70703 18.4842C7.70758 18.5766 7.72849 18.6678 7.76825 18.7512C7.80801 18.8346 7.86567 18.9083 7.93711 18.9669L8.58974 19.5143C8.70328 19.606 8.84384 19.6578 8.98974 19.6617H11.0108C11.0839 19.6646 11.1568 19.6531 11.2255 19.6279C11.2941 19.6026 11.3571 19.564 11.4108 19.5143L12.0634 18.9669C12.1349 18.9083 12.1925 18.8346 12.2323 18.7512C12.272 18.6678 12.2929 18.5766 12.2935 18.4842V17.3053H7.70703V18.4842Z" fill="#FF9529"/>
                                                        <path d="M10.0003 3.09474C10.1731 3.09385 10.3386 3.0248 10.4608 2.9026C10.583 2.7804 10.652 2.61492 10.6529 2.44211V0.652632C10.6529 0.479543 10.5842 0.313543 10.4618 0.191151C10.3394 0.0687592 10.1734 0 10.0003 0C9.8272 0 9.6612 0.0687592 9.53881 0.191151C9.41642 0.313543 9.34766 0.479543 9.34766 0.652632V2.41955C9.34766 2.8015 9.62134 3.09474 10.0003 3.09474Z" fill="#FF9529"/>
                                                        <path d="M5.64166 3.78947C5.69853 3.89066 5.78096 3.97516 5.8807 4.03453C5.98045 4.0939 6.09402 4.12607 6.21008 4.12782C6.31535 4.12782 6.44166 4.10677 6.52587 4.04361C6.84166 3.85564 6.94693 3.45414 6.75745 3.1594L5.87324 1.62105C5.68527 1.30564 5.28377 1.2 4.98903 1.38947C4.67324 1.57744 4.56797 1.97895 4.75745 2.27368L5.64166 3.78947Z" fill="#FF9529"/>
                                                        <path d="M1.57942 5.91578L3.11626 6.79999C3.21158 6.85704 3.32099 6.88621 3.43205 6.8842C3.54812 6.88245 3.66169 6.85028 3.76143 6.79091C3.86118 6.73154 3.9436 6.64704 4.00047 6.54585C4.04344 6.47262 4.07153 6.39163 4.08314 6.30752C4.09475 6.22341 4.08966 6.13784 4.06814 6.0557C4.04663 5.97357 4.00913 5.89648 3.95778 5.82886C3.90643 5.76125 3.84224 5.70442 3.76889 5.66165L2.23205 4.77895C2.15882 4.73598 2.07783 4.70789 1.99372 4.69628C1.90961 4.68467 1.82403 4.68976 1.7419 4.71128C1.65976 4.73279 1.58268 4.77029 1.51506 4.82164C1.44744 4.87299 1.39062 4.93718 1.34784 5.01052C1.30303 5.08501 1.27346 5.16766 1.26085 5.25368C1.24824 5.33969 1.25284 5.42735 1.27438 5.51157C1.29593 5.59578 1.33399 5.67488 1.38635 5.74427C1.43872 5.81366 1.50434 5.87196 1.57942 5.91578Z" fill="#FF9529"/>
                                                        <path d="M3.07413 10.0195C3.07324 9.84673 3.0042 9.68125 2.882 9.55905C2.7598 9.43685 2.59432 9.36781 2.4215 9.36692H0.654585C0.481496 9.36692 0.315497 9.43568 0.193104 9.55807C0.0707123 9.68046 0.00195312 9.84645 0.00195312 10.0195C0.00195312 10.1926 0.0707123 10.3586 0.193104 10.481C0.315497 10.6034 0.481496 10.6722 0.654585 10.6722H2.4215C2.50758 10.6735 2.59307 10.6576 2.67287 10.6253C2.75267 10.593 2.82516 10.5449 2.88604 10.4841C2.94691 10.4232 2.99494 10.3507 3.02725 10.2709C3.05956 10.1911 3.0755 10.1056 3.07413 10.0195Z" fill="#FF9529"/>
                                                        <path d="M3.11571 13.2421L1.57887 14.1263C1.26308 14.3143 1.15782 14.7158 1.34729 15.0105C1.40417 15.1117 1.48659 15.1962 1.58633 15.2556C1.68608 15.315 1.79965 15.3471 1.91571 15.3489C2.02098 15.3489 2.14729 15.3278 2.2315 15.2647L3.76834 14.3805C4.08413 14.1925 4.1894 13.791 3.99992 13.4962C3.96192 13.4183 3.90793 13.3492 3.84147 13.2934C3.775 13.2377 3.69755 13.1966 3.61415 13.1728C3.53075 13.1489 3.44327 13.1429 3.35739 13.1551C3.27152 13.1673 3.18917 13.1975 3.11571 13.2436V13.2421Z" fill="#FF9529"/>
                                                        <path d="M18.4206 14.1053L16.8838 13.2211C16.7358 13.1345 16.5595 13.1103 16.3937 13.1537C16.2279 13.1971 16.0861 13.3047 15.9996 13.4526C15.913 13.6006 15.8888 13.7769 15.9322 13.9427C15.9757 14.1085 16.0832 14.2503 16.2311 14.3368L17.768 15.2211C17.8633 15.2781 17.9727 15.3073 18.0838 15.3053C18.1998 15.3035 18.3134 15.2713 18.4131 15.212C18.5129 15.1526 18.5953 15.0681 18.6522 14.9669C18.8402 14.6932 18.7364 14.2932 18.4206 14.1023V14.1053Z" fill="#FF9529"/>
                                                        <path d="M19.3473 9.34737H17.5804C17.4073 9.34737 17.2413 9.41612 17.1189 9.53852C16.9965 9.66091 16.9277 9.8269 16.9277 9.99999C16.9277 10.1731 16.9965 10.3391 17.1189 10.4615C17.2413 10.5839 17.4073 10.6526 17.5804 10.6526H19.3473C19.5204 10.6526 19.6864 10.5839 19.8088 10.4615C19.9312 10.3391 19.9999 10.1731 19.9999 9.99999C19.9999 9.8269 19.9312 9.66091 19.8088 9.53852C19.6864 9.41612 19.5204 9.34737 19.3473 9.34737Z" fill="#FF9529"/>
                                                        <path d="M16.5475 6.86164C16.6528 6.86164 16.7791 6.84059 16.8633 6.77743L18.4002 5.89323C18.716 5.70526 18.8212 5.30376 18.6318 5.00902C18.4438 4.69323 18.0423 4.58797 17.7475 4.77744L16.2107 5.66315C15.8949 5.85112 15.7897 6.25262 15.9791 6.54736C16.0373 6.64575 16.1206 6.72687 16.2205 6.78237C16.3204 6.83787 16.4333 6.86575 16.5475 6.86315V6.86164Z" fill="#FF9529"/>
                                                        <path d="M13.4525 4.02105C13.5478 4.0781 13.6572 4.10728 13.7683 4.10526C13.8843 4.10351 13.9979 4.07135 14.0976 4.01198C14.1974 3.95261 14.2798 3.86811 14.3367 3.76692L15.2209 2.23008C15.2639 2.15684 15.2919 2.07585 15.3036 1.99174C15.3152 1.90763 15.3101 1.82206 15.2886 1.73992C15.267 1.65779 15.2295 1.5807 15.1782 1.51308C15.1268 1.44546 15.0627 1.38864 14.9893 1.34587C14.9167 1.30045 14.8356 1.27036 14.751 1.25744C14.6664 1.24452 14.58 1.24904 14.4972 1.27073C14.4144 1.29242 14.3369 1.33082 14.2695 1.38357C14.202 1.43631 14.1461 1.50229 14.1051 1.57744L13.2209 3.11429C13.1761 3.18878 13.1465 3.27143 13.1339 3.35744C13.1213 3.44345 13.1259 3.53111 13.1474 3.61533C13.169 3.69955 13.207 3.77865 13.2594 3.84804C13.3118 3.91743 13.3774 3.97573 13.4525 4.01955V4.02105Z" fill="#FF9529"/>
                                                        </g>
                                                        <defs>
                                                        <clipPath id="clip0_0_3988">
                                                        <rect width="20" height="19.6632" fill="white"/>
                                                        </clipPath>
                                                        </defs>
                                                    </svg>
                                                </span>
                                                Pro Tip
                                            </div>
                                            <p><?=$fitness_recipe_details->pro_tip?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
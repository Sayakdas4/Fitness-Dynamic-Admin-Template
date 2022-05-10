<?php $this->load->view('fincludes/header'); ?>
    <!-- ======= Body Container Start ======= -->
    <section class="bg-grey padtopbot-126 mobile-padtopbot-75">
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
                                <input class="form-control border-0" type="search" placeholder="Search" name="searchText" value="<?php echo $searchText; ?>" id="example-search-input">
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
                        <div class="row">
                            <div class="col-sm-9">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                                        <li class="breadcrumb-item">></li> 
                                        <li class="breadcrumb-item"><a href="javascript:;">Explore</a> </li>
                                        <li class="breadcrumb-item">></li> 
                                        <li class="breadcrumb-item active" aria-current="page">Recipes</li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="col-sm-3">
                                <div class="next-prev d-flex justify-content-between pt-2">
                                    <?php echo $this->pagination->create_links(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
            
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-3 hide-mobile">
                  <div class="recepie-block sticky">
                        <div class="recepie-section">
                            <div class="title">Choose your preference</div>
                            <div class="items">
                                <ul class="d-flex list-inline mb-0 item-block-3 ul_preference">
                                    <?php if(!empty($preferences)){ $i=1; foreach($preferences as $preference){ 
                                        if($i==1) { $color = 'green'; }
                                        if($i==2) { $color = 'orange'; }
                                        if($i==3) { $color = 'purple-red'; }
                                    ?>
                                    <li class="item list-inline-item highlighted <?=$color?>"><a href="javascript:;" data-preference="<?=$preference->preference_id?>" class="<?=$color?> preference_active"><?=$preference->preference_title?></a></li>
                                    <?php $i++; } } ?>
                                </ul>
                                <!-- <input type="hidden" id="hidden_preference"> -->
                            </div>
                        </div>
                        <div class="recepie-section">
                            <div class="title">Recipe type</div>
                            <div class="items">
                                <ul class="list-inline mb-0 item-block-multiple ul_recipe_type">
                                    <?php if(!empty($recipe_types)){ $i=1; foreach($recipe_types as $recipe_type){ 
                                        if($i==1) { $number = 'three'; }
                                        if($i==2) { $number = 'three'; }
                                        if($i==3) { $number = 'three'; }
                                        if($i==4) { $number = 'two'; }
                                        if($i==5) { $number = 'two'; }
                                    ?>
                                    <li class="item list-inline-item <?=$number?>"><a href="javascript:;" data-recipe-type="<?=$recipe_type->recipe_type_id?>" class="recipe_type_active"><?=$recipe_type->recipe_type_title?></a></li>
                                    <?php $i++; } } ?>
                                </ul>
                            </div>
                        </div>
                        <div class="recepie-section">
                            <div class="title">Macro preference</div>
                            <div class="items">
                                <ul class="list-inline mb-0 item-block-2 ul_macro_preference">
                                    <?php if(!empty($macro_preferences)){ foreach($macro_preferences as $macro_preference){ ?>
                                    <li class="item list-inline-item">
                                        <!-- <a href="javascript:;" data-macro-preference="<?=$macro_preference->macro_preference_id?>" class="macro_preference_active"> -->
                                        <article class="feature1">
                                            <input type="checkbox" class="input filter_macroID" name="filter_macroID[]" id="filter_macroID" value="<?=$macro_preference->macro_preference_id?>">
                                            <div><span><?=$macro_preference->macro_preference_title?></span></div>
                                        </article>
                                        <!-- </a> -->
                                    </li>
                                    <?php } } ?>
                                </ul>
                                <!-- <input type="hidden" id="hidden_macro_preference"> -->
                            </div>
                        </div>
                        <div class="recepie-section border-bottom-0 mb-0 pb-0">
                            <div class="title">Simplicity factor</div>
                            <div class="items">
                                <ul class="list-inline mb-0 item-block-multiple ul_simplicity">
                                    <?php if(!empty($simplicity_factors)){ $i=1; foreach($simplicity_factors as $simplicity_factor){ 
                                        if($i==1) { $number = 'two'; }
                                        if($i==2) { $number = 'two'; }
                                        if($i==3) { $number = 'one'; }
                                        if($i==4) { $number = 'one'; }
                                    ?>
                                    <li class="item list-inline-item <?=$number?>">
                                        <article class="feature1">
                                            <input type="checkbox" class="input filter_simplicityID" name="filter_simplicityID[]" id="filter_simplicityID" value="<?=$simplicity_factor->simplicity_factor_id?>">
                                            <div><span><?=$simplicity_factor->simplicity_factor_title?></span></div>
                                        </article>
                                        <!-- <a href="javascript:;" data-simplicity="<?=$simplicity_factor->simplicity_factor_id?>" class="simplicity_active"><?=$simplicity_factor->simplicity_factor_title?></a> -->
                                    </li>
                                    <?php $i++; } } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-8 col-lg-9">
                    <div class="row" id="fitness_recipe">
                        <?php if(!empty($fitness_recipes)){ foreach($fitness_recipes as $fitness_recipe){ ?>    
                        <div class="col-sm-12 col-md-4">
                            <div class="recepie-item-block">
                                <div class="recepie-content">
                                    <div class="recepie-img-holder">
                                        <a href="<?php echo base_url().'fitness-recipe-details/'.$fitness_recipe->fitness_recipe_id; ?>"><img src="<?php echo base_url().'uploads/'.$fitness_recipe->image; ?>" class="img-fluid" alt=""></a>
                                    </div>
                                    <div class="recepie-details matchheight">
                                        <div class="items-group justify-content-between">
                                            <div class="items-group-name"><?=$fitness_recipe->recipe_type_title?></div>
                                            <div class="items-availability">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <?php if($fitness_recipe->preferenceID == 1){ ?>
                                                    <rect x="1" y="1" width="18" height="18" rx="2" stroke="#24BA78" stroke-width="2"/>
                                                    <circle cx="10" cy="10" r="4" fill="#24BA78"/>
                                                    <?php } if($fitness_recipe->preferenceID == 2){ ?>
                                                    <rect x="1" y="1" width="18" height="18" rx="2" stroke="#FF9529" stroke-width="2"/>
                                                    <circle cx="10" cy="10" r="4" fill="#FF9529"/>
                                                    <?php } if($fitness_recipe->preferenceID == 3){ ?>
                                                    <rect x="1" y="1" width="18" height="18" rx="2" stroke="#E11D1D" stroke-width="2"/>
                                                    <circle cx="10" cy="10" r="4" fill="#E11D1D"/>
                                                    <?php } ?>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="item-name" title="<?php echo $fitness_recipe->title; ?>"><a class="dot-link dot-one-line text-black" href="<?php echo base_url().'fitness-recipe-details/'.$fitness_recipe->fitness_recipe_id; ?>"><?php echo $fitness_recipe->title; ?></a></div>
                                        <div class="timings">
                                            <span><?=$fitness_recipe->total_time?></span>
                                            <span class="bullet-space">
                                                <svg width="5" height="5" viewBox="0 0 5 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="2.5" cy="2.5" r="2.5" fill="#1D1D1F"/>
                                                </svg>
                                            </span>
                                            <span><?=$fitness_recipe->difficulty?></span>
                                        </div>
                                        <div class="code-btn">
                                            <span><a href="javascript::">P <?=$fitness_recipe->protein?></a></span>
                                            <span><a href="javascript::">C <?=$fitness_recipe->carb?></a></span>
                                            <span><a href="javascript::">F <?=$fitness_recipe->fats?></a></span>
                                            <span><a href="javascript::">Kcal <?=$fitness_recipe->calories?></a></span>
                                        </div>
                                        <div class="small-btn">
                                            <ul>
                                                <?php if($fitness_recipe->mct){ $mct = explode(",", $fitness_recipe->mct); foreach($mct as $mct_data){
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
                        </div>
                        <?php } } ?>
                    </div>
                    <!-- <div class="next-prev d-flex justify-content-between pt-2">
                        <?php //echo $this->pagination->create_links(); ?>
                    </div> -->
                </div>
            </div>
        </div>
    </section>
    <!-- ======= Body Container End ======= -->
<?php $this->load->view('fincludes/footer'); ?>

<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();            
            var link = jQuery(this).get(0).href;            
            var value = link.substring(link.lastIndexOf('/') + 1);
            jQuery("#searchList").attr("action", "<?php echo base_url(); ?>" + "fitness-recipe/" + value);
            jQuery("#searchList").submit();
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.preference_active').click(function() {
            $(this).toggleClass("active");
            $(this).attr("data-preference");
            // alert($(".ul_preference").find(".active").attr("data-preference"));
            // $("#hidden_preference").val($(this).attr("data-preference"));
            filter_fitness_recipe();
        });

        $('.recipe_type_active').click(function() {
            $(this).toggleClass("active");
            $(this).attr("data-recipe-type");
            filter_fitness_recipe();
        });

        // $('.simplicity_active').click(function() {
        //     $(this).toggleClass("active");
        //     $(this).attr("data-simplicity");
        //     filter_fitness_recipe();
        // });

        $('.filter_macroID').click(function(){
            var filter_macroID = new Array();
            $("input:checked").each(function() {
                filter_macroID.push($(this).val());
            });
            filter_fitness_recipe(JSON.stringify(filter_macroID));
        });

        $('.filter_simplicityID').click(function(){
            var filter_simplicityID = new Array();
            $("input:checked").each(function() {
                filter_simplicityID.push($(this).val());
            });
            filter_fitness_recipe(JSON.stringify(filter_simplicityID));
        });
    });

    function filter_fitness_recipe(filter_macroID = null, filter_simplicityID = null)
    {
        // var preferenceID = $("#hidden_preference").val();
        var preferenceID = $(".ul_preference").find(".active").attr("data-preference");
        var recipe_typeID = $(".ul_recipe_type").find(".active").attr("data-recipe-type");
        // var simplicityID = $(".ul_simplicity").find(".active").attr("data-simplicity");
        $.ajax({
           type: 'POST',
           url: '<?php echo base_url().'home/fitness_recipe_ajax'?>',
           data: {'preferenceID':preferenceID, 'recipe_typeID':recipe_typeID, 'filter_macroID':filter_macroID, 'filter_simplicityID':filter_simplicityID},
           // dataType: "JSON",
           success: function(response) {
                $("#fitness_recipe").html(response);
            }
        });
    }
</script>

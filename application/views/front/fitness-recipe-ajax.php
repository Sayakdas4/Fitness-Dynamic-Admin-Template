
<!-- <div class="row" id="fitness_recipe"> -->
    <?php if(!empty($fitness_recipes)){ foreach($fitness_recipes as $fitness_recipe){ ?>    
    <div class="col-sm-12 col-md-4">
        <div class="recepie-item-block">
            <div class="recepie-content">
                <div class="recepie-img-holder">
                    <a href="<?php echo base_url().'fitness-recipe-details/'.$fitness_recipe->fitness_recipe_id; ?>"><img src="<?php echo base_url().'uploads/'.$fitness_recipe->image; ?>" class="img-fluid" alt=""></a>
                </div>
                <div class="recepie-details">
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
<!-- </div> -->
                    
<?php if(!empty($knowledge_librarys)){ foreach($knowledge_librarys as $knowledge_library){ ?> 
<div class="col-sm-12 col-md-4">
    <div class="recepie-item-block">
        <div class="recepie-content">
            <div class="recepie-img-holder">
                <?php if($knowledge_library->content_preference_id == 2){ ?>
                <a style="color: #000000;" href="<?php echo base_url().'knowledge-library-details/'.$knowledge_library->knowledge_library_id; ?>"><img src="<?php echo assets_url(); ?>uploads/<?php echo $knowledge_library->image_files; ?>" class="d-block w-100" alt="..."></a>
                <?php } if($knowledge_library->content_preference_id == 1){ ?>
                <iframe width="230" height="180" src="<?=$knowledge_library->image?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <?php } ?>
            </div>
            <div class="recepie-details">
                <div class="timings padbot-7">
                    <span><?=$knowledge_library->content_preference_title?></span>
                    <span class="bullet-space">
                        <svg width="5" height="5" viewBox="0 0 5 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="2.5" cy="2.5" r="2.5" fill="#1D1D1F"/>
                        </svg>
                    </span>
                    <span><?=$knowledge_library->time?></span>
                </div>
                <div class="item-name" title="<?php echo $knowledge_library->title; ?>"><a class="dot-link dot-two-line text-black matchheight" href="<?php echo base_url().'knowledge-library-details/'.$knowledge_library->knowledge_library_id; ?>"><?php echo $knowledge_library->title; ?></a></div>
                <div class="priority-btn">
                    <ul>
                        <?php if($knowledge_library->cat){ $cat = explode(",", $knowledge_library->cat); foreach($cat as $cat_data){
                            $curr_cat_data = explode("-", $cat_data);
                            $categories_id = $curr_cat_data[1];
                            $categories_name = $curr_cat_data[0];
                        ?>
                            <?php if($categories_id == 1){ ?>
                            <li class="green-priority"><a href="javascript::"><?=$categories_name?></a></li>
                            <?php } if($categories_id == 2){ ?>
                            <li class="blue-priority"><a href="javascript::"><?=$categories_name?></a></li>
                            <?php } if($categories_id == 3){ ?>
                            <li class="brown"><a href="javascript::"><?=$categories_name?></a></li>
                            <?php } if($categories_id == 4){ ?>
                            <li class="yellow"><a href="javascript:;"><?=$categories_name?></a></li>
                            <?php } if($categories_id == 5){ ?>
                            <li class="strawbery"><a href="javascript:;"><?=$categories_name?></a></li>
                            <?php } if($categories_id == 6){ ?>
                            <li class="red-priority"><a href="javascript:;"><?=$categories_name?></a></li>
                        <?php } } } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } } ?>
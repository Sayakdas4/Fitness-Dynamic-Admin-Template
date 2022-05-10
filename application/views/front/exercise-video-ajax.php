<?php if(!empty($exercise_videos)){ foreach($exercise_videos as $exercise_video){ ?> 
<div class="col-sm-12 col-md-4">
    <a style="color: #000000;" href="<?php echo base_url().'exercise-video-details/'.$exercise_video->exercise_video_id; ?>">
        <div class="recepie-item-block">
            <div class="recepie-content">
                <div class="recepie-img-holder">
                    <iframe width="230" height="180" src="<?=$exercise_video->image?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="recepie-details">
                    <div class="timings padbot-7">
                        <span><?=$exercise_video->body_part_title?></span>
                        <span class="bullet-space">
                            <svg width="5" height="5" viewBox="0 0 5 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="2.5" cy="2.5" r="2.5" fill="#1D1D1F"/>
                            </svg>
                        </span>
                        <span><?=$exercise_video->equipment_title?></span>
                    </div>
                    <div class="item-name" title="<?php echo $exercise_video->title; ?>"><span class="dot-link dot-one-line text-black"><?php echo $exercise_video->title; ?></span></div>
                </div> 
            </div>
        </div>
    </a>
</div>
<?php } } ?>
<?php
$success_stories_id = $success_storiesInfo->success_stories_id;

$image_one = $success_storiesInfo->image_one;
$description_one = $success_storiesInfo->description_one;
$title_one = $success_storiesInfo->title_one;
$age_one = $success_storiesInfo->age_one;
$lkd_one = $success_storiesInfo->lkd_one;
$teamID_one = $success_storiesInfo->teamID_one;

$image_two = $success_storiesInfo->image_two;
$title_two = $success_storiesInfo->title_two;
$designation_two = $success_storiesInfo->designation_two;
$location_two = $success_storiesInfo->location_two;
$rating_two = $success_storiesInfo->rating_two;
$description_two = $success_storiesInfo->description_two;
$teamID_two = $success_storiesInfo->teamID_two;

$image_three = $success_storiesInfo->image_three;
$title_three = $success_storiesInfo->title_three;
$designation_three = $success_storiesInfo->designation_three;
$location_three = $success_storiesInfo->location_three;
$teamID_three = $success_storiesInfo->teamID_three;
$description_three = $success_storiesInfo->description_three;

$image_four = $success_storiesInfo->image_four;
$title_four = $success_storiesInfo->title_four;
$designation_four = $success_storiesInfo->designation_four  ;
$location_four = $success_storiesInfo->location_four;
$teamID_four = $success_storiesInfo->teamID_four;
$description_four = $success_storiesInfo->description_four;
?>

<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Success Stories
    </h2>
    <div class="row">
        <?php 
            $this->load->helper('form');
            $error = $this->session->flashdata('error');
            if($error) {
        ?>
        <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-6 text-white"> <?php echo $this->session->flashdata('error'); ?> <i data-feather="x" class="w-4 h-4 ml-auto"></i> </div>
        <?php } ?>
        <?php 
            $success = $this->session->flashdata('success');
            if($success) { 
        ?>  
        <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-9 text-white"> <?php echo $this->session->flashdata('success'); ?> <i data-feather="x" class="w-4 h-4 ml-auto"></i> </div>
        <?php } ?>
        
        <div class="row">
            <div class="col-md-12">
                <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
            </div>
        </div>
    </div>
</div>
<div class="grid grid-cols-2 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-6">
        <!-- BEGIN: Form Validation -->
        <div class="intro-y box">
            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                <h2 class="font-medium text-base mr-auto">
                    Enter Detils
                </h2>
            </div>
            <div class="p-5" id="form-validation">
                <div class="preview">
                    <?php $this->load->helper("form"); ?>
                    <form role="form" class="validate-form" id="success_stories" enctype='multipart/form-data' action="<?php echo base_url() ?>editsuccess_storiesConfig" method="post">

                        <br>
                        <label for="multi_image" class="flex flex-col sm:flex-row"> <b>Block 1</b> </label>
                        <div class="grid grid-cols-2 gap-2">
                            <div class="input-form mt-3">
                                <label for="multi_image" class="flex flex-col sm:flex-row"> Image <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600"></span> </label>
                                <!-- <div action="<?php //echo base_url(); ?>uploads" class="dropzone border-gray-200 border-dashed">
                                    <div class="fallback"> 
                                        <input type="file" name="image_one" id="image_one" value="<?php //echo $image_one; ?>" class="input w-full border mt-2" >
                                    </div>
                                    <div class="dz-message" data-dz-message>
                                        <div class="text-lg font-medium">Drop files here or click to upload.</div>
                                        <div class="text-gray-600"> This is just a demo dropzone. Selected files are <span class="font-medium">not</span> actually uploaded. </div>
                                    </div>
                                </div> -->
                                <input type="file" name="image_one" id="image_one" value="<?php echo $image_one; ?>" class="input w-full border mt-2" >
                                <input type="hidden" value="<?php echo $success_stories_id; ?>" name="success_stories_id" id="success_stories_id" />
                                <?php if($image_one != NULL){ ?>
                                    <img alt="Image" data-action="zoom" class="" src="<?php echo assets_url(); ?>uploads/<?php echo $image_one; ?>" width="100" height="100">
                                <?php } else { ?>
                                    <img alt="Image" data-action="zoom" class="" src="<?php echo assets_url(); ?>assets/images/img/image.png" width="100" height="100">
                                <?php } ?>
                            </div>
                            <div class="input-form mt-3">
                                <label for="description_one" class="flex flex-col sm:flex-row"> Description <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600"></span> </label>
                                <textarea class="input w-full border mt-2 editor" id="description_one" value="" name="description_one" placeholder="Type your text here" ><?php echo $description_one; ?></textarea>
                            </div>
                        </div>
                        <div class="grid grid-cols-0 gap-2">
                            <div class="input-form mt-3">
                                <label for="teamID_one" class="flex flex-col sm:flex-row"> Trainner <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600"></span> </label>
                                <select name="teamID_one" id="teamID_one" value="<?php echo $teamID_one; ?>" class="input tail-select w-full border col-span-4 " placeholder="John Legend"  selected> 
                                    <option value="" selected>Select Title</option>
                                    <?php if(!empty($teams)){ foreach($teams as $team){ ?>
                                        <option value="<?=$team->team_id?>" <?php if($team->team_id == $teamID_one) {echo "selected=selected";} ?>><?=$team->title?></option>
                                    <?php } } ?>
                                </select> 
                            </div>
                        </div>
                        <div class="grid grid-cols-3 gap-2">
                            <div class="input-form mt-3">
                                <label for="title_one" class="flex flex-col sm:flex-row"> Name <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600"></span> </label>
                                <input type="text" name="title_one" id="title_one" value="<?php echo $title_one; ?>" class="input w-full border col-span-4 " placeholder="John Legend" >
                            </div>
                            <div class="input-form mt-3">
                                <label for="age_one" class="flex flex-col sm:flex-row"> Age <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600"></span> </label>
                                <input type="text" name="age_one" id="age_one" value="<?php echo $age_one; ?>" class="input w-full border mt-2">
                            </div>
                            <div class="input-form mt-3">
                                <label for="lkd_one" class="flex flex-col sm:flex-row"> Lost Kgs Duration <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600"></span> </label>
                                <input type="text" name="lkd_one" id="lkd_one" value="<?php echo $lkd_one; ?>" class="input w-full border mt-2">
                            </div>
                        </div>

                        <br>
                        <label for="multi_image" class="flex flex-col sm:flex-row"> <b>Block 2</b> </label>

                        <div class="grid grid-cols-2 gap-2">
                            <div class="input-form mt-3">
                                <label for="multi_image" class="flex flex-col sm:flex-row"> Image <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600"></span> </label>
                                <input type="file" name="image_two" id="image_two" value="<?php echo $image_two; ?>" class="input w-full border mt-2" >
                                <?php if($image_two != NULL){ ?>
                                    <img alt="Image" data-action="zoom" class="" src="<?php echo assets_url(); ?>uploads/<?php echo $image_two; ?>" width="100" height="100">
                                <?php } else { ?>
                                    <img alt="Image" data-action="zoom" class="" src="<?php echo assets_url(); ?>assets/images/img/image.png" width="100" height="100">
                                <?php } ?>
                            </div>
                            <div class="input-form mt-3">
                                <label for="title_two" class="flex flex-col sm:flex-row"> Name <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600"></span> </label>
                                <input type="text" name="title_two" id="title_two" value="<?php echo $title_two; ?>" class="input w-full border col-span-4 " placeholder="John Legend" >
                            </div>
                        </div>
                        <div class="grid grid-cols-3 gap-2">
                            <div class="input-form mt-3">
                                <label for="designation_two" class="flex flex-col sm:flex-row"> Designation <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600"></span> </label>
                                <input type="text" name="designation_two" id="designation_two" value="<?php echo $designation_two; ?>" class="input w-full border mt-2" >
                            </div>
                            <div class="input-form mt-3">
                                <label for="location_two" class="flex flex-col sm:flex-row"> Location <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600"></span> </label>
                                <input type="text" name="location_two" id="location_two" value="<?php echo $location_two; ?>" class="input w-full border mt-2" >
                            </div>
                            <div class="input-form mt-3">
                                <label for="rating_two" class="flex flex-col sm:flex-row"> Rating <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600"></span> </label>
                                 <div class="flex flex-col sm:flex-row mt-2">
                                    <div class="flex items-center text-gray-700 dark:text-gray-500 mr-2"> 
                                        <input type="radio" name="rating_two" id="rating_two" class="input border mr-2" value="1" <?php echo ($rating_two=='1')?'checked':'' ?>> 
                                        <label class="cursor-pointer select-none" for="horizontal-radio-chris-evans">1</label> 
                                    </div>
                                    <div class="flex items-center text-gray-700 dark:text-gray-500 mr-2 mt-2 sm:mt-0"> 
                                        <input type="radio" name="rating_two" id="rating_two" class="input border mr-2" value="2" <?php echo ($rating_two=='2')?'checked':'' ?>> 
                                        <label class="cursor-pointer select-none" for="horizontal-radio-liam-neeson">2</label> 
                                    </div>
                                    <div class="flex items-center text-gray-700 dark:text-gray-500 mr-2 mt-2 sm:mt-0"> 
                                        <input type="radio" name="rating_two" id="rating_two" class="input border mr-2" value="3" <?php echo ($rating_two=='3')?'checked':'' ?>> 
                                        <label class="cursor-pointer select-none" for="horizontal-radio-daniel-craig">3</label> 
                                    </div>
                                    <div class="flex items-center text-gray-700 dark:text-gray-500 mr-2 mt-2 sm:mt-0"> 
                                        <input type="radio" name="rating_two" id="rating_two" class="input border mr-2" value="4" <?php echo ($rating_two=='4')?'checked':'' ?>> 
                                        <label class="cursor-pointer select-none" for="horizontal-radio-daniel-craig">4</label> 
                                    </div>
                                    <div class="flex items-center text-gray-700 dark:text-gray-500 mr-2 mt-2 sm:mt-0"> 
                                        <input type="radio" name="rating_two" id="rating_two" class="input border mr-2" value="5" <?php echo ($rating_two=='5')?'checked':'' ?>> 
                                        <label class="cursor-pointer select-none" for="horizontal-radio-daniel-craig">5</label> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-0 gap-2">
                            <div class="input-form mt-3">
                                <label for="description_two" class="flex flex-col sm:flex-row"> Description <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600"></span> </label>
                                <textarea class="input w-full border mt-2 editor" id="description_two" value="" name="description_two" placeholder="Type your text here" ><?php echo $description_two; ?></textarea>
                            </div>
                        </div>
                        <div class="grid grid-cols-0 gap-2">
                            <div class="input-form mt-3">
                                <label for="teamID_two" class="flex flex-col sm:flex-row"> Trainner <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600"></span> </label>
                                <select name="teamID_two" id="teamID_two" value="<?php echo $teamID_two; ?>" class="input tail-select w-full border col-span-4 " placeholder="John Legend"  selected> 
                                    <option value="" selected>Select Title</option> 
                                    <?php if(!empty($teams)){ foreach($teams as $team){ ?>
                                        <option value="<?=$team->team_id?>" <?php if($team->team_id == $teamID_two) {echo "selected=selected";} ?>><?=$team->title?></option>
                                    <?php } } ?>
                                </select> 
                            </div>
                        </div>

                        <br>
                        <label for="multi_image" class="flex flex-col sm:flex-row"> <b>Block 3</b> </label>

                        <div class="grid grid-cols-2 gap-2">
                            <div class="input-form mt-3">
                                <label for="multi_image" class="flex flex-col sm:flex-row"> Image <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600"></span> </label>
                                <input type="file" name="image_three" id="image_three" value="<?php echo $image_three; ?>" class="input w-full border mt-2" >
                                <?php if($image_three != NULL){ ?>
                                    <img alt="Image" data-action="zoom" class="" src="<?php echo assets_url(); ?>uploads/<?php echo $image_three; ?>" width="100" height="100">
                                <?php } else { ?>
                                    <img alt="Image" data-action="zoom" class="" src="<?php echo assets_url(); ?>assets/images/img/image.png" width="100" height="100">
                                <?php } ?>
                            </div>
                            <div class="input-form mt-3">
                                <label for="title_three" class="flex flex-col sm:flex-row"> Name <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600"></span> </label>
                                <input type="text" name="title_three" id="title_three" value="<?php echo $title_three; ?>" class="input w-full border col-span-4 " placeholder="John Legend" >
                            </div>
                        </div>
                        <div class="grid grid-cols-3 gap-2">
                            <div class="input-form mt-3">
                                <label for="designation_three" class="flex flex-col sm:flex-row"> Designation <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600"></span> </label>
                                <input type="text" name="designation_three" id="designation_three" value="<?php echo $designation_three; ?>" class="input w-full border mt-2" >
                            </div>
                            <div class="input-form mt-3">
                                <label for="location_three" class="flex flex-col sm:flex-row"> Location <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600"></span> </label>
                                <input type="text" name="location_three" id="location_three" value="<?php echo $location_three; ?>" class="input w-full border mt-2" >
                            </div>
                            <div class="input-form mt-3">
                                <label for="teamID_three" class="flex flex-col sm:flex-row"> Trainner <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600"></span> </label>
                                <select name="teamID_three" id="teamID_three" value="<?php echo $teamID_three; ?>" class="input tail-select w-full border col-span-4 " placeholder="John Legend"  selected> 
                                    <option value="" selected>Select Title</option> 
                                    <?php if(!empty($teams)){ foreach($teams as $team){ ?>
                                        <option value="<?=$team->team_id?>" <?php if($team->team_id == $teamID_three) {echo "selected=selected";} ?>><?=$team->title?></option>
                                    <?php } } ?>
                                </select> 
                            </div>
                        </div>
                        <div class="grid grid-cols-0 gap-2">
                            <div class="input-form mt-3">
                                <label for="description_three" class="flex flex-col sm:flex-row"> Description <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600"></span> </label>
                                <textarea class="input w-full border mt-2 editor" id="description_three" value="" name="description_three" placeholder="Type your text here" ><?php echo $description_three; ?></textarea>
                            </div>
                        </div>

                        <br>
                        <label for="multi_image" class="flex flex-col sm:flex-row"> <b>Block 4</b> </label>

                        <div class="grid grid-cols-2 gap-2">
                            <div class="input-form mt-3">
                                <label for="multi_image" class="flex flex-col sm:flex-row"> Image <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600"></span> </label>
                                <input type="file" name="image_four" id="image_four" value="<?php echo $image_four; ?>" class="input w-full border mt-2" >
                                <?php if($image_four != NULL){ ?>
                                    <img alt="Image" data-action="zoom" class="" src="<?php echo assets_url(); ?>uploads/<?php echo $image_four; ?>" width="100" height="100">
                                <?php } else { ?>
                                    <img alt="Image" data-action="zoom" class="" src="<?php echo assets_url(); ?>assets/images/img/image.png" width="100" height="100">
                                <?php } ?>
                            </div>
                            <div class="input-form mt-3">
                                <label for="title_four" class="flex flex-col sm:flex-row"> Name <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600"></span> </label>
                                <input type="text" name="title_four" id="title_four" value="<?php echo $title_four; ?>" class="input w-full border col-span-4 " placeholder="John Legend" >
                            </div>
                        </div>
                        <div class="grid grid-cols-3 gap-2">
                            <div class="input-form mt-3">
                                <label for="designation_four" class="flex flex-col sm:flex-row"> Designation <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600"></span> </label>
                                <input type="text" name="designation_four" id="designation_four" value="<?php echo $designation_four; ?>" class="input w-full border mt-2" >
                            </div>
                            <div class="input-form mt-3">
                                <label for="location_four" class="flex flex-col sm:flex-row"> Location <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600"></span> </label>
                                <input type="text" name="location_four" id="location_four" value="<?php echo $location_four; ?>" class="input w-full border mt-2" >
                            </div>
                            <div class="input-form mt-3">
                                <label for="teamID_four" class="flex flex-col sm:flex-row"> Trainner <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600"></span> </label>
                                <select name="teamID_four" id="teamID_four" value="<?php echo $teamID_four; ?>" class="input tail-select w-full border col-span-4 " placeholder="John Legend"  selected> 
                                    <option value="" selected>Select Title</option> 
                                    <?php if(!empty($teams)){ foreach($teams as $team){ ?>
                                        <option value="<?=$team->team_id?>" <?php if($team->team_id == $teamID_four) {echo "selected=selected";} ?>><?=$team->title?></option>
                                    <?php } } ?>
                                </select> 
                            </div>
                        </div>
                        <div class="grid grid-cols-0 gap-2">
                            <div class="input-form mt-3">
                                <label for="description_four" class="flex flex-col sm:flex-row"> Description <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600"></span> </label>
                                <textarea class="input w-full border mt-2 editor" id="description_four" value="" name="description_four" placeholder="Type your text here" ><?php echo $description_four; ?></textarea>
                            </div>
                        </div>

                        <div class="input-form mt-3">
                            <input type="submit" class="button w-24 mr-1 mb-2 bg-theme-12 text-white mt-5" value="Submit" />
                            <button type="button" class="button w-24 mr-1 mb-2 bg-gray-200 text-gray-600 text-white mt-5" onclick="goBack()">Back</button>
                            <button type="reset" class="button w-24 mr-1 mb-2 bg-theme-6 text-white mt-5" value="">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- END: Form Validation -->
    </div>
</div>
<script src="<?php echo assets_url(); ?>assets/js/jQuery-2.1.4.min.js"></script>
<!-- <script src="<?php //echo assets_url(); ?>assets/js/success_stories.js" type="text/javascript"></script> -->
<script type="text/javascript">
    function goBack()
    {
        window.history.back();

    }
</script>

<?php
$home_management_id = $home_managementInfo->home_management_id;
$title = $home_managementInfo->title;
$subtitle_one = $home_managementInfo->subtitle_one;
$subtitle_two = $home_managementInfo->subtitle_two;
$description = $home_managementInfo->description;
$image = $home_managementInfo->image;
?>

<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Home Management
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
                    <form role="form" class="validate-form" id="home_management" enctype='multipart/form-data' action="<?php echo base_url() ?>edithome_managementConfig" method="post">
                        <div class="grid grid-cols-2 gap-2">
                            <div class="input-form mt-3">
                                <label for="title" class="flex flex-col sm:flex-row"> Title <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600">*</span> </label>
                                <input type="text" name="title" id="title" value="<?php echo $title; ?>" class="input w-full border col-span-4 required" placeholder="John Legend" required>
                                <input type="hidden" value="<?php echo $home_management_id; ?>" name="home_management_id" id="home_management_id" />
                            </div>
                        </div>
                        <?php if($home_management_id != 1 && $home_management_id != 2 && $home_management_id != 3){ ?>
                        <div class="grid grid-cols-2 gap-2">
                            <div class="input-form mt-3">
                                <label for="subtitle_one" class="flex flex-col sm:flex-row"> Subtitle 1 <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600"></span> </label>
                                <input type="text" name="subtitle_one" id="subtitle_one" value="<?php echo $subtitle_one; ?>" class="input w-full border col-span-4 required" placeholder="John Legend" >
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-2">
                            <div class="input-form mt-3">
                                <label for="subtitle_two" class="flex flex-col sm:flex-row"> Subtitle 2 <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600"></span> </label>
                                <input type="text" name="subtitle_two" id="subtitle_two" value="<?php echo $subtitle_two; ?>" class="input w-full border col-span-4 required" placeholder="John Legend" >
                            </div>
                        </div>
                        <?php } else {
                        // if($home_management_id == 1 && $home_management_id == 2 && $home_management_id == 3){ ?>
                        <div class="grid grid-cols-2 gap-2">
                            <div class="input-form mt-3">
                                <label for="image" class="flex flex-col sm:flex-row"> Image <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600"></span> </label>
                                <!-- <div data-single="true" action="<?php //echo base_url(); ?>uploads" class="dropzone">
                                    <div class="fallback">
                                        <input type="file" name="image" id="image" value="<?php //echo $image; ?>" class="input w-full border mt-2" required>
                                    </div>
                                    <div class="dz-message" data-dz-message>
                                        <div class="text-lg font-medium">Drop files here or click to upload.</div>
                                        <div class="text-slate-500">Select <span class="font-medium">file</span> to upload.
                                        </div>
                                    </div>
                                </div> -->
                                <input type="file" name="image" id="image" value="<?php echo base_url('uploads/'.$image); ?>" class="input w-full border mt-2">
                                <input type="hidden" value="<?php echo $home_management_id; ?>" name="home_management_id" id="home_management_id" />
                                <?php if($image != NULL){ ?>
                                    <img alt="Image" data-action="zoom" class="" src="<?php echo assets_url(); ?>uploads/<?php echo $image; ?>" width="100" height="100">
                                <?php } else { ?>
                                    <img src="<?php echo assets_url(); ?>assets/dist/img/image.png" width="100" height="100">
                                <?php } ?>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-2">
                            <div class="input-form mt-3">
                                <label for="description" class="flex flex-col sm:flex-row"> Description <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600"></span> </label>
                                <textarea class="input w-full border mt-2 editor" id="description" value="<?php echo $description; ?>" name="description" placeholder="Type your text here"><?php echo $description; ?></textarea>
                            </div>
                        </div>
                        <?php } ?>
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
<!-- <script src="<?php //echo assets_url(); ?>assets/js/home_management.js" type="text/javascript"></script> -->
<script type="text/javascript">
    function goBack()
    {
        window.history.back();

    }
</script>
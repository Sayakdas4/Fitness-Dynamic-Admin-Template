<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Exercise Video
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
                    <form role="form" class="validate-form" id="exercise_video" enctype='multipart/form-data' action="<?php echo base_url() ?>addexercise_videoConfig" method="post">
                        <div class="grid grid-cols-2 gap-2">
                            <div class="input-form mt-3">
                                <label for="title" class="flex flex-col sm:flex-row"> Name <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600">*</span> </label>
                                <input type="text" name="title" id="title" value="<?php echo set_value('title'); ?>" class="input w-full border col-span-4 required" placeholder="John Legend" required>
                            </div>
                            <div class="input-form mt-3">
                                <label for="image" class="flex flex-col sm:flex-row"> Video <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600">*</span> </label>
                                <input type="url" name="image" id="image" value="<?php echo set_value('image'); ?>" class="input w-full border col-span-4 required" placeholder="John Legend" required>
                            </div>
                        </div>
                        <div class="grid grid-cols-0 gap-2">
                            <div class="input-form mt-3">
                                <label for="description" class="flex flex-col sm:flex-row"> Description <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600">*</span> </label>
                                <textarea class="input w-full border mt-2" id="description" value="<?php echo set_value('description'); ?>" name="description" placeholder="Type your text here" required></textarea>
                            </div>
                        </div>
                        <div class="grid grid-cols-3 gap-2">
                            <div class="input-form mt-3">
                                <label for="body_partID" class="flex flex-col sm:flex-row"> Body Part <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600">*</span> </label>
                                <?php if(!empty($body_parts)){ foreach($body_parts as $body_part){ ?>
                                <div class="flex items-center text-gray-700 dark:text-gray-500 mt-2">
                                    <input type="radio" name="body_partID" id="body_partID" class="input border mr-2" value="<?=$body_part->body_part_id?>" required> 
                                    <label class="cursor-pointer select-none" for="horizontal-radio-chris-evans"><?=$body_part->body_part_title?></label> 
                                </div>
                                <?php } } ?>
                            </div>
                            <div class="input-form mt-3">
                                <label for="equipmentID" class="flex flex-col sm:flex-row"> Equipment <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600">*</span> </label>
                                <?php if(!empty($equipments)){ foreach($equipments as $equipment){ ?>
                                <div class="flex items-center text-gray-700 dark:text-gray-500 mt-2">
                                    <input type="radio" name="equipmentID" id="equipmentID" class="input border mr-2" value="<?=$equipment->equipment_id?>" required> 
                                    <label class="cursor-pointer select-none" for="horizontal-radio-chris-evans"><?=$equipment->equipment_title?></label> 
                                </div>
                                <?php } } ?>
                            </div>
                            <div class="input-form mt-3">
                                <label for="exelevelID" class="flex flex-col sm:flex-row"> Levels <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600">*</span> </label>
                                <?php if(!empty($levels)){ foreach($levels as $level){ ?>
                                <div class="flex items-center text-gray-700 dark:text-gray-500 mt-2"> 
                                    <input type="checkbox" class="input border mr-2" name="exelevelID[]" id="exelevelID" value="<?=$level->level_id?>" required> 
                                    <label class="cursor-pointer select-none" for="vertical-checkbox-chris-evans"><?=$level->level_title?></label> 
                                </div>
                                <?php } } ?>
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
<!-- <script src="<?php //echo assets_url(); ?>assets/js/exercise_video.js" type="text/javascript"></script> -->
<script type = "text/javascript">
    $(document).ready(function() {
        $('#description').summernote({
            tooltip: false,
            height: 300,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    });
</script>
<script type="text/javascript">
    function goBack()
    {
        window.history.back();

    }
</script>

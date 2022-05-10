<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Knowledge Library
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
                    <form role="form" class="validate-form" id="knowledge_library" enctype='multipart/form-data' action="<?php echo base_url() ?>addknowledge_libraryConfig" method="post">
                        <div class="grid grid-cols-2 gap-2">
                            <div class="input-form mt-3">
                                <label for="title" class="flex flex-col sm:flex-row"> Name <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600">*</span> </label>
                                <input type="text" name="title" id="title" value="<?php echo set_value('title'); ?>" class="input w-full border col-span-4 required" placeholder="John Legend" required>
                            </div>
                            <div class="input-form mt-3">
                                <label for="time" class="flex flex-col sm:flex-row"> Time <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600">*</span> </label>
                                <input type="text" name="time" id="time" value="<?php echo set_value('time'); ?>" class="input w-full border col-span-4 required" placeholder="John Legend" required>
                            </div>
                        </div>
                        <div class="grid grid-cols-0 gap-2">
                            <div class="input-form mt-3">
                                <label for="preference" class="flex flex-col sm:flex-row"> Preference <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600">*</span> </label>
                                <select name="preference" id="preference" value="<?php echo set_value('preference'); ?>" data-preference="" class="input tail-select w-full border col-span-4 " placeholder="John Legend" onchange="myFunction(this.value);" selected> 
                                    <option value="0">Choose Preference</option>
                                    <option value="1">Video</option>
                                    <option value="2">Image</option>
                                </select>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-2">
                            <div class="input-form mt-3 box" id="images" style="display: none;">
                                <label for="image_files" class="flex flex-col sm:flex-row"> Video <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600">*</span> </label>
                                <input type="url" name="image" id="image" value="<?php echo set_value('image'); ?>" class="input w-full border col-span-4" placeholder="John Legend">
                            </div>
                            <div class="input-form mt-3 box" id="image_filess" style="display: none;">
                                <label for="image_files" class="flex flex-col sm:flex-row"> Image <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600">*</span> </label>
                                <!-- <div data-single="true" action="<?php //echo base_url(); ?>uploads" class="dropzone">
                                    <div class="fallback">
                                        <input type="file" name="image_files" id="image_files" value="<?php //echo set_value('image_files'); ?>" class="input w-full border mt-2" required>
                                    </div>
                                    <div class="dz-message" data-dz-message>
                                        <div class="text-lg font-medium">Drop files here or click to upload.</div>
                                        <div class="text-slate-500">Select <span class="font-medium">file</span> to upload.
                                        </div>
                                    </div>
                                </div> -->
                                <input type="file" name="image_files[]" id="image_files" value="<?php echo set_value('image_files'); ?>" class="input w-full border mt-2" multiple>
                            </div>
                        </div>
                        <div class="grid grid-cols-0 gap-2">
                            <div class="input-form mt-3">
                                <label for="description" class="flex flex-col sm:flex-row"> Description <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600">*</span> </label>
                                <textarea class="input w-full border mt-2 editor" id="description" value="<?php echo set_value('description'); ?>" name="description" placeholder="Type your text here" required></textarea>
                            </div>
                        </div>
                        <div class="grid grid-cols-3 gap-2">
                            <div class="input-form mt-3">
                                <label for="content_preferenceID" class="flex flex-col sm:flex-row"> Content Preference <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600">*</span> </label>
                                <?php if(!empty($content_preferences)){ foreach($content_preferences as $content_preference){ ?>
                                <div class="flex items-center text-gray-700 dark:text-gray-500 mt-2">
                                    <input type="radio" name="content_preferenceID" id="content_preferenceID" class="input border mr-2" value="<?=$content_preference->content_preference_id?>" required> 
                                    <label class="cursor-pointer select-none" for="horizontal-radio-chris-evans"><?=$content_preference->content_preference_title?></label> 
                                </div>
                                <?php } } ?>
                            </div>
                            <div class="input-form mt-3">
                                <label for="catID" class="flex flex-col sm:flex-row"> Categories <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600">*</span> </label>
                                <?php if(!empty($categoriess)){ foreach($categoriess as $categories){ ?>
                                <div class="flex items-center text-gray-700 dark:text-gray-500 mt-2"> 
                                    <input type="checkbox" class="input border mr-2" name="catID[]" id="catID" value="<?=$categories->categories_id?>" required> 
                                    <label class="cursor-pointer select-none" for="vertical-checkbox-chris-evans"><?=$categories->categories_title?></label> 
                                </div>
                                <?php } } ?>
                            </div>
                            <div class="input-form mt-3" style="display: none;">
                                <label for="exelevelID" class="flex flex-col sm:flex-row"> Levels <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600">*</span> </label>
                                <?php if(!empty($levels)){ foreach($levels as $level){ ?>
                                <div class="flex items-center text-gray-700 dark:text-gray-500 mt-2"> 
                                    <input type="checkbox" class="input border mr-2" name="exelevelID[]" id="exelevelID" value="<?=$level->level_id?>" checked> 
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
<!-- <script src="<?php //echo assets_url(); ?>assets/js/knowledge_library.js" type="text/javascript"></script> -->
<script type="text/javascript">
    function goBack()
    {
        window.history.back();

    }

    function myFunction(val){
        if(val==0){
            document.getElementById("images").style.display = "none";
            document.getElementById("image_filess").style.display = "none";
        }
        if(val==1){
            document.getElementById("images").style.display = "block";
            document.getElementById("image_filess").style.display = "none";
        }
        if(val==2){
            document.getElementById("image_filess").style.display = "block";
            document.getElementById("images").style.display = "none";
        }
    }
</script>

<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        CMS
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
                    <form role="form" class="validate-form" id="" enctype='multipart/form-data' action="<?php echo base_url() ?>addcmsConfig" method="post">
                        <div class="grid grid-cols-2 gap-2">
                            <div class="input-form mt-3">
                                <label for="title" class="flex flex-col sm:flex-row"> Title <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600">*</span> </label>
                                <input type="text" name="title" id="title" value="<?php echo set_value('title'); ?>" class="input w-full border col-span-4 required" placeholder="John Legend" required>
                            </div>
                            <div class="input-form mt-3">
                                <label for="page_slug" class="flex flex-col sm:flex-row"> Page Slug <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600">*</span> </label>
                                <input type="text" name="page_slug" id="page_slug" value="<?php echo set_value('page_slug'); ?>" class="input w-full border col-span-4" required>
                            </div>
                        </div>
                        <div class="grid grid-cols-3 gap-2">
                            <div class="input-form mt-3">
                                <label for="meta_title" class="flex flex-col sm:flex-row"> Meta Title <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600"></span> </label>
                                <input type="url" name="meta_title" id="meta_title" value="<?php echo set_value('meta_title'); ?>" class="input w-full border mt-2" placeholder="">
                            </div>
                            <div class="input-form mt-3">
                                <label for="meta_description" class="flex flex-col sm:flex-row"> Meta Description <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600"></span> </label>
                                <textarea type="url" name="meta_description" id="meta_description" value="<?php echo set_value('meta_description'); ?>" class="input w-full border mt-2" placeholder="Type your text here"></textarea>
                            </div>
                            <div class="input-form mt-3">
                                <label for="meta_tag" class="flex flex-col sm:flex-row"> Meta Tag <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600"></span> </label>
                                <input type="url" name="meta_tag" id="meta_tag" value="<?php echo set_value('meta_tag'); ?>" class="input w-full border mt-2" placeholder="">
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-2" style="display:none;">
                            <div class="input-form mt-3">
                                <label for="description" class="flex flex-col sm:flex-row"> Description <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600">*</span> </label>
                                <textarea class="input w-full border mt-2 editor" id="description" value="<?php echo set_value('description'); ?>" name="description" placeholder="Type your text here"></textarea>
                            </div>
                        </div>
                        <div class="grid grid-cols-0 gap-2" style="display:none;">
                            <div class="input-form mt-3">
                                <label for="image" class="flex flex-col sm:flex-row"> Image <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600">*</span> </label>
                                <!-- <div data-single="true" action="<?php //echo base_url(); ?>uploads" class="dropzone">
                                    <div class="fallback">
                                        <input type="file" name="image" id="image" value="<?php //echo set_value('image'); ?>" class="input w-full border mt-2" required>
                                    </div>
                                    <div class="dz-message" data-dz-message>
                                        <div class="text-lg font-medium">Drop files here or click to upload.</div>
                                        <div class="text-slate-500">Select <span class="font-medium">file</span> to upload.
                                        </div>
                                    </div>
                                </div> -->
                                <input type="file" name="image" id="image" value="<?php echo set_value('image'); ?>" class="input w-full border mt-2">
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
<!-- <script src="<?php //echo assets_url(); ?>assets/js/cms.js" type="text/javascript"></script> -->
<script type="text/javascript">
    function goBack()
    {
        window.history.back();

    }
</script>
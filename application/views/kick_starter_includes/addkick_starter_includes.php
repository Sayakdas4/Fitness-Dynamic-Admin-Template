<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Kick Starter
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
                    <form role="form" class="validate-form" id="kick_starter_includes" enctype='multipart/form-data' action="<?php echo base_url() ?>addkick_starter_includesConfig" method="post">
                        <div class="grid grid-cols-2 gap-2">
                            <div class="input-form mt-3">
                                <label for="type" class="flex flex-col sm:flex-row"> Include Type <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600">*</span> </label>
                                <select name="type" id="type" value="<?php echo set_value('type'); ?>" class="input tail-select w-full border col-span-4 required" placeholder="John Legend" required selected> 
                                    <option value="" selected>Select Type</option> 
                                    <option value="1">Nutrition</option> 
                                    <option value="2">Workout</option>
                                </select> 
                            </div> 
                        </div>
                        <div class="grid grid-cols-2 gap-2">
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
                                <input type="file" name="image" id="image" value="<?php echo set_value('image'); ?>" class="input w-full border mt-2" required>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-2">
                            <div class="input-form mt-3">
                                <label for="left_top" class="flex flex-col sm:flex-row"> Left Top <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600">*</span> </label>
                                <input type="text" name="left_top" id="left_top" value="<?php echo set_value('left_top'); ?>" class="input w-full border mt-2" required>
                            </div>
                            <div class="input-form mt-3">
                                <label for="right_top" class="flex flex-col sm:flex-row"> Right Top <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600">*</span> </label>
                                <input type="text" name="right_top" id="right_top" value="<?php echo set_value('right_top'); ?>" class="input w-full border mt-2" required>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-2">
                            <div class="input-form mt-3">
                                <label for="left_bottom" class="flex flex-col sm:flex-row"> Left Bottom <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600">*</span> </label>
                                <input type="text" name="left_bottom" id="left_bottom" value="<?php echo set_value('left_bottom'); ?>" class="input w-full border mt-2" required>
                            </div>
                            <div class="input-form mt-3">
                                <label for="right_bottom" class="flex flex-col sm:flex-row"> Right Bottom <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600">*</span> </label>
                                <input type="text" name="right_bottom" id="right_bottom" value="<?php echo set_value('right_bottom'); ?>" class="input w-full border mt-2" required>
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
<!-- <script src="<?php //echo assets_url(); ?>assets/js/kick_starter_includes.js" type="text/javascript"></script> -->
<script type="text/javascript">
    function goBack()
    {
        window.history.back();

    }
</script>
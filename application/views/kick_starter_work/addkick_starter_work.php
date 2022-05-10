<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        HOW IT WORKS
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
                    <form role="form" class="validate-form" id="kick_starter_work" enctype='multipart/form-data' action="<?php echo base_url() ?>addkick_starter_workConfig" method="post">
                        <div class="grid grid-cols-2 gap-2">
                            <div class="input-form mt-3">
                                <label for="section_one" class="flex flex-col sm:flex-row"> Section 1 <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600">*</span> </label>
                                <textarea type="text" name="section_one" id="section_one" value="<?php echo set_value('section_one'); ?>" class="input w-full border mt-2 editor" placeholder="Type your text here" required></textarea>
                            </div>
                            <div class="input-form mt-3">
                                <label for="section_two" class="flex flex-col sm:flex-row"> Section 2 <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600">*</span> </label>
                                <textarea type="text" name="section_two" id="section_two" value="<?php echo set_value('section_two'); ?>" class="input w-full border mt-2 editor" placeholder="Type your text here" required></textarea>
                                <div id="msg"></div>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-2">
                            <div class="input-form mt-3">
                                <label for="section_three" class="flex flex-col sm:flex-row"> Section 3 <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600">*</span> </label>
                                <textarea type="text" name="section_three" id="section_three" value="<?php echo set_value('section_three'); ?>" class="input w-full border mt-2 editor" placeholder="Type your text here" required></textarea>
                            </div>
                            <div class="input-form mt-3">
                                <label for="section_four" class="flex flex-col sm:flex-row"> Section 4 <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600">*</span> </label>
                                <textarea type="text" name="section_four" id="section_four" value="<?php echo set_value('section_four'); ?>" class="input w-full border mt-2 editor" placeholder="Type your text here" required></textarea>
                                <div id="msg"></div>
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
<!-- <script src="<?php //echo assets_url(); ?>assets/js/kick_starter_work.js" type="text/javascript"></script> -->
<script type="text/javascript">
    function goBack()
    {
        window.history.back();

    }
</script>

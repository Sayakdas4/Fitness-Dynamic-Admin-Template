<?php
$kick_starter_pricing_id = $kick_starter_pricingInfo->kick_starter_pricing_id;
$duration = $kick_starter_pricingInfo->duration;
$duration_format = $kick_starter_pricingInfo->duration_format;
$price = $kick_starter_pricingInfo->price;
?>

<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Kick Starter Pricing
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
<div class="grid grid-cols-12 gap-6 mt-5">
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
                    <form role="form" class="validate-form" id="kick_starter_pricing" enctype='multipart/form-data' action="<?php echo base_url() ?>editkick_starter_pricingConfig" method="post">
                        <div class="grid grid-cols-0 gap-2">
                            <div class="input-form mt-3">
                                <label for="duration" class="flex flex-col sm:flex-row"> Duration <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600">*</span> </label>
                                <div class="relative mt-2">
                                    <input type="number" name="duration" id="duration" value="<?php echo $duration; ?>" class="input pr-16 w-full border col-span-4" required>
                                    <input type="hidden" value="<?php echo $kick_starter_pricing_id; ?>" name="kick_starter_pricing_id" id="kick_starter_pricing_id" />
                                    <div class="absolute top-0 right-0 rounded-r w-25 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">
                                        <select class="tail-select w-full" name="duration_format" id="duration_format" value="<?php echo $duration_format; ?>" required selected>
                                            <option value="<?php echo $duration_format ?>"><?php echo $duration_format ?></option>
                                            <option value="">Format</option>
                                            <option value="Days">Days</option>
                                            <option value="Days Renewal">Days Renewal</option>
                                            <option value="Month">Month</option>
                                            <option value="Month Renewal">Month Renewal</option>
                                            <option value="Year">Year</option>
                                            <option value="Year Renewal">Year Renewal</option>
                                        </select>
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <div class="grid grid-cols-0 gap-2">
                            <div class="input-form mt-3">
                                <label for="price" class="flex flex-col sm:flex-row"> Price <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600">*</span> </label>
                                <div class="relative mt-2">
                                    <div class="absolute top-0 left-0 rounded-l w-12 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">₹</div>
                                    <div class="pl-3">
                                        <input type="number" name="price" id="price" class="input pl-12 w-full border col-span-4" value="<?php echo $price; ?>" placeholder="Price" required>
                                    </div>
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
<!-- <script src="<?php //echo assets_url(); ?>assets/js/kick_starter_pricing.js" type="text/javascript"></script> -->
<script type="text/javascript">
    function goBack()
    {
        window.history.back();

    }
</script>
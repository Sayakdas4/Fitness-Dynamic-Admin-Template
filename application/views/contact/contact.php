<?php
$contact_id = $userInfo2->contact_id;
$email = $userInfo2->email;
$phone = $userInfo2->phone;
$telephone = $userInfo2->telephone;
$address = $userInfo2->address;
$fb_link = $userInfo2->fb_link;
$twitter_link = $userInfo2->twitter_link;
$linkedin_link = $userInfo2->linkedin_link;
$instagram_link = $userInfo2->instagram_link;
?>

<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Team
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
                    <form role="form" class="validate-form" id="" enctype='multipart/form-data' action="<?php echo base_url() ?>editContactConfig" method="post">
                        <div class="grid grid-cols-2 gap-2">
                            <div class="input-form mt-3">
                                <label for="email" class="flex flex-col sm:flex-row"> Email <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600">*</span> </label>
                                <input type="email" name="email" id="email" value="<?php echo $email; ?>" class="input w-full border col-span-4 required" placeholder="" required>
                                <input type="hidden" value="<?php echo $contact_id; ?>" name="contact_id" id="contact_id" />
                            </div>
                            <div class="input-form mt-3">
                                <label for="phone" class="flex flex-col sm:flex-row"> Phone <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600">*</span> </label>
                                <input type="text" name="phone" id="phone" value="<?php echo $phone; ?>" class="input w-full border col-span-4 digits" onKeyPress="return alphachar(event,number);" required>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-2">
                            <div class="input-form mt-3" style="display: none;">
                                <label for="telephone" class="flex flex-col sm:flex-row"> Telephone Number <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600">*</span> </label>
                                <input type="text" name="telephone" id="telephone" value="<?php echo $telephone; ?>" class="input w-full border mt-2" required>
                            </div>
                            <div class="input-form mt-3">
                                <label for="address" class="flex flex-col sm:flex-row"> Address <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600">*</span> </label>
                                <input type="text" name="address" id="address" value="<?php echo $address; ?>" class="input w-full border mt-2" required>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-2">
                            <div class="input-form mt-3">
                                <label for="fb_link" class="flex flex-col sm:flex-row"> Facebook Link <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600">*</span> </label>
                                <input type="url" name="fb_link" id="fb_link" value="<?php echo $fb_link; ?>" class="input w-full border mt-2" placeholder="https://facebook.com" required>
                            </div>
                            <div class="input-form mt-3">
                                <label for="twitter_link" class="flex flex-col sm:flex-row"> Twitter Link <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600">*</span> </label>
                                <input type="url" name="twitter_link" id="twitter_link" value="<?php echo $twitter_link; ?>" class="input w-full border mt-2" placeholder="https://twitter.com" required>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-2">
                            <div class="input-form mt-3">
                                <label for="instagram_link" class="flex flex-col sm:flex-row"> Instagram Link <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600">*</span> </label>
                                <input type="url" name="instagram_link" id="instagram_link" value="<?php echo $instagram_link; ?>" class="input w-full border mt-2" placeholder="https://instagram.com" required>
                            </div>
                            <div class="input-form mt-3">
                                <label for="linkedin_link" class="flex flex-col sm:flex-row"> LinkedIn Link <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600">*</span> </label>
                                <input type="url" name="linkedin_link" id="linkedin_link" value="<?php echo $linkedin_link; ?>" class="input w-full border mt-2" placeholder="https://linkedin.com" required>
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
<!-- <script src="<?php //echo assets_url(); ?>assets/js/team.js" type="text/javascript"></script> -->
<script type="text/javascript">
    function goBack()
    {
        window.history.back();

    }
</script>
<script type="text/javascript">
    var number="0123456789-+";
    var string="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ-. ";
    function alphachar(e,allow)
    {
    var k;
    k=document.all?String(e.keyCode): String(e.which);
    return (allow.indexOf(String.fromCharCode(k))!=-1||k==8||k==9||k==13);
    }
</script>
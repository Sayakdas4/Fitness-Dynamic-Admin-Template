<?php
$team_id = $teamInfo->team_id;
$title = $teamInfo->title;
$username = $teamInfo->username;
$designation = $teamInfo->designation;
$education_short = $teamInfo->education_short;
$certified_by = $teamInfo->certified_by;
$image = $teamInfo->image;
$education = $teamInfo->education;
$about = $teamInfo->about;
$certifications = $teamInfo->certifications;
$industry_experience = $teamInfo->industry_experience;
$clients_coached = $teamInfo->clients_coached;
$current_location = $teamInfo->current_location;
$fb_link = $teamInfo->fb_link;
$twitter_link = $teamInfo->twitter_link;
$instagram_link = $teamInfo->instagram_link;
$linkedin_link = $teamInfo->linkedin_link;
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
                    <form role="form" class="validate-form" id="team" enctype='multipart/form-data' action="<?php echo base_url() ?>editteamConfig" method="post">
                        <div class="grid grid-cols-2 gap-2">
                            <div class="input-form mt-3">
                                <label for="title" class="flex flex-col sm:flex-row"> Name <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600">*</span> </label>
                                <input type="text" name="title" id="title" value="<?php echo $title; ?>" class="input w-full border col-span-4 required" placeholder="John Legend" required>
                                <input type="hidden" value="<?php echo $team_id; ?>" name="team_id" id="team_id" />
                            </div>
                            <div class="input-form mt-3">
                                <label for="username" class="flex flex-col sm:flex-row"> Username <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600">*</span> </label>
                                <input type="text" name="username" id="username" value="<?php echo $username; ?>" class="input w-full border col-span-4" onblur="check_username();" required>
                                <div id="msg"></div>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-2">
                            <div class="input-form mt-3">
                                <label for="designation" class="flex flex-col sm:flex-row"> Designation <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600">*</span> </label>
                                <input type="text" name="designation" id="designation" value="<?php echo $designation; ?>" class="input w-full border mt-2" required>
                            </div>
                            <div class="input-form mt-3">
                                <label for="certified_by" class="flex flex-col sm:flex-row"> Certified By <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600">*</span> </label>
                                <input type="text" name="certified_by" id="certified_by" value="<?php echo $certified_by; ?>" class="input w-full border mt-2" required>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-2">
                            <div class="input-form mt-3">
                                <label for="education" class="flex flex-col sm:flex-row"> Education <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600">*</span> </label>
                                <input type="text" name="education" id="education" value="<?php echo $education; ?>" class="input w-full border mt-2" required>
                            </div>
                            <div class="input-form mt-3">
                                <label for="education_short" class="flex flex-col sm:flex-row"> Education Short <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600">*</span> </label>
                                <input type="text" name="education_short" id="education_short" value="<?php echo $education_short; ?>" class="input w-full border mt-2" required>
                            </div>
                        </div>
                        <div class="grid grid-cols-0 gap-2">
                            <div class="input-form mt-3">
                                <label for="image" class="flex flex-col sm:flex-row"> Image <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600">*</span> </label>
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
                                <?php if($image != NULL){ ?>
                                    <img alt="Image" data-action="zoom" class="" src="<?php echo assets_url(); ?>uploads/<?php echo $image; ?>" width="100" height="100">
                                <?php } else { ?>
                                    <img src="<?php echo assets_url(); ?>assets/dist/img/image.png" width="100" height="100">
                                <?php } ?>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-2">
                            <div class="input-form mt-3">
                                <label for="about" class="flex flex-col sm:flex-row"> About <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600">*</span> </label>
                                <textarea class="input w-full border mt-2 editor" id="about" value="<?php echo $about; ?>" name="about" placeholder="Type your text here" required><?php echo $about; ?></textarea>
                            </div>
                            <div class="input-form mt-3">
                                <label for="certifications" class="flex flex-col sm:flex-row"> Certifications <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600">*</span> </label>
                                <textarea class="input w-full border mt-2 editor" id="certifications" value="<?php echo $certifications; ?>" name="certifications" placeholder="Type your text here" required><?php echo $certifications; ?></textarea>
                            </div>
                        </div>
                        <div class="grid grid-cols-3 gap-2">
                            <div class="input-form mt-3">
                                <label for="industry_experience" class="flex flex-col sm:flex-row"> Industry Experience <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600">*</span> </label>
                                <input type="text" name="industry_experience" id="industry_experience" value="<?php echo $industry_experience; ?>" class="input w-full border mt-2" required>
                            </div>
                            <div class="input-form mt-3">
                                <label for="clients_coached" class="flex flex-col sm:flex-row"> Clients Coached <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600">*</span> </label>
                                <input type="text" name="clients_coached" id="clients_coached" value="<?php echo $clients_coached; ?>" class="input w-full border mt-2" required>
                            </div>
                            <div class="input-form mt-3">
                                <label for="current_location" class="flex flex-col sm:flex-row"> Current Location <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600">*</span> </label>
                                <input type="text" name="current_location" id="current_location" value="<?php echo $current_location; ?>" class="input w-full border mt-2" required>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-2">
                            <div class="input-form mt-3">
                                <label for="fb_link" class="flex flex-col sm:flex-row"> Facebook Link <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600">*</span> </label>
                                <input type="url" name="fb_link" id="fb_link" value="<?php echo $fb_link; ?>" class="input w-full border mt-2" placeholder="https://facebook.com">
                            </div>
                            <div class="input-form mt-3">
                                <label for="twitter_link" class="flex flex-col sm:flex-row"> Twitter Link <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600">*</span> </label>
                                <input type="url" name="twitter_link" id="twitter_link" value="<?php echo $twitter_link; ?>" class="input w-full border mt-2" placeholder="https://twitter.com">
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-2">
                            <div class="input-form mt-3">
                                <label for="instagram_link" class="flex flex-col sm:flex-row"> Instagram Link <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600">*</span> </label>
                                <input type="url" name="instagram_link" id="instagram_link" value="<?php echo $instagram_link; ?>" class="input w-full border mt-2" placeholder="https://instagram.com">
                            </div>
                            <div class="input-form mt-3">
                                <label for="linkedin_link" class="flex flex-col sm:flex-row"> LinkedIn Link <span class="sm:ml-1 mt-1 sm:mt-0 text-red-600">*</span> </label>
                                <input type="url" name="linkedin_link" id="linkedin_link" value="<?php echo $linkedin_link; ?>" class="input w-full border mt-2" placeholder="https://linkedin.com">
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

    function check_username() {

    var username = $("#username").val();

    $.ajax(
        {
            type:"post",
            url: "<?php echo base_url(); ?>team/check_username",
            data:{ username : username},
            success:function(response)
            {
                data = JSON.parse(response);
                if (data == true) 
                {
                    // console.log("Username is already taken");
                    $('#msg').html('<span class="text-theme-6 block">Username is already taken</span>');
                }
                else 
                {
                    // console.log("Username is Available");
                    $('#msg').html('<span class="text-theme-9 block">Username is Available</span>');
                }  
            }
        });
    }
</script>
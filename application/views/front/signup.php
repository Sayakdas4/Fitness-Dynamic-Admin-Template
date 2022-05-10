<?php $this->load->view('fincludes/header'); ?>
        <!-- ======= Body Conter Start ======= -->
        <section class="bg-grey">
          <div class="container">
            <div class="row padtop-140 padbot-140">
              <div class="d-flex justify-content-center">
                  <div class="bg-white border-rounded-7 dark-grey-text p-35 login-box">
                      <div class="heading text-start ">
                          Sign up
                      </div>
                      <?php $this->load->helper("form"); ?>
                      <div class="row">
                          <?php 
                              $this->load->helper('form');
                              $error = $this->session->flashdata('error');
                              if($error) {
                          ?>
                          <div class="alert alert-danger alert-dismissable text-center"> <?php echo $this->session->flashdata('error'); ?> </div>
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
                      <form role="form" id="signup" enctype='multipart/form-data' action="<?php echo base_url() ?>signupme" method="post" role="form" >
                        <div class="marginbot-15 input-form mt-3">
                            <label for="name" class="form-label flex flex-col sm:flex-row"> Name <span class="text-danger">*</span> </label>
                            <input type="text" class="form-control input w-full border mt-2" name="name" id="name" value="<?php echo set_value('name'); ?>" placeholder="John Legend" minlength="5" required>
                          </div>
                          <div class="marginbot-15 input-form mt-3">
                            <label for="email" class="form-label flex flex-col sm:flex-row"> Email Address <span class="text-danger">*</span> </label>
                            <input type="email" class="form-control input w-full border mt-2 email required" name="email" id="email" value="<?php echo set_value('email'); ?>" placeholder="Email Address" required>
                          </div>
                          <div class="marginbot-15 input-form mt-3">
                            <label for="phone" class="form-label flex flex-col sm:flex-row"> Phone number <span class="text-danger">*</span> </label>
                            <input type="text" class="form-control input w-full border mt-2 digits required" name="phone" id="phone" value="<?php echo set_value('phone'); ?>" placeholder="Number" minlength="10" maxlength="10" tel required>
                          </div>
                          <div class="marginbot-35 input-form mt-3">
                            <label for="password" class="form-label flex flex-col sm:flex-row"> Password <span class="text-danger">*</span> </label>
                            <input type="password" class="form-control input w-full border mt-2 required" name="password" id="password" value="<?php echo set_value('password'); ?>" placeholder="Password" minlength="6" required>
                          </div>
                          <div class="marginbot-35 input-form mt-3">
                            <label for="cpassword" class="form-label flex flex-col sm:flex-row"> Confirm Password <span class="text-danger">*</span> </label>
                            <input type="password" class="form-control input w-full border mt-2 equalTo required" name="cpassword" id="cpassword" value="<?php echo set_value('cpassword'); ?>" placeholder="Confirm Password" minlength="6" required>
                          </div>
                          <div class="marginbot-35 input-form mt-3">
                            <!-- <label for="cpassword" class="form-label">Confirm Password</label> -->
                            <input type="checkbox" name="accept_terms" class="custom-control-input required" id="accept_terms" />
                            <label class="custom-control-label" for="accept_terms">I have agreed to the terms and conditions.</label>
                          </div>
                          <button type="submit" class="btn marginbot-15">Sign Up</button>
                        </form>
                        <div class="forget-pass">
                            <p class="blue-text"><a href="javascript:;">Forgot Password?</a></p>
                            <p class="sign-up-text">Already have an account? <a href="<?php echo base_url() ?>signin"><span class="blue-text">Sign In</span></a></p>
                        </div>
                  </div>
                  
              </div>
              <!-- <div class="f-book-google">or connect with <a href="javascript:;">Facebook</a> or <a href="javascript:;">Google</a></div> -->
            </div>
          </div>
        </section>
        <!-- ======= Body Conter End ======= -->
<?php $this->load->view('fincludes/footer'); ?>
<script src="<?php echo assets_url(); ?>assets/js/jQuery-2.1.4.min.js"></script>
<script src="<?php echo assets_url(); ?>assets/js/jquery.validate.js" type="text/javascript"></script>
<script src="<?php echo assets_url(); ?>assets/js/validation.js" type="text/javascript"></script>

<script type="text/javascript">

  $(document).ready(function(){
  
  var signupForm = $("#signup");
  
  var validator = signupForm.validate({
    
    rules:{
      name :{ required : true },
      // email : { required : true, email : true, remote : { url : baseURL + "checkEmailExists", type :"post"} },
      email : { required : true, email : true },
      mobile : { required : true, digits : true },
      password : { required : true },
      cpassword : {required : true, equalTo: "#password"}
    },
    messages:{
      name :{ required : "This field is required" },
      // email : { required : "This field is required", email : "Please enter valid email address", remote : "Email address already taken" },
      email : { required : "This field is required", email : "Please enter valid email address" },
      mobile : { required : "This field is required", digits : "Please enter numbers only" },
      password : { required : "This field is required" },
      cpassword : {required : "This field is required", equalTo: "Please enter same password" }  
    }
  });
});
</script>


</html>
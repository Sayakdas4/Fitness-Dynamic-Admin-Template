<?php $this->load->view('fincludes/header'); ?>
        <!-- ======= Body Conter Start ======= -->
        <section class="bg-grey">
          <div class="container">
            <div class="row padtop-140 padbot-140">
              <div class="d-flex justify-content-center">
                  <div class="bg-white border-rounded-7 dark-grey-text p-35 login-box">
                      <div class="heading text-start ">
                          Sign in
                      </div>
                      <?php $this->load->helper('form'); ?>
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
                          <div class="alert alert-success alert-dismissable text-center"> <?php echo $this->session->flashdata('success'); ?> </div>
                          <?php } ?>
                          
                          <div class="row">
                              <div class="col-md-12">
                                  <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                              </div>
                          </div>
                      </div>
                      <form action="<?php echo base_url(); ?>signinme" method="post" id="signin">
                          <div class="marginbot-15 input-form mt-3">
                            <label for="email" class="form-label flex flex-col sm:flex-row"> Email Address <span class="text-danger">*</span> </label>
                            <input type="email" class="form-control input w-full border mt-2 email required" name="email" id="email" placeholder="Email Address" required>
                          </div>
                          <div class="marginbot-35 input-form mt-3">
                            <label for="password" class="form-label flex flex-col sm:flex-row"> Password <span class="text-danger">*</span> </label>
                            <input type="password" class="form-control input w-full border mt-2 required" name="password" id="password" placeholder="Password" minlength="6" required>
                          </div>
                          <button type="submit" class="btn marginbot-15">Sign In</button>
                        </form>
                        <div class="forget-pass">
                            <p class="blue-text"><a href="<?php echo base_url() ?>reset">Forgot Password?</a></p>
                            <p class="sign-up-text">Don’t have an account? <a href="<?php echo base_url() ?>signup"><span class="blue-text">Sign up</span></a></p>
                        </div>
                  </div>
                  
              </div>
              <!-- <div class="f-book-google">or connect with <a href="javascript:;">Facebook</a> or <a href="<?php //echo $login_button; ?>">Google</a></div> -->
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
  
  var signinForm = $("#signin");
  
  var validator = signinForm.validate({
    
    rules:{
      email : { required : true, email : true },
      password : { required : true }
    },
    messages:{
      email : { required : "This field is required", email : "Please enter valid email address" },
      password : { required : "This field is required" } 
    }
  });
});
</script>
<?php $this->load->view('fincludes/header'); ?>
    <!-- ======= Body Conter Start ======= -->
    <section class="bg-grey">
        <div class="container">
            <div class="row padtop-140 padbot-140">
                <div class="d-flex justify-content-center">
                    <div class="bg-white border-rounded-7 dark-grey-text p-35 login-box">
                        <div class="heading text-start ">
                            Reset Password
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
                          <div class="alert alert-success alert-dismissable text-center"> <?php echo $this->session->flashdata('success'); ?> </div>
                          <?php } ?>
                          
                          <div class="row">
                              <div class="col-md-12">
                                  <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                              </div>
                          </div>
                        </div>
                        <form role="form" id="resetpassword" enctype='multipart/form-data' action="<?php echo base_url().'resetpassword/'.$key; ?>" method="post" role="form">
                            <div class="marginbot-35 input-form mt-3">
                                <label for="password" class="form-label flex flex-col sm:flex-row"> Password <span class="text-danger">*</span> </label>
                                <input type="password" class="form-control input w-full border mt-2 required" name="password" id="password" value="<?php echo set_value('password'); ?>" placeholder="Password" minlength="6" required>
                            </div>
                            <div class="marginbot-35 input-form mt-3">
                                <label for="cpassword" class="form-label flex flex-col sm:flex-row"> Confirm Password <span class="text-danger">*</span> </label>
                                <input type="password" class="form-control input w-full border mt-2 equalTo required" name="cpassword" id="cpassword" value="<?php echo set_value('cpassword'); ?>" placeholder="Confirm Password" minlength="6" required>
                            </div>
                            <button type="submit" class="btn marginbot-15">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ======= Body Conter End ======= -->
<?php $this->load->view('fincludes/footer'); ?>
<script type="text/javascript">

  $(document).ready(function(){
  
  var resetpasswordForm = $("#resetpassword");
  
  var validator = resetpasswordForm.validate({
    
    rules:{
      password : { required : true },
      cpassword : {required : true, equalTo: "#password"}
    },
    messages:{
      password : { required : "This field is required" },
      cpassword : {required : "This field is required", equalTo: "Please enter same password" }  
    }
  });
});
</script>
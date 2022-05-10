<?php $this->load->view('fincludes/header'); ?>
    <!-- ======= Body Conter Start ======= -->
    <section class="bg-grey">
        <div class="container">
            <div class="row padtop-140 padbot-140">
                <div class="d-flex justify-content-center">
                    <div class="bg-white border-rounded-7 dark-grey-text p-35 login-box">
                        <div class="heading text-start ">
                            Create Password
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
                        <form role="form" id="reset_password" enctype='multipart/form-data' action="<?php echo base_url() ?>reset_password" method="post" role="form">
                            <div class="marginbot-15 input-form mt-3">
                                <label for="email" class="form-label flex flex-col sm:flex-row"> Email Address <span class="text-danger">*</span> </label>
                                <input type="email" class="form-control input w-full border mt-2 email required" name="email" id="email" value="<?php echo set_value('email'); ?>" placeholder="Email Address">
                            </div>
                            <button type="submit" class="btn marginbot-15">Send</button>
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
  
  var reset_passwordForm = $("#reset_password");
  
  var validator = reset_passwordForm.validate({
    
    rules:{
      email : { required : true, email : true }
    },
    messages:{
      email : { required : "This field is required", email : "Please enter valid email address" }
    }
  });
});
</script>
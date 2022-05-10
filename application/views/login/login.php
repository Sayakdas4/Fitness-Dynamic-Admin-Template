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
                        <div class="col-md-12">
                            <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                        </div>
                    </div>
                    <?php
                    $this->load->helper('form');
                    $error = $this->session->flashdata('error');
                    if($error)
                    {
                        ?>
                        <div class="alert alert-danger alert-dismissable">
                            <!-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> -->
                            <?php echo $error; ?>                    
                        </div>
                    <?php }
                    $success = $this->session->flashdata('success');
                    if($success)
                    {
                        ?>
                        <div class="alert alert-success alert-dismissable">
                            <!-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> -->
                            <?php echo $success; ?>                    
                        </div>
                    <?php } ?>
                    <form action="<?php echo base_url(); ?>loginMe" method="post" id="login">
                        <div class="marginbot-15">
                          <label for="exampleInputEmail1" class="form-label">Email Address</label>
                          <input type="email" name="email" class="form-control required" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="admin@gmail.com" >
                        </div>
                        <div class="marginbot-35">
                          <label for="exampleInputPassword1" class="form-label">Password</label>
                          <input type="password" name="password" class="form-control required" id="exampleInputPassword1" placeholder="Password" >
                        </div>
                        <button type="submit" class="btn marginbot-15">Sign In</button>
                      </form>
                      <div class="forget-pass">
                          <p class="blue-text"><a href="javascript:;">Forgot Password?</a></p>
                          <p class="sign-up-text">Don’t have an account? <a href="javascript:;"><span class="blue-text">Sign up</span></a></p>
                      </div>
                </div>
                
            </div>
            <div class="f-book-google" style="display: none;">or connect with <a href="javascript:;">Facebook</a> or <a href="javascript:;">Google</a></div>
          </div>
        </div>
      </section>
      <!-- ======= Body Conter End ======= -->
<?php //$this->load->view('fincludes/footer'); ?>
<?php $this->load->view('fincludes/header'); ?>
      <!-- ======= Body Conter Start ======= -->
      <section class="bg-grey">
        <div class="container">
          <div class="row padtop-140 padbot-140">
            <div class="d-flex justify-content-center">
                <div class="bg-white border-rounded-7 dark-grey-text p-35 login-box">
                    <div class="heading text-start pb-0 ">
                        <p class="pb-1 mb-0 text-center text-danger"><i class="fas fa-exclamation-triangle"></i> Payment Failed</p>
                        
                    </div>
                    <div class="forget-pass">
                        <p class="sign-up-text text-center">Some problems occured, please try again...</p>
                        <p class="text-center padtopbot-15"><a href="<?php echo base_url() ?>">Back To Home</a></p>
                    </div>
                </div>
                
            </div>
            
          </div>
        </div>
      </section>
      <!-- ======= Body Conter End ======= -->
<?php $this->load->view('fincludes/footer'); ?>
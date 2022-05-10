<?php $this->load->view('fincludes/header'); ?>
      <!-- ======= Body Container Start ======= -->
    <section class="bg-grey team-page-banner-text padbot-250">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-2">
                    <nav class="sidebar">
                        <div class="sidebar-content">
                            <ul class="nav nav-tabs d-flex flex-sm-row flex-column list-group sidebar-nav">
                                <li class="nav-item sidebar-item">
                                    <a class="nav-link border-0 active" data-bs-toggle="tab" href="#account">Account</a>
                                </li>
                                <li class="nav-item sidebar-item">
                                    <a class="nav-link border-0" data-bs-toggle="tab" href="#orders">Orders</a>
                                </li>
                                <!-- <li class="sidebar-item">
                                    <a href="javascript:;">Address</a>
                                </li> -->
                                <li class="sidebar-item">
                                  <?php if($this->session->userdata('user_data')){ ?>
                                    <a href="<?php echo base_url() ?>google_login/signout" class="nav-link">Logout</a>
                                  <?php } else{ ?>
                                    <a href="<?php echo base_url() ?>signout" class="nav-link">Logout</a>
                                  <?php } ?>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>

                <div class="col-sm-12 col-md-10">
                    <div class="dashboard-section">
                    <div class="tab-content">
                        <!-- Account -->
                        <div class="tab-pane container p-0 active" id="account">
                            <div class="welcome-section">
                                Welcome<span>, 
                                    <?php
                                        if($this->session->userdata('user_data')){
                                            $user_data = $this->session->userdata('user_data');
                                            echo $user_data['name'];
                                        } else {
                                            echo $user_data->name;
                                        }
                                    ?>
                                </span>
                            </div>
                            <div class="account-info">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card border-0 border-rounded-7">
                                            <div class="card-body dahborad-card-body">
                                                <div class="info-heading border-bottom">
                                                    Your Account Information
                                                </div>
                                                <div>
                                                    <ul class="list-inline account-info">
                                                        <span class="d-block">
                                                            <li class="list-inline-item">Name:</li>
                                                            <li class="list-inline-item">
                                                                <?php
                                                                    if($this->session->userdata('user_data')){
                                                                        $user_data = $this->session->userdata('user_data');
                                                                        echo $user_data['name'];
                                                                    } else {
                                                                        echo $user_data->name;
                                                                    }
                                                                ?>
                                                            </li>
                                                        </span>
                                                        <span class="d-block">
                                                            <li class="list-inline-item">Email:</li>
                                                            <li class="list-inline-item">
                                                                <?php
                                                                    if($this->session->userdata('user_data')){
                                                                        $user_data = $this->session->userdata('user_data');
                                                                        echo $user_data['email'];
                                                                    } else {
                                                                        echo $user_data->email;
                                                                    }
                                                                ?>
                                                            </li>
                                                        </span>
                                                        <?php if(@$user_data->phone){ ?>
                                                        <span class="d-block">
                                                            <li class="list-inline-item">Mobile:</li>
                                                            <li class="list-inline-item">
                                                                <?php
                                                                    // if($this->session->userdata('user_data')){
                                                                    //     $user_data = $this->session->userdata('user_data');
                                                                    //     echo $user_data['phone'];
                                                                    // } else {
                                                                            echo $user_data->phone;
                                                                    // }
                                                                ?>
                                                            </li>
                                                        </span>
                                                        <?php } ?>
                                                        <?php if($user_data->address && $user_data->state && $user_data->country){ ?>
                                                        <span class="d-block">
                                                            <li class="list-inline-item">Address:</li>
                                                            <li class="list-inline-item">
                                                                <?php
                                                                    echo $user_data->address.", ".$user_data->state.", ".$user_data->country;
                                                                ?>
                                                            </li>
                                                        </span>
                                                        <?php } ?>
                                                        <!-- <span class="d-block">
                                                            <li class="list-inline-item">Address:</li>
                                                            <li class="list-inline-item">Akshya Nagar 1st Block 1st Cross, Rammurthy nagar, Kolkata-700064</li>
                                                        </span> -->
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Order -->
                        <div class="tab-pane container p-0 fade" id="orders">
                            <div class="welcome-section">
                                Welcome<span>,
                                    <?php
                                        if($this->session->userdata('user_data')){
                                          $user_data = $this->session->userdata('user_data');
                                          echo $user_data['name'];
                                        } else {
                                          echo $user_data->name;
                                        }
                                    ?>
                                </span>
                            </div>
                            <div class="d-md-flex justify-content-md-evenly justify-content-lg-between">
                                <?php if(!empty($order_data)){ ?>
                                    <div class="bg-white border-rounded-7 small-box">
                                        <p>Order</p>
                                        <p class="order-info"><?php if($order_data->plans_pricingID == 1){echo "Kick Starter";} if($order_data->plans_pricingID == 2){echo "Coaching";} ?></p>
                                    </div>
                                    <div class="bg-white border-rounded-7 small-box">
                                        <p>Start Date</p>
                                        <p class="blue-text">
                                            <?php echo date('jS M Y', strtotime($order_data->paymentdate)); ?>
                                        </p>
                                    </div>
                                    <div class="bg-white border-rounded-7 small-box">
                                        <p>End Date</p>
                                        <p class="blue-text">
                                            <?php echo date('jS M Y', strtotime($order_data->enddate)); ?>
                                            <?php
                                                // if($order_data->duration_format == 'Days'){
                                                //     $day_count = $order_data->duration;
                                                // }
                                                // if($order_data->duration_format == 'Month'){
                                                //     $day_count = $order_data->duration * 30;
                                                // }
                                                // if($order_data->duration_format == 'Year'){
                                                //     $day_count = $order_data->duration * 365;
                                                // }
                                                // $date_data = date('Y-m-d',strtotime($order_data->paymentdate));
                                                // echo $end_date = date('jS M Y', strtotime($date_data. ' +'.$day_count.' days'));
                                            ?>
                                        </p>
                                    </div>
                                    <div class="bg-white border-rounded-7 small-box">
                                        <p>Status</p>
                                        <?php 
                                            $curr_date = date('Y-m-d');
                                            $start_date = date('Y-m-d', strtotime($order_data->paymentdate));
                                            $ending_date = date('Y-m-d', strtotime($order_data->enddate));
                                            if(($curr_date >= $start_date) && ($curr_date <= $ending_date)){
                                        ?>
                                            <p class="green-text">Active</p>
                                        <?php } else { ?>
                                            <p class="text-danger">Expired</p>
                                        <?php } ?>
                                    </div>
                                    <div class="bg-white border-rounded-7 small-box">
                                        <p>Total</p>
                                        <p class="order-info"><?php echo '₹'.$order_data->price ?></p>
                                    </div>
                                <?php } else { ?>

                                <?php } ?>
                            </div>
                            <!-- <div class="card-section">
                                <div class="row">
                                    <div class="col-sm-12 col-md-4">
                                        <div class="card border-0 border-rounded-7  dahborad-card">
                                            <div class="card-body dahborad-card-body">
                                                <div class="icon-section mx-auto margin-bot-25">
                                                    <img src="<?php //echo base_url() ?>fassets/images/refresh-icon.png" alt="TFC" class="img-fluid">
                                                </div>
                                                <p class="box-head mb-0">Renew</p>
                                                <p class="box-description mb-0">
                                                    Extend your current plan and<br> unlock the incentive to<br> keep making progress
                                                </p>
                                                <div class="discount-text">
                                                    <p class="discount-title">
                                                        Flat Discount
                                                    </p>
                                                    <p class="discount-amount">₹ 1000 /-</p>
                                                    <p class="refer-txt">
                                                        <a href="javascript:;" class="text-decoration-none font-weight-400">Refer now 
                                                            <svg width="8" height="15" viewBox="0 0 8 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.31327 0.338176C0.730962 -0.112725 1.40818 -0.112725 1.82587 0.338176L7.53024 6.49607C7.94793 6.94697 7.94793 7.67803 7.53024 8.12893L1.82587 14.2868C1.40818 14.7377 0.730962 14.7377 0.31327 14.2868C-0.104423 13.8359 -0.104423 13.1049 0.31327 12.654L5.26134 7.3125L0.31327 1.97103C-0.104423 1.52013 -0.104423 0.789077 0.31327 0.338176Z" fill="#4B97F7"/>
                                                            </svg>
                                                        </a>
                                                    </p>
                                                    <small class="valid-text">*Valid till the last date of your current package</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="card border-0 border-rounded-7 dahborad-card">
                                            <div class="card-body dahborad-card-body">
                                                <div class="icon-section mx-auto margin-bot-25">
                                                    <img src="<?php //echo base_url() ?>fassets/images/refer-icon.png" alt="TFC" class="img-fluid">
                                                </div>
                                                <p class="box-head mb-0">Refer</p>
                                                <p class="box-description mb-0">
                                                    Invite a friend for coaching and <br>they’ll get ₹1000 off on their<br> enrollment. Additionally, you’ll get
                                                </p>
                                                <div class="discount-text">
                                                    <p class="discount-title">
                                                        Duration Extended
                                                    </p>
                                                    <p class="discount-amount">+ 2 weeks free</p>
                                                    <p class="refer-txt">
                                                        <a href="javascript:;" class="text-decoration-none font-weight-400">Refer now 
                                                            <svg width="8" height="15" viewBox="0 0 8 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.31327 0.338176C0.730962 -0.112725 1.40818 -0.112725 1.82587 0.338176L7.53024 6.49607C7.94793 6.94697 7.94793 7.67803 7.53024 8.12893L1.82587 14.2868C1.40818 14.7377 0.730962 14.7377 0.31327 14.2868C-0.104423 13.8359 -0.104423 13.1049 0.31327 12.654L5.26134 7.3125L0.31327 1.97103C-0.104423 1.52013 -0.104423 0.789077 0.31327 0.338176Z" fill="#4B97F7"/>
                                                            </svg>
                                                        </a>
                                                    </p>
                                                    <small class="valid-text">*Valid till the last date of your current package<br>* Referral valid only on coaching packages</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="card border-0 border-rounded-7 dahborad-card">
                                            <div class="card-body dahborad-card-body">
                                                <div class="icon-section mx-auto margin-bot-25">
                                                    <img src="<?php //echo base_url() ?>fassets/images/gift-icon.png" alt="TFC" class="img-fluid">
                                                </div>
                                                <p class="box-head mb-0">Gift</p>
                                                <p class="box-description mb-0">
                                                    Surprise a loved one with our 10<br> day kick-starter package & help them get a step closer to fitness.
                                                </p>
                                                <div class="discount-text">
                                                    <p class="discount-title">
                                                        Satisfaction Guaranteed
                                                    </p>
                                                    <p class="discount-amount">100%</p>
                                                    <p class="refer-txt">
                                                        <a href="javascript:;" class="text-decoration-none font-weight-400">Refer now 
                                                            <svg width="8" height="15" viewBox="0 0 8 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.31327 0.338176C0.730962 -0.112725 1.40818 -0.112725 1.82587 0.338176L7.53024 6.49607C7.94793 6.94697 7.94793 7.67803 7.53024 8.12893L1.82587 14.2868C1.40818 14.7377 0.730962 14.7377 0.31327 14.2868C-0.104423 13.8359 -0.104423 13.1049 0.31327 12.654L5.26134 7.3125L0.31327 1.97103C-0.104423 1.52013 -0.104423 0.789077 0.31327 0.338176Z" fill="#4B97F7"/>
                                                            </svg>
                                                        </a>
                                                    </p>
                                                    <small class="valid-text">*Valid till the last date of your current package<br>* Referral valid only on kick-starter packages</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    </div>
                    
                </div>
            </div>
             
        </div>
    </section>
      <!-- ======= Body Container End ======= -->
        <!--footer Start-->
        <footer>
            <div class="container py-5">
                <div class=" d-md-flex justify-content-md-evenly justify-content-lg-between " data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                    <div class="footer-block mb-3">
                        <h5>Contact us</h5>
                        <ul>
                            <li><a href="tel:+91 99999 75573"> +91 99999 75573</a> </li>
                            <li><a href="mailto:shrey@thefitchase.com">shrey@thefitchase.com</a></li>
                            <li><a href="https://calendly.com/thefitchase-callback/call?month=2022-03">Request a callback </a></li>
                        </ul>
                    </div>
                    <div class="footer-block mb-3">
                        <h5>Company</h5>
                        <ul>
                            <li><a href="<?php echo base_url(); ?>about-us" class="<?php if(current_url()==base_url('about-us')){echo "active";}?>">About us</a></li>
                            <li><a href="<?php echo base_url(); ?>team" class="<?php if(current_url()==base_url('team')){echo "active";}?>">The Team</a></li>
                            <li><a href="<?php echo base_url(); ?>success-stories" class="<?php if(current_url()==base_url('success-stories')){echo "active";}?>">Success Stories</a></li>
                        </ul>
                    </div>
                    <div class="footer-block mb-3">
                        <h5>Plans & Pricing</h5>
                        <ul>
                            <li><a href="<?php echo base_url(); ?>kick-starter" class="<?php if(current_url()==base_url('kick-starter')){echo "active";}?>">Kick-starter</a></li>
                            <li><a href="<?php echo base_url(); ?>coaching" class="<?php if(current_url()==base_url('coaching')){echo "active";}?>">Coaching</a></li>
                            <li><a href="<?php echo base_url(); ?>faq" class="<?php if(current_url()==base_url('faq')){echo "active";}?>">FAQ’s</a></li>
                        </ul>
                    </div>
                    <div class="footer-block mb-3">
                        <h5>Explore</h5>
                        <ul>
                            <li><a href="<?php echo base_url(); ?>fitness-recipe" class="<?php if(current_url()==base_url('fitness-recipe')){echo "active";}?>">Fitness Recipies</a></li>
                            <li><a href="<?php echo base_url(); ?>exercise-video" class="<?php if(current_url()==base_url('exercise-video')){echo "active";}?>">Exercise Videos</a></li>
                            <li><a href="<?php echo base_url(); ?>knowledge-library" class="<?php if(current_url()==base_url('knowledge-librar')){echo "active";}?>">Knowledge Library</a></li>
                        </ul>
                    </div>
                    <div class="footer-block mb-3">
                        <h5>Legal</h5>
                        <ul>
                            <li><a href="javascript:;" class="<?php if(current_url()==base_url('privacy-poliy')){echo "active";}?>">Privacy Policy</a></li>
                            <li><a href="javascript:;" class="<?php if(current_url()==base_url('terms-conditions')){echo "active";}?>">Terms & Conditions</a></li>
                            <li><a href="javascript:;" class="<?php if(current_url()==base_url('refund-policy')){echo "active";}?>">Refund Policy</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row pt-5 w-100 m-0">
                    <div class="col-sm-12 col-lg-6 s-media text-sm-center text-lg-start mb-3">
                        <a href=""><i class="fab fa-facebook-f"></i></a>
                        <a href="" class="px-4"><i class="fab fa-instagram"></i></a>
                        <a href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <div class="col-sm-12 col-lg-6 text-sm-center text-lg-end copy-right"><small class="font-normal">Copyright &copy; 2022 The Fit Chase. All rights reserved.</small></div>
                </div>
            </div>
        </footer>
        <!--footer End-->
    </main>
</body>

<!--JS File -->
<!-- <script src="<?php //echo assets_url();?>fassets/js/bootstrap.bundle.min.js"></script> -->
<script src="<?php echo assets_url();?>fassets/js/popper.min.js"></script>
<script src="<?php echo assets_url();?>fassets/js/bootstrap.min.js"></script>
<script src="<?php echo assets_url();?>fassets/js/custom.js"></script>
<script src="<?php echo assets_url(); ?>assets/js/jQuery-2.1.4.min.js"></script>
<script src="<?php echo assets_url(); ?>assets/js/jquery.validate.js" type="text/javascript"></script>
<script src="<?php echo assets_url(); ?>assets/js/validation.js" type="text/javascript"></script>
<!--Animation JS-->
<!-- <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script> -->

<!-- INITIALIZE AOS: -->
<!-- <script>
  AOS.init();
</script> -->
<script>
    document.addEventListener("DOMContentLoaded", function(){
// make it as accordion for smaller screens
if (window.innerWidth > 992) {

    document.querySelectorAll('.navbar .nav-item').forEach(function(everyitem){

        everyitem.addEventListener('mouseover', function(e){

            let el_link = this.querySelector('a[data-bs-toggle]');

            if(el_link != null){
                let nextEl = el_link.nextElementSibling;
                el_link.classList.add('show');
                nextEl.classList.add('show');
            }

        });
        everyitem.addEventListener('mouseleave', function(e){
            let el_link = this.querySelector('a[data-bs-toggle]');

            if(el_link != null){
                let nextEl = el_link.nextElementSibling;
                el_link.classList.remove('show');
                nextEl.classList.remove('show');
            }


        })
    });

}
// end if innerWidth
});
</script>
</html>

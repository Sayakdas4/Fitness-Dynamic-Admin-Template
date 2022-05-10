<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>The Fit Chase</title>
  <link rel = "icon" href = "<?php echo assets_url();?>assets/images/img/favicon.png" type = "image/x-icon">
  <meta content="" name="description">
  <meta content="" name="keywords">

 
  
  <!-- CSS File -->
  <link href="<?php echo assets_url();?>fassets/css/reset.css" rel="stylesheet">
  <link href="<?php echo assets_url();?>fassets/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo assets_url();?>fassets/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo assets_url();?>fassets/css/owl.carousel.min.css" />
  <link rel="stylesheet" href="<?php echo assets_url();?>fassets/css/owl.theme.default.min.css" />
  <link rel="stylesheet" href="<?php echo assets_url();?>fassets/css/animate.css" />
  <link href="<?php echo assets_url();?>fassets/css/custom.css?c=5" rel="stylesheet">
  <link href="<?php echo assets_url();?>fassets/css/custom_phone.css" rel="stylesheet">
  <link href="<?php echo assets_url();?>fassets/css/responsive.css?v=3" rel="stylesheet">
  <!--Animation CSS-->
  <!-- <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"> -->
  <script src="<?php echo assets_url(); ?>assets/js/jQuery-2.1.4.min.js"></script>
</head>
<?php 
    $base = base_url()."razorpay/payment_kick_starter";
    $base1 = base_url()."razorpay/payment_coaching"; 
?>
<body <?php if(current_url() == $base || current_url() == $base1){ ?>onload="myFunction();" <?php } ?> >
    <main>
        <!-- ======= Header ======= -->
        <header id="" class="header fixed-top" data-scrollto-offset="0">
            <!--navbar logo start-->
            <nav class="navbar navbar-expand-lg navbar-dark p-0">
                <div class="container">
                  <!-- <a class="navbar-brand" href="<?php //echo base_url(); ?>"><img src="<?php //echo base_url().'uploads/'.$logo->image; ?>" alt="TFC" class="navbar-brand"> </a> -->
                  <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url() ?>fassets/images/logo.png" alt="TFC" class="navbar-brand"> </a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto" >
                        <li><a class="nav-link text-white scrollto <?php if(current_url()==base_url('team')){echo "active";}?>" href="<?php echo base_url(); ?>team">The Team</a></li>
                        <li><a class="nav-link text-white scrollto <?php if(current_url()==base_url('success-stories')){echo "active";}?>" href="<?php echo base_url(); ?>success-stories">Success Stories</a></li>
                        <!-- <li><a class="nav-link text-white scrollto" href="<?php echo base_url(); ?>plans">Plans &amp; Pricing</a></li> -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white scrollto" data-bs-toggle="dropdown" href="#">Plans &amp; Pricing</a>
                            <div class="dropdown-menu">
                                <a href="<?php echo base_url(); ?>kick-starter" class="dropdown-item <?php if(current_url()==base_url('kick-starter')){echo "active";}?>">Kick-starter</a>
                                <a href="<?php echo base_url(); ?>coaching" class="dropdown-item <?php if(current_url()==base_url('coaching')){echo "active";}?>">Coaching</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white scrollto" data-bs-toggle="dropdown" href="#">Explore</a>
                            <div class="dropdown-menu">
                                <a href="<?php echo base_url(); ?>fitness-recipe" class="dropdown-item <?php if(current_url()==base_url('fitness-recipe')){echo "active";}?>">Fitness Recipes</a>
                                <a href="<?php echo base_url(); ?>exercise-video" class="dropdown-item <?php if(current_url()==base_url('exercise-video')){echo "active";}?>">Exercise Videos</a>
                                <a href="<?php echo base_url(); ?>knowledge-library" class="dropdown-item <?php if(current_url()==base_url('knowledge-library')){echo "active";}?>">Knowledge Library</a>
                            </div>
                        </li>
                        <li><a class="nav-link text-white scrollto" href="#req_callback" data-bs-toggle="modal" data-bs-target="#req_callback">Request a Callback</a></li>
                        <!-- <div class="modal" id="req_callback" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered modal-xl">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="calendly-inline-widget" data-url="https://calendly.com/thefitchase-callback/call?month=2022-03" style="min-width:640px;height:600px;"></div>
                                        <script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js" async></script>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <li>
                            <a class="nav-link scrollto <?php if(current_url()==base_url('dashboard')){echo "active";}?>" href="<?php echo base_url() ?>dashboard">
                                <svg width="20" height="20" viewBox="0 0 13 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.4102 13.0878L11.8386 4.60081C11.8102 4.37241 11.6387 4.20065 11.4101 4.20065H9.41016V3.2007C9.41016 1.42889 8.0672 0 6.41016 0C4.75312 0 3.41016 1.42859 3.41016 3.2007V4.20065H1.41026C1.18158 4.20065 1.01016 4.37241 0.981687 4.60081L0.410156 13.0878V13.1163C0.410156 14.4879 1.4675 15.5455 2.83863 15.5455H9.98138C11.3528 15.5455 12.4099 14.4879 12.4099 13.1163V13.0878H12.4102ZM4.2673 3.2007C4.2673 1.91478 5.23863 0.857581 6.41016 0.857581C7.61016 0.857581 8.55301 1.88631 8.55301 3.2007V4.20095H4.2673V3.2007ZM9.98169 14.6882H2.83893C1.95332 14.6882 1.26761 14.0024 1.26761 13.1166L1.81036 5.05823H11.0106L11.553 13.1166C11.553 14.0024 10.8673 14.6882 9.98169 14.6882Z" fill="#F5F5F7"/>
                                </svg>
                                <span class="hide-desktop text-white">Sign In</span>
                          </a>
                        </li>
                      </ul>
                  </div>
                </div>
              </nav>
              <!--navbar logo end-->
        </header>
        <!-- ======= Header End ======= -->
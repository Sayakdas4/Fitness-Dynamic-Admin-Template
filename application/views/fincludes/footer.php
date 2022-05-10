        <!--footer Start-->
        <footer>
            <div class="container py-5">
                <div class=" d-md-flex justify-content-md-evenly justify-content-lg-between " data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                    <div class="footer-block mb-3">
                        <h5>Contact us</h5>
                        <ul>
                            <li><a href="tel:<?=$contact->phone?>"> <?=$contact->phone?></a> </li>
                            <li><a href="mailto:<?=$contact->email?>"><?=$contact->email?></a></li>
                            <li><a href="#req_callback" data-bs-toggle="modal" data-bs-target="#req_callback">Request a callback </a></li>
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
                            <li><a href="<?php echo base_url(); ?>fitness-recipe" class="<?php if(current_url()==base_url('fitness-recipe')){echo "active";}?>">Fitness Recipes</a></li>
                            <li><a href="<?php echo base_url(); ?>exercise-video" class="<?php if(current_url()==base_url('exercise-video')){echo "active";}?>">Exercise Videos</a></li>
                            <li><a href="<?php echo base_url(); ?>knowledge-library" class="<?php if(current_url()==base_url('knowledge-librar')){echo "active";}?>">Knowledge Library</a></li>
                        </ul>
                    </div>
                    <div class="footer-block mb-3">
                        <h5>Legal</h5>
                        <ul>
                            <li><a href="<?php echo base_url(); ?>privacy-policy" class="<?php if(current_url()==base_url('privacy-policy')){echo "active";}?>">Privacy Policy</a></li>
                            <li><a href="<?php echo base_url(); ?>terms-conditions" class="<?php if(current_url()==base_url('terms-conditions')){echo "active";}?>">Terms & Conditions</a></li>
                            <li><a href="<?php echo base_url(); ?>refund-policy" class="<?php if(current_url()==base_url('refund-policy')){echo "active";}?>">Refund Policy</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row pt-5 w-100 m-0">
                    <div class="col-sm-12 col-lg-6 s-media text-sm-center text-lg-start mb-3">
                        <a href="<?=$contact->fb_link?>"><i class="fab fa-facebook-f"></i></a>
                        <a href="<?=$contact->instagram_link?>" class="px-4"><i class="fab fa-instagram"></i></a>
                        <a href="<?=$contact->linkedin_link?>"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <div class="col-sm-12 col-lg-6 text-sm-center text-lg-end copy-right"><small class="font-normal">Copyright &copy; 2022 The Fit Chase. All rights reserved.</small></div>
                </div>
            </div>
        </footer>
        <!--footer End-->
    </main>
<div class="modal fade" id="req_callback" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-body">
                <div class="calendly-inline-widget" data-url="https://calendly.com/thefitchase-callback/call?month=2022-03"></div>
                <script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js" async></script>
            
            </div>
        </div>
    </div>
</div>
</body>

<!--JS File -->

<!-- <script src="<?php //echo assets_url(); ?>fassets/js/jquery.min.js"></script> -->
<!-- <script src="<?php //echo assets_url();?>fassets/js/bootstrap.bundle.min.js"></script> -->
<script src="<?php echo assets_url();?>fassets/js/popper.min.js"></script>
<script src="<?php echo assets_url();?>fassets/js/bootstrap.min.js"></script>
<script src="<?php echo assets_url();?>fassets/js/owl.carousel.min.js"></script>
<script src="<?php echo assets_url();?>fassets/js/jquery.matchHeight.js"></script>
<script src="<?php echo assets_url();?>fassets/js/custom.js"></script>

<!-- <script src="<?php //echo assets_url(); ?>assets/js/jquery.validate.js" type="text/javascript"></script> -->
<!-- <script src="<?php //echo assets_url(); ?>assets/js/validation.js" type="text/javascript"></script> -->
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
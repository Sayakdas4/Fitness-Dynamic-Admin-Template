<?php $this->load->view('fincludes/header'); ?>
    <!-- ======= Body Conter Start ======= -->
    <section class="bg-grey">
        <div class="container">
            <div class="row padtop-140 padbot-140">
                <div class="d-flex justify-content-center">
                    <div class="bg-white border-rounded-7 dark-grey-text p-35 login-box">
                        <div class="heading text-start pb-0 ">
                            <p class="pb-1 mb-0 text-center">Billing Details</p>
                            <!-- <p class="subheading border-bottom text-center">You are subscribing for</p>  -->
                        </div>
                        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
                        <?php $this->load->helper('form'); ?>
                        <form role="form" name="checkout" action="<?php echo base_url(); ?>checkout_coaching" method="post" id="checkout" enctype='multipart/form-data'>
                            <!-- <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
                            <input type="hidden" name="razorpay_signature"  id="razorpay_signature"> -->
                            <input type="hidden" name="razorpay_payment_typeID"  id="razorpay_payment_typeID" value="<?php echo $pricingInfo->coaching_pricing_id; ?>" >
                            <input type="hidden" name="plans_pricingID"  id="plans_pricingID" value="2" >
                            <input type="hidden" name="price"  id="price" value="<?php echo $pricingInfo->price; ?>" >
                            <input type="hidden" name="duration"  id="duration" value="<?php echo $pricingInfo->duration; ?>" >
                            <input type="hidden" name="duration_format"  id="duration_format" value="<?php echo $pricingInfo->duration_format; ?>" >

                            <div class="marginbot-15">
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
                                <div class="marginbot-15 input-form mt-3">
                                    <label for="country" class="form-label flex flex-col sm:flex-row"> Country <span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control input w-full border mt-2" name="country" id="country" value="<?php echo set_value('country'); ?>" placeholder="India" required>
                                </div>
                                <div class="marginbot-15 input-form mt-3">
                                    <label for="state" class="form-label flex flex-col sm:flex-row"> State <span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control input w-full border mt-2" name="state" id="state" value="<?php echo set_value('state'); ?>" placeholder="Delhi" required>
                                </div>
                                <div class="marginbot-15 input-form mt-3">
                                    <label for="address" class="form-label flex flex-col sm:flex-row"> Address <span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control input w-full border mt-2" name="address" id="address" value="<?php echo set_value('address'); ?>" placeholder="" required>
                                </div>
                                <div class="marginbot-35 input-form mt-3">
                                    <label for="password" class="form-label flex flex-col sm:flex-row"> Password <span class="text-danger">*</span> </label>
                                    <input type="password" class="form-control input w-full border mt-2 required" name="password" id="password" value="<?php echo set_value('password'); ?>" placeholder="Password" minlength="6" required>
                                </div>
                                <div class="marginbot-35 input-form mt-3">
                                    <label for="password" class="form-label flex flex-col sm:flex-row"> Password <span class="text-danger">*</span> </label>
                                    <input type="password" class="form-control input w-full border mt-2 required" name="password" id="password" value="<?php echo set_value('password'); ?>" placeholder="Password" minlength="6" required>
                                </div>
                                <div class="marginbot-35 input-form mt-3">
                                    <label for="cpassword" class="form-label flex flex-col sm:flex-row"> Confirm Password <span class="text-danger">*</span> </label>
                                    <input type="password" class="form-control input w-full border mt-2 equalTo required" name="cpassword" id="cpassword" value="<?php echo set_value('cpassword'); ?>" placeholder="Confirm Password" minlength="6" required>
                                </div>
                            </div>
                            <div class="border-top">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Duration</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $pricingInfo->duration." ".$pricingInfo->duration_format; ?></td>
                                            <td><?php echo date('d-m-Y'); ?></td>
                                            <td><span>₹</span><?php echo $pricingInfo->price; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="marginbot-35 input-form mt-3">
                                <input type="checkbox" name="accept_terms" class="custom-control-input required" id="accept_terms" />
                                <label class="custom-control-label" for="accept_terms">I have agreed to the terms and conditions.</label>
                            </div>
                            <button type="submit" class="btn marginbot-15">Pay with Razorpay</button>
                        </form>
                        <div class="forget-pass">
                            <!-- <p class="blue-text"><a href="javascript:;">Forgot Password?</a></p> -->
                            <p class="sign-up-text">Already have an account? <a href="<?php echo base_url() ?>signin"><span class="blue-text">Sign In</span></a></p>
                        </div>
                    </div>
                </div>
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
  
  var checkoutForm = $("#checkout");
  
  var validator = checkoutForm.validate({
    
    rules:{
      name :{ required : true },
      // email : { required : true, email : true, remote : { url : baseURL + "checkEmailExists", type :"post"} },
      email : { required : true, email : true },
      mobile : { required : true, digits : true },
      country :{ required : true },
      state :{ required : true },
      address :{ required : true },
      password : { required : true },
      cpassword : {required : true, equalTo: "#password"}
    },
    messages:{
      name :{ required : "This field is required" },
      // email : { required : "This field is required", email : "Please enter valid email address", remote : "Email address already taken" },
      email : { required : "This field is required", email : "Please enter valid email address" },
      mobile : { required : "This field is required", digits : "Please enter numbers only" },
      country :{ required : "This field is required" },
      state :{ required : "This field is required" },
      address :{ required : "This field is required" },
      password : { required : "This field is required" },
      cpassword : {required : "This field is required", equalTo: "Please enter same password" }  
    }
  });
});
</script>
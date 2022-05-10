<?php $this->load->view('fincludes/header'); ?>
    <!-- ======= Body Conter Start ======= -->
    <section class="bg-grey">
        <div class="container">
            <div class="row padtop-140 padbot-140">
                <div class="d-flex justify-content-center">
                    <div class="bg-white border-rounded-7 dark-grey-text p-35 login-box">
                        <div class="heading text-start pb-0 ">
                            <p class="pb-1 mb-0 text-center">Confirmation</p>
                            <!-- <p class="subheading border-bottom text-center">You are subscribing for</p>  -->
                        </div>
                        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
                        <?php $this->load->helper('form'); ?>
                        <form name="razorpayform" action="<?php echo base_url(); ?>callback" method="post" id="signin">
                            <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
                            <input type="hidden" name="razorpay_signature"  id="razorpay_signature">
                            <input type="hidden" name="razorpay_payment_typeID"  id="razorpay_payment_typeID" value="<?php echo $pricingInfo->kick_starter_pricing_id; ?>" >
                            <input type="hidden" name="plans_pricingID"  id="plans_pricingID" value="1" >
                            <input type="hidden" name="price"  id="price" value="<?php echo $pricingInfo->price; ?>" >
                            <input type="hidden" name="duration"  id="duration" value="<?php echo $pricingInfo->duration; ?>" >
                            <input type="hidden" name="duration_format"  id="duration_format" value="<?php echo $pricingInfo->duration_format; ?>" >
                            <input type="hidden" name="userID"  id="userID" value="<?php echo $user_data['user_id']; ?>" >
                            <input type="hidden" name="name"  id="name" value="<?php echo $user_data['name']; ?>" >
                            <input type="hidden" name="email"  id="email" value="<?php echo $user_data['email']; ?>" >
                            <input type="hidden" name="phone"  id="phone" value="<?php echo $user_data['phone']; ?>" >
                            <input type="hidden" name="country"  id="country" value="<?php echo $user_data['country']; ?>" >
                            <input type="hidden" name="state"  id="state" value="<?php echo $user_data['state']; ?>" >
                            <input type="hidden" name="address"  id="address" value="<?php echo $user_data['address']; ?>" >

                            <div class="marginbot-15">
                                <ul class="list-inline account-info">
                                    <span class="d-block pb-2">
                                        <li class="list-inline-item">Name:</li>
                                        <li class="list-inline-item"><?php echo $user_data['name'] ?></li>
                                    </span>
                                    <span class="d-block">
                                        <li class="list-inline-item">Email:</li>
                                        <li class="list-inline-item"><?php echo $user_data['email'] ?></li>
                                    </span>
                                    <span class="d-block">
                                        <li class="list-inline-item">Phone No:</li>
                                        <li class="list-inline-item"><?php echo $user_data['phone'] ?></li>
                                    </span>
                                    <?php if($user_data['address'] && $user_data['state'] && $user_data['country']){ ?>
                                    <span class="d-block">
                                        <li class="list-inline-item">Address:</li>
                                        <li class="list-inline-item"><?php echo $user_data['address'].", ".$user_data['state'].", ".$user_data['country']; ?></li>
                                    </span>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div class="border-top">
                                <table class="table">
                                    <thead>
                                        <tr>
                                        <!-- <th scope="col">#</th> -->
                                            <th scope="col">Duration</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <!-- <th scope="row">1</th> -->
                                            <td><?php echo $pricingInfo->duration." ".$pricingInfo->duration_format; ?></td>
                                            <td><?php echo date('d-m-Y'); ?></td>
                                            <td><span>₹</span><?php echo $pricingInfo->price; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- <input type="submit" id="rzp-button1" class="btn marginbot-15 mt-4" value="Pay with Razorpay"> -->
                        </form>
                        <button type="submit" id="rzp-button1" class="btn marginbot-15 mt-4">Pay with Razorpay</button>
                        
                        <script>
                            // Checkout details as a json
                            var options = <?php echo $json ?>;

                            /**
                             * The entire list of Checkout fields is available at
                             * https://docs.razorpay.com/docs/checkout-form#checkout-fields
                             */
                            options.handler = function (response){
                                document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
                                document.getElementById('razorpay_signature').value = response.razorpay_signature;
                                document.razorpayform.submit();
                            };

                            // Boolean whether to show image inside a white frame. (default: true)
                            options.theme.image_padding = false;

                            options.modal = {
                                ondismiss: function() {
                                    console.log("This code runs when the popup is closed");
                                },
                                // Boolean indicating whether pressing escape key 
                                // should close the checkout form. (default: true)
                                escape: true,
                                // Boolean indicating whether clicking translucent blank
                                // space outside checkout form should close the form. (default: false)
                                backdropclose: false
                            };
                            console.log(options);

                            var rzp = new Razorpay(options);

                            document.getElementById('rzp-button1').onclick = function(e){
                                rzp.open();
                                e.preventDefault();
                            }

                            function myFunction() {
                                rzp.open();
                                e.preventDefault();
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ======= Body Conter End ======= -->
<?php $this->load->view('fincludes/footer'); ?>
<h2 class="intro-y text-lg font-medium mt-10">
    Order Details
</h2>
<div class="grid grid-cols-12 gap-6 mt-5">
    <!-- <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
        <div class="hidden md:block mx-auto text-gray-600"></div>
        <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
            <div class="w-56 relative text-gray-700 dark:text-gray-300">
                <form action="<?php echo base_url() ?>order_listing" method="POST" id="searchList">
                    <input type="text" class="input w-56 box pr-10 placeholder-theme-13" placeholder="Search...">
                    <button type="submit"><i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i></button>
                </form>
            </div>
        </div>
    </div> -->
    <!-- BEGIN: Data List -->
    <!-- <div class="intro-y col-span-12 overflow-auto lg:overflow-visible"> -->
    <div class="intro-y col-span-12 overflow-x-auto">
        <table class="table">
            <thead>
                <tr>
                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Order Id</th>
                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Name</th>
                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Email Address</th>
                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Phone Number</th>
                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Address</th>
                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Type</th>
                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Duration</th>
                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Price</th>
                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Payment Date</th>
                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">End Date</th>
                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Payment Status</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($orders)) { foreach($orders as $order) { ?>
                <tr class="intro-x">
                    <td class="border-b whitespace-no-wrap"><?php echo $order->razorpay_payment_id ?></td>
                    <td class="border-b whitespace-no-wrap"><?php echo $order->name ?></td>
                    <td class="border-b whitespace-no-wrap"><?php echo $order->email ?></td>
                    <td class="border-b whitespace-no-wrap"><?php echo $order->phone ?></td>
                    <td class="border-b whitespace-no-wrap"><?php echo $order->address.', '.$order->state.', '.$order->country; ?></td>
                    <td class="border-b whitespace-no-wrap"><?php if($order->plans_pricingID == 1){echo "Kick Starter";} if($order->plans_pricingID == 2){echo "Coaching";} ?></td>
                    <td class="border-b whitespace-no-wrap"><?php echo $order->duration.' '.$order->duration_format; ?></td>
                    <td class="border-b whitespace-no-wrap"><?php echo $order->price ?></td>
                    <td class="border-b whitespace-no-wrap"><?php echo date('jS M Y', strtotime($order->paymentdate)); ?></td>
                    <td class="border-b whitespace-no-wrap"><?php echo date('jS M Y', strtotime($order->enddate)); ?></td>
                    <?php if($order->status == 1){ ?>
                        <td class="flex items-center lg:justify-center text-theme-9">
                            <?php $svg = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square w-4 h-4 mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>'; 
                                echo $svg."Success"; ?>
                        </td>
                    <?php } if($order->status == 0){ ?>
                        <td class="flex items-center lg:justify-center text-theme-6">
                        <?php $svg = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square w-4 h-4 mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>'; 
                            echo $svg."Failed"; ?>
                        </td>
                    <?php } ?>
                </tr>
                <?php } } ?>
            </tbody>
        </table>
    </div>
    <!-- </div> -->
    <!-- END: Data List -->
    <!-- BEGIN: Pagination -->
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-no-wrap items-center">
        <?php echo $this->pagination->create_links(); ?>
        <!-- <select class="w-20 input box mt-3 sm:mt-0">
            <option>10</option>
            <option>25</option>
            <option>35</option>
            <option>50</option>
        </select> -->
    </div>
    <!-- END: Pagination -->
</div>
                <div class="grid grid-cols-12 gap-6">
                    <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">
                        <!-- BEGIN: General Report -->
                        <div class="col-span-12 mt-8">
                            <div class="intro-y flex items-center h-10">
                                <h2 class="text-lg font-medium truncate mr-5">
                                    General Report
                                </h2>
                                <a href="" class="ml-auto flex text-theme-1 dark:text-theme-10"> <i data-feather="refresh-ccw" class="w-4 h-4 mr-3"></i> Reload Data </a>
                            </div>
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                    <div class="report-box zoom-in">
                                        <div class="box p-5">
                                            <div class="flex">
                                                <i data-feather="phone" class="report-box__icon text-theme-10"></i> 
                                            </div>
                                            <div class="text-3xl font-bold leading-8 mt-6"> Contact Us </div>
                                            <a href="<?php echo base_url(); ?>contact/1" class="text-base text-gray-600 mt-1"> More info <i data-feather="arrow-right-circle" class="w-5 h-5 text-theme-10"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                    <div class="report-box zoom-in">
                                        <div class="box p-5">
                                            <div class="flex">
                                                <i data-feather="flag" class="report-box__icon text-theme-11"></i> 
                                                <div class="ml-auto">
                                                    <?php
                                                        $banner_count = 0;
                                                        foreach($this->data['banner_count'] as $banner){
                                                            if($banner){
                                                                $banner_count++;
                                                            }
                                                        }
                                                        if($banner_count == 0){
                                                          $theme = "bg-theme-6";
                                                          $feather = "chevron-down";
                                                        } else {
                                                          $theme = "bg-theme-9";
                                                          $feather = "chevron-up";
                                                        }
                                                      ?>
                                                    <div class="report-box__indicator <?=$theme?> tooltip cursor-pointer"> <?php echo $banner_count; ?> <i data-feather="<?=$feather?>" class="w-4 h-4"></i> </div>
                                                </div>
                                            </div>
                                            <div class="text-3xl font-bold leading-8 mt-6"> Banner </div>
                                            <a href="<?php echo base_url(); ?>banner_listing" class="text-base text-gray-600 mt-1"> More info <i data-feather="arrow-right-circle" class="w-5 h-5 text-theme-11"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                    <div class="report-box zoom-in">
                                        <div class="box p-5">
                                            <div class="flex">
                                                <i data-feather="home" class="report-box__icon text-theme-12"></i> 
                                                <div class="ml-auto">
                                                    <?php
                                                        $home_management_count = 0;
                                                        foreach($this->data['home_management_count'] as $home_management){
                                                            if($home_management){
                                                                $home_management_count++;
                                                            }
                                                        }
                                                        if($home_management_count == 0){
                                                          $theme = "bg-theme-6";
                                                          $feather = "chevron-down";
                                                        } else {
                                                          $theme = "bg-theme-9";
                                                          $feather = "chevron-up";
                                                        }
                                                      ?>
                                                    <div class="report-box__indicator <?=$theme?> tooltip cursor-pointer"> <?php echo $home_management_count; ?> <i data-feather="<?=$feather?>" class="w-4 h-4"></i> </div>
                                                </div>
                                            </div>
                                            <div class="text-3xl font-bold leading-8 mt-6"> Home </div>
                                            <a href="<?php echo base_url(); ?>home_management_listing" class="text-base text-gray-600 mt-1"> More info <i data-feather="arrow-right-circle" class="w-5 h-5 text-theme-12"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                    <div class="report-box zoom-in">
                                        <div class="box p-5">
                                            <div class="flex">
                                                <i data-feather="bookmark" class="report-box__icon text-theme-9"></i> 
                                                <div class="ml-auto">
                                                    <?php
                                                        $about_us_management_count = 0;
                                                        foreach($this->data['about_us_management_count'] as $about_us_management){
                                                            if($about_us_management){
                                                                $about_us_management_count++;
                                                            }
                                                        }
                                                        if($about_us_management_count == 0){
                                                          $theme = "bg-theme-6";
                                                          $feather = "chevron-down";
                                                        } else {
                                                          $theme = "bg-theme-9";
                                                          $feather = "chevron-up";
                                                        }
                                                      ?>
                                                    <div class="report-box__indicator <?=$theme?> tooltip cursor-pointer"> <?php echo $about_us_management_count; ?> <i data-feather="<?=$feather?>" class="w-4 h-4"></i> </div>
                                                </div>
                                            </div>
                                            <div class="text-3xl font-bold leading-8 mt-6"> About Us </div>
                                            <a href="<?php echo base_url(); ?>about_us_management_listing" class="text-base text-gray-600 mt-1"> More info <i data-feather="arrow-right-circle" class="w-5 h-5 text-theme-9"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                    <div class="report-box zoom-in">
                                        <div class="box p-5">
                                            <div class="flex">
                                                <i data-feather="bar-chart-2" class="report-box__icon text-theme-9"></i> 
                                                <div class="ml-auto">
                                                    <?php
                                                        $featured_in_count = 0;
                                                        foreach($this->data['featured_in_count'] as $featured_in){
                                                            if($featured_in){
                                                                $featured_in_count++;
                                                            }
                                                        }
                                                        if($featured_in_count == 0){
                                                          $theme = "bg-theme-6";
                                                          $feather = "chevron-down";
                                                        } else {
                                                          $theme = "bg-theme-9";
                                                          $feather = "chevron-up";
                                                        }
                                                      ?>
                                                    <div class="report-box__indicator <?=$theme?> tooltip cursor-pointer"> <?php echo $featured_in_count; ?> <i data-feather="<?=$feather?>" class="w-4 h-4"></i> </div>
                                                </div>
                                            </div>
                                            <div class="text-3xl font-bold leading-8 mt-6"> Featured In </div>
                                            <a href="<?php echo base_url(); ?>featured_in_listing" class="text-base text-gray-600 mt-1"> More info <i data-feather="arrow-right-circle" class="w-5 h-5 text-theme-9"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                    <div class="report-box zoom-in">
                                        <div class="box p-5">
                                            <div class="flex">
                                                <i data-feather="users" class="report-box__icon text-theme-12"></i> 
                                                <div class="ml-auto">
                                                    <?php
                                                        $team_count = 0;
                                                        foreach($this->data['team_count'] as $team){
                                                            if($team){
                                                                $team_count++;
                                                            }
                                                        }
                                                        if($team_count == 0){
                                                          $theme = "bg-theme-6";
                                                          $feather = "chevron-down";
                                                        } else {
                                                          $theme = "bg-theme-9";
                                                          $feather = "chevron-up";
                                                        }
                                                      ?>
                                                    <div class="report-box__indicator <?=$theme?> tooltip cursor-pointer"> <?php echo $team_count; ?> <i data-feather="<?=$feather?>" class="w-4 h-4"></i> </div>
                                                </div>
                                            </div>
                                            <div class="text-3xl font-bold leading-8 mt-6"> Team </div>
                                            <a href="<?php echo base_url(); ?>team_listing" class="text-base text-gray-600 mt-1"> More info <i data-feather="arrow-right-circle" class="w-5 h-5 text-theme-12"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                    <div class="report-box zoom-in">
                                        <div class="box p-5">
                                            <div class="flex">
                                                <i data-feather="help-circle" class="report-box__icon text-theme-11"></i> 
                                                <div class="ml-auto">
                                                    <?php
                                                        $faq_count = 0;
                                                        foreach($this->data['faq_count'] as $faq){
                                                            if($faq){
                                                                $faq_count++;
                                                            }
                                                        }
                                                        if($faq_count == 0){
                                                          $theme = "bg-theme-6";
                                                          $feather = "chevron-down";
                                                        } else {
                                                          $theme = "bg-theme-9";
                                                          $feather = "chevron-up";
                                                        }
                                                      ?>
                                                    <div class="report-box__indicator <?=$theme?> tooltip cursor-pointer"> <?php echo $faq_count; ?> <i data-feather="<?=$feather?>" class="w-4 h-4"></i> </div>
                                                </div>
                                            </div>
                                            <div class="text-3xl font-bold leading-8 mt-6"> FAQ's </div>
                                            <a href="<?php echo base_url(); ?>faq_listing/1" class="text-base text-gray-600 mt-1"> More info <i data-feather="arrow-right-circle" class="w-5 h-5 text-theme-11"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                    <div class="report-box zoom-in">
                                        <div class="box p-5">
                                            <div class="flex">
                                                <i data-feather="help-circle" class="report-box__icon text-theme-10"></i> 
                                                <div class="ml-auto">
                                                    <?php
                                                        $contact_query_count = 0;
                                                        foreach($this->data['contact_query_count'] as $contact_query){
                                                            if($contact_query){
                                                                $contact_query_count++;
                                                            }
                                                        }
                                                        if($contact_query_count == 0){
                                                          $theme = "bg-theme-6";
                                                          $feather = "chevron-down";
                                                        } else {
                                                          $theme = "bg-theme-9";
                                                          $feather = "chevron-up";
                                                        }
                                                      ?>
                                                    <div class="report-box__indicator <?=$theme?> tooltip cursor-pointer"> <?php echo $contact_query_count; ?> <i data-feather="<?=$feather?>" class="w-4 h-4"></i> </div>
                                                </div>
                                            </div>
                                            <div class="text-3xl font-bold leading-8 mt-6"> Contact Query </div>
                                            <a href="<?php echo base_url(); ?>contact_query_listing" class="text-base text-gray-600 mt-1"> More info <i data-feather="arrow-right-circle" class="w-5 h-5 text-theme-10"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: General Report -->
                    </div>
                </div>
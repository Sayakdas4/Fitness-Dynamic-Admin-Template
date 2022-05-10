<!DOCTYPE html>
<!--
Template Name: Midone - HTML Admin Dashboard Template
Author: Left4code
Website: http://www.left4code.com/
Contact: muhammadrizki@left4code.com
Purchase: https://themeforest.net/user/left4code/portfolio
Renew Support: https://themeforest.net/user/left4code/portfolio
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en" class="light">
    <!-- BEGIN: Head -->
    <head>
        <meta charset="utf-8">
        <link href="<?php echo assets_url(); ?>assets/images/img/favicon.png" rel="shortcut icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Midone admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
        <meta name="keywords" content="admin template, Midone admin template, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="LEFT4CODE">
        <title>TFC - Admin Panel</title>
        <!-- BEGIN: CSS Assets-->
        <link rel="stylesheet" href="<?php echo assets_url(); ?>assets/css/app.css" />
        <link href="<?php echo assets_url(); ?>assets/summernote/summernote-lite.min.css" rel="stylesheet">
        <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet"> -->
        <!-- END: CSS Assets-->
    </head>
    <!-- END: Head -->
    <body class="app">
        <div class="flex">
            <!-- BEGIN: Side Menu -->
            <nav class="side-nav">
                <a href="<?php echo base_url(); ?>dashboard_admin" class="intro-x flex items-center pl-5 pt-4">
                    <img alt="Midone Tailwind HTML Admin Template" class="w-12" src="<?php echo assets_url(); ?>assets/images/img/logo.png">
                    <span class="hidden xl:block text-white text-lg ml-3"> The<span class="font-medium"> Fit</span> Chase</span>
                </a>
                <div class="side-nav__devider my-6"></div>
                <ul>
                    <li>
                        <a href="<?php echo base_url(); ?>dashboard_admin" class="side-menu <?php if(current_url()==base_url('dashboard_admin')){echo "side-menu--active";}?>">
                            <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                            <div class="side-menu__title"> Dashboard </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" class="side-menu <?php if(current_url()==base_url('')){echo "side-menu--active";}?>">
                            <div class="side-menu__icon"> <i data-feather="settings"></i> </div>
                            <div class="side-menu__title"> Site Settings <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                        </a>
                        <ul class="">
                            <li>
                                <a href="<?php echo base_url(); ?>contact/1" class="side-menu <?php if(current_url()==base_url('contact/1')){echo "side-menu--active";}?>">
                                    <div class="side-menu__icon"> <i data-feather="phone"></i> </div>
                                    <div class="side-menu__title"> Contact Us </div>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>editsite_settings/4" class="side-menu <?php if(current_url()==base_url('editsite_settings/4')){echo "side-menu--active";}?>">
                                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="side-menu__title"> Google Analytics </div>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>editsite_settings/3" class="side-menu <?php if(current_url()==base_url('editsite_settings/3')){echo "side-menu--active";}?>">
                                    <div class="side-menu__icon"> <i data-feather="aperture"></i> </div>
                                    <div class="side-menu__title"> Logo </div>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>performance_state_listing" class="side-menu <?php if(current_url()==base_url('performance_state_listing')){echo "side-menu--active";}?>">
                                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="side-menu__title"> Performance State </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>cms_listing" class="side-menu <?php if(current_url()==base_url('cms_listing')){echo "side-menu--active";}?>">
                            <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>
                            <div class="side-menu__title"> CMS </div>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>fitness_recipe_listing" class="side-menu <?php if(current_url()==base_url('fitness_recipe_listing')){echo "side-menu--active";}?>">
                            <div class="side-menu__icon"> <i data-feather="smile"></i> </div>
                            <div class="side-menu__title"> Fitness Recipe </div>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>exercise_video_listing" class="side-menu <?php if(current_url()==base_url('exercise_video_listing')){echo "side-menu--active";}?>">
                            <div class="side-menu__icon"> <i data-feather="video"></i> </div>
                            <div class="side-menu__title"> Exercise Video </div>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>knowledge_library_listing" class="side-menu <?php if(current_url()==base_url('knowledge_library_listing')){echo "side-menu--active";}?>">
                            <div class="side-menu__icon"> <i data-feather="slack"></i> </div>
                            <div class="side-menu__title"> Knowledge Library </div>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>banner_listing" class="side-menu <?php if(current_url()==base_url('banner_listing')){echo "side-menu--active";}?>">
                            <div class="side-menu__icon"> <i data-feather="flag"></i> </div>
                            <div class="side-menu__title"> Banner Management </div>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>home_management_listing" class="side-menu <?php if(current_url()==base_url('home_management_listing')){echo "side-menu--active";}?>">
                            <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                            <div class="side-menu__title"> Home Management </div>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>about_us_management_listing" class="side-menu <?php if(current_url()==base_url('about_us_management_listing')){echo "side-menu--active";}?>">
                            <div class="side-menu__icon"> <i data-feather="bookmark"></i> </div>
                            <div class="side-menu__title"> About Us Management </div>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>featured_in_listing" class="side-menu <?php if(current_url()==base_url('featured_in_listing')){echo "side-menu--active";}?>">
                            <div class="side-menu__icon"> <i data-feather="bar-chart-2"></i> </div>
                            <div class="side-menu__title"> Featured In </div>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>team_listing" class="side-menu <?php if(current_url()==base_url('team_listing')){echo "side-menu--active";}?>">
                            <div class="side-menu__icon"> <i data-feather="users"></i> </div>
                            <div class="side-menu__title"> Team Management </div>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>success_stories_listing" class="side-menu <?php if(current_url()==base_url('success_stories_listing')){echo "side-menu--active";}?>">
                            <div class="side-menu__icon"> <i data-feather="target"></i> </div>
                            <div class="side-menu__title"> Success Stories </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" class="side-menu <?php if(current_url()==base_url('')){echo "side-menu--active";}?>">
                            <div class="side-menu__icon"> <i data-feather="dollar-sign"></i> </div>
                            <div class="side-menu__title"> Plans & Pricing <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                        </a>
                        <ul class="">
                            <li>
                                <a href="javascript:;" class="side-menu <?php if(current_url()==base_url('')){echo "side-menu--active";}?>">
                                    <div class="side-menu__icon"> <i data-feather="wind"></i> </div>
                                    <div class="side-menu__title"> Kick Starter <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                                </a>
                                <ul class="">
                                    <!-- <li>
                                        <a href="<?php //echo base_url(); ?>kick_starter_includes_listing" class="side-menu <?php //if(current_url()==base_url('cms_listing')){echo "side-menu--active";}?>">
                                            <div class="side-menu__icon"> <i data-feather="wind"></i> </div>
                                            <div class="side-menu__title"> What’s Included </div>
                                        </a>
                                    </li> -->
                                    <li>
                                        <a href="<?php echo base_url(); ?>kick_starter_pricing_listing" class="side-menu <?php if(current_url()==base_url('kick_starter_pricing_listing')){echo "side-menu--active";}?>">
                                            <div class="side-menu__icon"> <i data-feather="wind"></i> </div>
                                            <div class="side-menu__title"> Kick-starter Pricing </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>editkick_starter_work/1" class="side-menu <?php if(current_url()==base_url('editkick_starter_work/1')){echo "side-menu--active";}?>">
                                            <div class="side-menu__icon"> <i data-feather="wind"></i> </div>
                                            <div class="side-menu__title"> HOW IT WORKS </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:;" class="side-menu <?php if(current_url()==base_url('')){echo "side-menu--active";}?>">
                                    <div class="side-menu__icon"> <i data-feather="user-check"></i> </div>
                                    <div class="side-menu__title"> Coaching <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                                </a>
                                <ul class="">
                                    <!-- <li>
                                        <a href="<?php //echo base_url(); ?>coaching_includes_listing" class="side-menu <?php //if(current_url()==base_url('cms_listing')){echo "side-menu--active";}?>">
                                            <div class="side-menu__icon"> <i data-feather="user-check"></i> </div>
                                            <div class="side-menu__title"> What’s Included </div>
                                        </a>
                                    </li> -->
                                    <li>
                                        <a href="<?php echo base_url(); ?>coaching_pricing_listing" class="side-menu <?php if(current_url()==base_url('coaching_pricing_listing')){echo "side-menu--active";}?>">
                                            <div class="side-menu__icon"> <i data-feather="user-check"></i> </div>
                                            <div class="side-menu__title"> Coaching Pricing </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>editcoaching_work/1" class="side-menu <?php if(current_url()==base_url('editcoaching_work/1')){echo "side-menu--active";}?>">
                                            <div class="side-menu__icon"> <i data-feather="user-check"></i> </div>
                                            <div class="side-menu__title"> HOW IT WORKS </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>faq_listing/1" class="side-menu <?php if(current_url()==base_url('faq_listing/1')){echo "side-menu--active";} if(current_url()==base_url('faq_listing/2')){echo "side-menu--active";} if(current_url()==base_url('faq_listing/3')){echo "side-menu--active";}?>">
                            <div class="side-menu__icon"> <i data-feather="help-circle"></i> </div>
                            <div class="side-menu__title"> FAQ's </div>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>order_listing" class="side-menu <?php if(current_url()==base_url('order_listing')){echo "side-menu--active";}?>">
                            <div class="side-menu__icon"> <i data-feather="database"></i> </div>
                            <div class="side-menu__title"> Order List </div>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- END: Side Menu -->
            <!-- BEGIN: Content -->
            <div class="content">
                <!-- BEGIN: Top Bar -->
                <div class="top-bar">
                    <!-- BEGIN: Breadcrumb -->
                    <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> 
                        <a href="" class=""></a> 
                        <!-- <i data-feather="chevron-right" class="breadcrumb__icon"></i>  -->
                        <a href="" class="breadcrumb--active"></a> 
                    </div>
                    <!-- END: Breadcrumb -->
                    <!-- BEGIN: Account Menu -->
                    <div class="intro-x dropdown w-8 h-8">
                        <div class="dropdown-toggle w-10 h-10 rounded-full overflow-hidden shadow-lg image-fit zoom-in">
                            <img alt="Midone Tailwind HTML Admin Template" src="<?php echo assets_url(); ?>assets/images/img/favicon.png">
                        </div>
                        <div class="dropdown-box w-56">
                            <div class="dropdown-box__content box bg-theme-38 dark:bg-dark-6 text-white">
                                <div class="p-4 border-b border-theme-40 dark:border-dark-3">
                                    <div class="font-medium"><?php echo $name; ?></div>
                                    <div class="text-xs text-theme-41 dark:text-gray-600"><?php echo $role_text; ?></div>
                                </div>
                                <!-- <div class="p-2">
                                    <a href="<?php //echo base_url(); ?>profile" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="user" class="w-4 h-4 mr-2"></i> Profile </a>
                                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="edit" class="w-4 h-4 mr-2"></i> Add Account </a>
                                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="lock" class="w-4 h-4 mr-2"></i> Reset Password </a>
                                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="help-circle" class="w-4 h-4 mr-2"></i> Help </a>
                                </div> -->
                                <div class="p-2 border-t border-theme-40 dark:border-dark-3">
                                    <a href="<?php echo base_url(); ?>logout" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"> <i data-feather="toggle-right" class="w-4 h-4 mr-2"></i> Logout </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: Account Menu -->
                </div>
                <!-- END: Top Bar -->
<h2 class="intro-y text-lg font-medium mt-10">
    Sucess Stories
</h2>
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
        <a class="button text-white bg-theme-1 shadow-md mr-2" href="<?php echo base_url(); ?>addsuccess_stories">Add New</a>
        <!-- <div class="dropdown">
            <button class="dropdown-toggle button px-2 box text-gray-700 dark:text-gray-300">
                <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-feather="plus"></i> </span>
            </button>
            <div class="dropdown-box w-40">
                <div class="dropdown-box__content box dark:bg-dark-1 p-2">
                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="printer" class="w-4 h-4 mr-2"></i> Print </a>
                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export to Excel </a>
                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export to PDF </a>
                </div>
            </div>
        </div> -->
        <div class="row">
            <div class="">
                <?php 
                    $this->load->helper('form');
                    $error = $this->session->flashdata('error');
                    if($error) {
                ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-6 text-white"> <i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i> <?php echo $this->session->flashdata('error'); ?> <i data-feather="x" class="w-4 h-4 ml-auto"></i> </div>                    
                </div>
                <?php } ?>
                <?php 
                    $success = $this->session->flashdata('success');
                    if($success) { 
                ?>
                        <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-9 text-white"> <i data-feather="check-circle" class="w-6 h-6 mr-2"></i> <?php echo $this->session->flashdata('success'); ?> </div>
                <?php } ?>
                
                <div class="row">
                    <div class="col-md-12">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="hidden md:block mx-auto text-gray-600"></div>
        <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
            <div class="w-56 relative text-gray-700 dark:text-gray-300">
                <form action="<?php echo base_url() ?>success_stories_listing" method="POST" id="searchList">
                    <input type="text" class="input w-56 box pr-10 placeholder-theme-13" placeholder="Search...">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i> 
                </form>
            </div>
        </div>
    </div>
    <!-- BEGIN: Data List -->
    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
        <table class="table table-report -mt-2">
            <thead>
                <tr>
                    <th class="whitespace-no-wrap">#</th>
                    <th class="whitespace-no-wrap">NAME</th>
                    <th class="whitespace-no-wrap">IMAGE</th>
                    <th class="whitespace-no-wrap">NAME</th>
                    <th class="whitespace-no-wrap">IMAGE</th>
                    <th class="whitespace-no-wrap">NAME</th>
                    <th class="whitespace-no-wrap">IMAGE</th>
                    <th class="whitespace-no-wrap">NAME</th>
                    <th class="whitespace-no-wrap">IMAGE</th>
                    <th class="text-center whitespace-no-wrap">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($success_storiess)) { $i=1; foreach($success_storiess as $success_stories) { ?>
                <tr class="intro-x">
                    <td><?php echo $i ?></td>
                    <td>
                        <a href="" class="font-medium whitespace-no-wrap"><?php echo $success_stories->title_one ?></a>
                    </td>
                    <td class="w-40">
                        <?php if(!empty($success_stories->image_one)) { ?>
                        <div class="flex">
                            <div class="w-full h-20 my-5 image-fit">
                                <img alt="Image" data-action="zoom" class="w-full tooltip rounded-full" src="<?php echo assets_url(); ?>uploads/<?php echo $success_stories->image_one; ?>" title="<?php echo $success_stories->title_one ?>">
                            </div>
                        </div>
                        <?php } else { ?>
                        <div class="flex">
                            <div class="w-full h-20 my-5 image-fit">
                                <img alt="Image" data-action="zoom" class="w-full tooltip rounded-full" src="<?php echo assets_url(); ?>assets/images/img/blank.jpg" title="No Image">
                            </div>
                        </div>    
                        <?php } ?>
                    </td>
                    <td>
                        <a href="" class="font-medium whitespace-no-wrap"><?php echo $success_stories->title_two ?></a>
                    </td>
                    <td class="w-40">
                        <?php if(!empty($success_stories->image_two)) { ?>
                        <div class="flex">
                            <div class="w-full h-20 my-5 image-fit">
                                <img alt="Image" data-action="zoom" class="w-full tooltip rounded-full" src="<?php echo assets_url(); ?>uploads/<?php echo $success_stories->image_two; ?>" title="<?php echo $success_stories->title_two ?>">
                            </div>
                        </div>
                        <?php } else { ?>
                        <div class="flex">
                            <div class="w-full h-20 my-5 image-fit">
                                <img alt="Image" data-action="zoom" class="w-full tooltip rounded-full" src="<?php echo assets_url(); ?>assets/images/img/blank.jpg" title="No Image">
                            </div>
                        </div>    
                        <?php } ?>
                    </td>
                    <td>
                        <a href="" class="font-medium whitespace-no-wrap"><?php echo $success_stories->title_three ?></a>
                    </td>
                    <td class="w-40">
                        <?php if(!empty($success_stories->image_three)) { ?>
                        <div class="flex">
                            <div class="w-full h-20 my-5 image-fit">
                                <img alt="Image" data-action="zoom" class="w-full tooltip rounded-full" src="<?php echo assets_url(); ?>uploads/<?php echo $success_stories->image_three; ?>" title="<?php echo $success_stories->title_three ?>">
                            </div>
                        </div>
                        <?php } else { ?>
                        <div class="flex">
                            <div class="w-full h-20 my-5 image-fit">
                                <img alt="Image" data-action="zoom" class="w-full tooltip rounded-full" src="<?php echo assets_url(); ?>assets/images/img/blank.jpg" title="No Image">
                            </div>
                        </div>    
                        <?php } ?>
                    </td>
                    <td>
                        <a href="" class="font-medium whitespace-no-wrap"><?php echo $success_stories->title_four ?></a>
                    </td>
                    <td class="w-40">
                        <?php if(!empty($success_stories->image_four)) { ?>
                        <div class="flex">
                            <div class="w-full h-20 my-5 image-fit">
                                <img alt="Image" data-action="zoom" class="w-full tooltip rounded-full" src="<?php echo assets_url(); ?>uploads/<?php echo $success_stories->image_four; ?>" title="<?php echo $success_stories->title_four ?>">
                            </div>
                        </div>
                        <?php } else { ?>
                        <div class="flex">
                            <div class="w-full h-20 my-5 image-fit">
                                <img alt="Image" data-action="zoom" class="w-full tooltip rounded-full" src="<?php echo assets_url(); ?>assets/images/img/blank.jpg" title="No Image">
                            </div>
                        </div>    
                        <?php } ?>
                    </td>
                    <td class="table-report__action w-56">
                        <div class="flex justify-center items-center">
                            <a class="flex items-center mr-3 text-theme-10" href="<?php echo base_url().'editsuccess_stories/'.$success_stories->success_stories_id; ?>"> <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                            <a class="flex items-center text-theme-6" href="javascript:;" data-toggle="modal" data-target="#delete-confirmation-modal" onclick="read_more_success_stories(<?php echo $success_stories->success_stories_id; ?>)"> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                        </div>
                    </td>
                </tr>
                <?php $i++; } } ?>
            </tbody>
        </table>
    </div>
    <!-- END: Data List -->
    <!-- BEGIN: Pagination -->
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-no-wrap items-center">
        <?php echo $this->pagination->create_links(); ?>
        <!-- <ul class="pagination">
            <li>
                <a class="pagination__link" href=""> <i class="w-4 h-4" data-feather="chevrons-left"></i> </a>
            </li>
            <li>
                <a class="pagination__link" href=""> <i class="w-4 h-4" data-feather="chevron-left"></i> </a>
            </li>
            <li> <a class="pagination__link" href="">...</a> </li>
            <li> <a class="pagination__link" href="">1</a> </li>
            <li> <a class="pagination__link pagination__link--active" href="">2</a> </li>
            <li> <a class="pagination__link" href="">3</a> </li>
            <li> <a class="pagination__link" href="">...</a> </li>
            <li>
                <a class="pagination__link" href=""> <i class="w-4 h-4" data-feather="chevron-right"></i> </a>
            </li>
            <li>
                <a class="pagination__link" href=""> <i class="w-4 h-4" data-feather="chevrons-right"></i> </a>
            </li>
        </ul> -->
    </div>
    <!-- END: Pagination -->
</div>
<!-- BEGIN: Delete Confirmation Modal -->
<div class="modal" id="delete-confirmation-modal">
    <div class="modal__content">
        <div class="p-5 text-center">
            <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i> 
            <div class="text-3xl mt-5">Are you sure?</div>
            <div class="text-gray-600 mt-2">Do you really want to delete these records? This process cannot be undone.</div>
        </div>
        <div class="px-5 pb-8 text-center" id="success_stories_delete_data">

        </div>
    </div>
</div>
<!-- END: Delete Confirmation Modal -->
<script src="<?php echo assets_url(); ?>assets/js/jQuery-2.1.4.min.js"></script>
<script type="text/javascript">
    function read_more_success_stories(id)
    {
        $.ajax({
           type: 'POST',
           url: '<?php echo base_url().'success_stories/success_stories_details'?>',
           data: {'success_stories_id':id},
           // dataType: "JSON",
           success: function(response) {
                data = JSON.parse(response);
                var html="";
                html+='<button type="button" data-dismiss="modal" class="button w-24 border text-gray-700 mr-1">Cancel</button>';
                html+='<a type="button" href="<?php echo base_url() ?>deletesuccess_stories/'+data.success_stories_id+'" class="button w-24 bg-theme-6 text-white">Delete</a>';
                $("#success_stories_delete_data").html(html);
            }
        });
    }
</script>
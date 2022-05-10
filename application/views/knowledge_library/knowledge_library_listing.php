<h2 class="intro-y text-lg font-medium mt-10">
    Knowledge Library
</h2>
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
        <a class="button text-white bg-theme-1 shadow-md mr-2" href="<?php echo base_url(); ?>addknowledge_library">Add New</a>
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
                <form action="<?php echo base_url() ?>knowledge_library_listing" method="POST" id="searchList">
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
                    <th class="whitespace-no-wrap">IMAGE/VIDEO</th>
                    <th class="text-center whitespace-no-wrap">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($knowledge_librarys)) { $i=1; foreach($knowledge_librarys as $knowledge_library) { ?>
                <tr class="intro-x">
                    <td><?php echo $i ?></td>
                    <td>
                        <a href="" class="font-medium whitespace-no-wrap"><?php echo $knowledge_library->title ?></a>
                    </td>
                    <td class="w-40">
                        <div class="flex">
                            <?php if($knowledge_library->ss_mi){ $ss_mi = explode(",", $knowledge_library->ss_mi); foreach($ss_mi as $ss_mi_data){
                                $curr_ss_mi_data = explode("-", $ss_mi_data);
                                $knowledge_library_imageID = $curr_ss_mi_data[0];
                                $content_preference_imageID = $curr_ss_mi_data[1];
                                $image_files = $curr_ss_mi_data[2];
                            ?>
                                <?php if($content_preference_imageID==2){ ?>
                                <div class="w-10 h-10 image-fit zoom-in">
                                    <img alt="Midone Tailwind HTML Admin Template" data-action="zoom" class="tooltip rounded-full" src="<?php echo assets_url(); ?>uploads/<?php echo $image_files; ?>" title="<?php echo $knowledge_library->title ?>">
                                </div>
                            <?php } } } if($knowledge_library->content_preferenceID==1){ ?>
                                <iframe width="320" height="100" src="<?=$knowledge_library->image?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <?php } ?>
                        </div>
                        <!-- <div class="flex">
                            <div class="w-full h-20 my-5 image-fit">
                                <?php if($knowledge_library->content_preferenceID == 2){ ?>
                                <img alt="Image" data-action="zoom" class="w-full tooltip rounded-full" src="<?php echo assets_url(); ?>uploads/<?php echo $knowledge_library->image; ?>" title="<?php echo $knowledge_library->title ?>">
                                <?php } if($knowledge_library->content_preferenceID == 1){ ?>
                                <video width="320" height="240" data-action="zoom" class="w-full tooltip" title="<?php echo $knowledge_library->title ?>" controls>
                                    <source src="<?php echo assets_url(); ?>uploads/<?php echo $knowledge_library->image; ?>" type="video/mp4">
                                </video>
                                <?php } ?>
                            </div>
                        </div> -->
                    </td>
                    <td class="table-report__action w-56">
                        <div class="flex justify-center items-center">
                            <a class="flex items-center mr-3 text-theme-10" href="<?php echo base_url().'editknowledge_library/'.$knowledge_library->knowledge_library_id; ?>"> <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                            <a class="flex items-center text-theme-6" href="javascript:;" data-toggle="modal" data-target="#delete-confirmation-modal" onclick="read_more_knowledge_library(<?php echo $knowledge_library->knowledge_library_id; ?>)"> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
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
        <div class="px-5 pb-8 text-center" id="knowledge_library_delete_data">

        </div>
    </div>
</div>
<!-- END: Delete Confirmation Modal -->
<script src="<?php echo assets_url(); ?>assets/js/jQuery-2.1.4.min.js"></script>
<script type="text/javascript">
    // jQuery(document).ready(function(){
    //     jQuery('ul.pagination li a').click(function (e) {
    //         e.preventDefault();            
    //         var link = jQuery(this).get(0).href;            
    //         var value = link.substring(link.lastIndexOf('/') + 1);
    //         jQuery("#searchList").attr("action", baseURL + "knowledge_library_listing/" + value);
    //         jQuery("#searchList").submit();
    //     });
    // });


    function read_more_knowledge_library(id)
    {
        $.ajax({
           type: 'POST',
           url: '<?php echo base_url().'knowledge_library/knowledge_library_details'?>',
           data: {'knowledge_library_id':id},
           // dataType: "JSON",
           success: function(response) {
                data = JSON.parse(response);
                var html="";
                html+='<button type="button" data-dismiss="modal" class="button w-24 border text-gray-700 mr-1">Cancel</button>';
                html+='<a type="button" href="<?php echo base_url() ?>deleteknowledge_library/'+data.knowledge_library_id+'" class="button w-24 bg-theme-6 text-white">Delete</a>';
                $("#knowledge_library_delete_data").html(html);
            }
        });
    }
</script>
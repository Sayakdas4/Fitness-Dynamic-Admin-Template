<h2 class="intro-y text-lg font-medium mt-10">
    CMS
</h2>
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
        <a class="button text-white bg-theme-1 shadow-md mr-2" href="<?php echo base_url(); ?>addcms">Add New</a>
        <div class="hidden md:block mx-auto text-gray-600"></div>
        <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
            <div class="w-56 relative text-gray-700 dark:text-gray-300">
                <form action="<?php echo base_url() ?>cms_listing" method="POST" id="searchList">
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
                    <th class="whitespace-no-wrap">TITLE</th>
                    <th class="text-center whitespace-no-wrap">PAGE SLUG</th>
                    <th class="text-center whitespace-no-wrap">META VIEWPOINT</th>
                    <th class="text-center whitespace-no-wrap">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($cmss)) { foreach($cmss as $cms) { ?>
                <tr class="intro-x">
                    <td><?php echo $cms->cms_id ?></td>
                    <td>
                        <a href="" class="font-medium whitespace-no-wrap"><?php echo $cms->title ?></a>
                    </td>
                    <td class="text-center"><?php echo $cms->page_slug ?></td>
                    <td class="text-center"><?php echo $cms->meta_title ?></td>
                    <td class="table-report__action w-56">
                        <div class="flex justify-center items-center">
                            <a class="flex items-center mr-3 text-theme-10" href="<?php echo base_url().'editcms/'.$cms->cms_id; ?>"> <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                            <!-- <a class="flex items-center text-theme-6" href="javascript:;" data-toggle="modal" data-target="#delete-confirmation-modal"> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete </a> -->
                        </div>
                    </td>
                </tr>
            <?php } } ?>
            </tbody>
        </table>
    </div>
    <!-- END: Data List -->
    <!-- BEGIN: Pagination -->
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-no-wrap items-center">
        <ul class="pagination">
            <?php echo $this->pagination->create_links(); ?>
        </ul>
        <!-- <select class="w-20 input box mt-3 sm:mt-0">
            <option>10</option>
            <option>25</option>
            <option>35</option>
            <option>50</option>
        </select> -->
    </div>
    <!-- END: Pagination -->
</div>
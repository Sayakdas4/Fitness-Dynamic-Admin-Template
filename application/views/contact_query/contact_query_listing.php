<h2 class="intro-y text-lg font-medium mt-10">
    Contact Query
</h2>
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
        <div class="hidden md:block mx-auto text-gray-600"></div>
        <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
            <div class="w-56 relative text-gray-700 dark:text-gray-300">
                <form action="<?php echo base_url() ?>contact_listing" method="POST" id="searchList">
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
                    <th class="whitespace-no-wrap">NAME</th>
                    <th class="text-center whitespace-no-wrap">EMAIL</th>
                    <th class="text-center whitespace-no-wrap">SUBJECT</th>
                    <th class="text-center whitespace-no-wrap">PHONE NUMBER</th>
                    <th class="text-center whitespace-no-wrap">MESSAGE</th>
                    <th class="text-center whitespace-no-wrap">QUERY DATE</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($contact)) { foreach($contact as $record) { ?>
                <tr class="intro-x">
                    <td>
                        <a class="font-medium whitespace-no-wrap"><?php echo $record->name ?></a>
                    </td>
                    <td class=""><?php echo $record->email ?></td>
                    <td class=""><?php echo $record->subject ?></td>
                    <td class=""><?php echo $record->phone ?></td>
                    <td class="text-justify"><?php echo $record->message ?></td>
                    <td class=""><?php echo $record->created_at ?></td>
                </tr>
            <?php } } ?>
            </tbody>
        </table>
    </div>
    <!-- END: Data List -->
    <!-- BEGIN: Pagination -->
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-no-wrap items-center">
        <?php echo $this->pagination->create_links(); ?>
        <!-- <ul class="pagination">
            <li>
                <a class="pagination__link" href=""> Previous </a>
            </li>
            <li> <a class="pagination__link" href="">1</a> </li>
            <li> <a class="pagination__link pagination__link--active" href="">2</a> </li>
            <li> <a class="pagination__link" href="">3</a> </li>
            <li>
                <a class="pagination__link" href=""> Next </a>
            </li>
        </ul> -->
    </div>
    <!-- END: Pagination -->
</div>
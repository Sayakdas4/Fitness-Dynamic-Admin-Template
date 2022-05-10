<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        FAQ Layout
    </h2>
    <a class="button text-white bg-theme-1 shadow-md mr-2" href="<?php echo base_url(); ?>addfaq">Add FAQ</a>
</div>
<div class="grid grid-cols-12 gap-6">
    <!-- BEGIN: FAQ Menu -->
    <div class="intro-y col-span-12 lg:col-span-4 xl:col-span-3">
        <div class="box mt-5">
            <div class="px-4 pb-3 pt-5">
                <!-- <a class="flex rounded-lg items-center px-4 py-2 bg-theme-1 text-white font-medium" href="#1">
                    <i data-feather="activity" class="w-4 h-4 mr-2"></i> 
                    <div class="flex-1 truncate">About Our faqs</div>
                </a> -->
                <a class="flex items-center px-4 py-2 mt-1" href="<?php echo base_url(); ?>faq_listing/1" id="general">
                    <i data-feather="help-circle" class="w-4 h-4 mr-2"></i> 
                    <div class="flex-1 truncate">GENERAL FAQ's</div>
                </a>
                <a class="flex items-center px-4 py-2 mt-1" href="<?php echo base_url(); ?>faq_listing/2" id="kick-starter">
                    <i data-feather="help-circle" class="w-4 h-4 mr-2"></i> 
                    <div class="flex-1 truncate">KICK-STARTER FAQ's</div>
                </a>
                <a class="flex items-center px-4 py-2 mt-1" href="<?php echo base_url(); ?>faq_listing/3" id="coaching">
                    <i data-feather="help-circle" class="w-4 h-4 mr-2"></i> 
                    <div class="flex-1 truncate">COACHING FAQ's</div>
                </a>
            </div>
        </div>
    </div>
    <!-- END: FAQ Menu -->
    <!-- BEGIN: FAQ Content -->
    <div class="intro-y col-span-12 lg:col-span-8 xl:col-span-9">

        <div class="intro-y box lg:mt-5" id="faq_qns_ans">
            <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
                <h2 class="font-medium text-base mr-auto">
                    <?php  if($faq_title->title == 1){
                            $faq_title->title = "GENERAL FAQ's";
                        } if($faq_title->title == 2){
                            $faq_title->title = "KICK-STARTER FAQ's";
                        } if($faq_title->title == 3){
                            $faq_title->title = "COACHING FAQ's";
                        }
                        echo $faq_title->title;
                    ?>
                </h2>
            </div>
            <div class="accordion p-5">
                <?php if(!empty($faqs)) { foreach($faqs as $faq) { ?>
                <div class="accordion__pane active border border-gray-200 dark:border-dark-5 p-4">
                    <a href="javascript:;" class="accordion__pane__toggle font-medium block"><?php echo $faq->question ?></a>
                    <div class="flex justify-end items-center">
                        <a class="flex items-center mr-3 text-theme-10" href="<?php echo base_url().'editfaq/'.$faq->faq_id; ?>"> <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                        <a class="flex items-center text-theme-6" href="javascript:;" data-toggle="modal" data-target="#delete-confirmation-modal" onclick="delete_faq(<?php echo $faq->faq_id; ?>, <?php echo $faq->title; ?>)"> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete </a> 
                    </div>
                    <div class="accordion__pane__content mt-3 text-gray-700 dark:text-gray-600 leading-relaxed"><?php echo $faq->answer ?></div>
                </div>
                <?php } } ?>
            </div>
        </div>
        
    </div>
    <!-- END: FAQ Content -->
</div>
<!-- BEGIN: Delete Confirmation Modal -->
<div class="modal" id="delete-confirmation-modal">
    <div class="modal__content">
        <div class="p-5 text-center">
            <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i> 
            <div class="text-3xl mt-5">Are you sure?</div>
            <div class="text-gray-600 mt-2">Do you really want to delete these records? This process cannot be undone.</div>
        </div>
        <div class="px-5 pb-8 text-center" id="faq_delete_data">

        </div>
    </div>
</div>
<!-- END: Delete Confirmation Modal -->
<script src="<?php echo assets_url(); ?>assets/js/jQuery-2.1.4.min.js"></script>
<script>
    function delete_faq(id, title)
    {
        $.ajax({
           type: 'POST',
           url: '<?php echo base_url().'faq/faq_details'?>',
           data: {'faq_id':id, 'title':title},
           // dataType: "JSON",
           success: function(response) {
                data = JSON.parse(response);
                var html="";
                html+='<button type="button" data-dismiss="modal" class="button w-24 border text-gray-700 mr-1">Cancel</button>';
                html+='<a type="button" href="<?php echo base_url() ?>deletefaq/'+data.faq_id+'/'+data.title+'" class="button w-24 bg-theme-6 text-white">Delete</a>';
                $("#faq_delete_data").html(html);
            }
        });
    }
</script>
<script type="text/javascript">
    $('#title').change(function() {
        var title = $(this).val();
        // $('#show-msg').hide();
        if(title == 0) {
            $('#faq_qns_ans').hide();
            // $('#show-msg').show();
        } else {
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('faq/faq_details_by_title'); ?>",
                data: "title=" + title,
                dataType: "html",
                success: function(data) {
                    window.location.href = data;
                }
            });
        }
    });
</script>
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
                    <i data-feather="box" class="w-4 h-4 mr-2"></i> 
                    <div class="flex-1 truncate">GENERAL FAQ's</div>
                </a>
                <a class="flex items-center px-4 py-2 mt-1" href="<?php echo base_url(); ?>faq_listing/2" id="kick-starter">
                    <i data-feather="lock" class="w-4 h-4 mr-2"></i> 
                    <div class="flex-1 truncate">KICK-STARTER FAQ's</div>
                </a>
                <a class="flex items-center px-4 py-2 mt-1" href="<?php echo base_url(); ?>faq_listing/3" id="coaching">
                    <i data-feather="settings" class="w-4 h-4 mr-2"></i> 
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
                    <!-- GENERAL FAQ's -->
                </h2>
            </div>
            <div class="accordion p-5">
                <?php if(!empty($faqs)) { foreach($faqs as $faq) { ?>
                <div class="accordion__pane active border border-gray-200 dark:border-dark-5 p-4">
                    <a href="javascript:;" class="accordion__pane__toggle font-medium block"><?php echo $faq->question ?></a> 
                    <div class="accordion__pane__content mt-3 text-gray-700 dark:text-gray-600 leading-relaxed"><?php echo $faq->answer ?></div>
                </div>
                <?php } } ?>
            </div>
        </div>
        
    </div>
    <!-- END: FAQ Content -->
</div>
<script src="<?php echo assets_url(); ?>assets/js/jQuery-2.1.4.min.js"></script>
<script>
    // function read_more_faq(id)
    // {
    //     $.ajax({
    //        type: 'POST',
    //        url: '<?php //echo base_url().'faq/faq_details'?>',
    //        data: {'title':id},
    //        dataType: "JSON",
    //        success: function(response) {
    //         $("#faq_qns_ans").html(response.html2);
                // faqs = JSON.parse(response);
                // console.log(faqs);
                // var html="";
                // html+='<div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">';
                // if(faqs.title == 1){
                //     faqs.title = "GENERAL FAQ's";
                // } if(faqs.title == 2){
                //     faqs.title = "KICK-STARTER FAQ's";
                // } if(faqs.title == 3){
                //     faqs.title = "COACHING FAQ's";
                // }
                // html+='<h2 class="font-medium text-base mr-auto">'+faqs.title+'</h2>';
                // html+='</div>';
                // html+='<div class="accordion p-5">';
                // html+='<div class="accordion__pane active border border-gray-200 dark:border-dark-5 p-4">';
                // html+='<a href="javascript:;" class="accordion__pane__toggle font-medium block">'+faqs.question+'</a>'
                // html+='<div class="accordion__pane__content mt-3 text-gray-700 dark:text-gray-600 leading-relaxed">'+faqs.answer+'</div>';
                // html+='</div>';
                // html+='</div>';
                // $("#faq_qns_ans").html(html);

    //         }
    //     });
    // }
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
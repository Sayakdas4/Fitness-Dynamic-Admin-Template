<?php
$shades_id = $shadesInfo->shades_id;
$type = $shadesInfo->type;
$title = $shadesInfo->title;
$code = $shadesInfo->code;
$color = $shadesInfo->color;
$name = $shadesInfo->name;
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-sticky-note"></i> 
        <?php 
            if($type == 1) echo "Fedral standard 595c color";
            if($type == 2) echo "Ral Color chart";
            if($type == 3) echo "BS 381C Color Chart";
        ?>
        <small>Edit</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Edit Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php $this->load->helper("form"); ?>
                    <form role="form" enctype='multipart/form-data' action="<?php echo base_url() ?>editshadesConfig" method="post" id="shades" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="type">Shades Card Type</label><span class="text-red">*</span>
                                        <select class="form-control required" id="type" name="type" >
                                            <option value="<?php echo $type; ?>">
                                                <?php
                                                    if($type==1){ echo "Fedral standard 595c color"; }
                                                    if($type==2){ echo "Ral Color chart"; }
                                                    if($type==3){ echo "BS 381C Color Chart"; }
                                                    echo set_value('type'); 
                                                ?>
                                            </option>
                                            <option value="1">Fedral standard 595c color</option>
                                            <option value="2">Ral Color chart</option>
                                            <option value="3">BS 381C Color Chart</option>
                                        </select>
                                        <input type="hidden" value="<?php echo $shades_id; ?>" name="shades_id" id="shades_id" />
                                    </div>
                                </div> 
                            </div>
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="title">Title</label><span class="text-red">*</span>
                                        <input type="text" class="form-control required" value="<?php echo $title; ?>" id="title" name="title">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="code">Code</label><span class="text-red">*</span>
                                        <input type="text" class="form-control required" value="<?php echo $code; ?>" id="code" name="code">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">                                
                                    <div class="form-group">
                                        <label for="color">Color Picker</label><span class="text-red">*</span>
                                        <input type="color" class="form-control required" value="<?php echo $color; ?>" id="color" name="color">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="name">Additional Details</label><span class="text-red"></span>
                                        <input type="text" class="form-control" value="<?php echo $name; ?>" id="name" name="name">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Submit" />
                            <button type="button" class="btn btn-primary" value="Back" onclick="goBack()">Back</button>
                            <input type="reset" class="btn btn-default" value="Reset" />
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <?php
                    $this->load->helper('form');
                    $error = $this->session->flashdata('error');
                    if($error)
                    {
                ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('error'); ?>                    
                </div>
                <?php } ?>
                <?php  
                    $success = $this->session->flashdata('success');
                    if($success)
                    {
                ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php } ?>
                
                <div class="row">
                    <div class="col-md-12">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                    </div>
                </div>
            </div>
        </div>    
    </section>
</div>

<script src="<?php echo assets_url(); ?>assets/js/shades.js" type="text/javascript"></script>
<script type="text/javascript">
    function goBack()
    {
        window.history.back();

    }
</script>
<script src = "https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type = "text/javascript">
    $(document).ready(function() {
    $('#link').summernote({
        height: 420,
        width: 660
    });
});
</script> 
<script type="text/javascript">
    $(document).on('click', '#close-preview', function(){ 
    $('.image-preview').popover('hide');
    // Hover befor close the preview
    $('.image-preview').hover(
        function () {
           $('.image-preview').popover('show');
           $('.content').css('padding-bottom', '130px');
        }, 
         function () {
           $('.image-preview').popover('hide');
           $('.content').css('padding-bottom', '20px');
        }
    );    
});

$(function() {
    // Create the close button
    var closebtn = $('<button/>', {
        type:"button",
        text: 'x',
        id: 'close-preview',
        style: 'font-size: initial;',
    });
    closebtn.attr("class","close pull-right");
    // Set the popover default content
    $('.image-preview').popover({
        trigger:'manual',
        html:true,
        title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
        content: "There's no image",
        placement:'bottom'
    });
    // Clear event
    $('.image-preview-clear').click(function(){
        $('.image-preview').attr("data-content","").popover('hide');
        $('.image-preview-filename').val("");
        $('.image-preview-clear').hide();
        $('.image-preview-input input:file').val("");
        $(".image-preview-input-title").text("<?=$this->lang->line('student_file_browse')?>"); 
    }); 
    // Create the preview image
    $(".image-preview-input input:file").change(function (){     
        var img = $('<img/>', {
            id: 'dynamic',
            width:250,
            height:200,
            overflow:'hidden'
        });      
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
            $(".image-preview-input-title").text("<?=$this->lang->line('student_file_browse')?>");
            $(".image-preview-clear").show();
            $(".image-preview-filename").val(file.name);            
            img.attr('src', e.target.result);
            $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
            $('.content').css('padding-bottom', '130px');
        }        
        reader.readAsDataURL(file);
    });  
});
</script>
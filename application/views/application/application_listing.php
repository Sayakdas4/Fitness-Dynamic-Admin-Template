<div class="content-wrapper">
    <section class="content-header">
      <h1>
        <i class="fa fa-briefcase"></i> Application Area
        <small>Details</small>
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>addapplication"><i class="fa fa-plus"></i> Add application</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
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
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">List</h3>
                    <div class="box-tools">
                        <form action="<?php echo base_url() ?>index" method="POST" id="searchList">
                            <div class="input-group">
                              <input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                              <div class="input-group-btn">
                                <button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
                              </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                        <th>#</th>
                        <th class="text-center">Title</th>
                        <!-- <th class="text-center">Description</th> -->
                        <th class="text-center">Image</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    <?php
                    if(!empty($applications))
                    {
                        foreach($applications as $application)
                        {
                    ?>
                    <tr>
                        <td><?php echo $application->application_id ?></td>
                        <td class="text-center"><?php echo $application->title ?></td>
                        <?php if(!empty($application->image)) { ?>
                            <td class="text-center"><a href="<?php echo base_url().'uploads/'.$application->image; ?>"><img src="<?php echo assets_url(); ?>uploads/<?=$application->image?>" width="250" height="250"></a></td>
                        <?php } else { ?>
                            <td class="text-center"><img src="<?php echo assets_url(); ?>uploads/blank.jpg" width="100" height="100"></td>
                        <?php } ?>
                        <td class="text-center">
                            <a class="btn btn-sm btn-info" href="<?php echo base_url().'editapplication/'.$application->application_id; ?>" title="Edit"><i class="fa fa-pencil"></i></a> |
                            <a class="btn btn-sm btn-danger" href="<?php echo base_url().'deleteapplication/'.$application->application_id; ?>" title="Delete"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php
                        }
                    }
                    ?>
                  </table>
                  
                </div>
                <div class="box-footer clearfix">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
              </div>
            </div>
        </div>
    </section>
</div>
<script type="text/javascript" src="<?php echo assets_url(); ?>assets/js/delete.js" charset="utf-8"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();            
            var link = jQuery(this).get(0).href;            
            var value = link.substring(link.lastIndexOf('/') + 1);
            jQuery("#searchList").attr("action", baseURL + "index.php/application_listing/" + value);
            jQuery("#searchList").submit();
        });
    });
</script>

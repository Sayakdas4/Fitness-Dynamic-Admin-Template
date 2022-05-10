<div class="content-wrapper">
    <section class="content-header">
      <h1>
        <i class="fa fa-product-hunt"></i> Product
        <small>Details</small>
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>addproduct"><i class="fa fa-plus"></i> Add Product</a>
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
                        <div class="col-md-3 pull-right">
                            <div class="form-group">
                                <?php
                                    $array = array("0" => "Select Category"); 
                                    if(!empty($category)) { foreach($category as $cat) {
                                            $array[$cat->product_category_id] = $cat->product_category_title;
                                        }
                                    }
                                    echo form_dropdown("product_category_id", $array, set_value("product_category_id", $set), "id='category_id' class='pull-right form-control select2'");
                                ?>
                            </div>
                        </div>
                        <form action="<?php echo base_url() ?>product_listing" method="POST" id="searchList">
                            <div class="input-group">
                              <input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                              <div class="input-group-btn">
                                <button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
                              </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="box-body table-responsive no-padding" id="hide-table">
                    <table class="table table-hover">
                        <tr>
                            <th>#</th>
                            <th class="text-center">Category</th>
                            <th class="text-center">Title</th>
                            <th class="text-center">Description</th>
                            <th class="text-center">Image</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        <?php
                        if(!empty($products))
                        {
                            foreach($products as $product)
                            {
                        ?>
                        <tr>
                            <td><?php echo $product->product_id ?></td>
                            <td class="text-center"><?=$product->product_category_title?></td>
                            <td class="text-center"><?php echo $product->title ?></td>
                            <td style="width:500px; text-align:justify;"><div style="height: 70px; overflow: hidden; line-height: 22px;"><?php echo $product->description ?></div></td>
                            <td class="text-center"><img src="<?php echo assets_url(); ?>uploads/<?php echo $product->image; ?>" width="150" height="150"></td>
                            <td class="text-center">
                                <a class="btn btn-sm btn-info" href="<?php echo base_url().'editproduct/'.$product->product_id; ?>" title="Edit"><i class="fa fa-pencil"></i></a> |
                                <a class="btn btn-sm btn-danger" href="<?php echo base_url().'deleteproduct/'.$product->product_id; ?>" title="Delete"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php
                            }
                        }
                        ?>
                    </table>
                    <div class="box-footer clearfix">
                        <?php echo $this->pagination->create_links(); ?>
                    </div>
                </div>
                <div class="text-center" id="show-msg" style="display: none;"><h3 class="box-title">Select Category from the dropdown</h3></div>
                
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
            jQuery("#searchList").attr("action", baseURL + "product_listing/" + value);
            jQuery("#searchList").submit();
        });
    });
</script>
<script type="text/javascript">
    $('#category_id').change(function() {
        var category_id = $(this).val();
        $('#show-msg').hide();
        if(category_id == 0) {
            $('#hide-table').hide();
            $('#show-msg').show();
        } else {
            $.ajax({
                type: 'POST',
                url: "<?=base_url('product/product_list_by_category')?>",
                data: "category_id=" + category_id,
                dataType: "html",
                success: function(data) {
                    window.location.href = data;
                }
            });
        }
    });
</script>

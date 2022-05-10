<?php $this->load->view('fincludes/header'); ?>
    <section class="carousel slide" id="banner">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" style="background: url(<?php echo base_url().'uploads/'.$product_banner->image; ?>);" style="display: none;">
                </div>
                <?php if(!empty($banners)) { foreach($banners as $banner){ if($banner->banner_id == 4){} else { ?>
                <div class="carousel-item" style="background: url(<?php echo base_url().'uploads/'.$banner->image; ?>);">
                </div>
                <?php } } } ?>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <i class="fal fa-chevron-left"></i>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <i class="fal fa-chevron-right"></i>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>
    
    <section class="bg-img product-sec paint-product ptb-100" id="primers">
      <div class="container-fluid">
        <div class="section-heading text-center pb-30">
            <h1 class="bg-red"><span>MIL PAINT PRODUCT</span></h1>
            <div class="section-heading text-center pb-10">
                <h1>Primers</h1>
            </div>
            <!-- <p class="text-center">Primers</p> -->
        </div>
        <div class="product-owl">
          <div class="product-owl-img owl-carousel owl-theme">
            <?php if(!empty($products1)){ foreach($products1 as $product){ ?>
            <div class="item text-center">
              <div class="product">
                <div class="product-img">
                  <img src="<?php echo base_url().'uploads/'.$product->image; ?>">
                </div>
                <div class="pad15">
                  <a href="<?php echo base_url(); ?>product-details/<?=$product->page_slug?>"><h2 style="font-size: 16px;"><?=$product->title?></h2></a>
                  <p><?=$product->short_description?></p>
                </div>
                <a href="<?php echo base_url(); ?>product.html" class="read-more">Read More</a>
              </div>
            </div>
            <?php } } ?>
          </div>
        </div>
      </div>
    </section>



    <section class="bg-img top-coats ptb-100" id="top_coats">
      <div class="container-fluid">
        <div class="section-heading text-center pb-30">
            <h1>Top Coats</h1>
        </div>
        <div class="product-owl">
          <div class="product-owl-img owl-carousel owl-theme">
            <?php if(!empty($products2)){ foreach($products2 as $product){ ?>
            <div class="item text-center">
              <div class="product">
                <div class="product-img">
                  <img src="<?php echo base_url().'uploads/'.$product->image; ?>">
                </div>
                <div class="pad15">
                  <a href="<?php echo base_url(); ?>product-details/<?=$product->page_slug?>"><h2><?=$product->title?></h2></a>
                  <p><?=$product->short_description?></p>
                </div>
                <a href="<?php echo base_url(); ?>product.html" class="read-more">Read More</a>
              </div>
            </div>
            <?php } } ?>
          </div>
        </div>
      </div>
    </section>


    <section class="bg-img thinner-sec ptb-100" id="thinners">
      <div class="container-fluid">
        <div class="section-heading text-center pb-30">
            <h1>Thinner</h1>
        </div>
        <div class="product-owl thinner-product-owl-ar">
          <div class="thinner-product-owl product-owl-img owl-carousel owl-theme">
            <?php if(!empty($products3)){ foreach($products3 as $product){ ?>
            <div class="item text-center">
              <div class="product">
                <div class="product-img">
                  <a href="<?php echo base_url(); ?>product-details/<?=$product->page_slug?>"><img src="<?php echo base_url().'uploads/'.$product->image; ?>"></a>
                </div>
                <div class="pad15">
                    <h2><?=$product->title?></h2>
                    <p><?=$product->short_description?></p>
                </div>
                <a href="<?php echo base_url(); ?>product.html" class="read-more">Read More</a>
              </div>
            </div>
            <?php } } ?>
          </div>
        </div>
      </div>
    </section>


    <section class="bg-img brown-sec ptb-100" id="section4">
      <div class="container-fluid">
        <div class="application-sec">
          <div class="row">
            <div class="col-md-4">
              <div class="left-img">
                <img src="<?php echo base_url().'uploads/'.$cms8->image; ?>">
              </div>
            </div>
            <div class="col-md-8">
              <div class="left-text">
                <h2><?=$cms8->title?></h2>
                <?=$cms8->description?>
              </div>
            </div>
          </div>
          <div class="row mt-4">
            <div class="col-md-8">
              <div class="left-text right-text">
                <h2><?=$cms9->title?></h2>
                <?=$cms9->description?>
              </div>
            </div>
            <div class="col-md-4">
              <div class="left-img">
                <img src="<?php echo base_url().'uploads/'.$cms9->image; ?>">
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <section class="bg-img yellow-sec ptb-100" id="speciality_coating">
      <div class="container-fluid">
        <div class="section-heading text-center pb-30">
          <h1 class="bg-red"><span>Speciality Coating</span></h1>
        </div>
        <div class="product-owl">
          <div class="product1-owl-img owl-carousel owl-theme">
            <?php if(!empty($products4)){ foreach($products4 as $product){ ?>
            <div class="item text-center">
              <div class="product">
                <div class="product-img">
                  <img src="<?php echo base_url().'uploads/'.$product->image; ?>">
                </div>
                <div class="pad15">
                  <a href="<?php echo base_url(); ?>product-details/<?=$product->page_slug?>"><h2><?=$product->title?></h2></a>
                  <p><?=$product->description?></p>
                </div>
              </div>
            </div>
            <?php } } ?>
          </div>
        </div>
      </div>
    </section>



    <section class="bg-img brown-sec ptb-100" id="paper_paint_strainers">
      <div class="container-fluid">
        <div class="section-heading text-center pb-30">
          <h1 class="bg-red"><span>Paper Paint Strainers</span></h1>
        </div>
        <div class="product-owl">
          <div class="paint-owl-img owl-carousel owl-theme">
            <?php if(!empty($products5)){ foreach($products5 as $product){ ?>
            <div class="item text-center">   
              <div class="paint-owl-bg">
                <div class="row">
                  <div class="col-md-4">
                    <div class="product-img">
                      <img src="<?php echo base_url().'uploads/'.$product->image; ?>">
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="paint-text text-left">
                      <a href="<?php echo base_url(); ?>product-details/<?=$product->page_slug?>"><h2><?=$product->title?></h2></a>
                    </div>
                    <div class="paint-text text-left">
                      <?=$product->description?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php } } ?>
          </div>
        </div>
      </div>
      <div class="online-enquiries section-heading text-center pb-30 pt-30">
        <h1 class="bg-red"><span><a href="<?php echo base_url(); ?>india.html">SEND ONLINE ENQUIRIES</a></span></h1>
      </div>
    </section>
    

    <section class="bg-img black-sec ptb-100">
      <div class="container-fluid">
        <div class="section-heading text-center pb-30">
          <h1 class="bg-red"><span>Product Video</span></h1>
        </div>
        <div class="video-sec">
          <div class="product-owl-video owl-carousel owl-theme">
            <?php if(!empty($videos)) { foreach($videos as $video){ ?>
            <div class="item text-center">
              <div class="pd-video">
                <div class="product-video">
                  <div class="o-video">
                    <?=$video->link?>
                  </div>
                </div>
              </div>
            </div>
            <?php } } ?>
          </div>
        </div>
      </div>
    </section>
    



    <section class="">
      <div class="row">
        <div class="col-md-4 pr-0">
          <div class="bg-img thinner-sec ptb-100">  
            <div class="container-fluid">
              <div class="section-heading text-center pb-30">
                <h1>OUR CERTIFICATIONS</h1>
              </div>
              <div class="pdct-certificate-ar">
                <div class="pdct-certificate-sec owl-carousel owl-theme">
                  <?php if(!empty($certificationss)) { foreach($certificationss as $certifications){ ?>
                  <div class="item text-center">
                    <div class="pdct-certificate-slider">
                      <div class="pdct-certificate-img-slid">
                        <img src="<?php echo base_url().'uploads/'.$certifications->image; ?>">
                      </div>
                    </div>
                  </div>
                  <?php } } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-8 pl-0">
          <div class="bg-img yellow-sec h-100 ptb-100">
            <div class="container-fluid">
              <div class="section-heading text-left pb-30 pl-4">
                <h1>our Client</h1>
              </div>
              <div class="carousel5 mt-5">
                <?php if(!empty($clients)) { foreach($clients as $client){ ?>
                <div class="item text-center">
                  <div class="client-box">
                    <img src="<?php echo base_url().'uploads/'.$client->image; ?>">
                  </div>
                </div>
                <?php } } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
<?php $this->load->view('fincludes/footer'); ?>
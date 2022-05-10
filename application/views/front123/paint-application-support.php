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

    <section class="shop-list-area bg-img brown-sec ptb-100">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-md-4 hidden-xs hidden-sm">
            <div class="produts-1">
              <ul>
                <h2>Mil Paint Products</h2>
                <li class="pb-35">
                  <?php if(!empty($products)) { foreach($products as $cat => $product){ 
                    echo "<h5 class='topic-title'>". (isset($category[$cat])?$category[$cat]->product_category_title:'')."</h5>";
                  ?>
                  <ul>
                    <?php if(!empty($product)) { foreach($product as $prdt) { ?>
                    <li>
                      <i class="fa fa-long-arrow-right"></i><a href="<?php echo base_url(); ?>product-details/<?=$prdt->page_slug?>"> <?=$prdt->title?></a>
                    </li>
                    <?php } } ?>
                  </ul>
                  <?php } } ?>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-lg-9 col-md-8">
            <div class="single-product">
              <div class="row">
                <div class="col-md-8 margin-1">
                  <div class="shop-list-wrapper">
                    <div class="single-shop-item">
                      <div class="shop-text">
                        <h4><?=$support1->title?></h4>
                        <div class="shop-divider"></div>
                        <?=$support1->description?>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <img
                    src="<?php echo base_url().'uploads/'.$support1->image; ?>"
                    alt="Etch Primer"
                    class="pulll-right left-img"
                  />
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 margin-1">
                  <div class="shop-list-wrapper">
                    <div class="single-shop-item">
                      <div class="shop-text">
                        <h4><?=$support2->title?></h4>
                        <div class="shop-divider"></div>
                        <?=$support2->description?>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <img
                    src="<?php echo base_url().'uploads/'.$support2->image; ?>"
                    alt="Etch Primer"
                    class="pulll-right left-img"
                  />
                </div>
              </div>
              <div class="spacer40"></div>
              <ul role="tablist" class="nav nav-tabs">
                <li role="presentation">
                  <a
                    class="active"
                    data-toggle="tab"
                    role="tab"
                    aria-controls="description"
                    href="#description"
                    aria-expanded="true"
                  >
                    Our USP:</a
                  >
                </li>
                <!-- <li role="presentation">
                  <a
                    data-toggle="tab"
                    role="tab"
                    aria-controls="review"
                    href="#review"
                    aria-expanded="true"
                  >
                    Application Areas:</a
                  >
                </li> -->
              </ul>
              <div class="tab-content">
                <div id="description" class="tab-pane active" role="tabpanel">
                  <div class="row">
                    <div class="col-md-8">
                        <div class="tab-text">
                            <ul>
                              <li>
                                <i class="fa fa-check blink"></i>Proper Systematic Process Painting Execution.
                              </li>
                              <li>
                                <i class="fa fa-check blink"></i>Right Equipment for Painting.
                              </li>
                              <li>
                                <i class="fa fa-check blink"></i>Right Primer Selections.
                              </li>
                              <li>
                                <i class="fa fa-check blink"></i>Proper Masking Solutions.
                              </li>
                              <li>
                                <i class="fa fa-check blink"></i>Proper Control on Pot life, Flash off, Paint Mixings etc.
                              </li>
                              <li>
                                <i class="fa fa-check blink"></i>Selection of right thinners as per temperatures.
                              </li>
                              <li>
                                <i class="fa fa-check blink"></i>Timely completion of Job.
                              </li>
                              <li>
                                <i class="fa fa-check blink"></i>Special applications for CARC Coatings.
                              </li>
                              <li>
                                <i class="fa fa-check blink"></i>Camouflage Painting.
                              </li>
                              <li>
                                <i class="fa fa-check blink"></i>In-House application support.
                              </li>
                              <li>
                                <i class="fa fa-check blink"></i>In-House application support.
                              </li>
                            </ul>
                          </div>
                    </div>
                  </div>
                </div>
                <!-- <div id="review" class="tab-pane" role="tabpanel">
                  <div class="tab-text">
                    <ul class="brd-top">
                      <li>
                        <i class="fa fa-check blink"></i>Air defense System
                      </li>
                      <li>
                        <i class="fa fa-check blink"></i>Aircraft Re-Finishing
                      </li>
                      <li><i class="fa fa-check blink"></i>Body Repairing</li>
                      <li><i class="fa fa-check blink"></i>Civil Avionics</li>
                      <li><i class="fa fa-check blink"></i>Cryogenics</li>
                      <li>
                        <i class="fa fa-check blink"></i>Land Combat Vehicles
                      </li>
                      <li>
                        <i class="fa fa-check blink"></i>Military Ballistics
                      </li>
                      <li>
                        <i class="fa fa-check blink"></i>Military Vehicles
                      </li>
                      <li><i class="fa fa-check blink"></i>Missile System</li>
                      <li><i class="fa fa-check blink"></i>Naval System</li>
                      <li><i class="fa fa-check blink"></i>Radars</li>
                      <li>
                        <i class="fa fa-check blink"></i>RadarsLand Combat
                        Vehicles
                      </li>
                      <li><i class="fa fa-check blink"></i>Space Aviation</li>
                    </ul>
                  </div>
                </div> -->
              </div>
              <hr />
              <button type="submit" class="read-more enquiries">
                <span>
                  <a href="<?php echo base_url(); ?>india.html" class="">Send Online Enquiries </a>
                </span>
              </button>
              <div class="spacer20"></div>
              
            
           
              
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

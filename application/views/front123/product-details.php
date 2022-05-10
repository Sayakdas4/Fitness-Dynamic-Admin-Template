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
                <?php if($product_details->page_slug == 'mil-c-8514c-etch-primer.html' || $product_details->page_slug == 'mil-prf-23377-high-solid-yellow-epoxy-primer.html' || $product_details->page_slug == 'mil-dtl-53022-epoxy-primer-coating.html' || $product_details->page_slug == 'mil-prf-85285-pu-top-coat.html' || $product_details->page_slug == 'mil-prf-22750g-epoxy-top-coat.html' || $product_details->page_slug == 'mil-t-81772b-type-1-pu-thinner.html' || $product_details->page_slug == 'mil-t-81772b-type-2-epoxy-thinner.html'){ ?>
                <h2>Mil Paint Products</h2>
                <li class="pb-35">
                  <?php if(!empty($products1)) { foreach($products1 as $cat => $product){
                    echo "<h6 class='topic-title'>". (isset($category[$cat])?$category[$cat]->product_category_title:'')."</h6>";
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
                <?php } elseif($product_details->page_slug == 'conductive-paints.html' || $product_details->page_slug == 'infra-red-reflective-paint.html' || $product_details->page_slug == 'rf-paints.html' || $product_details->page_slug == 'conformal-coatings.html' || $product_details->page_slug == 'dielectric-paints.html' || $product_details->page_slug == 'fire-retardant-paints.html' || $product_details->page_slug == 'anti-skid-paints.html'){ ?>
                  <h2><?php if(!empty($products2)) { foreach($products2 as $cat => $product){ 
                      echo "". (isset($category[$cat])?$category[$cat]->product_category_title:'')."";
                    ?></h2>
                  <li class="pb-35">
                    <ul>
                      <?php if(!empty($product)) { foreach($product as $prdt) { ?>
                      <li>
                        <i class="fa fa-long-arrow-right"></i><a href="<?php echo base_url(); ?>product-details/<?=$prdt->page_slug?>"> <?=$prdt->title?></a>
                      </li>
                      <?php } } ?>
                    </ul>
                  </li>
                  <?php } } ?>
                <?php } elseif($product_details->page_slug == 'booth-filter.html' || $product_details->page_slug == 'paper-paint-stainers.html'){ ?>
                  <h2><?php if(!empty($products3)) { foreach($products3 as $cat => $product){ 
                      echo "". (isset($category[$cat])?$category[$cat]->product_category_title:'')."";
                    ?></h2>
                  <li class="pb-35">
                    <ul>
                      <?php if(!empty($product)) { foreach($product as $prdt) { ?>
                      <li>
                        <i class="fa fa-long-arrow-right"></i><a href="<?php echo base_url(); ?>product-details/<?=$prdt->page_slug?>"> <?=$prdt->title?></a>
                      </li>
                      <?php } } ?>
                    </ul>
                  </li>
                  <?php } } ?>
                <?php } ?>
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
                        <h4><?=$product_details->title?></h4>
                        <div class="shop-divider"></div>
                        <?=$product_details->description?>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <img
                    src="<?php echo base_url().'uploads/'.$product_details->image; ?>"
                    alt="Etch Primer"
                    class="pulll-right left-img"
                  />
                </div>
              </div>
              <?php if($product_details->page_slug == 'mil-c-8514c-etch-primer.html' || $product_details->page_slug == 'mil-prf-23377-high-solid-yellow-epoxy-primer.html' || $product_details->page_slug == 'mil-dtl-53022-epoxy-primer-coating.html' || $product_details->page_slug == 'mil-prf-85285-pu-top-coat.html' || $product_details->page_slug == 'mil-prf-22750g-epoxy-top-coat.html' || $product_details->page_slug == 'mil-t-81772b-type-1-pu-thinner.html' || $product_details->page_slug == 'mil-t-81772b-type-2-epoxy-thinner.html'){ ?>
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
                <li role="presentation">
                  <a
                    data-toggle="tab"
                    role="tab"
                    aria-controls="review"
                    href="#review"
                    aria-expanded="true"
                  >
                    Application Areas:</a
                  >
                </li>
              </ul>
              <div class="tab-content">
                <div id="description" class="tab-pane active" role="tabpanel">
                  <div class="row">
                    <div class="col-md-8">
                        <div class="tab-text">
                            <ul>
                              <li>
                                <i class="fa fa-check blink"></i>High Quality Aircraft
                                Paints
                              </li>
                              <li>
                                <i class="fa fa-check blink"></i>Professional
                                Consultation Service
                              </li>
                              <li>
                                <i class="fa fa-check blink"></i>Within 24-Hrs.
                                Attendance to the Call
                              </li>
                              <li>
                                <i class="fa fa-check blink"></i>Painting Done By
                                Qualified Professionals
                              </li>
                              <li>
                                <i class="fa fa-check blink"></i>Advanced Equipment Used
                              </li>
                              <li>
                                <i class="fa fa-check blink"></i>Competitive Prices
                              </li>
                              <li>
                                <i class="fa fa-check blink"></i>Follow IS, FED-STD
                                &amp; ASTM Standards
                              </li>
                              <li>
                                <i class="fa fa-check blink"></i>Paint strip and
                                refinishes
                              </li>
                            </ul>
                          </div>

                    </div>
                    <!-- <div class="col-md-4">
                    <div class="video-right">
                        <div class="pd-video">
                            <div class="product-video">
                              <div class="o-video">
                                <iframe
                                  src="https://www.youtube.com/embed/Kch8n4tcOZQ"
                                  allowfullscreen
                                ></iframe>
                              </div>
                            </div>
                          </div>
                    </div>
                    </div> -->
                  </div>
                
                </div>
                <div id="review" class="tab-pane" role="tabpanel">
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
                </div>
              </div>
              <?php } ?>
              <hr />
              <button type="submit" class="read-more enquiries">
                <span>
                  <a href="<?php echo base_url(); ?>india.html" class="">Send Online Enquiries </a>
                </span>
              </button>
              <div class="spacer20"></div>
              <?php if($product_details->page_slug == 'mil-c-8514c-etch-primer.html' || $product_details->page_slug == 'mil-prf-23377-high-solid-yellow-epoxy-primer.html' || $product_details->page_slug == 'mil-dtl-53022-epoxy-primer-coating.html'){ ?>
              <h4 class="mt-4 white-text">Realated Product</h4>
              <hr />
              <div class="spacer20"></div>
              <div class="row remove-padding">
              <?php foreach($realated_products2 as $product2){ ?>
                <div class="col-md-4 contain margin-1">
                  <div class="border">
                    <div class="service-item">
                      <a href="<?php echo base_url(); ?>product-details/<?=$product2->page_slug?>">
                        <div class="service-item_img">
                          <img
                            src="<?php echo base_url().'uploads/'.$product2->image; ?>"
                            alt="service-renovation"
                            class="img-responsive-1"
                          />
                        </div>
                        <h3><?=$product2->title?></h3>
                        <div class="spacer20"></div>
                      </a>
                    </div>
                  </div>
                </div>
              <?php } ?>
              </div>
              <?php } elseif($product_details->page_slug == 'mil-prf-85285-pu-top-coat.html' || $product_details->page_slug == 'mil-prf-22750g-epoxy-top-coat.html'){ ?>
              <h4 class="mt-4 white-text">Realated Product</h4>
              <hr />
              <div class="spacer20"></div>
              <div class="row remove-padding">
              <?php foreach($realated_products1 as $product1){ ?>
                <div class="col-md-4 contain margin-1">
                  <div class="border">
                    <div class="service-item">
                      <a href="<?php echo base_url(); ?>product-details/<?=$product1->page_slug?>">
                        <div class="service-item_img">
                          <img
                            src="<?php echo base_url().'uploads/'.$product1->image; ?>"
                            alt="service-renovation"
                            class="img-responsive-1"
                          />
                        </div>
                        <h3><?=$product1->title?></h3>
                        <div class="spacer20"></div>
                      </a>
                    </div>
                  </div>
                </div>
              <?php } ?>
              </div>
              <?php } ?>
              <div class="spacer40"></div> 
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

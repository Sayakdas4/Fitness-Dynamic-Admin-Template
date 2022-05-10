<?php $this->load->view('fincludes/header'); ?>
<style type="text/css">
  .shades-ul {
    width: 100%;
    display: inline-block;
    overflow:hidden;
    margin:0;
    padding:0;
    float:none;
    height:100%;
    list-style: outside none none;
    /*text-align:center;*/
  }

  .shades-li {
    width: calc(100% / 9);
    display: inline-block;
    overflow:hidden;
    margin:5px;
    padding:0;
    float:none;
    height:100%;
    list-style: outside none none;
    /*text-align:center;*/
  }
  #div2037{align-items: center;
    display: inline-flex;
    height: 75px;
    text-align: center;
    /* width: 100%; */
    margin: 0 auto;
    position: relative;
    float: none;}
</style>

  <section class="carousel slide" id="banner">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" style="background: url(<?php echo base_url().'uploads/'.$shades_card_banner->image; ?>);" style="display: none;">
            </div>
            <?php if(!empty($banners)) { foreach($banners as $banner){ if($banner->banner_id == 3){} else { ?>
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

  <section class="usp about-title">
    <div class="container-fluid">
      <div class="usp-page">
        <h3>SHADE CARD</h3>
        <h2><?=$cms6->title?></h2>
        <p><?=$cms6->description?></p>
      </div>
      <div class="section-heading text-center pb-30">
        <ul class="shades-ul">
          <?php if(!empty($type_3)) { foreach($type_3 as $bs) { ?>
          <li class="shades-li" style="CURSOR: pointer; HEIGHT:  75px; FONT-FAMILY: Arial; font-size: 15px;  VERTICAL-ALIGN: top; COLOR: white; PADDING-BOTTOM: 2px; PADDING-TOP: 2px; BACKGROUND-COLOR: <?=$bs->color?>">
            <div id="div2037"><small style="text-shadow: 1px 1px 1px #3c3c3c;">&nbsp;&nbsp;&nbsp;<?=$bs->title?> <br> &nbsp;&nbsp;&nbsp;<?=$bs->code?> &nbsp; <?=$bs->name?></small></div></li>
          <?php } } ?>
        </ul>
      </div>
    </div>
  </section>

<?php $this->load->view('fincludes/footer'); ?>
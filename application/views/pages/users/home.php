<!-- Slide -->
<div id="owl-demo" class="owl-carousel owl-theme">
    
    <?php foreach($slider as $slide): ?>
        <div class="item"><img src="<?=$slide->image ? base_url("images/slider/$slide->image") : base_url("images/slider/default.jpg") ?>" alt=""></div>
    <?php endforeach ?>

</div>
<!-- End Slide -->

<!-- Product -->
<section id="promo-area">
   <div class="container mt-5">
       <div class="row">
           <div class="col-lg-6 col-md-6 col-sm-12">
               <a href="<?= base_url('shop/men') ?>">
                   <div class="single_promo">
                       <img src="<?= base_url() ?>assets/img/img-1.jpg" alt="...">
                       <div class="box-content">
                           <h3 class="title">PRIA</h3>
                       </div>
                   </div>
               </a>
           </div>
           <div class="col-lg-6 col-md-6 col-sm-12">
               <a href="<?= base_url('shop/women') ?>">
                   <div class="single_promo">
                       <img src="<?= base_url() ?>assets/img/img-3.jpg" alt="...">
                       <div class="box-content">
                           <h3 class="title">WANITA</h3>
                       </div>
                   </div>
               </a>
           </div>
       </div>
   </div>
</section>

<section id="new-product">
   <div class="container mt-4">
       <div class="row">
           <div class="col-md-12 text-center">
               <h3>NEW <span>PRODUCT</span></h3>
               <div class="divider"></div>
           </div>
       </div>

       <div class="mt-3">
           <h4>PRIA</h4>
           <p class="product-description">Pakaian Terbaru Untuk Pria</p>
           <div class="row text-center mt-3 mb-4">
                <?php foreach($productL as $rowL): ?>
                <div class="col-6 col-lg-3 col-sm-6">
                    <figure class="figure">
                        <div class="figure-img">
                            <img src="<?=$rowL->image ? base_url("images/product/$rowL->image") : base_url("images/product/default.jpg") ?>" class="figure-img img-fluid" alt="">
                            <a href="<?= base_url("shop/detail/$rowL->slug") ?>" class="d-flex justify-content-center">
                                <img src="<?= base_url() ?>assets/img/detail.png" alt="" class="align-self-center">
                            </a>
                        </div>
                        <figcaption class="figure-caption">
                            <h5><?= $rowL->title ?></h5>
                            <p>IDR <?= number_format($rowL->price, 0, ',', '.') ?></p>
                        </figcaption>
                    </figure>
                </div>
                <?php endforeach ?>
            </div>
            <h4>WANITA</h4>
            <p class="product-description">Pakaian Terbaru Untuk Wanita</p>
            <div class="row text-center mt-3 mb-4">
                <?php foreach($productW as $rowW): ?>
                <div class="col-6 col-lg-3 col-sm-6">
                    <figure class="figure">
                        <div class="figure-img">
                            <img src="<?=$rowW->image ? base_url("images/product/$rowW->image") : base_url("images/product/default.jpg") ?>" class="figure-img img-fluid" alt="">
                            <a href="<?= base_url("shop/detail/$rowW->slug") ?>" class="d-flex justify-content-center">
                                <img src="<?= base_url() ?>assets/img/detail.png" alt="" class="align-self-center">
                            </a>
                        </div>
                        <figcaption class="figure-caption">
                            <h5><?= $rowW->title ?></h5>
                            <p>IDR <?= number_format($rowW->price, 0, ',', '.') ?></p>
                        </figcaption>
                    </figure>
                </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</section>
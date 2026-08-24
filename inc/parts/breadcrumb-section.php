<?php $bgBanner = (!empty($general->banner)) ? $general->banner : 'img/breadcrumb.jpg'; ?>
<section class="breadcrumb-section set-bg" data-setbg="<?php echo $bgBanner; ?>" style="background-image: url('<?php echo $bgBanner; ?>');">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2><?php echo Store::normalize_title(); ?></h2>
                    <div class="breadcrumb__option">
                        <a href="/">Inicio</a>
                        <span><?php echo Store::normalize_title(); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
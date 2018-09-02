<section class="hero">
    <div class="hero__slider">
        <?php foreach ($banners as $baner): ?>
            <?php $description = $baner->getBannerDescriptions()->one(); ?>
            <div class="hero__slide" style="background-image: url('<?= Yii::$app->glide->createSignedUrl([
                'glide/index',
                'path' => 'banners/' . $baner->image,
            ], true) ?>');">
                <div class="container">
                    <div class="hero__content">
                        <div class="hero__description">
                            <div class="hero__holder">
                                <span class="main-text main-text--sm"><?= $description->little_title ?></span>
                                <h2><?= $description->title ?></h2>
                                <p class="main-text"><?= $description->description ?></p>
                                <?php if ($description->link): ?>
                                    <a href="<?= $description->link ?>"
                                       class="main-link main-link--with-arrow bb-arrow-lg-right"><?= $description->link_name ?></a>
                                <?php endif; ?>
                            </div>
                            <div class="hero__actions">
                                <div class="hero__block">
                                    <div class="hero__progressbar">
                                        <div class="hero__progressbar-holder">
                                            <div class="hero__progressbar-line"></div>
                                        </div>
                                    </div>
                                    <div class="hero__arrows">
                                        <button class="hero__arrow hero__arrow--prev bb-arrow-sm-left"></button>
                                        <button class="hero__arrow hero__arrow--next bb-arrow-sm-right"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</section>

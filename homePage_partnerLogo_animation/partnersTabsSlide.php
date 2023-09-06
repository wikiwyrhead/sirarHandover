/*
* Partnerships Logo Slider Animation
* Modified partnersSlider.php for Continous Partner Logo Animation
* Dependency : partnersSlider.css
* */

<section class="partnersTabsSlider">
    <div class="container logo-slider-container">
        <h2 class="partnersTabsSlider__title">
            <?= $section['title'] ?>
        </h2>
        <?php
        $partnersList = get_posts([
            'numberposts'      => -1,
            'post_type'        => 'partners',
            'suppress_filters' => true,
        ]);

        $partners = [];

        foreach ($partnersList as $item) {
            $itemData = new stdClass();

            $ID = $item->ID;

            $itemData->button = [
                'url'   => get_field('linkk', $ID),
                'title' => get_field('button1', $ID),
            ];
            $itemData->logo = [
                'url' => get_field('logo', $ID)['url'],
                'alt' => get_field('logo', $ID)['alt'],
            ];

            array_push($partners, $itemData);
        }

        // Merge the partners' arrays without duplication
        $combinedPartners = array_merge($partners, $partners);

        // Split the combined partners into two arrays with a maximum of 8 partners each
        $firstLinePartners = array_slice($combinedPartners, 0, 8);
        $secondLinePartners = array_slice($combinedPartners, 8, 8);
        ?>
        <?php if (!empty($firstLinePartners) && !empty($secondLinePartners)) : ?>
            <div class="partnersTabsSlider__slider partnersTabsSlider__slider--thumbs swiper myThumbsSwiper">
                <div class="partnersTabsSlider__sliderWrapper swiper-wrapper">
                    <?php foreach ($firstLinePartners as $item) : ?>
                        <div class="partnersTabsSlider__slide partnersTabsSlider__slide--thumbs swiper-slide">
                            <a href="<?= $item->button['url'] ?>" target="_blank">
                                <div class="partnersTabsSlider__slideThumbsLogoBox">
                                    <img class="partnersTabsSlider__slideThumbsLogo" src="<?= $item->logo['url'] ?>" alt="<?= $item->logo['alt'] ?>">
                                </div>
                            </a>
                        </div>
                    <?php endforeach ?>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>

            <div class="partnersTabsSlider__slider partnersTabsSlider__slider--thumbs swiper myThumbsSwiper2">
                <div class="partnersTabsSlider__sliderWrapper swiper-wrapper">
                    <?php foreach ($secondLinePartners as $item) : ?>
                        <div class="partnersTabsSlider__slide partnersTabsSlider__slide--thumbs swiper-slide">
                            <a href="<?= $item->button['url'] ?>" target="_blank">
                                <div class="partnersTabsSlider__slideThumbsLogoBox">
                                    <img class="partnersTabsSlider__slideThumbsLogo" src="<?= $item->logo['url'] ?>" alt="<?= $item->logo['alt'] ?>">
                                </div>
                            </a>
                        </div>
                    <?php endforeach ?>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        <?php endif ?>
    </div>
    <?php if ($section['button']) : ?>
        <div class="container">
            <div class="partnersTabsSlider__button">
                <?php get_part('components/button', [
                    'text'  => $section['button']['title'],
                    'url'   => $section['button']['url'],
                    'theme' => 'outlineViolet',
                    'lg'    => true,
                ]) ?>
            </div>
        </div>
    <?php endif ?>
</section>
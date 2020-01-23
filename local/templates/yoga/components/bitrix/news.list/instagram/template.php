<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

<?php if (count($arResult["ITEMS"])) : ?>

    <div class="about__insta-content">
        <div class="swiper-container swiper-container-about">
            <div class="swiper-wrapper">

                <?foreach($arResult["ITEMS"] as $arItem):?>
                <div class="swiper-slide">
                    <a href="<?= \COption::GetOptionString( "askaron.settings", "UF_INSTAGRAM");?>" class="about__insta-block">
                        <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="">
                    </a>
                </div>
                <?php endforeach; ?>

            </div>
        </div>
        <div class="swiper-button-prev swiper-button-prev-about"><img src="<?= SITE_TEMPLATE_PATH . '/img/slider-arrow.png' ?>" alt=""></div>
        <div class="swiper-button-next swiper-button-next-about"><img src="<?= SITE_TEMPLATE_PATH . '/img/slider-arrow.png' ?>" alt=""></div>
    </div>

<?php endif; ?>

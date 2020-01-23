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
<?php foreach ($arResult['SECTIONS'] as &$arSection) : ?>
    <div class="services-block">
        <div class="services-block__left">
            <img src="<?= $arSection['PICTURE']['SRC']; ?>" alt="">
            <a href="<?= $arSection['SECTION_PAGE_URL']; ?>" class="services-block__left-name"><?=$arSection["NAME"]?></a>
        </div>
        <div class="services-block__info">
            <div class="services-block__info-head">
                <img src="<?= SITE_TEMPLATE_PATH . '/img/about-flower.png' ?>" alt="">
                <a href="<?= $arSection['SECTION_PAGE_URL']; ?>" class="services-block__info-name"><?=$arSection["NAME"]?></a>
            </div>
            <p><?=$arSection['DESCRIPTION']?></p>
            <a href="<?= $arSection['SECTION_PAGE_URL']; ?>" class="services-block__info-link">Узнать расписание и цены</a>
        </div>
    </div>
<?php endforeach; ?>

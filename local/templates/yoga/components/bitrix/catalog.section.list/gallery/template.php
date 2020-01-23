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
    <div class="home-news__block">
        <a href="<?= $arSection['SECTION_PAGE_URL']; ?>">  <img class="home-news__img" src="<?= $arSection['PICTURE']['SRC']; ?>" alt=""></a>
        <div class="home-news__info">
            <a href="#" class="home-news__name"><?=$arSection["NAME"]?></a>
            <div class="home-news__read">
                <span>
                    <?= $arSection["ELEMENT_CNT"]; ?>
                    <svg class="icon-svg icon-svg-file "><use xlink:href="<?= SITE_TEMPLATE_PATH . '/img/sprite.svg#file' ?>"></use></svg>
                </span>
                <a class="home-news__link" href="<?= $arSection['SECTION_PAGE_URL']; ?>">Смотреть все фото</a>
            </div>
        </div>
    </div>
<?php endforeach; ?>

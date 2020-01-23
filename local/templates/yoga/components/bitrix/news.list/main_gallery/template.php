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

<div class="home-gallery">
    <div class="home-gallery__wrapper">
        <h2 class="home-gallery__name general-name">Галерея</h2>
        <div class="home-gallery__content">

            <?php if ($arResult["ITEMS"][0]["PREVIEW_PICTURE"]["SRC"]) : ?>
            <a href="<?=$arResult["ITEMS"][0]["DETAIL_PAGE_URL"]?>"  class="home-gallery__block home-gallery__block_height">
                <img src="<?=$arResult["ITEMS"][0]["PREVIEW_PICTURE"]["SRC"]?>" alt="">
            </a>
            <?php endif; ?>
            <div class="home-gallery__block-repeat home-gallery__block-repeat_width">
                <?php if ($arResult["ITEMS"][1]["PREVIEW_PICTURE"]["SRC"]) : ?>
                <a href="<?=$arResult["ITEMS"][1]["DETAIL_PAGE_URL"]?>"  class="home-gallery__block home-gallery__block_first">
                    <img src="<?=$arResult["ITEMS"][1]["PREVIEW_PICTURE"]["SRC"]?>" alt="">
                </a>
                <?php endif; ?>
                <?php if ($arResult["ITEMS"][2]["PREVIEW_PICTURE"]["SRC"]) : ?>
                <a href="<?=$arResult["ITEMS"][2]["DETAIL_PAGE_URL"]?>"  class="home-gallery__block">
                    <img src="<?=$arResult["ITEMS"][2]["PREVIEW_PICTURE"]["SRC"]?>" alt="">
                </a>
                <?php endif; ?>
            </div>
            <div class="home-gallery__block-repeat home-gallery__block-repeat_last">
                <?php if ($arResult["ITEMS"][3]["PREVIEW_PICTURE"]["SRC"]) : ?>
                <a href="<?=$arResult["ITEMS"][3]["DETAIL_PAGE_URL"]?>"  class="home-gallery__block">
                    <img src="<?=$arResult["ITEMS"][3]["PREVIEW_PICTURE"]["SRC"]?>" alt="">
                </a>
                <?php endif; ?>
                <?php if ($arResult["ITEMS"][4]["PREVIEW_PICTURE"]["SRC"]) : ?>
                <a href="<?=$arResult["ITEMS"][4]["DETAIL_PAGE_URL"]?>"  class="home-gallery__block home-gallery__block_inner">
                    <img src="<?=$arResult["ITEMS"][4]["PREVIEW_PICTURE"]["SRC"]?>" alt="">
                </a>
                <?php endif; ?>
            </div>
        </div>
        <a href="<?=$arResult['LIST_PAGE_URL']?>" class="home-gallery__btn btn-link">
            Смотреть все фото
        </a>
    </div>
</div>

<?php endif; ?>

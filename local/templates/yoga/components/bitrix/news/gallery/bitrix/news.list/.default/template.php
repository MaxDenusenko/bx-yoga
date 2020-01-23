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
<div class="album">
    <div class="album__wrapper default-container">
        <?$APPLICATION->IncludeComponent(
            "bitrix:breadcrumb",
            "breadcrumb",
            Array(
                "PATH" => "",
                "SITE_ID" => "s1",
                "START_FROM" => "0"
            )
        );?>
        <div class="album-content">
            <div class="album-content__wrapper">
                <h1 class="album-content__name-big general-name"><?=$arResult['SECTION']['PATH'][0]['NAME']?></h1>
                <div class="album-content__img">

                    <?foreach($arResult["ITEMS"] as $arItem):?>
                    <a class="gallery-img" title="<?=$arItem['NAME']?>" href="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" data-fancybox="gallery">
                        <?php $resizeImage = CFile::ResizeImageGet(
                            $arItem["PREVIEW_PICTURE"], ['width' => 264, 'height' => 222], BX_RESIZE_IMAGE_EXACT, false
                        ); ?>
                        <img src="<?=$resizeImage['src']?>" alt="">
                    </a>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>
</div>

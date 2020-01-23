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

<div class="new">
    <div class="new__wrapper default-container">

        <?$APPLICATION->IncludeComponent(
            "bitrix:breadcrumb",
            "breadcrumb",
            Array(
                "PATH" => "",
                "SITE_ID" => "s1",
                "START_FROM" => "0"
            )
        );?>

        <h1 class="new__name">
            <?=$arResult["NAME"]?>
        </h1>
        <div class="new__eye">
            <?= (int) $arResult['SHOW_COUNTER']?>
            <svg class="icon-svg icon-svg-eye "><use xlink:href="<?= SITE_TEMPLATE_PATH . '/img/sprite.svg#eye' ?>"></use></svg>
        </div>
        <div class="new__content">
            <?= $arResult["DETAIL_TEXT"];?>
        </div>
    </div>
</div>

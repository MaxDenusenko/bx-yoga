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
$this->setFrameMode(true);?>

<form action="<?=$arResult["FORM_ACTION"]?>">
    <input name="q" type="text" placeholder="Поиск на сайте">
    <input name="s" type="hidden" value="<?=GetMessage("BSF_T_SEARCH_BUTTON");?>" />
    <button type="submit">
        <svg class="icon-svg icon-svg-search "><use xlink:href="<?= SITE_TEMPLATE_PATH . '/img/sprite.svg#search' ?>"></use></svg>
    </button>
</form>

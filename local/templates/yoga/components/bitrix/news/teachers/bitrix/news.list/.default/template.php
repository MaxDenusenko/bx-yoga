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

<div class="teachers__content teachers-list">

    <?php if (count($arResult["ITEMS"])) : ?>

    <?foreach($arResult["ITEMS"] as $arItem):?>

    <div class="teachers-block">
        <div class="teachers-block__left">
            <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="">
            <a href="<?=$arItem['SCHEDULE_LINK']?>" class="btn-general">Показать расписание</a>
        </div>
        <div class="teachers-block__right">
            <div class="teachers-block__right-name"><?=$arItem["NAME"]?></div>
            <p><?echo $arItem["PREVIEW_TEXT"];?></p>
            <a href="<?=$arItem["DETAIL_PAGE_URL"]?>">Подробнее о преподавателе</a>
        </div>
    </div>

    <?php endforeach; ?>

    <?php else: ?>

        <h1 class="teachers__name general-gradient">Таких преподавателей нет!</h1>

    <?php endif; ?>

</div>

<?=$arResult["NAV_STRING"]?>

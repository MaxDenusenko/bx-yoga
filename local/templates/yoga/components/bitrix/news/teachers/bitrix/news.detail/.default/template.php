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

<div class="teacher">
    <div class="teacher__wrapper default-container">

        <?$APPLICATION->IncludeComponent(
            "bitrix:breadcrumb",
            "breadcrumb",
            Array(
                "PATH" => "",
                "SITE_ID" => "s1",
                "START_FROM" => "0"
            )
        );?>

        <div class="teacher__info">
            <div class="teacher__left">
                <img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" alt="">
                <a href="<?=$arResult['SCHEDULE_LINK']?>" class="teacher__left-block">
                    Смотреть расписание
                </a>
            </div>
            <div class="teacher__right">
                <h1 class="teacher__name general-name"><?=$arResult["NAME"]?></h1>
                <h2 class="teacher__fo-name">О себе</h2>
                <?echo $arResult["DETAIL_TEXT"];?>
            </div>
        </div>
        <?php if (count($arResult['PROPERTIES']['ATT_TRAINING']['VALUE'])) : ?>
        <div class="teacher__training">
            <h2 class="teacher__fo-name">Обучение:</h2>
            <ul class="teacher__list">
                <?php foreach ($arResult['PROPERTIES']['ATT_TRAINING']['VALUE'] as $TRAINING) :?>
                    <li><?=$TRAINING?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php endif; ?>
    </div>
</div>

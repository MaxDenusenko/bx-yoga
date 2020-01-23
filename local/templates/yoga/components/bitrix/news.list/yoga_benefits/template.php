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
<div class="home-benefit">
    <h2 class="home-benefit__name general-gradient">В чём польза йоги?</h2>

    <div class="home-benefit__wrapper">

        <?foreach($arResult["ITEMS"] as $arItem):?>

        <div class="home-benefit__block">
            <div class="home-benefit__block-img">
                <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem['NAME']?>">
            </div>
            <p><?=$arItem['NAME']?></p>
        </div>

        <?php endforeach; ?>

    </div>

</div>
<?php endif; ?>

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

<div class="home-news">
    <div class="home-news__wrapper">
        <h2 class="home-news__name-big general-name">Новости</h2>
        <div class="home-news__content">

            <?foreach($arResult["ITEMS"] as $arItem):?>

            <div class="home-news__block">
                <a href="<?=$arItem["DETAIL_PAGE_URL"]?>"> <img class="home-news__img" src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt=""></a>
                <div class="home-news__info">
                    <a href="#" class="home-news__name"><?=$arItem["NAME"]?></a>
                    <div class="home-news__read">
                        <span>
                            <?= (int) $arItem['SHOW_COUNTER']?>
                            <svg class="icon-svg icon-svg-eye "><use xlink:href="<?= SITE_TEMPLATE_PATH . '/img/sprite.svg#eye' ?>"></use></svg>
                        </span>
                        <a class="home-news__link" href="<?=$arItem["DETAIL_PAGE_URL"]?>">Читать статью</a>
                    </div>
                </div>
            </div>

            <?php endforeach; ?>

        </div>
        <a href="<?=$arResult['LIST_PAGE_URL']?>" class="home-news__btn btn-link">
            Смотреть все новости
        </a>
    </div>
</div>

<?php endif; ?>

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

<?foreach($arResult["ITEMS"] as $k => $arItem):?>

    <div class="services__present">
        <h2 class="services__name">
            <?=$arItem['NAME']?>
        </h2>

        <?php foreach ($arItem['DISPLAY_PROPERTIES']['ATT_BENEFITS']['VALUE'] as $text) : ?>
            <p>
                <img src="<?= SITE_TEMPLATE_PATH . '/img/flower-white.png' ?>" alt="">
                <span><?=$text?></span>
            </p>
        <?php endforeach; ?>

        <span class="services__present-text"><?=$arItem['PREVIEW_TEXT']?></span>

        <a href="#" data-toggle="modal" data-target="#cert-pay-<?=$k.$arItem['ID']?>" class="btn-form">Купить сертификат</a>
    </div>

    <div class="modal fade" id="cert-pay-<?=$k.$arItem['ID']?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <img src="<?= SITE_TEMPLATE_PATH . '/img/modal-close.png' ?>" alt="">
                </button>
                <h3 class="modal__name">Введите сумму</h3>
                <p class="modal__text">Внимание! Сертификат действует в течение <?= $arItem['DISPLAY_PROPERTIES']['ATT_VALIDITY']['VALUE'] ?> месяцев</p>
                <form class="modal__form">
                    <div class="form-group">
                        <input type="text" placeholder="Любая сумма от 1000 руб.">
                    </div>
                    <button type="button" class="btn-form">Оплатить</button>
                </form>
                <img src="<?= SITE_TEMPLATE_PATH . '/img/modal-img.png' ?>" alt="" class="modal-img-1">
                <img src="<?= SITE_TEMPLATE_PATH . '/img/modal-img.png' ?>" alt="" class="modal-img-2">
            </div>
        </div>
    </div>

<?php endforeach; ?>

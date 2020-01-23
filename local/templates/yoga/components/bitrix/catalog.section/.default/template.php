<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 *
 *  _________________________________________________________________________
 * |	Attention!
 * |	The following comments are for system use
 * |	and are required for the component to work correctly in ajax mode:
 * |	<!-- items-container -->
 * |	<!-- pagination-container -->
 * |	<!-- component-end -->
 */

$this->setFrameMode(true);

if (!empty($arResult['NAV_RESULT']))
{
	$navParams =  array(
		'NavPageCount' => $arResult['NAV_RESULT']->NavPageCount,
		'NavPageNomer' => $arResult['NAV_RESULT']->NavPageNomer,
		'NavNum' => $arResult['NAV_RESULT']->NavNum
	);
}
else
{
	$navParams = array(
		'NavPageCount' => 1,
		'NavPageNomer' => 1,
		'NavNum' => $this->randString()
	);
}

$showTopPager = false;
$showBottomPager = false;
$showLazyLoad = false;

if ($arParams['PAGE_ELEMENT_COUNT'] > 0 && $navParams['NavPageCount'] > 1)
{
	$showTopPager = $arParams['DISPLAY_TOP_PAGER'];
	$showBottomPager = $arParams['DISPLAY_BOTTOM_PAGER'];
	$showLazyLoad = $arParams['LAZY_LOAD'] === 'Y' && $navParams['NavPageNomer'] != $navParams['NavPageCount'];
}

$templateLibrary = array('popup', 'ajax', 'fx');
$currencyList = '';

if (!empty($arResult['CURRENCIES']))
{
	$templateLibrary[] = 'currency';
	$currencyList = CUtil::PhpToJSObject($arResult['CURRENCIES'], false, true, true);
}

$templateData = array(
	'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
	'TEMPLATE_LIBRARY' => $templateLibrary,
	'CURRENCIES' => $currencyList
);
unset($currencyList, $templateLibrary);

$elementEdit = CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_EDIT');
$elementDelete = CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_DELETE');
$elementDeleteParams = array('CONFIRM' => GetMessage('CT_BCS_TPL_ELEMENT_DELETE_CONFIRM'));

$positionClassMap = array(
	'left' => 'product-item-label-left',
	'center' => 'product-item-label-center',
	'right' => 'product-item-label-right',
	'bottom' => 'product-item-label-bottom',
	'middle' => 'product-item-label-middle',
	'top' => 'product-item-label-top'
);

$discountPositionClass = '';
if ($arParams['SHOW_DISCOUNT_PERCENT'] === 'Y' && !empty($arParams['DISCOUNT_PERCENT_POSITION']))
{
	foreach (explode('-', $arParams['DISCOUNT_PERCENT_POSITION']) as $pos)
	{
		$discountPositionClass .= isset($positionClassMap[$pos]) ? ' '.$positionClassMap[$pos] : '';
	}
}

$labelPositionClass = '';
if (!empty($arParams['LABEL_PROP_POSITION']))
{
	foreach (explode('-', $arParams['LABEL_PROP_POSITION']) as $pos)
	{
		$labelPositionClass .= isset($positionClassMap[$pos]) ? ' '.$positionClassMap[$pos] : '';
	}
}

$arParams['~MESS_BTN_BUY'] = $arParams['~MESS_BTN_BUY'] ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_BUY');
$arParams['~MESS_BTN_DETAIL'] = $arParams['~MESS_BTN_DETAIL'] ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_DETAIL');
$arParams['~MESS_BTN_COMPARE'] = $arParams['~MESS_BTN_COMPARE'] ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_COMPARE');
$arParams['~MESS_BTN_SUBSCRIBE'] = $arParams['~MESS_BTN_SUBSCRIBE'] ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_SUBSCRIBE');
$arParams['~MESS_BTN_ADD_TO_BASKET'] = $arParams['~MESS_BTN_ADD_TO_BASKET'] ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_ADD_TO_BASKET');
$arParams['~MESS_NOT_AVAILABLE'] = $arParams['~MESS_NOT_AVAILABLE'] ?: Loc::getMessage('CT_BCS_TPL_MESS_PRODUCT_NOT_AVAILABLE');
$arParams['~MESS_SHOW_MAX_QUANTITY'] = $arParams['~MESS_SHOW_MAX_QUANTITY'] ?: Loc::getMessage('CT_BCS_CATALOG_SHOW_MAX_QUANTITY');
$arParams['~MESS_RELATIVE_QUANTITY_MANY'] = $arParams['~MESS_RELATIVE_QUANTITY_MANY'] ?: Loc::getMessage('CT_BCS_CATALOG_RELATIVE_QUANTITY_MANY');
$arParams['~MESS_RELATIVE_QUANTITY_FEW'] = $arParams['~MESS_RELATIVE_QUANTITY_FEW'] ?: Loc::getMessage('CT_BCS_CATALOG_RELATIVE_QUANTITY_FEW');

$arParams['MESS_BTN_LAZY_LOAD'] = $arParams['MESS_BTN_LAZY_LOAD'] ?: Loc::getMessage('CT_BCS_CATALOG_MESS_BTN_LAZY_LOAD');

$generalParams = array(
	'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'],
	'PRODUCT_DISPLAY_MODE' => $arParams['PRODUCT_DISPLAY_MODE'],
	'SHOW_MAX_QUANTITY' => $arParams['SHOW_MAX_QUANTITY'],
	'RELATIVE_QUANTITY_FACTOR' => $arParams['RELATIVE_QUANTITY_FACTOR'],
	'MESS_SHOW_MAX_QUANTITY' => $arParams['~MESS_SHOW_MAX_QUANTITY'],
	'MESS_RELATIVE_QUANTITY_MANY' => $arParams['~MESS_RELATIVE_QUANTITY_MANY'],
	'MESS_RELATIVE_QUANTITY_FEW' => $arParams['~MESS_RELATIVE_QUANTITY_FEW'],
	'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'],
	'USE_PRODUCT_QUANTITY' => $arParams['USE_PRODUCT_QUANTITY'],
	'PRODUCT_QUANTITY_VARIABLE' => $arParams['PRODUCT_QUANTITY_VARIABLE'],
	'ADD_TO_BASKET_ACTION' => $arParams['ADD_TO_BASKET_ACTION'],
	'ADD_PROPERTIES_TO_BASKET' => $arParams['ADD_PROPERTIES_TO_BASKET'],
	'PRODUCT_PROPS_VARIABLE' => $arParams['PRODUCT_PROPS_VARIABLE'],
	'SHOW_CLOSE_POPUP' => $arParams['SHOW_CLOSE_POPUP'],
	'DISPLAY_COMPARE' => $arParams['DISPLAY_COMPARE'],
	'COMPARE_PATH' => $arParams['COMPARE_PATH'],
	'COMPARE_NAME' => $arParams['COMPARE_NAME'],
	'PRODUCT_SUBSCRIPTION' => $arParams['PRODUCT_SUBSCRIPTION'],
	'PRODUCT_BLOCKS_ORDER' => $arParams['PRODUCT_BLOCKS_ORDER'],
	'LABEL_POSITION_CLASS' => $labelPositionClass,
	'DISCOUNT_POSITION_CLASS' => $discountPositionClass,
	'SLIDER_INTERVAL' => $arParams['SLIDER_INTERVAL'],
	'SLIDER_PROGRESS' => $arParams['SLIDER_PROGRESS'],
	'~BASKET_URL' => $arParams['~BASKET_URL'],
	'~ADD_URL_TEMPLATE' => $arResult['~ADD_URL_TEMPLATE'],
	'~BUY_URL_TEMPLATE' => $arResult['~BUY_URL_TEMPLATE'],
	'~COMPARE_URL_TEMPLATE' => $arResult['~COMPARE_URL_TEMPLATE'],
	'~COMPARE_DELETE_URL_TEMPLATE' => $arResult['~COMPARE_DELETE_URL_TEMPLATE'],
	'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
	'USE_ENHANCED_ECOMMERCE' => $arParams['USE_ENHANCED_ECOMMERCE'],
	'DATA_LAYER_NAME' => $arParams['DATA_LAYER_NAME'],
	'BRAND_PROPERTY' => $arParams['BRAND_PROPERTY'],
	'MESS_BTN_BUY' => $arParams['~MESS_BTN_BUY'],
	'MESS_BTN_DETAIL' => $arParams['~MESS_BTN_DETAIL'],
	'MESS_BTN_COMPARE' => $arParams['~MESS_BTN_COMPARE'],
	'MESS_BTN_SUBSCRIBE' => $arParams['~MESS_BTN_SUBSCRIBE'],
	'MESS_BTN_ADD_TO_BASKET' => $arParams['~MESS_BTN_ADD_TO_BASKET'],
	'MESS_NOT_AVAILABLE' => $arParams['~MESS_NOT_AVAILABLE']
);

$obName = 'ob'.preg_replace('/[^a-zA-Z0-9_]/', 'x', $this->GetEditAreaId($navParams['NavNum']));
$containerName = 'container-'.$navParams['NavNum'];

?>

<div class="ticket">
    <img class="bg-img-1" src="<?= SITE_TEMPLATE_PATH . '/img/home-bg-1.png' ?>" alt="">
    <img class="bg-img-2" src="<?= SITE_TEMPLATE_PATH . '/img/home-bg-2.png' ?>" alt="">
    <div class="ticket__wrapper default-container">

        <?$APPLICATION->IncludeComponent(
            "bitrix:breadcrumb",
            "breadcrumb",
            Array(
                "PATH" => "",
                "SITE_ID" => "s1",
                "START_FROM" => "0"
            )
        );?>

        <h3 class="general-name ticket__title"><?=$arResult['NAME']?></h3>
        <div class="ticket__content">
            <?= html_entity_decode($arResult['UF_DETAIL_TEXT'])?>
            <?php if ($arResult['UF_DIRECTION']['VALUE']) : ?>
                <p style="text-align:center">
                    <strong>
                        <a href="/raspisanie/filter/direction-is-<?=$arResult['UF_DIRECTION']['VALUE']?>/apply/#filter">
                            Посмотреть расписание</a>
                    </strong>
                </p>
            <?php endif; ?>
        </div>

        <?php if (count($arResult['CHILD'])) :?>

            <?php foreach ($arResult['CHILD'] as $child) : ?>

                <?php if (!count($child['PRODUCT'])) {continue;} ?>

                <div class="ticket__lessons ticket__lessons_margin">

                    <h3 class="title"><?=$child['DESCRIPTION']?></h3>
                    <?php if ($child['UF_DETAIL_TEXT']) : ?>
                        <p class="lesson-title"><?=$child['UF_DETAIL_TEXT']?></p>
                    <?php endif ?>

                    <div class="ticket__lessons-more">

                        <?php foreach ($child['PRODUCT'] as $product) : ?>

                            <?php if (!count($product['OFFERS'])) {continue;} ?>

                            <div class="item">
                                <h5><?=$product['NAME']?></h5>
                                <p><?=$product['PREVIEW_TEXT']?></p>

                                <div class="item__time">

                                    <?php foreach ($product['OFFERS'] as $offer) : ?>

                                        <label onclick="payPr<?=$product['ID'];?>Off<?=$offer['ID'];?>()" class="label">
                                            <div class="times">
                                                <input type="radio" class="item__checkbox" name="radio-btn">
                                                <div class="item__custom"></div>
                                                <span class="item__clock"><?=$offer['NAME']?></span>
                                            </div>
                                            <div class="prices">
                                                <span class="item__price"><?=number_format ( $offer['PRICE']['PRICE'], 0, '', '' )?></span>
                                                <img src="<?= SITE_TEMPLATE_PATH . '/img/curr.png' ?>" alt="" class="item__img">
                                            </div>
                                        </label>

                                        <script>
                                            function payPr<?=$product['ID'];?>Off<?=$offer['ID'];?>() {
                                                $("#pr<?=$product['ID'];?>").show();
                                                <?php foreach ($arResult['CHILD_PRODUCTS_ID'] as $pr_id) : ?>
                                                    <?php if ($pr_id == $product['ID']) {continue;} ?>
                                                    $("#pr<?=$pr_id?>").hide();
                                                <?php endforeach; ?>
                                                $('#kolush').text("<?=$product['NAME']?>");
                                                $('#summah').text("Время: <?=$offer['NAME']?> Стоимость: <?=number_format ( $offer['PRICE']['PRICE'], 0, '', '' )?> руб.");
                                            }
                                        </script>

                                    <?php endforeach; ?>

                                </div>
                                <button data-toggle="modal" data-target="#modal-theme-<?=$arResult['ID']?>" id="pr<?=$product['ID'];?>" style="display:none" class="btn-general" type="button">Оплатить</button>

                            </div>

                        <?php endforeach; ?>

                    </div>
                </div>

            <?php endforeach; ?>

        <?php endif; ?>

    </div>
</div>

<div class="modal fade" id="modal-theme-<?=$arResult['ID']?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <img src="<?= SITE_TEMPLATE_PATH . '/img/modal-close.png' ?>" alt="">
            </button>

            <form class="modal__form">
                <h3 id="nameush" class="modal__name"><?=$arResult['NAME']?></h3>

                <p id="kolush" style="margin-bottom: 10px" class="modal__text"></p>
                <p id="summah" style="font-size: 15px; margin-bottom: 10px" class="modal__text"></p>

                <button type="button" class="btn-form">Оплатить</button>
            </form>

            <img src="<?= SITE_TEMPLATE_PATH . '/img/modal-img.png' ?>" alt="" class="modal-img-1">
            <img src="<?= SITE_TEMPLATE_PATH . '/img/modal-img.png' ?>" alt="" class="modal-img-2">
        </div>
    </div>
</div>

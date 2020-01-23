<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogTopComponent $component
 */

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();

if (!empty($arResult['ITEMS'])) {

    $arProps = [
        "PROPERTY_ATT_SHORT_TITLE"
    ];

    $ids = [];
    foreach ($arResult['ITEMS'] as $ITEM) {
        array_push($ids, $ITEM['ID']);
    }

    $arSelect = Array("ID");
    $arSelect = array_merge ($arSelect, $arProps);
    $arFilter = Array("IBLOCK_ID"=>IntVal($arResult['ORIGINAL_PARAMETERS']['IBLOCK_ID']), "ID" => $ids);
    $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
    while($ob = $res->GetNextElement())
    {
        $arFields = $ob->GetFields();

        foreach ($arResult['ITEMS'] as $k => $ITEM)
        {
            if ($ITEM['ID'] == $arFields['ID']) {

                unset($arFields['ID']);
                unset($arFields['~ID']);
                $arr = [];

                foreach ($arProps as $prop) {
                    $arr[$prop] = ['VALUE' => $arFields[$prop.'_VALUE']];
                }

                $arResult['ITEMS'][$k]['DISPLAY_PROPERTIES'] = array_merge($arResult['ITEMS'][$k]['DISPLAY_PROPERTIES'], $arr);
            }
            continue;
        }
    }
}

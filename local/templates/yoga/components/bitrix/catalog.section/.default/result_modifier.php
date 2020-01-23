<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Highloadblock as HL;
use Bitrix\Main\Entity;

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogSectionComponent $component
 */

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();


$child = [];
$chiIds = [];
$productIds = [];

// выборка только активных разделов из инфоблока
$arFilter = Array('IBLOCK_ID'=>$arResult['IBLOCK_ID'], 'GLOBAL_ACTIVE'=>'Y', 'SECTION_ID'=>$arResult['ID']);
$db_list = CIBlockSection::GetList(Array($by=>$order), $arFilter, true, ["DESCRIPTION", "ID", "UF_DETAIL_TEXT"]);

while($ar_result = $db_list->GetNext())
{
    if ($ar_result['ELEMENT_CNT'] != 0) {
        $chiIds[] = $ar_result['ID'];
        $child[$ar_result['ID']] = $ar_result;
    }
}

if (count($child)) {

    $arSelect = Array("NAME", "ID", "IBLOCK_SECTION_ID", "PREVIEW_TEXT");
    $arFilter = Array("IBLOCK_ID"=>IntVal($arResult['IBLOCK_ID']), 'IBLOCK_SECTION_ID' => $chiIds, "ACTIVE"=>"Y");
    $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
    while($ob = $res->GetNextElement())
    {
        $arFields = $ob->GetFields();
        $productIds[$arFields['ID']] = $arFields['ID'];
        $child[$arFields['IBLOCK_SECTION_ID']]['PRODUCT'][$arFields['ID']] = $arFields;
    }

    if (count($productIds)) {

        $res = CCatalogSKU::getOffersList(
            $productIds,
            $arResult['IBLOCK_ID'],
            $skuFilter = array(),
            ["NAME"],
            $propertyFilter = array()
        );

        if (count($res)) {

            foreach ($child as $k => $cat) {
                foreach ($res as $prod_id => $offers) {
                    if (isset($cat['PRODUCT'][$prod_id])) {

                        foreach ($offers as $of_k => $offer) {
                            $ar_price = GetCatalogProductPrice($offer['ID'], 1);
                            $offers[$of_k]['PRICE'] = $ar_price;
                        }
                        $child[$k]['PRODUCT'][$prod_id]['OFFERS'] = $offers;

                    }
                }
            }

            $arResult['CHILD'] = $child;
            $arResult['CHILD_PRODUCTS_ID'] = $productIds;
        }
    }
}

if (isset($arResult['UF_DIRECTION']) && $arResult['UF_DIRECTION'] && CModule::IncludeModule('highloadblock')) {

    $hlblock = HL\HighloadBlockTable::getById(2)->fetch();
    $entity = HL\HighloadBlockTable::compileEntity($hlblock);
    $entityClass = $entity->getDataClass();

    $res = $entityClass::getList(array(
        'select' => array('UF_XML_ID'),
        'filter' => array('ID' => $arResult['UF_DIRECTION'])
    ));

    $row = $res->fetch();
    $arResult['UF_DIRECTION'] = ['VALUE' => $row['UF_XML_ID']];

}

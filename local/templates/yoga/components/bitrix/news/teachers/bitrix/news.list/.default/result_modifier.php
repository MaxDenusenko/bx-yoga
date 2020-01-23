<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true)die();

$res = CIBlock::GetByID(7);
if($ar_res = $res->GetNext()) {

    $scheduleLink = '/'.$ar_res['CODE'];

    foreach ($arResult['ITEMS'] as $k => $ITEM) {
        $arResult['ITEMS'][$k]['SCHEDULE_LINK'] =  "$scheduleLink/filter/teacher-is-{$ITEM['CODE']}/apply/#filter";
    }
}

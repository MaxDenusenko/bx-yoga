<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true)die();

$res = CIBlock::GetByID(7);
if($ar_res = $res->GetNext()) {

    $arResult['SCHEDULE_LINK'] = "/{$ar_res['CODE']}/filter/teacher-is-{$arResult['CODE']}/apply/#filter";
}

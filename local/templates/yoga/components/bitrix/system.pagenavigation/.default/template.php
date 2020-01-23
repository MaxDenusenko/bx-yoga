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

if(!$arResult["NavShowAlways"])
{
	if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
		return;
}

$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");
?>

<nav class="navigation pagination" role="navigation">
    <div class="nav-links">

    <?if($arResult["bDescPageNumbering"] === true):?>

        <font class="text">

        <?if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]):?>
            <?if($arResult["bSavePage"]):?>
                <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["NavPageCount"]?>"><?=GetMessage("nav_begin")?></a>
                |
                <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>"><?=GetMessage("nav_prev")?></a>
                |
            <?else:?>
                <a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><?=GetMessage("nav_begin")?></a>
                |
                <?if ($arResult["NavPageCount"] == ($arResult["NavPageNomer"]+1) ):?>
                    <a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><?=GetMessage("nav_prev")?></a>
                    |
                <?else:?>
                    <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>"><?=GetMessage("nav_prev")?></a>
                    |
                <?endif?>
            <?endif?>
        <?else:?>
            <?=GetMessage("nav_begin")?>&nbsp;|&nbsp;<?=GetMessage("nav_prev")?>&nbsp;|
        <?endif?>

        <?while($arResult["nStartPage"] >= $arResult["nEndPage"]):?>
            <?$NavRecordGroupPrint = $arResult["NavPageCount"] - $arResult["nStartPage"] + 1;?>

            <?if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):?>
                <b><?=$NavRecordGroupPrint?></b>
            <?elseif($arResult["nStartPage"] == $arResult["NavPageCount"] && $arResult["bSavePage"] == false):?>
                <a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><?=$NavRecordGroupPrint?></a>
            <?else:?>
                <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"><?=$NavRecordGroupPrint?></a>
            <?endif?>

            <?$arResult["nStartPage"]--?>
        <?endwhile?>

        |

        <?if ($arResult["NavPageNomer"] > 1):?>
            <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>"><?=GetMessage("nav_next")?></a>
            |
            <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=1"><?=GetMessage("nav_end")?></a>
        <?else:?>
            <?=GetMessage("nav_next")?>&nbsp;|&nbsp;<?=GetMessage("nav_end")?>
        <?endif?>

    <?else:?>

        <?if ($arResult["NavPageNomer"] > 1):?>

            <a class="prev page-numbers" href="
                <?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>
            "><img src="<?= SITE_TEMPLATE_PATH . '/img/breadcrumb-arrow.png' ?>" alt=""></a>

        <?endif?>

        <?while($arResult["nStartPage"] <= $arResult["nEndPage"]):?>

            <?if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):?>
                <span class="page-numbers current"><?=$arResult["nStartPage"]?></span>
            <?elseif($arResult["nStartPage"] == 1 && $arResult["bSavePage"] == false):?>
                <a class="page-numbers" href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><?=$arResult["nStartPage"]?></a>
            <?else:?>
                <a class="page-numbers" href="
                <?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>
                "><?=$arResult["nStartPage"]?></a>
            <?endif?>
            <?$arResult["nStartPage"]++?>
        <?endwhile?>

        <?if($arResult["NavPageNomer"] < $arResult["NavPageCount"]):?>
            <a class="next page-numbers" href="
            <?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>
            "><img src="<?= SITE_TEMPLATE_PATH . '/img/breadcrumb-arrow.png' ?>" alt=""></a>
        <?endif?>

    <?endif?>

    </div>
</nav>

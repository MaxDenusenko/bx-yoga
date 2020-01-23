<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<?if ($arResult["isFormErrors"] == "Y"):?>
    <?php $arResult["FORM_ERRORS_TEXT"];?>
<?endif;?>

<?=$arResult["FORM_NOTE"]?>

<?if ($arResult["isFormNote"] != "Y")
{
    $arResult["FORM_HEADER"] =
        str_replace('<form',
            "<form class=\"modal__form\"",
            $arResult["FORM_HEADER"]
        );
    ?>
    <?=$arResult["FORM_HEADER"]?>

    <? if ($arResult["isFormDescription"] == "Y" || $arResult["isFormTitle"] == "Y" || $arResult["isFormImage"] == "Y") :?>
        <h3 class="modal__name"><?=$arResult["FORM_DESCRIPTION"]?></h3>
    <?php endif;?>

    <?=
    /***********************************************************************************
    form questions
     ***********************************************************************************/
    (new WebFormHelper($arResult, SITE_TEMPLATE_PATH, false, true))->getFields();
    ?>

    <input class="btn-form" <?=(intval($arResult["F_RIGHT"]) < 10 ? "disabled=\"disabled\"" : "");?> type="submit"
           name="web_form_submit" value="<?=htmlspecialcharsbx(strlen(trim($arResult["arForm"]["BUTTON"])) <= 0 ? GetMessage("FORM_ADD") :
        $arResult["arForm"]["BUTTON"]);?>" />

    <?=$arResult["FORM_FOOTER"]?>
    <?
} //endif (isFormNote)
?>

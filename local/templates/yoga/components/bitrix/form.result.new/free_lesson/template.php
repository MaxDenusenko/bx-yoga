<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<?if ($arResult["isFormErrors"] == "Y"):?>
    <?php $arResult["FORM_ERRORS_TEXT"];?>
<?endif;?>



        <?=$arResult["FORM_NOTE"]?>

        <?if ($arResult["isFormNote"] != "Y")
        {
            ?>
            <?=$arResult["FORM_HEADER"]?>

            <?
            if ($arResult["isFormDescription"] == "Y" || $arResult["isFormTitle"] == "Y" || $arResult["isFormImage"] == "Y")
            {
            ?>
                <?
            /***********************************************************************************
                                form header
            ***********************************************************************************/
            if ($arResult["isFormTitle"])
            {
            ?>
                <h2 class="occupation__name general-name"><?=$arResult["FORM_TITLE"]?></h2>
            <?
            } //endif ;

                if ($arResult["isFormImage"] == "Y")
                {
                ?>
                <a href="<?=$arResult["FORM_IMAGE"]["URL"]?>" target="_blank" alt="<?=GetMessage("FORM_ENLARGE")?>"><img src="<?=$arResult["FORM_IMAGE"]["URL"]?>" <?if($arResult["FORM_IMAGE"]["WIDTH"] > 300):?>width="300"<?elseif($arResult["FORM_IMAGE"]["HEIGHT"] > 200):?>height="200"<?else:?><?=$arResult["FORM_IMAGE"]["ATTR"]?><?endif;?> hspace="3" vscape="3" border="0" /></a>
                <?//=$arResult["FORM_IMAGE"]["HTML_CODE"]?>
                <?
                } //endif
                ?>

                <p class="occupation__text"><?=$arResult["FORM_DESCRIPTION"]?></p>

                <?
            } // endif
                ?>

                <div class="occupation__form custom-form">

                    <?=
                    /***********************************************************************************
                    form questions
                     ***********************************************************************************/
                    (new WebFormHelper($arResult, SITE_TEMPLATE_PATH))->getFields();
                    ?>

                    <?
                    if($arResult["isUseCaptcha"] == "Y")
                    {
                    ?>

                                <b><?=GetMessage("FORM_CAPTCHA_TABLE_TITLE")?></b>

                            <input type="hidden" name="captcha_sid" value="<?=htmlspecialcharsbx($arResult["CAPTCHACode"]);?>" />
                            <img src="/bitrix/tools/captcha.php?captcha_sid=<?=htmlspecialcharsbx($arResult["CAPTCHACode"]);?>" width="180" height="40" />
                            <?=GetMessage("FORM_CAPTCHA_FIELD_TITLE")?><?=$arResult["REQUIRED_SIGN"];?>
                            <input type="text" name="captcha_word" size="30" maxlength="50" value="" class="inputtext" />

                    <?
                    } // isUseCaptcha
                    ?>


                    <div class="form-button">
                        <input class="btn-form" <?=(intval($arResult["F_RIGHT"]) < 10 ? "disabled=\"disabled\"" : "");?> type="submit"
                               name="web_form_submit" value="<?=htmlspecialcharsbx(strlen(trim($arResult["arForm"]["BUTTON"])) <= 0 ? GetMessage("FORM_ADD") :
                            $arResult["arForm"]["BUTTON"]);?>" />
                    </div>

                </div>

            <?=$arResult["FORM_FOOTER"]?>
            <?
        } //endif (isFormNote)
        ?>


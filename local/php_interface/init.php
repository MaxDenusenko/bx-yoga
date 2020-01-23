<?php
session_start();

AddEventHandler("form", "onFormValidatorBuildList", array("FormValidatorStringEmpty", "GetDescription"));
AddEventHandler("form", "onFormValidatorBuildList", array("PhoneValidator", "GetDescription"));
AddEventHandler("form", "onFormValidatorBuildList", array("FormValidatorCheckBoxEmpty", "GetDescription"));

CModule::AddAutoloadClasses(
    '',
    array(
        'WebFormHelper' => '/helper/WebFormHelper.php',
        'FormValidatorStringEmpty' => '/validators/FormValidatorStringEmpty.php',
        'PhoneValidator' => '/validators/PhoneValidator.php',
        'FormValidatorCheckBoxEmpty' => '/validators/FormValidatorCheckBoxEmpty.php',
    )
);

AddEventHandler("currency", "CurrencyFormat", "myFormat");

function myFormat($fSum, $strCurrency)
{
    return number_format ( $fSum, 0, '', ' ' ).' ₽';
}

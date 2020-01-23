<?php


class PhoneValidator
{
    public function GetDescription()
    {
        return array(
            "NAME"            => "phone_ex",                                   // идентификатор
            "DESCRIPTION"     => "Телефон",                                 // наименование
            "TYPES"           => array("text"),                            // типы полей
            "SETTINGS"        => array(__CLASS__, "GetSettings"), // метод, возвращающий массив настроек
            "CONVERT_TO_DB"   => array(__CLASS__, "ToDB"),        // метод, конвертирующий массив настроек в строку
            "CONVERT_FROM_DB" => array(__CLASS__, "FromDB"),      // метод, конвертирующий строку настроек в массив
            "HANDLER"         => array(__CLASS__, "DoValidate")   // валидатор
        );
    }

    public function GetSettings()
    {
        return array(
            "PHONE_MASK" => array(
                "TITLE"   => "Маска валидации",
                "TYPE"    => "TEXT",
                "DEFAULT" =>  "/((8|\+7)-?)?\(?\d{3,5}\)?-?\d{1}-?\d{1}-?\d{1}-?\d{1}-?\d{1}((-?\d{1})?-?\d{1})?/",
            ),
        );
    }

    function ToDB($arParams)
    {
        return serialize($arParams);
    }

    function FromDB($strParams)
    {
        return unserialize($strParams);
    }

    function DoValidate($arParams, $arQuestion, $arAnswers, $arValues)
    {
        global $APPLICATION;

        foreach ($arValues as $value)
        {
            $pattern = "/((8|\+7)-?)?\(?\d{3,5}\)?-?\d{1}-?\d{1}-?\d{1}-?\d{1}-?\d{1}((-?\d{1})?-?\d{1})?/";

            if (strlen($value) <= 0 || !preg_match($pattern, $value)) {
                $APPLICATION->ThrowException("Введите правильный номер телефона");
                return false;
            }
        }

        // все значения прошли валидацию, вернем true
        return true;
    }
}

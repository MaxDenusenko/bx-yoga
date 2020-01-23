<?php


class FormValidatorCheckBoxEmpty
{
    function getDescription()
    {
        return array(
            'NAME' => 'empty_checkbox', // идентификатор
            'DESCRIPTION' => 'Пустой checkbox', // наименование
            'TYPES' => array('checkbox'), // типы полей
            'SETTINGS' => array(__CLASS__, 'getSettings'), // метод, возвращающий массив настроек
            'CONVERT_TO_DB' => array(__CLASS__, 'toDB'), // метод, конвертирующий массив настроек в строку
            'CONVERT_FROM_DB' => array(__CLASS__, 'fromDB'), // метод, конвертирующий строку настроек в массив
            'HANDLER' => array(__CLASS__, 'doValidate') // валидатор
        );
    }

    function getSettings()
    {
        return array();
    }

    function toDB($arParams)
    {
        // возвращаем сериализованную строку
        return serialize($arParams);
    }

    function fromDB($strParams)
    {
        // никаких преобразований не требуется, просто вернем десериализованный массив
        return unserialize($strParams);
    }

    function doValidate($arParams, $arQuestion, $arAnswers, $arValues)
    {
        global $APPLICATION;

        if (empty($arValues)) {
            $APPLICATION->ThrowException('Поле обязательно для заполнения.');
            return false;
        }

        // все значения прошли валидацию, вернем true
        return true;
    }
}

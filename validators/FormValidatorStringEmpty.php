<?php

class FormValidatorStringEmpty
{
    function getDescription()
    {
        return array(
            'NAME' => 'empty_string', // идентификатор
            'DESCRIPTION' => 'Пустая строка', // наименование
            'TYPES' => array('text'), // типы полей
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

        foreach ($arValues as $value) {

            // проверяем на пустоту
            if (strlen(trim($value)) == 0) {
                // вернем ошибку
                $APPLICATION->ThrowException('Поле обязательно для заполнения.');
                return false;
            }

        }

        // все значения прошли валидацию, вернем true
        return true;
    }
}

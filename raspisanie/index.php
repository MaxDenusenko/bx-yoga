<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Расписание");
?>


<div class="schedule">
    <div class="schedule__wrapper default-container">
        <div class="schedule__title">
            <h3 class = "general-gradient">Расписание занятий</h3>
            <p><span>Запись не обязательна</span>, выберите подходящие для вас уровень нагрузки и время и приходите за 10-15 минут до начала занятия.</p>
            <p><span>Также не обязательно</span> приобретать абонемент заранее, оплату можно произвести при первом посещении наличными или на сайте банковской картой.</p>
            <p><span>С собой:</span> удобная одежда (обувь не нужна, коврики мы предоставляем).</p>
            <p><span>Внимание:</span> по неожиданным причинам преподаватель может быть заменен. Благодарим за понимание!</p>
        </div>


        <div id="filter">
            <?$APPLICATION->IncludeComponent(
                "bitrix:catalog.smart.filter",
                "filter",
                Array(
                    "CACHE_GROUPS" => "Y",
                    "CACHE_TIME" => "36000000",
                    "CACHE_TYPE" => "A",
                    "CONVERT_CURRENCY" => "N",
                    "DISPLAY_ELEMENT_COUNT" => "N",
                    "FILTER_NAME" => "scheduleFilter",
                    "FILTER_VIEW_MODE" => "vertical",
                    "HIDE_NOT_AVAILABLE" => "N",
                    "IBLOCK_ID" => "7",
                    "IBLOCK_TYPE" => "information",
                    "PAGER_PARAMS_NAME" => "arrPager",
                    "POPUP_POSITION" => "left",
                    "PREFILTER_NAME" => "",
                    "SAVE_IN_SESSION" => "N",
                    "SECTION_CODE" => "",
                    "SECTION_CODE_PATH" => "",
                    "SECTION_DESCRIPTION" => "-",
                    "SECTION_ID" => $_REQUEST["SECTION_ID"],
                    "SECTION_TITLE" => "-",
                    "SEF_MODE" => "Y",
                    "SEF_RULE" => "/raspisanie/filter/#SMART_FILTER_PATH#/apply/",
                    "SMART_FILTER_PATH" => $_REQUEST["SMART_FILTER_PATH"],
                    "TEMPLATE_THEME" => "blue",
                    "XML_EXPORT" => "N"
                )
            );?>
        </div>

        <?$APPLICATION->IncludeComponent(
            "bitrix:news.list",
            "schedule",
            Array(
                "ACTIVE_DATE_FORMAT" => "",
                "ADD_SECTIONS_CHAIN" => "N",
                "AJAX_MODE" => "N",
                "AJAX_OPTION_ADDITIONAL" => "",
                "AJAX_OPTION_HISTORY" => "N",
                "AJAX_OPTION_JUMP" => "N",
                "AJAX_OPTION_STYLE" => "N",
                "CACHE_FILTER" => "N",
                "CACHE_GROUPS" => "Y",
                "CACHE_TIME" => "36000000",
                "CACHE_TYPE" => "A",
                "CHECK_DATES" => "Y",
                "DETAIL_URL" => "",
                "DISPLAY_BOTTOM_PAGER" => "N",
                "DISPLAY_DATE" => "N",
                "DISPLAY_NAME" => "Y",
                "DISPLAY_PICTURE" => "N",
                "DISPLAY_PREVIEW_TEXT" => "N",
                "DISPLAY_TOP_PAGER" => "N",
                "FIELD_CODE" => array("NAME", ""),
                "FILTER_NAME" => "scheduleFilter",
                "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                "IBLOCK_ID" => "7",
                "IBLOCK_TYPE" => "information",
                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                "INCLUDE_SUBSECTIONS" => "N",
                "MESSAGE_404" => "",
                "NEWS_COUNT" => "",
                "PAGER_BASE_LINK_ENABLE" => "N",
                "PAGER_DESC_NUMBERING" => "N",
                "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                "PAGER_SHOW_ALL" => "N",
                "PAGER_SHOW_ALWAYS" => "N",
                "PAGER_TEMPLATE" => ".default",
                "PAGER_TITLE" => "Новости",
                "PARENT_SECTION" => "",
                "PARENT_SECTION_CODE" => "",
                "PREVIEW_TRUNCATE_LEN" => "",
                "PROPERTY_CODE" => array("DIRECTION", "DIFFICULTY", "TEACHER", ""),
                "SET_BROWSER_TITLE" => "N",
                "SET_LAST_MODIFIED" => "N",
                "SET_META_DESCRIPTION" => "N",
                "SET_META_KEYWORDS" => "N",
                "SET_STATUS_404" => "N",
                "SET_TITLE" => "Y",
                "SHOW_404" => "N",
                "SORT_BY1" => "NAME",
                "SORT_BY2" => "",
                "SORT_ORDER1" => "ASC",
                "SORT_ORDER2" => "",
                "STRICT_SECTION_CHECK" => "N"
            )
        );?>

    </div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>

<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Главная');
?>

<div class="home">
    <img class="home-bg" src="<?= SITE_TEMPLATE_PATH . '/img/home-bg.png' ?>" alt="">
    <img class="bg-img-1" src="<?= SITE_TEMPLATE_PATH . '/img/home-bg-1.png' ?>" alt="">
    <img class="bg-img-2" src="<?= SITE_TEMPLATE_PATH . '/img/home-bg-2.png' ?>" alt="">

    <div class="home__wrapper">
        <div class="home-banner">
            <h1 class="home-banner__name general-gradient">
                Пожалуй, лучшая
                йога на Сахалине!
            </h1>
            <div class="home-banner__block">
                <div class="home-banner__info">
                    <ul class="home-banner__items">
                        <li class="home-banner__item">Единственный йога-центр в городе</li>
                        <li class="home-banner__item">Находимся в центре Южно-Сахалинска</li>
                        <li class="home-banner__item">Большой зал — 210 м2. Места хватит всем </li>
                        <li class="home-banner__item">Индивидуальный подход к каждому ученику</li>
                    </ul>
                    <a href="#occu" id="to-occu" class="home-banner__btn btn-general">Попробовать бесплатно</a>
                </div>
                <div class="home-banner__image">
                    <img src="<?= SITE_TEMPLATE_PATH . '/img/home-yoga.png' ?>" alt="">
                </div>
            </div>
        </div>

        <?$APPLICATION->IncludeComponent(
            "bitrix:news.list",
            "yoga_benefits",
            Array(
                "ACTIVE_DATE_FORMAT" => "d.m.Y",
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
                "DISPLAY_PICTURE" => "Y",
                "DISPLAY_PREVIEW_TEXT" => "N",
                "DISPLAY_TOP_PAGER" => "N",
                "FIELD_CODE" => array("ID", "NAME", "PREVIEW_PICTURE", ""),
                "FILTER_NAME" => "",
                "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                "IBLOCK_ID" => "1",
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
                "PAGER_TITLE" => "",
                "PARENT_SECTION" => "",
                "PARENT_SECTION_CODE" => "",
                "PREVIEW_TRUNCATE_LEN" => "",
                "PROPERTY_CODE" => array("", ""),
                "SET_BROWSER_TITLE" => "N",
                "SET_LAST_MODIFIED" => "N",
                "SET_META_DESCRIPTION" => "N",
                "SET_META_KEYWORDS" => "N",
                "SET_STATUS_404" => "N",
                "SET_TITLE" => "N",
                "SHOW_404" => "N",
                "SORT_BY1" => "SORT",
                "SORT_BY2" => "",
                "SORT_ORDER1" => "ASC",
                "SORT_ORDER2" => "",
                "STRICT_SECTION_CHECK" => "N"
            )
        );?>
        <div class="occupation" id="occu">
            <div class="occupation__wrapper">
                <?$APPLICATION->IncludeComponent(
                    "bitrix:form.result.new",
                    "free_lesson",
                    Array(
                        "CACHE_TIME" => "3600",
                        "CACHE_TYPE" => "A",
                        "CHAIN_ITEM_LINK" => "",
                        "CHAIN_ITEM_TEXT" => "",
                        "EDIT_URL" => "",
                        "IGNORE_CUSTOM_TEMPLATE" => "N",
                        "LIST_URL" => "",
                        "SEF_MODE" => "N",
                        "SUCCESS_URL" => "",
                        "USE_EXTENDED_ERRORS" => "Y",
                        "VARIABLE_ALIASES" => Array(
                            "RESULT_ID" => "RESULT_ID",
                            "WEB_FORM_ID" => "WEB_FORM_ID"
                        ),
                        "WEB_FORM_ID" => 1,
                        "AJAX_MODE" => "Y",
                        "AJAX_OPTION_SHADOW" => "N",
                        "AJAX_OPTION_JUMP" => "N",
                        "AJAX_OPTION_STYLE" => "Y",
                        "AJAX_OPTION_HISTORY" => "N",
                    )
                );?>
                <?$APPLICATION->IncludeComponent(
                    "bitrix:form.result.new",
                    "free_lesson_mobile",
                    Array(
                        "CACHE_TIME" => "3600",
                        "CACHE_TYPE" => "A",
                        "CHAIN_ITEM_LINK" => "",
                        "CHAIN_ITEM_TEXT" => "",
                        "EDIT_URL" => "",
                        "IGNORE_CUSTOM_TEMPLATE" => "N",
                        "LIST_URL" => "",
                        "SEF_MODE" => "N",
                        "SUCCESS_URL" => "",
                        "USE_EXTENDED_ERRORS" => "Y",
                        "VARIABLE_ALIASES" => Array(
                            "RESULT_ID" => "RESULT_ID",
                            "WEB_FORM_ID" => "WEB_FORM_ID"
                        ),
                        "WEB_FORM_ID" => 5,
                        "AJAX_MODE" => "Y",
                        "AJAX_OPTION_SHADOW" => "N",
                        "AJAX_OPTION_JUMP" => "N",
                        "AJAX_OPTION_STYLE" => "Y",
                        "AJAX_OPTION_HISTORY" => "N",
                    )
                );?>
            </div>
        </div>
        <?
        global $uslugiFilter;
        $uslugiFilter = array(
            "ACTIVE" =>"Y",
            "SECTION_ID" => '',
            '=PROPERTY_ATT_VIEW_IN_MAIN' => 'Y',
            array(
                "LOGIC" => "OR",
                array("IBLOCK_ID" => '8'),
                array("IBLOCK_ID" => '11'),
            ),
        );
        $APPLICATION->IncludeComponent(
            "modified:news.list",
            "main_uslugi",
            Array(
                "ACTIVE_DATE_FORMAT" => "",
                "ADD_SECTIONS_CHAIN" => "N",
                "AJAX_MODE" => "N",
                "AJAX_OPTION_ADDITIONAL" => "",
                "AJAX_OPTION_HISTORY" => "N",
                "AJAX_OPTION_JUMP" => "N",
                "AJAX_OPTION_STYLE" => "Y",
                "CACHE_FILTER" => "N",
                "CACHE_GROUPS" => "Y",
                "CACHE_TIME" => "36000000",
                "CACHE_TYPE" => "A",
                "CHECK_DATES" => "Y",
                "DETAIL_URL" => "",
                "DISPLAY_BOTTOM_PAGER" => "N",
                "DISPLAY_DATE" => "N",
                "DISPLAY_NAME" => "Y",
                "DISPLAY_PICTURE" => "Y",
                "DISPLAY_PREVIEW_TEXT" => "N",
                "DISPLAY_TOP_PAGER" => "N",
                "FIELD_CODE" => array("NAME", "PREVIEW_PICTURE", ""),
                "FILTER_NAME" => "uslugiFilter",
                "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                "IBLOCK_ID" => "",
                "IBLOCK_TYPE" => "",
                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                "INCLUDE_SUBSECTIONS" => "N",
                "MESSAGE_404" => "",
                "NEWS_COUNT" => "3",
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
                "PROPERTY_CODE" => array("ATT_SHORT_TITLE", "ATT_BENEFITS"),
                "SET_BROWSER_TITLE" => "N",
                "SET_LAST_MODIFIED" => "N",
                "SET_META_DESCRIPTION" => "N",
                "SET_META_KEYWORDS" => "N",
                "SET_STATUS_404" => "N",
                "SET_TITLE" => "N",
                "SHOW_404" => "N",
                "SORT_BY1" => "SORT",
                "SORT_BY2" => "",
                "SORT_ORDER1" => "ASC",
                "SORT_ORDER2" => "",
                "STRICT_SECTION_CHECK" => "N"
            )
        );?>

        <?$APPLICATION->IncludeComponent(
            "bitrix:news.list",
            "main_news",
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
                "DISPLAY_PICTURE" => "Y",
                "DISPLAY_PREVIEW_TEXT" => "N",
                "DISPLAY_TOP_PAGER" => "N",
                "FIELD_CODE" => array("NAME", "PREVIEW_PICTURE", "SHOW_COUNTER", ""),
                "FILTER_NAME" => "",
                "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                "IBLOCK_ID" => "2",
                "IBLOCK_TYPE" => "content",
                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                "INCLUDE_SUBSECTIONS" => "N",
                "MESSAGE_404" => "",
                "NEWS_COUNT" => "3",
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
                "PROPERTY_CODE" => array("", ""),
                "SET_BROWSER_TITLE" => "N",
                "SET_LAST_MODIFIED" => "N",
                "SET_META_DESCRIPTION" => "N",
                "SET_META_KEYWORDS" => "N",
                "SET_STATUS_404" => "N",
                "SET_TITLE" => "N",
                "SHOW_404" => "N",
                "SORT_BY1" => "SORT",
                "SORT_BY2" => "",
                "SORT_ORDER1" => "ASC",
                "SORT_ORDER2" => "",
                "STRICT_SECTION_CHECK" => "N"
            )
        );?>

        <?
        global $galleryFilter;
        $galleryFilter = [ '=PROPERTY_ATT_VIEW_IN_MAIN' => 'Y' ];
        $APPLICATION->IncludeComponent(
            "bitrix:news.list",
            "main_gallery",
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
                "DISPLAY_NAME" => "N",
                "DISPLAY_PICTURE" => "Y",
                "DISPLAY_PREVIEW_TEXT" => "N",
                "DISPLAY_TOP_PAGER" => "N",
                "FIELD_CODE" => array("PREVIEW_PICTURE", ""),
                "FILTER_NAME" => "galleryFilter",
                "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                "IBLOCK_ID" => "3",
                "IBLOCK_TYPE" => "content",
                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                "INCLUDE_SUBSECTIONS" => "N",
                "MESSAGE_404" => "",
                "NEWS_COUNT" => "5",
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
                "PROPERTY_CODE" => array("", ""),
                "SET_BROWSER_TITLE" => "N",
                "SET_LAST_MODIFIED" => "N",
                "SET_META_DESCRIPTION" => "N",
                "SET_META_KEYWORDS" => "N",
                "SET_STATUS_404" => "N",
                "SET_TITLE" => "N",
                "SHOW_404" => "N",
                "SORT_BY1" => "SORT",
                "SORT_BY2" => "",
                "SORT_ORDER1" => "ASC",
                "SORT_ORDER2" => "",
                "STRICT_SECTION_CHECK" => "N"
            )
        );?>

    </div>

    <div class="home-maps">
        <div class="home-maps__map">
            <div id="google-container" class="map">
                <?$APPLICATION->IncludeComponent(
                    "bitrix:map.google.view",
                    "",
                    Array(
                        "API_KEY" => "AIzaSyD9Qv3PhtLRXw8_cP707YTs8NwHukEnf9k",
                        "CONTROLS" => array("SMALL_ZOOM_CONTROL", "TYPECONTROL", "SCALELINE"),
                        "INIT_MAP_TYPE" => "ROADMAP",
                        "MAP_DATA" => "a:4:{s:10:\"google_lat\";d:55.75091975543562;s:10:\"google_lon\";d:37.62214721679686;s:12:\"google_scale\";i:16;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:4:\"TEXT\";s:5:\"Hello\";s:3:\"LON\";d:37.62075515031813;s:3:\"LAT\";d:55.749952892781096;}}}",
                        "MAP_HEIGHT" => "100%",
                        "MAP_ID" => "1",
                        "MAP_WIDTH" => "100%",
                        "OPTIONS" => array("ENABLE_DBLCLICK_ZOOM", "ENABLE_DRAGGING", "ENABLE_KEYBOARD")
                    )
                );?>
            </div>
        </div>
        <?$APPLICATION->IncludeComponent(
            "bitrix:form.result.new",
            "call",
            Array(
                "CACHE_TIME" => "3600",
                "CACHE_TYPE" => "A",
                "CHAIN_ITEM_LINK" => "",
                "CHAIN_ITEM_TEXT" => "",
                "EDIT_URL" => "",
                "IGNORE_CUSTOM_TEMPLATE" => "N",
                "LIST_URL" => "",
                "SEF_MODE" => "N",
                "SUCCESS_URL" => "",
                "USE_EXTENDED_ERRORS" => "Y",
                "VARIABLE_ALIASES" => Array(
                    "RESULT_ID" => "RESULT_ID",
                    "WEB_FORM_ID" => "WEB_FORM_ID"
                ),
                "WEB_FORM_ID" => "2",
                "AJAX_MODE" => "Y",
                "AJAX_OPTION_SHADOW" => "N",
                "AJAX_OPTION_JUMP" => "N",
                "AJAX_OPTION_STYLE" => "Y",
                "AJAX_OPTION_HISTORY" => "N",
            )
        );?>
        <?$APPLICATION->IncludeComponent(
            "bitrix:form.result.new",
            "mobile",
            Array(
                "CACHE_TIME" => "3600",
                "CACHE_TYPE" => "A",
                "CHAIN_ITEM_LINK" => "",
                "CHAIN_ITEM_TEXT" => "",
                "EDIT_URL" => "",
                "IGNORE_CUSTOM_TEMPLATE" => "N",
                "LIST_URL" => "",
                "SEF_MODE" => "N",
                "SUCCESS_URL" => "",
                "USE_EXTENDED_ERRORS" => "Y",
                "VARIABLE_ALIASES" => Array(
                    "RESULT_ID" => "RESULT_ID",
                    "WEB_FORM_ID" => "WEB_FORM_ID"
                ),
                "WEB_FORM_ID" => "4",
                "AJAX_MODE" => "Y",
                "AJAX_OPTION_SHADOW" => "N",
                "AJAX_OPTION_JUMP" => "N",
                "AJAX_OPTION_STYLE" => "Y",
                "AJAX_OPTION_HISTORY" => "N",
            )
        );?>
    </div>

</div>

<? require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php'); ?>

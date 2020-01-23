<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Поиск");
?>

<div class="home m-5">
    <div class="home__wrapper">
        <?$APPLICATION->IncludeComponent(
            "bitrix:search.page",
            "",
            Array(
                "AJAX_MODE" => "N",
                "AJAX_OPTION_ADDITIONAL" => "",
                "AJAX_OPTION_HISTORY" => "N",
                "AJAX_OPTION_JUMP" => "N",
                "AJAX_OPTION_STYLE" => "N",
                "CACHE_TIME" => "3600",
                "CACHE_TYPE" => "A",
                "CHECK_DATES" => "N",
                "DEFAULT_SORT" => "rank",
                "DISPLAY_BOTTOM_PAGER" => "Y",
                "DISPLAY_TOP_PAGER" => "N",
                "FILTER_NAME" => "",
                "NO_WORD_LOGIC" => "N",
                "PAGER_SHOW_ALWAYS" => "N",
                "PAGER_TEMPLATE" => "",
                "PAGER_TITLE" => "Результаты поиска",
                "PAGE_RESULT_COUNT" => "10",
                "RESTART" => "Y",
                "SHOW_WHEN" => "N",
                "SHOW_WHERE" => "N",
                "USE_LANGUAGE_GUESS" => "Y",
                "USE_SUGGEST" => "Y",
                "USE_TITLE_RANK" => "Y",
                "arrFILTER" => array("iblock_content", "iblock_information"),
                "arrFILTER_iblock_content" => array("2"),
                "arrFILTER_iblock_information" => array("6"),
                "arrWHERE" => array()
            )
        );?>
    </div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
?>

    <div class="home-maps home-maps_contacts">

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

        <div class="contacts__content default-container">
            <div class="contacts__info">
                <div class="contacts__feedback">
                    <h1 class="contacts__name">Ответим на ваши вопросы:</h1>
                    <div class="contacts__phone">
                        <svg class="icon-svg icon-svg-phone "><use xlink:href="<?= SITE_TEMPLATE_PATH . '/img/sprite.svg#phone' ?>"></use></svg>
                        <svg class="icon-svg icon-svg-WhatsApp "><use xlink:href="<?= SITE_TEMPLATE_PATH . '/img/sprite.svg#WhatsApp' ?>"></use></svg>
                        <a href="tel:<?= \COption::GetOptionString( "askaron.settings", "UF_HEADER_PHONE");?>">
                            <span><?= \COption::GetOptionString( "askaron.settings", "UF_HEADER_PHONE");?></span>
                        </a>
                    </div>
                    <a href="mailto:<?= \COption::GetOptionString( "askaron.settings", "UF_EMAIL");?>" class="contacts__site">
                        <img src="<?= SITE_TEMPLATE_PATH . '/img/message.png' ?>" alt="">
                        <span><?= \COption::GetOptionString( "askaron.settings", "UF_EMAIL");?></span>
                    </a>
                    <a href="#" class="contacts__site">
                        <svg class="icon-svg icon-svg-inst "><use xlink:href="<?= SITE_TEMPLATE_PATH . '/img/sprite.svg#inst' ?>"></use></svg>
                        <span><?= \COption::GetOptionString( "askaron.settings", "UF_INSTAGRAM_NAME");?></span>
                    </a>
                </div>

                <?$APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    Array(
                        "AREA_FILE_SHOW" => "file",
                        "AREA_FILE_SUFFIX" => "inc",
                        "EDIT_TEMPLATE" => "",
                        "PATH" => "/include/kontakty/addr.php"
                    )
                );?>

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

        </div>

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

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
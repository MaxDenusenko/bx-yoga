<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); ?>

    <footer class="footer">
        <div class="footer__wrapper">
            <div class="footer__left">
                <nav class="footer__nav">

                    <?$APPLICATION->IncludeComponent(
                        "bitrix:menu",
                        "bottom_menu",
                        Array(
                            "ALLOW_MULTI_SELECT" => "N",
                            "CHILD_MENU_TYPE" => "",
                            "DELAY" => "N",
                            "MAX_LEVEL" => "1",
                            "MENU_CACHE_GET_VARS" => array(
                                0 => "",
                            ),
                            "MENU_CACHE_TIME" => "3600",
                            "MENU_CACHE_TYPE" => "N",
                            "MENU_CACHE_USE_GROUPS" => "Y",
                            "ROOT_MENU_TYPE" => "bottom",
                            "USE_EXT" => "N",
                        )
                    );?>

                </nav>
                <div class="footer__sitebar">

                    <?$APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        Array(
                            "AREA_FILE_SHOW" => "file",
                            "AREA_FILE_SUFFIX" => "inc",
                            "EDIT_TEMPLATE" => "",
                            "PATH" => "/include/instagram_links.php"
                        )
                    );?>

                </div>

                <?$APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    Array(
                        "AREA_FILE_SHOW" => "file",
                        "AREA_FILE_SUFFIX" => "inc",
                        "EDIT_TEMPLATE" => "",
                        "PATH" => "/include/copyright.php"
                    )
                );?>

            </div>
            <div class="footer__right">
                <div class="footer__info">
                    <a href="tel:<?= \COption::GetOptionString( "askaron.settings", "UF_HEADER_PHONE");?>"
                       type="tel" class="number"><?= \COption::GetOptionString( "askaron.settings", "UF_HEADER_PHONE");?></a>
                    <a href="mailto:<?= \COption::GetOptionString( "askaron.settings", "UF_EMAIL");?>">
                        <?= \COption::GetOptionString( "askaron.settings", "UF_EMAIL");?>
                    </a>
                </div>
                <p class="footer__adress">
                    <?= \COption::GetOptionString( "askaron.settings", "UF_FOOTER_ADDRESS");?>
                </p>
                <!-- <p class="footer__year">© 2019 ООО «Лотос»</p> -->
                <div class="footer__packeg">
                    <p>Упаковал - </p>
                    <a href="#">Антон Зайцев</a>
                </div>
            </div>
        </div>
    </footer>

    <?$APPLICATION->IncludeComponent(
        "bitrix:main.include",
        "",
        Array(
            "AREA_FILE_SHOW" => "file",
            "AREA_FILE_SUFFIX" => "inc",
            "EDIT_TEMPLATE" => "",
            "PATH" => "/include/all_modal.php"
        )
    );?>

    <?
    use Bitrix\Main\Page\Asset;
    //JS
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/vendor/jquery/dist/jquery.js', '');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/vendor/svg4everybody/dist/svg4everybody.min.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/vendor/jquery.form-styler/dist/jquery.formstyler.min.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/vendor/bootstrap/dist/js/bootstrap.min.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/vendor/swiper/dist/js/swiper.min.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/vendor/jquery-mask-plugin/dist/jquery.mask.min.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/vendor/fancybox/dist/jquery.fancybox.min.js');

    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/script.js');
    ?>

	</body>
</html>

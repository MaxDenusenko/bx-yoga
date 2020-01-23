<? use Bitrix\Main\Page\Asset;

if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();?>
<html>

	<head>
		<?$APPLICATION->ShowHead();?>
		<title><?$APPLICATION->ShowTitle();?></title>
		<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta http-equiv="Cache-Control" content="no-cache">

        <?php
        //CSS
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/vendor/reset-css/reset.css');
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/vendor/jquery.form-styler/dist/jquery.formstyler.theme.css');
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/vendor/bootstrap/dist/css/bootstrap.min.css');
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/vendor/swiper/dist/css/swiper.min.css');
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/vendor/fancybox/dist/jquery.fancybox.min.css');

        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/style.css');
        ?>
	</head>

	<body>

    <?$APPLICATION->ShowPanel();?>

    <header class="header">
        <div class="header__wrapper">
            <div class="header__info">
                <div class="header__info-left">
                    <a href="/" class="header__logo">
                        <img src="<?= CFile::GetPath(\COption::GetOptionString( "askaron.settings", "UF_SITE_LOGO"));?>" alt="">
                    </a>
                    <div class="header__search">
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:search.form",
                            "search_form",
                            Array(
                                "PAGE" => "#SITE_DIR#search/index.php",
                                "USE_SUGGEST" => "Y"
                            )
                        );?>
                    </div>
                    <div class="mobile-block">
                        <button class="mobile-phone" data-toggle="modal" data-target="#modal-order">
                            <svg class="icon-svg icon-svg-mobile-phone "><use xlink:href="<?= SITE_TEMPLATE_PATH . '/img/sprite.svg#mobile-phone' ?>"></use></svg>
                        </button>
                        <div class="mobile-menu">
                            <span class="line top"></span>
                            <span class="line middle"></span>
                            <span class="line bottom"></span>
                        </div>
                    </div>
                </div>

                <div class="header__info-right">
                    <div class="header__adress">
                        <?= \COption::GetOptionString( "askaron.settings", "UF_HEADER_ADDRESS");?>
                    </div>
                    <div class="header__number">
                        <p class="header__number-phone">
                            <?= \COption::GetOptionString( "askaron.settings", "UF_HEADER_PHONE");?>
                        </p>
                        <button class="header__number-call" data-toggle="modal" data-target="#modal-order">
                            <svg class="icon-svg icon-svg-call "><use xlink:href="<?= SITE_TEMPLATE_PATH . '/img/sprite.svg#call' ?>"></use></svg>
                            <span>Заказать звонок</span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="header__nav">
                <div class="header__block">

                    <?$APPLICATION->IncludeComponent(
                        "bitrix:menu",
                        "top_menu",
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
                            "ROOT_MENU_TYPE" => "top",
                            "USE_EXT" => "N",
                        )
                    );?>

                    <div class="header__info-right header__info-right_mobile">
                        <div class="header__adress">
                            <?= \COption::GetOptionString( "askaron.settings", "UF_HEADER_ADDRESS");?>
                        </div>
                        <div class="header__number">
                            <p class="header__number-phone">
                                <?= \COption::GetOptionString( "askaron.settings", "UF_HEADER_PHONE");?>
                            </p>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>

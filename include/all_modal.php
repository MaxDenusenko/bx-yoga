
<div class="modal fade" id="modal-order" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <img src="<?= SITE_TEMPLATE_PATH . '/img/modal-close.png' ?>" alt="">
            </button>

            <?$APPLICATION->IncludeComponent(
                "bitrix:form.result.new",
                "modal",
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
                    "WEB_FORM_ID" => "3",
                    "AJAX_MODE" => "Y",
                    "AJAX_OPTION_SHADOW" => "N",
                    "AJAX_OPTION_JUMP" => "N",
                    "AJAX_OPTION_STYLE" => "Y",
                    "AJAX_OPTION_HISTORY" => "N",
                )
            );?>

            <img src="<?= SITE_TEMPLATE_PATH . '/img/modal-img.png' ?>" alt="" class="modal-img-1">
            <img src="<?= SITE_TEMPLATE_PATH . '/img/modal-img.png' ?>" alt="" class="modal-img-2">
        </div>
    </div>
</div>
<div class="modal modal_thank fade" id="thank-1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <img src="<?= SITE_TEMPLATE_PATH . '/img/modal-close.png' ?>" alt="">
            </button>
            <h3 class="modal__name">Благодарим за обращение!</h3>
            <p class="modal__text">Мы перезвоним в ближайшее время и ответим на Ваши вопросы.</p>
        </div>
    </div>
</div>
<div class="modal modal_thank fade" id="thank-2" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <img src="<?= SITE_TEMPLATE_PATH . '/img/modal-close.png' ?>" alt="">
            </button>
            <h3 class="modal__name">Хороший выбор!</h3>
            <p class="modal__text">Мы перезвоним Вам в ближайшее время и поможем выбрать подходящее занятие.</p>
            <img src="<?= SITE_TEMPLATE_PATH . '/img/modal-img.png' ?>" alt="" class="modal-img-1">
            <img src="<?= SITE_TEMPLATE_PATH . '/img/modal-img.png' ?>" alt="" class="modal-img-2">
        </div>
    </div>
</div>

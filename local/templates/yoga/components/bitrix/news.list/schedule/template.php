<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

<?foreach($arResult["ITEMS"] as $arSecElItem):?>

    <? if(!empty($arSecElItem['ELEMENTS'])):?>

    <div class="schedule__lessons">
        <div class="lessons">
            <h3><?= $arSecElItem['NAME']?></h3>
            <table>
                <tr class="lessons__header">
                    <th>Время</th>
                    <?php foreach ($arSecElItem['ELEMENTS'][0]['DISPLAY_PROPERTIES'] as $PROPERTY) : ?>
                        <td class="border-td"><?=$PROPERTY['NAME']?></td>
                    <?php endforeach; ?>
                </tr>

                <? foreach($arSecElItem['ELEMENTS'] as $k => $arItem):?>

                    <?php if ($k == (count($arSecElItem['ELEMENTS'])-1)) : ?>
                        <tr>
                            <td><?=$arItem["NAME"]?></td>
                            <?php foreach ($arItem['DISPLAY_PROPERTIES'] as $PROPERTY) : ?>
                                <td class="border-td"><?=$PROPERTY['DISPLAY_VALUE']?></td>
                            <?php endforeach; ?>
                        </tr>
                    <?php else: ?>
                        <tr>
                            <td><?=$arItem["NAME"]?></td>
                            <?php foreach ($arItem['DISPLAY_PROPERTIES'] as $PROPERTY) : ?>
                                <td><?=$PROPERTY['DISPLAY_VALUE']?></td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endif; ?>

                <? endforeach ?>

            </table>
        </div>
    </div>

    <? endif ?>

<?endforeach;?>

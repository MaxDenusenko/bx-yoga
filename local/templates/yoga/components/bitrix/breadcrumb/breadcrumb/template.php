<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;

//delayed function must return a string
if(empty($arResult))
	return "";

$strReturn = '';

//we can't use $APPLICATION->SetAdditionalCSS() here because we are inside the buffered function GetNavChain()
$css = $APPLICATION->GetCSSArray();
if(!is_array($css) || !in_array("/bitrix/css/main/font-awesome.css", $css))
{
	$strReturn .= '<link href="'.CUtil::GetAdditionalFileURL("/bitrix/css/main/font-awesome.css").'" type="text/css" rel="stylesheet" />'."\n";
}

$strReturn .= '<nav aria-label="breadcrumb" itemprop="http://schema.org/breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList"><ol class="breadcrumb">';

$itemSize = count($arResult);
for($index = 0; $index < $itemSize; $index++)
{
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);
	$arrow = ($index > 0? '<i class="fa fa-angle-right"></i>' : '');

	if ($index == 0) {
        $strReturn .= '
			<li class="breadcrumb-item" id="bx_breadcrumb_'.$index.'" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
				<a href="'.$arResult[$index]["LINK"].'" title="'.$title.'" itemprop="item">
					<img src="'. SITE_TEMPLATE_PATH . "/img/breadcrumb-home.png".'" alt="'.$title.'">
				</a>
			</li>';
    }
	else if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1)
	{
		$strReturn .= '
			<li class="breadcrumb-item" id="bx_breadcrumb_'.$index.'" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
				<a href="'.$arResult[$index]["LINK"].'" title="'.$title.'" itemprop="item">
					'.$title.'
				</a>
			</li>';
	}
	else
	{
		$strReturn .= '
			<li class="breadcrumb-item active" aria-current="page">
				'.$title.'
			</li>';
	}
}

$strReturn .= '</ol></nav>';

return $strReturn;

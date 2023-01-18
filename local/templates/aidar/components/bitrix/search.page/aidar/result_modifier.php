<?php
	
	if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
		die();
	}
	$arrayToDelete = [];
	if ($arResult["SEARCH"]) {
		$arID = array();
		foreach ($arResult["SEARCH"] as $i => $arItem) {
			if (strpos($arItem['ITEM_ID'], 'S') !== false) {
				unset($arResult['SEARCH'][$i]);
			} else {
				$arID[$i] = $arItem['ITEM_ID'];
			}
		}
		
		$arResult['SEARCH'] = array_values($arResult['SEARCH']);
		
		$grab = CIBlockElement::GetList(array('by' => array_values($arID)),
																		array(
																			"ID" => array_values($arID)
																		),
																		false,
																		false,
																		array());
		$a = 0;
		while ($ar = $grab->Fetch()) {
			$arResult["SEARCH"][$a]['DETAIL_PICTURE'] = CFile::GetFileArray($ar["DETAIL_PICTURE"]);
			$a++;
		}
	}

<?php
	
	if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
		die();
	}
	
	if ($arResult && intval($arResult['NUM_PRODUCTS']) > 0) {
		echo $arResult['NUM_PRODUCTS'];
	}

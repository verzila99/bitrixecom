<?php
	
	require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
	$APPLICATION->SetTitle("Интернет-магазин \"Одежда\"");
?><?$APPLICATION->IncludeComponent("bitrix:search.form", "aidar", Array(
	"PAGE" => "#SITE_DIR#search/index.php",	// Страница выдачи результатов поиска (доступен макрос #SITE_DIR#)
		"USE_SUGGEST" => "Y",	// Показывать подсказку с поисковыми фразами
	),
	false
);?><?php
	require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
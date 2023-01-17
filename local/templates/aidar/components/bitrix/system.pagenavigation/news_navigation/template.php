<?php

	if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
		die();
	}

	/**
	 * @var array $arResult
	 * @var array $arParam
	 * @var CBitrixComponentTemplate $this
	 */

	/** @var PageNavigationComponent $component */
	$component = $this->getComponent();

	$this->setFrameMode(true);

?>
<?php
	$arResult["NavPageNomer"] = intval($arResult["NavPageNomer"]);
	$arResult["NavPageCount"] = intval($arResult["NavPageCount"]);
	if ($arResult["NavPageCount"] > 1):?>
		<?php
		$plus = $arResult["NavPageNomer"] + 1;
		$urlNext = $arResult["sUrlPathParams"] . "PAGEN_" . $arResult["NavNum"] . "=" . $plus;
		$minus = $arResult["NavPageNomer"] - 1;
		$urlPrev = $arResult["sUrlPathParams"] . "PAGEN_" . $arResult["NavNum"] . "=" . $minus;
		if ($arResult["NavPageNomer"] > 1 && $arResult["NavPageNomer"] < $arResult["NavPageCount"]):?>

			<div class="previous">
				<a href="<?= $urlPrev; ?>" class="btn btn-outline-primary">← Предыдущая</a>
			</div>
			<div class="next">
				<a href="<?= $urlNext; ?>" class="btn btn-outline-secondary">Следующая →</a>
			</div>
		<?php
		elseif ($arResult["NavPageNomer"] == 1) : ?>
			<div class="previous disabled">
				<a href="<?= $urlPrev; ?>" class="btn btn-outline-primary disabled">← Предыдущая</a>
			</div>
			<div class="next">
				<a href="<?= $urlNext; ?>" class="btn btn-outline-secondary ">Следующая →</a>
			</div>
		<?php
		else : ?>
			<div class="previous ">
				<a href="<?= $urlPrev; ?>" class="btn btn-outline-primary">← Предыдущая</a>
			</div>
			<div class="next disabled">
				<a href="<?= $urlNext; ?>" class="btn btn-outline-secondary disabled">Следующая →</a>
			</div>
		<?php
		endif ?>

	<?php
	endif ?>

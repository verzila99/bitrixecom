<?php

	if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
		die();
	}
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
	$this->setFrameMode(true); ?>

<form role="search" class="ml-auto" action="<?= $arResult["FORM_ACTION"] ?>">
	<div class="input-group">
		<input type="text"
					 name="q"
					 placeholder="Поиск"
					 class="form-control"
					 value="<?= GetMessage("BSF_T_SEARCH_BUTTON"); ?>">
		<div class="input-group-append">
			<button name="s" type="submit" class="btn btn-primary">
				<i class="fa fa-search"></i>
			</button>
		</div>
		<?php
			if ($arParams["USE_SUGGEST"] === "Y"): ?>
				<?php
				$APPLICATION->IncludeComponent(
					"bitrix:search.suggest.input",
					"",
					array(
						"NAME" => "q",
						"VALUE" => "",
						"INPUT_SIZE" => 15,
						"DROPDOWN_SIZE" => 10,
					),
					$component, array("HIDE_ICONS" => "Y")
				); ?>
			<?php
			endif; ?>
</form>

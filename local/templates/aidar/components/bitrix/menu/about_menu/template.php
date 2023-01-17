<?

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
	$this->setFrameMode(true);

	if (empty($arResult)) {
		return;
	}
?>

<ul class="nav nav-pills flex-column">
	<?
		foreach ($arResult as $itemIdex => $arItem): ?>
			<?
			if ($arItem["DEPTH_LEVEL"] == "1"): ?>
				<li>
					<a class="nav-link"
						<?php
							if ($arItem["SELECTED"]): ?>
								style="color:grey"
							<?php
							endif; ?>
						 href="<?= htmlspecialcharsbx($arItem["LINK"]) ?>"><?= htmlspecialcharsbx(
							$arItem["TEXT"],
							ENT_COMPAT,
							false
						) ?></a>
				</li>
			<?
			endif ?>
		<?
		endforeach; ?>
</ul>

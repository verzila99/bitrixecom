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
	$this->setFrameMode(true);
?>

<?php
	if ($arResult['ITEMS']): ?>
		<!--
		*** LEFT COLUMN ***
		_________________________________________________________
		-->

		<div class="box">
			<h1><?= $arResult['NAME']; ?></h1>
		</div>
		<?php
		foreach ($arResult['ITEMS'] as $arItem): ?>
			<!-- post-->
			<div class="post">
				<h2>
					<a href="<?= $arItem['DETAIL_PAGE_URL']; ?>"><?= $arItem['NAME']; ?></a>
				</h2>
				<hr>
				<p class="date-comments">
				<p><i class="fa fa-calendar-o"> </i> <?= explode(' ', $arItem['TIMESTAMP_X'])[0];
					?></p>

				</p>
				<div class="image">
					<a href="<?= $arItem['DETAIL_PAGE_URL']; ?>">
						<img src="<?= $arItem['PREVIEW_PICTURE']['SRC']; ?>"
								 alt="<?= $arItem['PREVIEW_PICTURE']['ALT'];
								 ?>"
								 class="img-fluid">
					</a>
				</div>
				<p class="intro"><?= $arItem['PREVIEW_TEXT']; ?>
				</p>
				<p class="read-more">
					<a href="<?= $arItem['DETAIL_PAGE_URL']; ?>"
						 class="btn btn-primary">Читать далее
					</a>
				</p>
			</div>
		<?php
		endforeach; ?>
		<div class="pager d-flex justify-content-between">
			<?= $arResult["NAV_STRING"] ?>

		</div>


	<?php
	endif; ?>

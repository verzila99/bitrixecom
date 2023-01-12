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

?>
<?php
	if ($arResult): ?>

		<div class="container">
			<div class="row products">
				<?php
					foreach ($arResult['SECTIONS'] as $arItem): ?>

						<div class="col-lg-3 col-md-6">
							<div class="product">
								<a href="<?= $arItem['SECTION_PAGE_URL']; ?> " class="product-image">
									<img src="<?=
										$arItem['PICTURE']['SRC']; ?>"
											 alt="<?= $arItem['PICTURE']['ALT']; ?>"
											 class="img-fluid"
											 style="width:auto;height:300px">
								</a>
								<div class="text">
									<h3>
										<a href="<?= $arItem['SECTION_PAGE_URL']; ?>"><?= $arItem['NAME']; ?></a>
									</h3>

								</div>
								<!-- /.text-->
							</div>
							<!-- /.product            -->
						</div>
					<?php
					endforeach; ?>

			</div>
		</div>
	<?php
	endif; ?>

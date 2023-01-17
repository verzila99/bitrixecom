<?php

	if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
		die();
	}

	/**
	 * @global CMain $APPLICATION
	 * @var array $arParams
	 * @var array $arResult
	 * @var CatalogSectionComponent $component
	 * @var CBitrixComponentTemplate $this
	 * @var string $templateName
	 * @var string $componentPath
	 */

	$this->setFrameMode(true);
?>


<div class="box">
	<div class="box py-4">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 class="mb-0">Популярное</h2>
				</div>
			</div>
		</div>
	</div>
	<div class="row products d-flex justify-content-between">
		<!-- items-container -->
		<?php
			if (!empty($arResult['ITEMS'])) : ?>

				<?php
				foreach ($arResult['ITEMS'] as $arItem) :
					?>

					<div class="product col-md-3 ">
						<div class="flip-container">
							<div class="flipper">
								<div class="front">
									<a href="<?= $arItem['DETAIL_PAGE_URL']; ?>" class="product-image">
										<img src="<?= $arItem['DETAIL_PICTURE']['SRC']; ?>"
												 alt=""
												 class="img-fluid"
												 style="height: 200px;width: auto;">
									</a>
								</div>
							</div>
						</div>
						<a href="<?= $arItem['DETAIL_PAGE_URL']; ?>" class="invisible">
							<img src="<?= $arItem['DETAIL_PICTURE']['SRC']; ?>"
									 alt=""
									 class="img-fluid"
									 style="height: 200px;width: auto;">
						</a>
						<div class="text">
							<h3>
								<a href="<?= $arItem['DETAIL_PAGE_URL']; ?>"><?= $arItem['NAME']; ?></a>
							</h3>
							<p class="price">
								<del></del><?= $arItem['OFFERS'][0]['ITEM_PRICES'][0]['BASE_PRICE']; ?> р.
							</p>
						</div>
						<?php
							if ($arItem['PROPERTIES']['NEWPRODUCT']['ACTIVE'] == 'Y'): ?>

								<div class="ribbon new">
									<div class="theribbon">NEW</div>
									<div class="ribbon-background"></div>
								</div>
							<?php
							endif; ?>

					</div>

				<?php
				endforeach;
				?>
				<!-- items-container -->
			<?php
			endif; ?>
	</div>
</div>

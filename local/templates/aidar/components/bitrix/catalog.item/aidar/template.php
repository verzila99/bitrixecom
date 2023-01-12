<?

	if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
		die();
	}

	/**
	 * @global CMain $APPLICATION
	 * @var array $arParams
	 * @var array $arResult
	 * @var CatalogProductsViewedComponent $component
	 * @var CBitrixComponentTemplate $this
	 * @var string $templateName
	 * @var string $componentPath
	 * @var string $templateFolder
	 */

	$this->setFrameMode(true); ?>

<?php
	if ($arResult['ITEM']):
		?>

		<div class="product">
			<div class="flip-container">
				<div class="flipper">
					<div class="front">
						<a href="<?= $arResult['ITEM']['DETAIL_PAGE_URL']; ?>">
							<img src="<?= $arResult['ITEM']['DETAIL_PICTURE']['SRC']; ?>"
									 alt=""
									 class="img-fluid"
									 style="height: 200px;width: auto;">
						</a>
					</div>
				</div>
			</div>
			<a href="<?= $arResult['ITEM']['DETAIL_PAGE_URL']; ?>" class="invisible">
				<img src="<?= $arResult['ITEM']['DETAIL_PICTURE']['SRC']; ?>"
						 alt=""
						 class="img-fluid"
						 style="height: 200px;width: auto;">
			</a>
			<div class="text">
				<h3>
					<a href="<?= $arResult['ITEM']['DETAIL_PAGE_URL']; ?>"><?= $arResult['ITEM']['NAME']; ?>
					</a>
				</h3>
				<p class="price">
					<del></del>
					<strong><?php

							$numbers = array_map(fn($el)=>$el['ITEM_PRICES'][0]['BASE_PRICE'],
								$arResult['ITEM']['OFFERS'] );

							$min = min($numbers);
							echo $min;
						?> .р</strong>
				</p>
				<p class="buttons">
					<a href="<?= $arResult['ITEM']['DETAIL_PAGE_URL']; ?>" class="btn
						btn-outline-secondary">Детали
					</a>
					<a href="" id="<?= $arResult['ITEM']['ID']; ?>" class="btn btn-primary add-to-cart"><i
							class="fa
						fa-shopping-cart"></i>В корзину
					</a>
				</p>
			</div>
			<!-- /.text-->
		</div>


	<?php
	endif;

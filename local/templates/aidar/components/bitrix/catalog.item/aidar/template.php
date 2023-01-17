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

		$colorsArray = array_unique(
			array_map(fn($el) => $el['PROPERTIES']['COLOR_REF']['VALUE'],
				$arResult['ITEM']['OFFERS'])
		);
		$typeOfClothe = strtoupper($arResult['ITEM']['IBLOCK_CODE']);
		$sizesArray = array_unique(
			array_map(fn($el) => $el['PROPERTIES']['SIZES_' . $typeOfClothe]['VALUE'],
				$arResult['ITEM']['OFFERS'])
		);
		?>

		<div class="product">
			<?php
				foreach ($arResult['ITEM']['OFFERS'] as $key => $item): ?>
					<?php
					if (in_array($key, array_keys($colorsArray))): ?>
						<div class="<?= $key != array_search($key, $colorsArray) ?
							'd-none' : ''; ?> <?= $key; ?> product-img">
							<div class="flip-container">
								<div class="flipper">
									<div class="front">
										<a href="<?= $arResult['ITEM']['DETAIL_PAGE_URL']; ?>">

											<img src="<?= $item['MORE_PHOTO'][0]['SRC']; ?>"
													 alt=""
													 class="img-fluid"
													 style="height: 200px;width: auto;">
										</a>

									</div>
								</div>
							</div>
							<a href="<?= $arResult['ITEM']['DETAIL_PAGE_URL']; ?>" class="invisible">
								<img src="<?= $item['MORE_PHOTO'][0]['SRC']; ?>"
										 alt=""
										 class="img-fluid"
										 style="height: 200px;width: auto;">
							</a>
						</div>

					<?php
					endif; ?>

				<?php
				endforeach; ?>
			<div class="text">
				<h3>
					<a href="<?= $arResult['ITEM']['DETAIL_PAGE_URL']; ?>"><?= $arResult['ITEM']['NAME']; ?>
					</a>
				</h3>
				<div class="d-flex justify-content-center mb-3">

					<?php
						foreach ($arResult['ITEM']['OFFERS'] as $key => $item): ?>

							<?php
							if (in_array($key, array_keys($colorsArray))): ?>

								<div data-key="<?= $key; ?>"
										 data-id="<?= $arResult['ITEM']['ID']; ?>"
										 data-offerid="<?= $item['ID']; ?>"
										 class="product-color-link d-flex
								justify-content-center align-items-center">
									<img
										class="<?= $key == array_search($key, $colorsArray) ?
											'selected' : ''; ?> product-color"
										src="<?php
											$colorID = $arParams['~SKU_PROPS']['COLOR_REF']['XML_MAP'][$item['PROPERTIES']['COLOR_REF']['VALUE']];
											echo $arParams['~SKU_PROPS']['COLOR_REF']['VALUES'][$colorID]['PICT']['SRC'];
										?>"
										alt="<?= $arParams['~SKU_PROPS']['COLOR_REF']['VALUES'][$colorID]['NAME']; ?>">
								</div>
							<?php
							endif; ?>

						<?php
						endforeach; ?>
				</div>

				<div class="product-size-links d-flex justify-content-center mb-3">

					<?php
						foreach ($arResult['ITEM']['OFFERS'] as $key => $item): ?>
							<div class="d-none offers-data"
									 data-color="<?= $item['PROPERTIES']['COLOR_REF']['VALUE']; ?>"
									 data-size="<?= $item['PROPERTIES']['SIZES_' . $typeOfClothe]['VALUE']; ?>"
									 data-offerid="<?= $item['ID']; ?>"
									 data-id="<?= $arResult['ITEM']['ID']; ?>"
									 data-price="<?= $item['ITEM_PRICES'][0]['BASE_PRICE']; ?>"
							>
							</div>


							<?php
							if (in_array($key, array_keys($sizesArray))): ?>
								<button data-key="<?= $key; ?>"
												data-id="<?= $arResult['ITEM']['ID']; ?>"
												data-offerid="<?= $item['ID']; ?>"
												class="product-size-link <?= $key == array_search($key, $sizesArray) ?
													'selected' : ''; ?> product-size">

									<?php
										echo $item['PROPERTIES']['SIZES_' . $typeOfClothe]['VALUE'];
									?>

								</button>
							<?php
							endif; ?>

						<?php
						endforeach; ?>
				</div>
				<?php
					foreach ($arResult['ITEM']['OFFERS'] as $key => $item): ?>
						<?php
						if (in_array($key, array_keys($colorsArray))): ?>
							<p class="price <?= $key != array_search($key, $colorsArray) ?
								'd-none' : ''; ?> <?= $key; ?>">
								<del></del>
								<strong><?= $item['ITEM_PRICES'][0]['BASE_PRICE'];
									?> .р</strong>
							</p>
						<?php
						endif; ?>

					<?php
					endforeach; ?>

				<p class="buttons">
					<a href="<?= $arResult['ITEM']['DETAIL_PAGE_URL']; ?>" class="btn
						btn-outline-secondary">Детали
					</a>
					<a class="btn
					btn-primary
					add-to-cart"><i
							class="fa
						fa-shopping-cart"></i>В корзину!
					</a>
				</p>
			</div>
			<!-- /.text-->
		</div>
		<script>
			BX.ready(function () {

				let offers = document.querySelectorAll('.offers-data');
				const offersData = [];
				offers.forEach((el, index) => {

					offersData[index] = [];
					offersData[index]['color'] = el.dataset.color;
					offersData[index]['size'] = el.dataset.size;
					offersData[index]['offerid'] = el.dataset.offerid;
					offersData[index]['id'] = el.dataset.id;
					offersData[index]['price'] = el.dataset.price;
				});

				// checkingOffers();
				$('.product-color-link').click(function (e) {
					e.preventDefault();
					e.stopPropagation();
					$(this).parent().parent().find('.add-to-cart').data('offerid', $(this).data('offerid'));

				});
				$('.product-size-link').click(function (e) {
					e.preventDefault();
					e.stopPropagation();
					$(this).parent().parent().find('.add-to-cart').data('offerid', $(this).data('offerid'));
					$(this).parent().parent().find('.product-color-link').filter(function () {
						$(this).
					})
				});

				// function checkingOffers() {
				// 	$('.product-size-link').filter(function (i, el) {
				// 			$.inArray(this.attr())
				// 		}
				// 	).attr('disabled', '');
				// }

				$('.add-to-cart').click(function (e) {
					e.preventDefault();
					e.stopPropagation();
					let ajax = $.ajax({
						type: 'GET',
						url: location.pathname + `?action=ADD2BASKET&id=${$(this).attr('data-offerid')}`,
						data: {
							ajax_basket: 'Y',
							quantity: '1'
						}
					});


					ajax.done(function (data) {
						if (data.STATUS == 'OK') {
							alert('success');
						}
					});

				});
			})

		</script>

	<?php
	endif;

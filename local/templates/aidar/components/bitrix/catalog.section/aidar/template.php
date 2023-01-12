<?php

	if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
		die();
	}

	use Bitrix\Main\Localization\Loc;
	use Bitrix\Main\Security\Sign\Signer;

	/**
	 * @global CMain $APPLICATION
	 * @var array $arParams
	 * @var array $arResult
	 * @var CatalogSectionComponent $component
	 * @var CBitrixComponentTemplate $this
	 * @var string $templateName
	 * @var string $componentPath
	 *
	 *  _________________________________________________________________________
	 * |  Attention!
	 * |  The following comments are for system use
	 * |  and are required for the component to work correctly in ajax mode:
	 * |  <!-- items-container -->
	 * |  <!-- pagination-container -->
	 * |  <!-- component-end -->
	 */

	$this->setFrameMode(true);

	if (!empty($arResult['NAV_RESULT'])) {
		$navParams = array(
			'NavPageCount' => $arResult['NAV_RESULT']->NavPageCount,
			'NavPageNomer' => $arResult['NAV_RESULT']->NavPageNomer,
			'NavNum' => $arResult['NAV_RESULT']->NavNum
		);
	} else {
		$navParams = array(
			'NavPageCount' => 1,
			'NavPageNomer' => 1,
			'NavNum' => $this->randString()
		);
	}

	$showTopPager = false;
	$showBottomPager = false;
	$showLazyLoad = false;

	if ($arParams['PAGE_ELEMENT_COUNT'] > 0 && $navParams['NavPageCount'] > 1) {
		$showTopPager = $arParams['DISPLAY_TOP_PAGER'];
		$showBottomPager = $arParams['DISPLAY_BOTTOM_PAGER'];
		$showLazyLoad = $arParams['LAZY_LOAD'] === 'Y' && $navParams['NavPageNomer'] != $navParams['NavPageCount'];
	}

	$templateLibrary = array('popup', 'ajax', 'fx');
	$currencyList = '';

	if (!empty($arResult['CURRENCIES'])) {
		$templateLibrary[] = 'currency';
		$currencyList = CUtil::PhpToJSObject($arResult['CURRENCIES'], false, true, true);
	}

	$templateData = array(
		'TEMPLATE_LIBRARY' => $templateLibrary,
		'CURRENCIES' => $currencyList
	);
	unset($currencyList, $templateLibrary);

	$elementEdit = CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_EDIT');
	$elementDelete = CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_DELETE');
	$elementDeleteParams = array('CONFIRM' => GetMessage('CT_BCS_TPL_ELEMENT_DELETE_CONFIRM'));

	$positionClassMap = array(
		'left' => 'product-item-label-left',
		'center' => 'product-item-label-center',
		'right' => 'product-item-label-right',
		'bottom' => 'product-item-label-bottom',
		'middle' => 'product-item-label-middle',
		'top' => 'product-item-label-top'
	);

	$discountPositionClass = '';
	if ($arParams['SHOW_DISCOUNT_PERCENT'] === 'Y' && !empty($arParams['DISCOUNT_PERCENT_POSITION'])) {
		foreach (explode('-', $arParams['DISCOUNT_PERCENT_POSITION']) as $pos) {
			$discountPositionClass .= isset($positionClassMap[$pos]) ? ' ' . $positionClassMap[$pos] : '';
		}
	}

	$labelPositionClass = '';
	if (!empty($arParams['LABEL_PROP_POSITION'])) {
		foreach (explode('-', $arParams['LABEL_PROP_POSITION']) as $pos) {
			$labelPositionClass .= isset($positionClassMap[$pos]) ? ' ' . $positionClassMap[$pos] : '';
		}
	}

	$arParams['~MESS_BTN_BUY'] = $arParams['~MESS_BTN_BUY']
		?: Loc::getMessage(
			'CT_BCS_TPL_MESS_BTN_BUY'
		);
	$arParams['~MESS_BTN_DETAIL'] = $arParams['~MESS_BTN_DETAIL']
		?: Loc::getMessage(
			'CT_BCS_TPL_MESS_BTN_DETAIL'
		);
	$arParams['~MESS_BTN_COMPARE'] = $arParams['~MESS_BTN_COMPARE']
		?: Loc::getMessage(
			'CT_BCS_TPL_MESS_BTN_COMPARE'
		);
	$arParams['~MESS_BTN_SUBSCRIBE'] = $arParams['~MESS_BTN_SUBSCRIBE']
		?: Loc::getMessage(
			'CT_BCS_TPL_MESS_BTN_SUBSCRIBE'
		);
	$arParams['~MESS_BTN_ADD_TO_BASKET'] = $arParams['~MESS_BTN_ADD_TO_BASKET']
		?: Loc::getMessage(
			'CT_BCS_TPL_MESS_BTN_ADD_TO_BASKET'
		);
	$arParams['~MESS_NOT_AVAILABLE'] = $arParams['~MESS_NOT_AVAILABLE']
		?: Loc::getMessage(
			'CT_BCS_TPL_MESS_PRODUCT_NOT_AVAILABLE'
		);
	$arParams['~MESS_SHOW_MAX_QUANTITY'] = $arParams['~MESS_SHOW_MAX_QUANTITY']
		?: Loc::getMessage(
			'CT_BCS_CATALOG_SHOW_MAX_QUANTITY'
		);
	$arParams['~MESS_RELATIVE_QUANTITY_MANY'] = $arParams['~MESS_RELATIVE_QUANTITY_MANY']
		?: Loc::getMessage('CT_BCS_CATALOG_RELATIVE_QUANTITY_MANY');
	$arParams['MESS_RELATIVE_QUANTITY_MANY'] = $arParams['MESS_RELATIVE_QUANTITY_MANY']
		?: Loc::getMessage('CT_BCS_CATALOG_RELATIVE_QUANTITY_MANY');
	$arParams['~MESS_RELATIVE_QUANTITY_FEW'] = $arParams['~MESS_RELATIVE_QUANTITY_FEW']
		?: Loc::getMessage('CT_BCS_CATALOG_RELATIVE_QUANTITY_FEW');
	$arParams['MESS_RELATIVE_QUANTITY_FEW'] = $arParams['MESS_RELATIVE_QUANTITY_FEW']
		?: Loc::getMessage('CT_BCS_CATALOG_RELATIVE_QUANTITY_FEW');

	$arParams['MESS_BTN_LAZY_LOAD'] = $arParams['MESS_BTN_LAZY_LOAD']
		?: Loc::getMessage(
			'CT_BCS_CATALOG_MESS_BTN_LAZY_LOAD'
		);

	$generalParams = array(
		'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'],
		'PRODUCT_DISPLAY_MODE' => $arParams['PRODUCT_DISPLAY_MODE'],
		'SHOW_MAX_QUANTITY' => $arParams['SHOW_MAX_QUANTITY'],
		'RELATIVE_QUANTITY_FACTOR' => $arParams['RELATIVE_QUANTITY_FACTOR'],
		'MESS_SHOW_MAX_QUANTITY' => $arParams['~MESS_SHOW_MAX_QUANTITY'],
		'MESS_RELATIVE_QUANTITY_MANY' => $arParams['~MESS_RELATIVE_QUANTITY_MANY'],
		'MESS_RELATIVE_QUANTITY_FEW' => $arParams['~MESS_RELATIVE_QUANTITY_FEW'],
		'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'],
		'USE_PRODUCT_QUANTITY' => $arParams['USE_PRODUCT_QUANTITY'],
		'PRODUCT_QUANTITY_VARIABLE' => $arParams['PRODUCT_QUANTITY_VARIABLE'],
		'ADD_TO_BASKET_ACTION' => $arParams['ADD_TO_BASKET_ACTION'],
		'ADD_PROPERTIES_TO_BASKET' => $arParams['ADD_PROPERTIES_TO_BASKET'],
		'PRODUCT_PROPS_VARIABLE' => $arParams['PRODUCT_PROPS_VARIABLE'],
		'SHOW_CLOSE_POPUP' => $arParams['SHOW_CLOSE_POPUP'],
		'DISPLAY_COMPARE' => $arParams['DISPLAY_COMPARE'],
		'COMPARE_PATH' => $arParams['COMPARE_PATH'],
		'COMPARE_NAME' => $arParams['COMPARE_NAME'],
		'PRODUCT_SUBSCRIPTION' => $arParams['PRODUCT_SUBSCRIPTION'],
		'PRODUCT_BLOCKS_ORDER' => $arParams['PRODUCT_BLOCKS_ORDER'],
		'LABEL_POSITION_CLASS' => $labelPositionClass,
		'DISCOUNT_POSITION_CLASS' => $discountPositionClass,
		'SLIDER_INTERVAL' => $arParams['SLIDER_INTERVAL'],
		'SLIDER_PROGRESS' => $arParams['SLIDER_PROGRESS'],
		'~BASKET_URL' => $arParams['~BASKET_URL'],
		'~ADD_URL_TEMPLATE' => $arResult['~ADD_URL_TEMPLATE'],
		'~BUY_URL_TEMPLATE' => $arResult['~BUY_URL_TEMPLATE'],
		'~COMPARE_URL_TEMPLATE' => $arResult['~COMPARE_URL_TEMPLATE'],
		'~COMPARE_DELETE_URL_TEMPLATE' => $arResult['~COMPARE_DELETE_URL_TEMPLATE'],
		'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
		'USE_ENHANCED_ECOMMERCE' => $arParams['USE_ENHANCED_ECOMMERCE'],
		'DATA_LAYER_NAME' => $arParams['DATA_LAYER_NAME'],
		'BRAND_PROPERTY' => $arParams['BRAND_PROPERTY'],
		'MESS_BTN_BUY' => $arParams['~MESS_BTN_BUY'],
		'MESS_BTN_DETAIL' => $arParams['~MESS_BTN_DETAIL'],
		'MESS_BTN_COMPARE' => $arParams['~MESS_BTN_COMPARE'],
		'MESS_BTN_SUBSCRIBE' => $arParams['~MESS_BTN_SUBSCRIBE'],
		'MESS_BTN_ADD_TO_BASKET' => $arParams['~MESS_BTN_ADD_TO_BASKET'],
		'MESS_NOT_AVAILABLE' => $arParams['~MESS_NOT_AVAILABLE']
	);

	$obName = 'ob' . preg_replace('/[^a-zA-Z0-9_]/', 'x', $this->GetEditAreaId($navParams['NavNum']));
	$containerName = 'container-' . $navParams['NavNum'];

	$themeClass = isset($arParams['TEMPLATE_THEME']) ? ' bx-' . $arParams['TEMPLATE_THEME'] : '';

?>

<div class="row<?= $themeClass ?>"> <?php
		// wrapper ?>
	<div class="col">
		<?php
			//region Pagination
			if ($showTopPager) {
				?>
				<div class="row mb-4">
					<div class="col text-center" data-pagination-num="<?= $navParams['NavNum'] ?>">
						<!-- pagination-container -->
						<?= $arResult['NAV_STRING'] ?>
						<!-- pagination-container -->
					</div>
				</div>
				<?php
			}
			//endregion

			//region Description
			if (!empty($arResult['DESCRIPTION'])) {
		?>
		<div class="col">
			<div class="box">
				<h1><?= $arResult['NAME']; ?></h1>
				<p><?= $arResult['DESCRIPTION']; ?>.
				</p>
			</div>
		</div>
				<?php
			}
			//endregion
		?>
			<div class="col">
				<div class="box info-bar">
					<div class="row">
						<div class="col-md-12 col-lg-4 products-showing">Showing <strong>12</strong> of
							<strong>25</strong> products
						</div>
						<div class="col-md-12 col-lg-7 products-number-sort">
							<form class="form-inline d-block d-lg-flex justify-content-between flex-column flex-md-row">
								<div class="products-number"><strong>Show</strong>
									<a href="#" class="btn btn-sm btn-primary">12</a>
									<a href="#" class="btn btn-outline-secondary btn-sm">24</a>
									<a href="#" class="btn btn-outline-secondary btn-sm">All</a>
									<span>products</span></div>
								<div class="products-sort-by mt-2 mt-lg-0"><strong>Сортировать по:</strong>
									<select class="form-select"
													id="bitrix-sort"
													aria-label="Default select bitrix-sort">
										<option value="SORT-ASC"<?= !$_GET['sort'] ? 'selected' : ''; ?>>По
																																										 умолчанию
										</option>
										<option value="NAME-ASC"<?= $_GET['sort']=='name' &&
										$_GET['method']== 'asc'? 'selected' :
											'';
										?>>Алфавиту от
											 А до Я
										</option>
										<option value="NAME-DESC"<?= $_GET['sort']=='name' &&
										$_GET['method']== 'desc'? 'selected'
											: '';
										?>>Алфавиту
											 от Я до А
										</option>
										<option value="PROPERTY_PRICE-ASC"<?= $_GET['sort']=='catalog_PRICE_1' &&

										$_GET['method']== 'asc'?
											'selected'
											: ''; ?>>По возрастанию цены
										</option>
										<option value="PROPERTY_PRICE-DESC"<?= $_GET['sort']=='catalog_PRICE_1'
										&&
										$_GET['method']== 'desc'?
											'selected'
											: ''; ?>>По убыванию цены
										</option>
										<option value="TIMESTAMP_X-ASC"<?= $_GET['sort']=='timestamp_x' ? 'selected'
											: ''; ?>>По дате обновления
										</option>
									</select>
								</div>
								<?php $server = $APPLICATION->GetCurPage(false);?>
								<div style="display:none;">
									<a id="SORT-ASC" href="<?= $server;?>">По умолчанию</a>
									<a id="NAME-ASC" href="<?= $server;?>?sort=name&method=asc">Алфавиту от А до Я</a>
									<a id="NAME-DESC" href="<?= $server;?>?sort=name&method=desc">Алфавиту от Я до А</a>
									<a id="PROPERTY_PRICE-ASC" href="<?= $server;?>?sort=catalog_PRICE_1&method=asc">По
																																																	 возрастанию цены</a>
									<a id="PROPERTY_PRICE-DESC" href="<?= $server;?>?sort=catalog_PRICE_1&method=desc">По убыванию
																																																		 цены</a>
									<a id="TIMESTAMP_X-ASC" href="<?= $server;?>?sort=timestamp_x&method=desc">По дате
																																														 обновления</a>
								</div>
							</form>
						</div>
					</div>
				</div>
				<script>
					BX.ready(function(){
						BX.bind(
							BX('bitrix-sort'), 'change', function() {
								let selected =  this.value;
								BX(selected).click();
							}
						);
					});
				</script>
			</div>
		

			<!-- items-container -->
			<?php
				if (!empty($arResult['ITEMS'])) {
					$areaIds = array();

					foreach ($arResult['ITEMS'] as $item) {
						$uniqueId = $item['ID'] . '_' . md5($this->randString() . $component->getAction());
						$areaIds[$item['ID']] = $this->GetEditAreaId($uniqueId);
						$this->AddEditAction($uniqueId, $item['EDIT_LINK'], $elementEdit);
						$this->AddDeleteAction(
							$uniqueId,
							$item['DELETE_LINK'],
							$elementDelete,
							$elementDeleteParams
						);
					}
					?>
					<div class="row products" data-entity="items-row">

						<?php
							foreach ($arResult['ITEMS'] as $rowData) {
								?>
								<div class="col-lg-4 col-md-6">
									<?php
										$item = $rowData;
										$APPLICATION->IncludeComponent(
											'bitrix:catalog.item',
											'aidar',
											array(
												'RESULT' => array(
													'ITEM' => $item,
													'AREA_ID' => $areaIds[$item['ID']],
													'TYPE' => $rowData['TYPE'],
													'BIG_LABEL' => 'N',
													'BIG_DISCOUNT_PERCENT' => 'N',
													'BIG_BUTTONS' => 'N',
													'SCALABLE' => 'N'
												),
												'PARAMS' => $generalParams
													+ array('SKU_PROPS' => $arResult['SKU_PROPS'][$item['IBLOCK_ID']])
											),
											$component,
											array('HIDE_ICONS' => 'Y')
										); ?>
								</div>
								<?php
							}
						?>
					</div>
					<?php
					unset($generalParams, $rowItems);
				} else {
					// load css for bigData/deferred load
					$APPLICATION->IncludeComponent(
						'bitrix:catalog.item',
						'aidar',
						array(),
						$component,
						array('HIDE_ICONS' => 'Y')
					);
				}
			?>
			<!-- items-container -->
			<?php

				//region LazyLoad Button
				if ($showLazyLoad) {
					?>
					<div class="text-center mb-4" data-entity="lazy-<?= $containerName ?>">
						<button type="button"
										class="btn btn-primary btn-md"
										style="margin: 15px;"
										data-use="show-more-<?= $navParams['NavNum'] ?>">
							<?= $arParams['MESS_BTN_LAZY_LOAD'] ?>
						</button>
					</div>
					<?php
				}
				//endregion

				//region Pagination
				if ($showBottomPager) {
					?>
					<div class="row mb-4">
						<div class="col text-center" data-pagination-num="<?= $navParams['NavNum'] ?>">
							<!-- pagination-container -->
							<?= $arResult['NAV_STRING'] ?>
							<!-- pagination-container -->
						</div>
					</div>
					<?php
				}
				//endregion

				$signer = new Signer;
				$signedTemplate = $signer->sign($templateName, 'catalog.section');
				$signedParams = $signer->sign(
					base64_encode(serialize($arResult['ORIGINAL_PARAMETERS'])),
					'catalog.section'
				);
			?>
			<script>
				BX.message({
					BTN_MESSAGE_BASKET_REDIRECT: '<?=GetMessageJS(
						'CT_BCS_CATALOG_BTN_MESSAGE_BASKET_REDIRECT'
					)?>',
					BASKET_URL: '<?=$arParams['BASKET_URL']?>',
					ADD_TO_BASKET_OK: '<?=GetMessageJS('ADD_TO_BASKET_OK')?>',
					TITLE_ERROR: '<?=GetMessageJS('CT_BCS_CATALOG_TITLE_ERROR')?>',
					TITLE_BASKET_PROPS: '<?=GetMessageJS('CT_BCS_CATALOG_TITLE_BASKET_PROPS')?>',
					TITLE_SUCCESSFUL: '<?=GetMessageJS('ADD_TO_BASKET_OK')?>',
					BASKET_UNKNOWN_ERROR: '<?=GetMessageJS('CT_BCS_CATALOG_BASKET_UNKNOWN_ERROR')?>',
					BTN_MESSAGE_SEND_PROPS: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_SEND_PROPS')?>',
					BTN_MESSAGE_CLOSE: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_CLOSE')?>',
					BTN_MESSAGE_CLOSE_POPUP: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_CLOSE_POPUP')?>',
					COMPARE_MESSAGE_OK: '<?=GetMessageJS('CT_BCS_CATALOG_MESS_COMPARE_OK')?>',
					COMPARE_UNKNOWN_ERROR: '<?=GetMessageJS('CT_BCS_CATALOG_MESS_COMPARE_UNKNOWN_ERROR')?>',
					COMPARE_TITLE: '<?=GetMessageJS('CT_BCS_CATALOG_MESS_COMPARE_TITLE')?>',
					PRICE_TOTAL_PREFIX: '<?=GetMessageJS('CT_BCS_CATALOG_PRICE_TOTAL_PREFIX')?>',
					RELATIVE_QUANTITY_MANY: '<?=CUtil::JSEscape(
						$arParams['MESS_RELATIVE_QUANTITY_MANY']
					)?>',
					RELATIVE_QUANTITY_FEW: '<?=CUtil::JSEscape($arParams['MESS_RELATIVE_QUANTITY_FEW'])?>',
					BTN_MESSAGE_COMPARE_REDIRECT: '<?=GetMessageJS(
						'CT_BCS_CATALOG_BTN_MESSAGE_COMPARE_REDIRECT'
					)?>',
					BTN_MESSAGE_LAZY_LOAD: '<?=CUtil::JSEscape($arParams['MESS_BTN_LAZY_LOAD'])?>',
					BTN_MESSAGE_LAZY_LOAD_WAITER: '<?=GetMessageJS(
						'CT_BCS_CATALOG_BTN_MESSAGE_LAZY_LOAD_WAITER'
					)?>',
					SITE_ID: '<?=CUtil::JSEscape($component->getSiteId())?>'
				});
				var <?=$obName?> = new JCCatalogSectionComponent({
					siteId: '<?=CUtil::JSEscape($component->getSiteId())?>',
					componentPath: '<?=CUtil::JSEscape($componentPath)?>',
					navParams: <?=CUtil::PhpToJSObject($navParams)?>,
					deferredLoad: false, // enable it for deferred load
					initiallyShowHeader: '<?=!empty($arResult['ITEM_ROWS'])?>',
					bigData: <?=CUtil::PhpToJSObject($arResult['BIG_DATA'])?>,
					lazyLoad: !!'<?=$showLazyLoad?>',
					loadOnScroll: !!'<?=($arParams['LOAD_ON_SCROLL'] === 'Y')?>',
					template: '<?=CUtil::JSEscape($signedTemplate)?>',
					ajaxId: '<?=CUtil::JSEscape($arParams['AJAX_ID'])?>',
					parameters: '<?=CUtil::JSEscape($signedParams)?>',
					container: '<?=$containerName?>'
				});
			</script>


		</div>
	</div>
</div> <?php
	//end wrapper?>
<!-- component-end -->

<?php

	if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
		die();
	}
	/** @var array $arParams */
	/** @var array $arResult */
	/** @global CMain $APPLICATION */

?>
<?php
	if ($arResult["ITEMS"]): ?>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div id="main-slider" class="owl-carousel owl-theme">
						<?php
							foreach ($arResult["ITEMS"] as $arItem):?>
								<div class="item">
									<img src="<?= $arItem['PREVIEW_PICTURE']['SRC']; ?>"
											 alt="<?= $arItem['PREVIEW_TEXT']; ?>"
											 class="img-fluid">
								</div>
							<?php
							endforeach; ?>
					</div>
					<!-- /#main-slider-->
				</div>
			</div>
		</div>
	<?php
	endif; ?>

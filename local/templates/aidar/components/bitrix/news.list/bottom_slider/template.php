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
			<div class="col-md-12">
				<div class="box slideshow">
					<h3>Вдохновляйся</h3>
					<p class="lead">Вдохновляйся идеями наших лучших дизайнеров</p>
					<div id="get-inspired" class="owl-carousel owl-theme">
						<?php
							foreach ($arResult["ITEMS"] as $arItem):?>
								<div class="item">
									<a href="#">
										<img src="<?= $arItem['PREVIEW_PICTURE']['SRC']; ?>"
												 alt="Вдохновляйся" class="img-fluid">
									</a>
								</div>
							<?php
							endforeach; ?>
					</div>
				</div>
			</div>
		</div>

	<?php
	endif; ?>

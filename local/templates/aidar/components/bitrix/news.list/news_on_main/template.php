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
		<div class="box text-center">
			<div class="container">
				<div class="col-md-12">
					<h3 class="text-uppercase">Из нашего блога</h3>
					<p class="lead mb-0">Что нового в мире моды?
						<a href="<?= $arResult['ITEMS'][0]['LIST_PAGE_URL']; ?>">Наш блог</a>
					</p>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="col-md-12">
				<div id="blog-homepage" class="row">
					<?php
						foreach ($arResult["ITEMS"] as $arItem):?>
							<div class="col-sm-6">
								<div class="post">
									<h4>
										<a href="<?= $arItem['DETAIL_PAGE_URL']; ?>"><?= $arItem['NAME']; ?></a>
									</h4>
									<p class="author-category">Автор
										<a href="#"><?= $arItem['PROPERTIES']['NEWS_AUTHOR']['VALUE']; ?></a>

									</p>
									<hr>
									<p class="intro"><?= $arItem['PREVIEW_TEXT']; ?>
									</p>
									<p class="read-more">
										<a href="<?= $arItem['DETAIL_PAGE_URL']; ?>" class="btn btn-primary">Читать
																																												 далее
										</a>
									</p>
								</div>
							</div>
						<?php
						endforeach; ?>
				</div>
				<!-- /#blog-homepage-->
			</div>
		</div>


	<?php
	endif; ?>

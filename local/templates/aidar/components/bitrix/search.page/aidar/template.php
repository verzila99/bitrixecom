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
?>
<div class="container">
	<div class="box">
		<?php
			if (isset($arResult["REQUEST"]["ORIGINAL_QUERY"])):
				?>
				<div class="search-language-guess">
					<?php
						echo GetMessage(
							"CT_BSP_KEYBOARD_WARNING",
							array("#query#" => '<a href="' . $arResult["ORIGINAL_QUERY_URL"] . '">' . $arResult["REQUEST"]["ORIGINAL_QUERY"] . '</a>')
						) ?>
				</div><br/><?php
			endif; ?>

		<?php
			if ($arResult["REQUEST"]["QUERY"] === false && $arResult["REQUEST"]["TAGS"] === false): ?>
			<?php
			elseif ($arResult["ERROR_CODE"] != 0): ?>
				<p><?= GetMessage("SEARCH_ERROR") ?></p>
				<?php
				ShowError($arResult["ERROR_TEXT"]); ?>
				<p><?= GetMessage("SEARCH_CORRECT_AND_CONTINUE") ?></p>
				<br/><br/>
				<p><?= GetMessage("SEARCH_SINTAX") ?><br/><b><?= GetMessage("SEARCH_LOGIC") ?></b></p>
				<table border="0" cellpadding="5">
					<tr>
						<td align="center" valign="top"><?= GetMessage("SEARCH_OPERATOR") ?></td>
						<td valign="top"><?= GetMessage("SEARCH_SYNONIM") ?></td>
						<td><?= GetMessage("SEARCH_DESCRIPTION") ?></td>
					</tr>
					<tr>
						<td align="center" valign="top"><?= GetMessage("SEARCH_AND") ?></td>
						<td valign="top">and, &amp;, +</td>
						<td><?= GetMessage("SEARCH_AND_ALT") ?></td>
					</tr>
					<tr>
						<td align="center" valign="top"><?= GetMessage("SEARCH_OR") ?></td>
						<td valign="top">or, |</td>
						<td><?= GetMessage("SEARCH_OR_ALT") ?></td>
					</tr>
					<tr>
						<td align="center" valign="top"><?= GetMessage("SEARCH_NOT") ?></td>
						<td valign="top">not, ~</td>
						<td><?= GetMessage("SEARCH_NOT_ALT") ?></td>
					</tr>
					<tr>
						<td align="center" valign="top">( )</td>
						<td valign="top">&nbsp;</td>
						<td><?= GetMessage("SEARCH_BRACKETS_ALT") ?></td>
					</tr>
				</table>
			<?php
			elseif (count($arResult["SEARCH"]) > 0): ?>

				<div class="row products">
					<?php
						if ($arParams["DISPLAY_TOP_PAGER"] != "N") echo $arResult["NAV_STRING"] ?>
					<br/>
					<hr/>
					<?php
						foreach ($arResult["SEARCH"] as $arItem): ?>
							<div class="col-lg-3 col-md-4">
								<div class="product">
									<div class="flip-container">
										<div class="flipper">
											<div class="front">
												<a href="<?= $arItem['URL']; ?>">
													<img src="<?= $arItem['DETAIL_PICTURE']['SRC']; ?>"
															 alt="<?= $arItem['TITLE']; ?>"
															 class="img-fluid"
															 style="height: 200px;width:auto">
												</a>
											</div>
										</div>
									</div>
									<a href="<?= $arItem['URL']; ?>" class="invisible">
										<img src="<?= $arItem['DETAIL_PICTURE']['SRC']; ?>"
												 alt="<?= $arItem['TITLE']; ?>"
												 class="img-fluid"
												 style="height: 200px;width:auto">
									</a>
									<div class="text">
										<h3>
											<a href="<?= $arItem['URL']; ?>"><?= $arItem['TITLE']; ?></a>
										</h3>
										<p class="buttons">
											<a href="<?= $arItem['URL']; ?>" class="btn
											btn-primary">Смотреть детали
											</a>

										</p>
									</div>
									<!-- /.text-->
								</div>
								<!-- /.product            -->
							</div>

						<?php
						endforeach; ?>
				</div>
				<?php
				if ($arParams["DISPLAY_BOTTOM_PAGER"] != "N") echo $arResult["NAV_STRING"] ?>
				<br/>
				<p>
					<?php
						if ($arResult["REQUEST"]["HOW"] == "d"): ?>
							<a href="<?= $arResult["URL"] ?>&amp;how=r<?php
								echo $arResult["REQUEST"]["FROM"] ? '&amp;from=' . $arResult["REQUEST"]["FROM"]
									: '' ?><?php
								echo $arResult["REQUEST"]["TO"] ? '&amp;to=' . $arResult["REQUEST"]["TO"]
									: '' ?>"><?= GetMessage("SEARCH_SORT_BY_RANK") ?></a>&nbsp;|&nbsp;
							<b><?= GetMessage(
									"SEARCH_SORTED_BY_DATE"
								) ?></b>
						<?php
						else: ?>
							<b><?= GetMessage("SEARCH_SORTED_BY_RANK") ?></b>&nbsp;|&nbsp;
							<a href="<?= $arResult["URL"] ?>&amp;how=d<?php
								echo $arResult["REQUEST"]["FROM"] ? '&amp;from=' . $arResult["REQUEST"]["FROM"]
									: '' ?><?php
								echo $arResult["REQUEST"]["TO"] ? '&amp;to=' . $arResult["REQUEST"]["TO"]
									: '' ?>"><?= GetMessage("SEARCH_SORT_BY_DATE") ?></a>
						<?php
						endif; ?>
				</p>
			<?php
			else: ?>
				<?php
				ShowNote(GetMessage("SEARCH_NOTHING_TO_FOUND")); ?>
			<?php
			endif; ?>


	</div>
</div>

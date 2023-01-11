<?php

	if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
		die();
	} ?>


<?php
	if (!empty($arResult)): ?>


		<ul class="navbar-nav mr-auto">
			<?php
				foreach ($arResult as $arItem):

					?>
					<?php
					if (empty($arItem['subitems'])): ?>
						<li class="nav-item">
							<a href="<?= $arItem["LINK"]; ?>"
								 class="<?php
									 echo $arItem['SELECTED'] ? 'active' : ''; ?> nav-link"
							><?= $arItem["TEXT"]; ?>

							</a>
						</li>
					<?php
					else : ?>
						<li class="nav-item dropdown menu-large">
						<a href="<?= $arItem["LINK"]; ?>"

							<?php
								if ($arItem["SELECTED"]): ?>
									class="selected dropdown-toggle nav-link"
								<?php
								else : ?>
									data-toggle="dropdown"
									data-hover="dropdown"
									data-delay="200"
									class="dropdown-toggle nav-link"
								<?php
								endif; ?>

						><?= $arItem["TEXT"]; ?>
							<b
								class="caret"></b>
						</a>
						<ul class="dropdown-menu megamenu">

							<li class="row">

								<div class="col-md-6 col-lg-3">
									<?php
										foreach ($arItem['subitems'] as $value): ?>
											<ul class="list-unstyled mb-3">
												<li class="nav-item">
													<a href="<?= $value['LINK']; ?>" class="nav-link"><?= $value['TEXT'];
														?></a>
												</li>
											</ul>
										<?php
										endforeach; ?>
								</div>
							</li>

						</ul>

					<?php
					endif; ?>


					</li>

				<?php
				endforeach ?>


		</ul>


	<?php
	endif ?>

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
	$themeClass = isset($arParams['TEMPLATE_THEME']) ? ' bx-' . $arParams['TEMPLATE_THEME'] : '';
	CUtil::InitJSCore(array('fx'));
?>
<?php
	if ($arResult): ?>
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<!-- breadcrumb-->
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item">
								<a href="#">Home</a>
							</li>
							<li class="breadcrumb-item">
								<a href="blog.html">Blog</a>
							</li>
							<li aria-current="page" class="breadcrumb-item active">Blog post</li>
						</ol>
					</nav>
				</div>
				<div id="blog-post" class="col-lg-9">
					<div class="box">
						<h1><?= $arResult['NAME']; ?></h1>
						<p class="author-date"><?= explode(' ', $arResult['TIMESTAMP_X'])[0]; ?>
						</p>
						<div id="post-content">
							<p>
								<img src="<?= $arResult['DETAIL_PICTURE']['SRC']; ?>"
										 alt="<?= $arResult['DETAIL_PICTURE']['ALT']; ?>"
										 class="img-fluid">
							</p>
							<p><?= $arResult['DETAIL_TEXT']; ?>
							</p>

						</div>

					</div>
					<!-- /.box-->
				</div>
				<!-- /#blog-post-->
				<div class="col-lg-3">
					<!--
					*** BLOG MENU ***
					_________________________________________________________
					-->
					<div class="card sidebar-menu mb-4">

					</div>
					<!-- /.col-lg-3-->
					<!-- *** BLOG MENU END ***-->

				</div>
			</div>
		</div>
	<?php
	endif; ?>

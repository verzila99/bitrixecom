<?php

	if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
		die();
	}

	use Bitrix\Main\Page\Asset;


?>
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>

	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<title><?php
			/** @var CMain $APPLICATION */
			$APPLICATION->ShowTitle(); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link
		rel="shortcut icon" type="image/x-icon" href="<?php
		echo
		SITE_TEMPLATE_PATH ?>/favicon.png">


	<!-- Стили (CSS) -->

	<?php

		Asset::getInstance()->addString(
			'<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700"
            rel="stylesheet">'
		);
		Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/vendor/bootstrap/css/bootstrap.min.css');
		Asset::getInstance()->addCss(
			SITE_TEMPLATE_PATH . '/vendor/font-awesome/css/font-awesome.min.css'
		);
		Asset::getInstance()->addCss(
			SITE_TEMPLATE_PATH . '/vendor/owl.carousel/assets/owl.carousel.css'
		);
		Asset::getInstance()->addCss(
			SITE_TEMPLATE_PATH . '/vendor/owl.carousel/assets/owl.theme.default.css'
		);
		Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/style.css');
		Asset::getInstance()->addCss(
			SITE_TEMPLATE_PATH . '/css/custom.css'
		);
		Asset::getInstance()->addJs(
			SITE_TEMPLATE_PATH . '/vendor/jquery/jquery.min.js'
		);

		Asset::getInstance()->addJs(
			SITE_TEMPLATE_PATH . '/vendor/bootstrap/js/bootstrap.bundle.min.js'
		);
		Asset::getInstance()->addJs(
			SITE_TEMPLATE_PATH . '/vendor/jquery.cookie/jquery.cookie.js'
		);
		Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/vendor/owl.carousel/owl.carousel.min.js');
		Asset::getInstance()->addJs(
			SITE_TEMPLATE_PATH . '/vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.js'
		);
		Asset::getInstance()->addJs(
			SITE_TEMPLATE_PATH . '/js/front.js'
		);
		Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/map.js');
	?>
	<!-- Tweaks for older IEs-->
	<!--[if lt IE 9]>
	Asset::getInstance()->addString(
	'
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>'
	);
	Asset::getInstance()->addString(
	'
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>'
	);
	<![endif]-->
	<?php
		$APPLICATION->ShowHead(); ?>
</head>
<body>

<!--[if lt IE 8]>
<p class="browserupgrade">Вы используете <strong>устаревший</strong> браузер.
													Пожалуйста
	<a href="http://browsehappy.com/">обновите его</a>
</p>
<![endif]-->
<div id="panel">
	<?php
		$APPLICATION->ShowPanel(); ?>
</div>
<!-- Линия с контактами -->


<!-- Шапка сайта (меню) -->

<header class="header mb-5">
	<!--
	*** TOPBAR ***
	_________________________________________________________
	-->
	<div id="top">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 offer mb-3 mb-lg-0">
					<a href="#" class="btn btn-success btn-sm">Предложение дня
					</a>
					<a href="#" class="ml-1">Получи скидку 35% при зааказе от 5000 рублей!
					</a>
				</div>
				<div class="col-lg-6 text-center text-lg-right">
					<ul class="menu list-inline mb-0">
						<?php
							$APPLICATION->IncludeComponent(
								"bitrix:sale.basket.basket.line",
								"auth",
								array(
									"HIDE_ON_BASKET_PAGES" => "N",
									"PATH_TO_AUTHORIZE" => SITE_DIR . "login/",
									"PATH_TO_BASKET" => SITE_DIR . "personal/cart/",
									"PATH_TO_ORDER" => SITE_DIR . "personal/order/make/",
									"PATH_TO_PERSONAL" => SITE_DIR . "personal/",
									"PATH_TO_PROFILE" => SITE_DIR . "personal/",
									"PATH_TO_REGISTER" => SITE_DIR . "register/",
									"POSITION_FIXED" => "N",
									"SHOW_AUTHOR" => "Y",
									"SHOW_EMPTY_VALUES" => "Y",
									"SHOW_NUM_PRODUCTS" => "N",
									"SHOW_PERSONAL_LINK" => "Y",
									"SHOW_PRODUCTS" => "N",
									"SHOW_REGISTRATION" => "Y",
									"SHOW_TOTAL_PRICE" => "N"
								)
							); ?>

					</ul>
				</div>
			</div>
		</div>
		<div
			id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true"
			class="modal fade">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Customer login</h5>
						<button type="button" data-dismiss="modal" aria-label="Close" class="close">
							<span aria-hidden="true">×</span></button>
					</div>
					<div class="modal-body">
						<form action="customer-orders.html" method="post">
							<div class="form-group">
								<input
									id="email-modal" type="text" placeholder="email"
									class="form-control">
							</div>
							<div class="form-group">
								<input
									id="password-modal" type="password" placeholder="password"
									class="form-control">
							</div>
							<p class="text-center">
								<button class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in
								</button>
							</p>
						</form>
						<p class="text-center text-muted">Not registered yet?</p>
						<p class="text-center text-muted">
							<a href="register.html"><strong>Register
																							now</strong></a>
							! It is easy and done in 1 minute and gives you
							access to special discounts and much more!
						</p>
					</div>
				</div>
			</div>
		</div>
		<!-- *** TOP BAR END ***-->


	</div>
	<nav class="navbar navbar-expand-lg">
		<div class="container">
			<a href="<?= SITE_DIR ?>" class="navbar-brand home">
				<img
					src="<?= SITE_TEMPLATE_PATH; ?>/img/logo.png" alt="Obaju logo" class="d-none
                d-md-inline-block">
				<img
					src="<?= SITE_TEMPLATE_PATH; ?>/img/logo-small.png" alt="Obaju logo"
					class="d-inline-block
                d-md-none">
				<span class="sr-only">На главную</span></a>
			<div class="navbar-buttons">
				<button
					type="button" data-toggle="collapse" data-target="#navigation"
					class="btn btn-outline-secondary navbar-toggler">
					<span class="sr-only">Toggle navigation</span><i
						class="fa fa-align-justify"></i></button>
				<button
					type="button" data-toggle="collapse" data-target="#search"
					class="btn btn-outline-secondary navbar-toggler">
					<span class="sr-only">Toggle search</span><i
						class="fa fa-search"></i></button>
				<a href="basket.html" class="btn btn-outline-secondary navbar-toggler"><i
						class="fa fa-shopping-cart"></i></a>
			</div>
			<div id="navigation" class="collapse navbar-collapse">
				<?php
					$APPLICATION->IncludeComponent(
						"bitrix:menu",
						"top_menu",
						array(
							"ROOT_MENU_TYPE" => "left",
							"MENU_CACHE_TYPE" => "A",
							"MENU_CACHE_TIME" => "36000000",
							"MENU_CACHE_USE_GROUPS" => "Y",
							"MENU_THEME" => "site",
							"CACHE_SELECTED_ITEMS" => "N",
							"MENU_CACHE_GET_VARS" => array(),
							"MAX_LEVEL" => "3",
							"CHILD_MENU_TYPE" => "left",
							"USE_EXT" => "Y",
							"DELAY" => "N",
							"ALLOW_MULTI_SELECT" => "N",
							"COMPONENT_TEMPLATE" => "top_menu"
						),
						false
					); ?>
				<div class="navbar-buttons d-flex justify-content-end nav-right">
					<!-- /.nav-collapse-->
					<div id="search-not-mobile" class="navbar-collapse collapse"></div>
					<a
						data-toggle="collapse" href="#search"
						class="btn navbar-btn btn-primary d-none d-lg-inline-block"><span
							class="sr-only">Toggle search</span><i class="fa fa-search"></i></a>
					<div id="basket-overview" class="navbar-collapse collapse d-none d-lg-block">
						<a
							href="/personal/cart" class="btn btn-primary navbar-btn"><i
								class="fa fa-shopping-cart"></i><span>
								<?php
									$APPLICATION->IncludeComponent(
										"bitrix:sale.basket.basket.line",
										"navbar",
										array(
											"HIDE_ON_BASKET_PAGES" => "N",
											"PATH_TO_BASKET" => SITE_DIR . "personal/cart/",
											"POSITION_FIXED" => "N",
											"SHOW_AUTHOR" => "N",
											"SHOW_EMPTY_VALUES" => "Y",
											"SHOW_NUM_PRODUCTS" => "Y",
											"SHOW_PERSONAL_LINK" => "N",
											"SHOW_PRODUCTS" => "N",
											"SHOW_REGISTRATION" => "N",
											"SHOW_TOTAL_PRICE" => "N"
										)
									); ?></span></a>
					</div>
				</div>
			</div>
		</div>
	</nav>
	<div id="search" class="collapse">
		<div class="container">
			<form role="search" class="ml-auto">
				<div class="input-group">
					<input type="text" placeholder="Search" class="form-control">
					<div class="input-group-append">
						<button type="button" class="btn btn-primary"><i class="fa fa-search"></i>
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</header>
<div id="all">
	<div id="content">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<!-- breadcrumb-->
					<?php
						$APPLICATION->IncludeComponent(
							"bitrix:breadcrumb",
							"aidar",
							array(
								"PATH" => "",
								"SITE_ID" => "s1",
								"START_FROM" => "0",
							),
							false
						); ?>
				</div>
			</div>

<?php

	if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
		die();
	}

?>
</div>
</div>
<div id="footer">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-6">
				<h4 class="mb-3">О Магазине</h4>
				<?
					$APPLICATION->IncludeComponent(
						"bitrix:menu",
						"bottom_menu",
						array(
							"ROOT_MENU_TYPE" => "bottom",
							"MAX_LEVEL" => "1",
							"MENU_CACHE_TYPE" => "A",
							"CACHE_SELECTED_ITEMS" => "N",
							"MENU_CACHE_TIME" => "36000000",
							"MENU_CACHE_USE_GROUPS" => "Y",
							"MENU_CACHE_GET_VARS" => array(),
						),
						false
					); ?>
				<hr>
				<h4 class="mb-3">User section</h4>
				<ul class="list-unstyled">
					<li>
						<a href="#" data-toggle="modal" data-target="#login-modal">Login</a>
					</li>
					<li>
						<a href="register.html">Regiter</a>
					</li>
				</ul>
			</div>
			<!-- /.col-lg-3-->
			<div class="col-lg-3 col-md-6">
				<h4 class="mb-3">Категории</h4>
				<?
					$APPLICATION->IncludeComponent(
						"bitrix:menu",
						"bottom_menu",
						array(
							"ROOT_MENU_TYPE" => "left",
							"MENU_CACHE_TYPE" => "A",
							"MENU_CACHE_TIME" => "36000000",
							"MENU_CACHE_USE_GROUPS" => "Y",
							"MENU_CACHE_GET_VARS" => array(),
							"CACHE_SELECTED_ITEMS" => "N",
							"MAX_LEVEL" => "1",
							"USE_EXT" => "Y",
							"DELAY" => "N",
							"ALLOW_MULTI_SELECT" => "N"
						),
						false
					); ?>
			</div>
			<!-- /.col-lg-3-->
			<div class="col-lg-3 col-md-6">
				<h4 class="mb-3">Где нас найти</h4>
				<?
					$APPLICATION->IncludeComponent(
						"bitrix:main.include",
						"",
						array(
							"AREA_FILE_SHOW" => "file",
							"PATH" => SITE_DIR . "include/company_address.php"
						),
						false
					); ?>
				<hr class="d-block d-md-none">
			</div>
			<!-- /.col-lg-3-->
			<div class="col-lg-3 col-md-6">
				<h4 class="mb-3">Рассылка</h4>
				<p class="text-muted">Получайте последние новости о наших лучшмх предложениях</p>
				<?
					$APPLICATION->IncludeComponent(
						"bitrix:sender.subscribe",
						"",
						array(
							"SET_TITLE" => "N"
						)
					); ?>
				<hr>
				<h4 class="mb-3">Оставайся на связи</h4>
				<p class="social">
					<a href="#" class="facebook external"><i
							class="fa fa-facebook"></i></a>
					<a href="#" class="twitter external"><i
							class="fa fa-twitter"></i></a>
					<a href="#"
						 class="instagram external"><i
							class="fa fa-instagram"></i></a>
					<a href="#"
						 class="gplus external"><i
							class="fa fa-google-plus"></i></a>
					<a href="#"
						 class="email external"><i
							class="fa fa-envelope"></i></a>
				</p>
			</div>
			<!-- /.col-lg-3-->
		</div>
		<!-- /.row-->
	</div>
	<!-- /.container-->
</div>
<!-- /#footer-->
<!-- *** FOOTER END ***-->


<!--
*** COPYRIGHT ***
_________________________________________________________
-->
<div id="copyright">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 mb-2 mb-lg-0">
				<p class="text-center text-lg-left">©2023 Магазин одежды.</p>
			</div>
			<div class="col-lg-6">
				<p class="text-center text-lg-right">Template design by
					<a href="https://bootstrapious.com/">Bootstrapious</a>
																						 <!-- If you want to remove this backlink, pls purchase an Attribution-free License @ https://bootstrapious.com/p/obaju-e-commerce-template. Big thanks!-->
				</p>
			</div>
		</div>
	</div>
</div>
<!-- *** COPYRIGHT END ***-->

</body>
</html>

<?

	require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
	$APPLICATION->SetTitle("О магазине");
?>

<div class="container">
	<div class="row">

		<div class="col-lg-3">
			<!--
			*** PAGES MENU ***
			_________________________________________________________
			-->
			<div class="card sidebar-menu mb-4">
				<div class="card-header">
					<h3 class="h4 card-title">О магазине</h3>
				</div>
				<div class="card-body">
					<?
						$APPLICATION->IncludeComponent(
							"bitrix:menu",
							"about_menu",
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
				</div>
			</div>
			<!-- *** PAGES MENU END ***-->

		</div>
		<div class="col-lg-9">
			<div id="text-page" class="box">
				<p class="lead">Мы рады приветствовать вас на сайте нашей компании.</p>
				<p>
					Наша компания была основана в 1993 году, а наш интернет-магазин стал одним из первых
					магазинов,
					осуществляющих on-line продажу одежды в регионе. Компания специализируется на оптовой и
					розничной
					продаже одежды как для дома, так и для офиса.
				</p>
				<p>
					На данный момент мы представляем собой крупную компанию, владеющую интернет–магазином и
					имеющую в
					своей сети единый call-центр, который регулирует всю деятельность магазина, отдел продаж,
					службу
					доставки, широкий штат квалифицированных сборщиков, собственный склад c постоянным
					наличием
					необходимого запаса товаров.
				</p>
				<p>
					За это время у нас сложились партнерские отношения с ведущими производителями, позволяющие
					предлагать высококачественную продукцию по конкурентоспособным ценам.
				</p>
				<p>
					Мы можем гордиться тем, что у нас один из самых широких ассортиментов одежды в городе и
					области.
				</p>
				<h2>Наши возможности</h2>
				<div class="row">
					<div class="col-sm-4">
						<ul>
							<li><span style="font-size:13px;">Быстрая доставка</span></li>
							<li><span style="font-size:13px;">Низкие цены</span></li>
							<li><span style="font-size:13px;">Широкий ассортимент</span></li>
							<li><span style="font-size:13px;">Бонусы и подарки</span></li>
						</ul>
					</div>
					<div class="col-sm-4">
						<ul>
							<li><span style="font-size:13px;">Отличное обслуживаение</span></li>
							<li><span style="font-size:13px;">Профессиональный менеджеры</span></li>
							<li><span style="font-size:13px;">Гарантия на все товары</span></li>
							<li><span style="font-size:13px;">Надежные поставщики</span></li>
						</ul>
					</div>
					<div class="col-sm-4">
						<ul>
							<li><span style="font-size:13px;">Сезонные скидки</span></li>
							<li><span style="font-size:13px;">Программа лояльности</span></li>
							<li><span style="font-size:13px;">Карты постоянных клиентов</span></li>
						</ul>
					</div>
				</div>
				<br>
				<p>
					Мы всегда рады общению с нашими клиентами. Если у вас есть какие-либо пожелания,
					предложения,
					замечания, касающиеся работы нашего Интернет-магазина - пишите нам, и мы с благодарностью
					примем
					ваше мнение во внимание:
				</p>
				<p>
					<b>Электронная почта</b>:
					<a href="mailto:sale@localhost">sale@localhost</a>
				</p>

			</div>
		</div>
		<!-- /.col-lg-9-->
	</div>
</div>
<?
	require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>

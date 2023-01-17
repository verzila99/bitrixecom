<?

	require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
	$APPLICATION->SetTitle("Задайте вопрос");
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
			<div id="contact" class="box">
				<h1>Контакты</h1>

				<hr>
				<div class="row">
					<div class="col-md-4">
						<h3><i class="fa fa-map-marker"></i>Адрес</h3>
						<p> г. Москва<br> ул. 2-я Хуторская <br> д. 38</p>
					</div>
					<!-- /.col-sm-4-->
					<div class="col-md-4">
						<h3><i class="fa fa-phone"></i> Телефон</h3>

						<p><strong> 8 (495) 212 85 06</strong></p>
					</div>

				</div>
				<!-- /.row-->
				<hr>
				<div id="map mb-2 embed-responsive embed-responsive-16by9">
					<iframe class="embed-responsive-item"
									width="100%"
									height="490"
									frameborder="0"
									scrolling="no"
									marginheight="0"
									marginwidth="0"
									src="https://maps.google.ru/maps?f=q&amp;source=s_q&amp;hl=ru&amp;geocode=&amp;q=%D0%B3.+%D0%9C%D0%BE%D1%81%D0%BA%D0%B2%D0%B0,+%D1%83%D0%BB.+2-%D1%8F+%D0%A5%D1%83%D1%82%D0%BE%D1%80%D1%81%D0%BA%D0%B0%D1%8F,+%D0%B4.+38%D0%90&amp;aq=&amp;sll=55,103&amp;sspn=90.84699,270.527344&amp;t=m&amp;ie=UTF8&amp;hq=&amp;hnear=2-%D1%8F+%D0%A5%D1%83%D1%82%D0%BE%D1%80%D1%81%D0%BA%D0%B0%D1%8F+%D1%83%D0%BB.,+38,+%D0%9C%D0%BE%D1%81%D0%BA%D0%B2%D0%B0,+127287&amp;ll=55.805478,37.569551&amp;spn=0.023154,0.054932&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe>
				</div>
				<div class="mb-4">
					<small>
						<a href="https://maps.google.ru/maps?f=q&amp;source=embed&amp;hl=ru&amp;geocode=&amp;q=%D0%B3.+%D0%9C%D0%BE%D1%81%D0%BA%D0%B2%D0%B0,+%D1%83%D0%BB.+2-%D1%8F+%D0%A5%D1%83%D1%82%D0%BE%D1%80%D1%81%D0%BA%D0%B0%D1%8F,+%D0%B4.+38%D0%90&amp;aq=&amp;sll=55,103&amp;sspn=90.84699,270.527344&amp;t=m&amp;ie=UTF8&amp;hq=&amp;hnear=2-%D1%8F+%D0%A5%D1%83%D1%82%D0%BE%D1%80%D1%81%D0%BA%D0%B0%D1%8F+%D1%83%D0%BB.,+38,+%D0%9C%D0%BE%D1%81%D0%BA%D0%B2%D0%B0,+127287&amp;ll=55.805478,37.569551&amp;spn=0.023154,0.054932&amp;z=14&amp;iwloc=A"
							 style="text-align:left">Просмотреть увеличенную карту
						</a>
					</small>
				</div>
				<hr>
				<h2>Задать вопрос</h2>
				<?
					$APPLICATION->IncludeComponent(
						"bitrix:main.feedback",
						"bootstrap_v4",
						array(
							"EMAIL_TO" => "sale@nyuta.bx",
							"EVENT_MESSAGE_ID" => array(),
							"OK_TEXT" => "Спасибо, ваше сообщение принято.",
							"REQUIRED_FIELDS" => array("NAME", "EMAIL"),
							"USE_CAPTCHA" => "Y"
						)
					); ?>
			</div>
		</div>
		<!-- /.col-md-9-->

	</div>
</div>


<?
	require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php") ?>

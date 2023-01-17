<?

	require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
	$APPLICATION->SetTitle("Как купить");
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
				<h1>Процедура покупки товара в нашем Интернет-магазине очень проста и состоит из нескольких
						шагов.
				</h1>
				<hr>
				<div id="accordion">
					<div class="card border-primary mb-3">
						<div id="headingOne" class="card-header p-0 border-0">
							<h4 class="mb-0">
								<a href="#"
									 data-toggle="collapse"
									 data-target="#collapseOne"
									 aria-expanded="true"
									 aria-controls="collapseOne"
									 class="btn btn-primary d-block text-left rounded-0">1. Оформление заказа
								</a>
							</h4>
						</div>
						<div id="collapseOne"
								 aria-labelledby="headingOne"
								 data-parent="#accordion"
								 class="collapse show">
							<div class="card-body">
								<p>После выбора товара нажмите кнопку <b>В корзину</b> — товар добавится в вашу
									 корзину.
								</p>

								<p>Далее, если вы закончили выбирать товар, нажмите кнопку <b>ваша корзина</b>.</p>

								<p>На странице <b>ваша корзина</b> будут перечислены все выбранные вами товары.</p>

								<p>В поле <b>Количество</b> вы пожете изменить количество товара для покупки. После
									 изменения
									 количества товара необходимо нажать кнопку <b>Пересчитать</b> для пересчета
									 итоговой суммы
									 заказа.

								<p>В колонке <b>Действия</b> над каждым товаром можно произвести следующие действия:
									 либо
									<b>удалить</b> товар из корзины, либо <b>отложить</b> товар на будущее.
								</p>

								<p>Также можно ввести код скидки в соответствующее поле.</p>

							</div>
						</div>
					</div>
					<div class="card border-primary mb-3">
						<div id="headingTwo" class="card-header p-0 border-0">
							<h4 class="mb-0">
								<a href="#"
									 data-toggle="collapse"
									 data-target="#collapseTwo"
									 aria-expanded="false"
									 aria-controls="collapseTwo"
									 class="btn btn-primary d-block text-left rounded-0">2. Оформление и подтверждение
																																			 заказа
								</a>
							</h4>
						</div>
						<div id="collapseTwo"
								 aria-labelledby="headingTwo"
								 data-parent="#accordion"
								 class="collapse">
							<div class="card-body">
								<p>После ввода необходимой информации о доставке товара (ФИО получателя, адрес
									 доставки, контактные
									 данные, вариант доставки, способ оплаты и т.д) для оформления заказа вам нужно
									 нажать кнопку <b>Оформить
																		заказ</b>.
								</p>

								<p>Копия заказа будет выслана на ваш e-mail, указанный при оформлении заказа.</p>

								<p><b>Внимание!</b> Неправильно указанный номер телефона, неточный или неполный
																		адрес могут привести
																		к дополнительной задержке! Пожалуйста, внимательно проверяйте
																		ваши персональные
																		данные при регистрации и оформлении заказа.
								</p>

								<p>Через некоторое время (обычно в течение часа) после оформления покупки, с вами
									 свяжется наш
									 менеджер по контактным данным, указанным при оформлении заказа. С менеджером
									 можно будет
									 согласовать точное время и сроки доставки, а также уточнить детали.
								</p>

								<p><b>Примечание</b>: Для постоянных клиентов на сайте магазина есть
									<b>Регистрация</b>. В своем
																		кабинете вы можете просмотреть содержимое корзины, историю своих
																		заказов, а
																		также повторить или отказаться от заказа, подписаться на
																		рассылку новостей
																		магазина.
								</p>
							</div>
						</div>
					</div>
					<div class="card border-primary">
						<div id="headingThree" class="card-header p-0 border-0">
							<h4 class="mb-0">
								<a href="#"
									 data-toggle="collapse"
									 data-target="#collapseThree"
									 aria-expanded="false"
									 aria-controls="collapseThree"
									 class="btn btn-primary d-block text-left rounded-0">3. Оплата и цены
								</a>
							</h4>
						</div>
						<div id="collapseThree"
								 aria-labelledby="headingThree"
								 data-parent="#accordion"
								 class="collapse">
							<div class="card-body">
								<p>Цены, указанные на сайте, являются окончательными и не требуют доплат при
									 стандартных условиях
									 поставки. Все налоги включены в стоимость товара.
								</p>

								<p><b>Внимание!</b> Для каждого отдельного заказа возможен только один способ оплаты
																		на ваш выбор.
																		Оплата заказа по частям различными способами невозможна.
								</p>

								<p>Возможные способы оплаты:</p>

								<ul>
									<li><b>Наличный расчет</b>.
										<br/>
																						Оплата производится наличными курьеру при доставке или в
																						магазине при
																						самовывозе. Вместе с товаром передается товарный и
																						кассовый чеки, а
																						также гарантийный талон.
									</li>

									<li><b>Оплата через Сбербанк</b>.
										<br/>
																									Вы можете оплатить заказ в любом отделении
																									Сбербанка. За услугу по
																									переводу денег с вас возьмут от 3 до 7% от
																									стоимости заказа, в
																									зависимости от региона. Перечисление денег займет
																									порядка 10 дней.
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<!-- /.accordion-->
			</div>
		</div>
		<!-- /.col-lg-9-->
	</div>
</div>

<?
	require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>

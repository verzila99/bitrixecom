<?

	include_once($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/urlrewrite.php');

	CHTTP::SetStatus("404 Not Found");
	@define("ERROR_404", "Y");
	define("HIDE_SIDEBAR", true);

	require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

	$APPLICATION->SetTitle("Страница не найдена"); ?>
<div id="error-page" class="row">
	<div class="col-md-6 mx-auto">
		<div class="box text-center py-5">
			<h3>Неправильно набран адрес, <br>или такой страницы на сайте больше не существует.</h3>
			<h4 class="text-muted">Error 404 - Page not found</h4>
			<p class="text-center">Вернитесь на
				<a href="<?= SITE_DIR ?>">главную</a>
														 или воспользуйтесь картой сайта.
			</p>
			<p class="buttons">
				<a href="/" class="btn btn-primary"><i class="fa fa-home"></i>На
																																			главную
				</a>
			</p>
		</div>
	</div>
</div>

<?
	require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>

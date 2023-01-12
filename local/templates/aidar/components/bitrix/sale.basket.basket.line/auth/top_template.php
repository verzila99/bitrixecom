<?
	if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
		die();
	}
	/**
	 * @global array $arParams
	 * @global CUser $USER
	 * @global CMain $APPLICATION
	 * @global string $cartId
	 */
	$compositeStub = (isset($arResult['COMPOSITE_STUB']) && $arResult['COMPOSITE_STUB'] == 'Y');
?>
<div class="bx-hdr-profile">
	<?
		if (!$compositeStub && $arParams['SHOW_AUTHOR'] == 'Y'): ?>
			<div class="col-lg-6 text-center text-lg-right">
				<ul class="menu list-inline mb-0">
					
					<?
						if ($USER->IsAuthorized()):
						$name = trim($USER->GetFullName());
						if (!$name) {
							$name = trim($USER->GetLogin());
						}
						if (mb_strlen($name) > 15) {
							$name = mb_substr($name, 0, 12) . '...';
						}
						?>
						<li class="list-inline-item">
							<a href="<?= $arParams['PATH_TO_PROFILE'] ?>"><?= htmlspecialcharsbx($name) ?></a>
							&nbsp;
						</li>
						<li class="list-inline-item">
							<a href="?logout=yes&<?= bitrix_sessid_get() ?>"><?= GetMessage('TSB1_LOGOUT') ?></a>
						</li>
					<?
						else:
						$arParamsToDelete = array(
							"login",
							"login_form",
							"logout",
							"register",
							"forgot_password",
							"change_password",
							"confirm_registration",
							"confirm_code",
							"confirm_user_id",
							"logout_butt",
							"auth_service_id",
							"clear_cache",
							"backurl",
						);

						$currentUrl = urlencode($APPLICATION->GetCurPageParam("", $arParamsToDelete));
						if ($arParams['AJAX'] == 'N') {
							?>
							<script type="text/javascript"><?=$cartId?>.currentUrl = '<?=$currentUrl?>';</script><?
						} else {
							$currentUrl = '#CURRENT_URL#';
						}

						$pathToAuthorize = $arParams['PATH_TO_AUTHORIZE'];
						$pathToAuthorize .= (mb_stripos($pathToAuthorize, '?') === false ? '?' : '&');
						$pathToAuthorize .= 'login=yes&backurl=' . $currentUrl;
					?>
					<li class="list-inline-item">
						<a href="<?= $pathToAuthorize ?>">
							<?= GetMessage('TSB1_LOGIN') ?>
						</a>
					</li>
					<?
						if ($arParams['SHOW_REGISTRATION'] === 'Y')
						{
						$pathToRegister = $arParams['PATH_TO_REGISTER'];
						$pathToRegister .= (mb_stripos($pathToRegister, '?') === false ? '?' : '&');
						$pathToRegister .= 'register=yes&backurl=' . $currentUrl;
					?>
					<li class="list-inline-item">
						<a href="<?= $pathToRegister ?>">
							<?= GetMessage('TSB1_REGISTER') ?>
						</a>
					</li>
				</ul>
				<?
					}
				?>
				<?
					endif ?>
			</div>
		<?
		endif ?>
</div>

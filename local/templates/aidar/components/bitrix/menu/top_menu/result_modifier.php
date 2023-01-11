<?php
  
  $arPrepItems = [];
  if (!empty($arResult)) {
    foreach ($arResult as $key => $value) {
      if ($value['DEPTH_LEVEL'] === 1) {
        $arPrepItems[] = $value;
      } else {
        $arPrepItems[end(array_keys($arPrepItems))]['subitems'][] = $value;
      }
    }
  }
  $arResult = $arPrepItems;

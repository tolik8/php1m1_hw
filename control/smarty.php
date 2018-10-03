<?php

include __DIR__ . '/../lib/smarty/3.1.33/Smarty.class.php';

$smarty = new Smarty;

// $smarty->force_compile = true;
$smarty->debugging = false;
$smarty->error_reporting = false;
$smarty->caching = false;
$smarty->cache_lifetime = 120;
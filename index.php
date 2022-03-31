<?php

use Source\core\Page;

ob_start();
session_start();

require __DIR__ . '/source/boot/config.php';
require __DIR__ . '/source/boot/functions.php';
require __DIR__ . '/source/autoload.php';

//load
(new Page())->load();


ob_end_flush();

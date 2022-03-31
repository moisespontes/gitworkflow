<?php

use Source\core\Page;

ob_start();
session_start();

require __DIR__ . '/source/autoload.php';

(new Page())->load();


ob_end_flush();

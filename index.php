<?php

$title = 'Home';

ob_start();

include_once __DIR__ . './views/home.html.php';

$output = ob_get_clean();

include_once __DIR__ . './views/layout.html.php';
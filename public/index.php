<?php

use core\Container;
use \core\env;


(new ENV(__DIR__ . '/.env'))->load();

$container = new Container;
$instance = $container->get(\core\Application::class);


<?php

require_once("./Config/_config.php");
require_once("./Core/Router/Router.php");

$router = new Router();
$router->route();

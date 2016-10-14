<?php

$_SERVER['argv'] = array(); // we'll process this later

ob_start();
require 'vendor/autoload.php';
require 'tests/CiTestCase.php';
require 'index.php';
ob_end_clean();
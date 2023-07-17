<?php

namespace App;

use App\Model\Tree;

require_once realpath("vendor/autoload.php");


$test = new Tree();
print_r($test->Test());

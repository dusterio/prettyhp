#!/usr/bin/env php
<?php

require(dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . '/bootstrap.php');

use Symfony\Component\Console\Application;

class PrettyHP extends Application {
}

$application = new PrettyHP();
$application->setName('PrettyHP - an opinionated PHP code formatter');
$application->run();

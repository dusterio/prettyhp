#!/usr/bin/env php
<?php

require(dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . '/bootstrap.php');

$application = new Symfony\Component\Console\Application();
$application->setName('PrettyHP - an opinionated PHP code formatter by Denis Mysenko');
$application->add(new \Dusterio\PrettyHP\Console\Commands\Format());
$application->run();

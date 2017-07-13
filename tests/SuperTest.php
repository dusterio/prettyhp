<?php

class SuperTest extends PHPUnit_Framework_TestCase {
    /**
     * @test
     */
    public function first()
    {
        $formatter = new \Dusterio\PrettyHP\Services\Formatter();
        $code = file_get_contents(dirname(__FILE__) . '/artifacts/test1.php');
        echo $formatter->format($code);
    }
}

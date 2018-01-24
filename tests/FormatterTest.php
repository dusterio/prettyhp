<?php

class FormatterTest extends PHPUnit_Framework_TestCase {
    /**
     * @test
     */
    public function simple_class_file_is_formatted_correctly()
    {
        $formatter = new \Dusterio\PrettyHP\Services\Formatter();
        $code = file_get_contents(dirname(__FILE__) . '/artifacts/test1.php');
        $this->assertEquals(file_get_contents(dirname(__FILE__) . '/artifacts/test1-formatted.php'), $formatter->format($code));
    }

    /**
     * @test
     */
    public function malformatted_php_file_is_returning_false()
    {
        $formatter = new \Dusterio\PrettyHP\Services\Formatter();
        $code = file_get_contents(dirname(__FILE__) . '/artifacts/test2-broken.php');
        $this->assertEquals(false, $formatter->format($code));
    }

    /**
     * @test
     */
    public function laravel_mailable_class_is_formatted_correctly()
    {
        $formatter = new \Dusterio\PrettyHP\Services\Formatter();
        $code = file_get_contents(dirname(__FILE__) . '/artifacts/test3-mailable.php');
        //echo $formatter->format($code);
        $this->assertEquals(file_get_contents(dirname(__FILE__) . '/artifacts/test3-formatted.php'), $formatter->format($code));
    }
}

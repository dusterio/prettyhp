<?php

use PhpParser\NodeTraverser;
use PhpParser\ParserFactory;
use PhpParser\PrettyPrinter;

class SuperTest extends PHPUnit_Framework_TestCase {
    /**
     * @test
     */
    public function first()
    {
        $parser        = (new ParserFactory)->create(ParserFactory::PREFER_PHP7);
        $traverser     = new NodeTraverser;
        $prettyPrinter = new PrettyPrinter\Standard;

        try {
            $code = file_get_contents(dirname(__FILE__) . '/artifacts/test1.php');

            // parse
            $stmts = $parser->parse($code);

            // pretty print
            $code = $prettyPrinter->prettyPrintFile($stmts);

            echo $code;
        } catch (PhpParser\Error $e) {
            echo 'Parse Error: ', $e->getMessage();
        }
    }
}
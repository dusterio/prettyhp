<?php

use PhpParser\ParserFactory;
use Dusterio\PrettyHP\Formatters\Pretty;

class SuperTest extends PHPUnit_Framework_TestCase {
    protected $priorities = [
        PhpParser\Node\Stmt\Use_::class => 1,
        PhpParser\Node\Stmt\Namespace_::class => 0,
    ];

    /**
     * @test
     */
    public function first()
    {
        $parser        = (new ParserFactory)->create(ParserFactory::PREFER_PHP7);
        $prettyPrinter = new Pretty;

        try {
            $code = file_get_contents(dirname(__FILE__) . '/artifacts/test1.php');

            $stmts = $parser->parse($code);

            uasort($stmts, function($nodeA, $nodeB) {
                $classA = get_class($nodeA);
                $classB = get_class($nodeB);

                $priorityA = isset($this->priorities[$classA]) ? $this->priorities[$classA] : 255;
                $priorityB = isset($this->priorities[$classB]) ? $this->priorities[$classB] : 255;

                if ($priorityA == $priorityB) {
                    return 0;
                }
                return ($priorityA < $priorityB) ? -1 : 1;
            });

            $code = $prettyPrinter->prettyPrintFile($stmts);

            echo $code;
        } catch (PhpParser\Error $e) {
            echo 'Parse Error: ', $e->getMessage();
        }
    }
}

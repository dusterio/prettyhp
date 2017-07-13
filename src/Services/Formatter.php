<?php

namespace Dusterio\PrettyHP\Services;

use PhpParser\ParserFactory;
use Dusterio\PrettyHP\Formatters\Pretty;

/**
 * Class Formatter
 * @package Dusterio\PrettyHP\Services
 */
class Formatter
{
    protected $priorities = [
        \PhpParser\Node\Stmt\Use_::class => 1,
        \PhpParser\Node\Stmt\Namespace_::class => 0,
    ];

    /**
     * @param string $input
     * @return string
     */
    public function format($input) {
        $parser = (new ParserFactory)->create(ParserFactory::PREFER_PHP7);
        $prettyPrinter = new Pretty;

        $statements = $parser->parse($input);

        uasort($statements, function($nodeA, $nodeB) {
            $classA = get_class($nodeA);
            $classB = get_class($nodeB);

            $priorityA = isset($this->priorities[$classA]) ? $this->priorities[$classA] : 255;
            $priorityB = isset($this->priorities[$classB]) ? $this->priorities[$classB] : 255;

            if ($priorityA == $priorityB) {
                return 0;
            }

            return ($priorityA < $priorityB) ? -1 : 1;
        });

        return $prettyPrinter->prettyPrintFile($statements);
    }
}
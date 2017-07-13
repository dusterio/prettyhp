<?php

namespace Dusterio\PrettyHP\Formatters;

use PhpParser\Comment;
use PhpParser\Node;
use PhpParser\Node\Expr;
use PhpParser\Node\Stmt;
use PhpParser\PrettyPrinter\Standard;

class Pretty extends Standard
{
    /**
     * Pretty prints an array of nodes (statements) and indents them optionally.
     *
     * @param Node[] $nodes  Array of nodes
     * @param bool   $indent Whether to indent the printed nodes
     *
     * @return string Pretty printed statements
     */
    protected function pStmts(array $nodes, $indent = true) {
        $result = '';

        foreach ($nodes as $key => $node) {
            $comments = $node->getAttribute('comments', array());
            if ($comments) {
                if ($node instanceof Stmt\ClassMethod) $result .= "\n";
                $result .= "\n" . $this->pComments($comments);
                if ($node instanceof Stmt\Nop) {
                    continue;
                }
            }

            if ($node instanceof Stmt\Class_ && $nodes[$key - 1] instanceof Stmt\Use_) $result .= "\n";
            $result .= "\n" . $this->p($node) . ($node instanceof Expr ? ';' : '');
        }

        if ($indent) {
            return preg_replace('~\n(?!$|' . $this->noIndentToken . ')~', "\n    ", $result);
        } else {
            return $result;
        }
    }

    /**
     * Prints reformatted text of the passed comments.
     *
     * @param Comment[] $comments List of comments
     *
     * @return string Reformatted text of comments
     */
    protected function pComments(array $comments) {
        $formattedComments = [];

        foreach ($comments as $comment) {
            $formattedComments[] = $comment->getReformattedText();
        }

        $comments = implode("\n", $formattedComments);

        return preg_replace('/(\*\n\s*\*\s*\n)/', '', $comments);
    }
}

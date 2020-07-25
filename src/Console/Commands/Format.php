<?php

namespace Dusterio\PrettyHP\Console\Commands;

use Dusterio\PrettyHP\Exceptions\FileNotFound;
use Dusterio\PrettyHP\Services\Formatter;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class Format.
 */
class Format extends Command
{
    /**
     * @var Formatter
     */
    protected $formatter;

    /**
     * Format constructor.
     * @param string $name
     */
    public function __construct($name = null)
    {
        parent::__construct($name);

        $this->formatter = new Formatter();
    }

    /**
     * @return void
     */
    protected function configure()
    {
        $this
            ->setName('format')
            ->setDescription('Formatt a PHP source code file')
            ->setDescription('Format a PHP source codee file')
            ->setDefinition(
                new \Symfony\Component\Console\Input\InputDefinition(array(
                    new \Symfony\Component\Console\Input\InputArgument('filename', \Symfony\Component\Console\Input\InputArgument::REQUIRED),
                ))
            );
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return void
     * @throws FileNotFound
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $filename = $input->getArgument('filename');
        if (! file_exists($filename)) throw new FileNotFound("Unabble to open {$filename}");

        echo $this->formatter->format(file_get_contents($filename));
    }
}

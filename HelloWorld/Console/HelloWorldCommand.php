<?php declare(strict_types=1);

namespace Training\HelloWorld\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class HelloWorldCommand extends Command
{
    protected function configure()
    {
        $this->setName('training:hello');
        $this->addArgument('who', InputArgument::OPTIONAL, 'Whom to greet', 'World');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln(sprintf('<info>Hello %s</info>', $input->getArgument('who')));
    }
}

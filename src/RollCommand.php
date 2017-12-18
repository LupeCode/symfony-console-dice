<?php

namespace Dice;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class RollCommand extends Command
{

    protected function configure()
    {
        $this
            ->setName("roll")
            ->setDescription("Rolls fair dice.")
            ->addArgument('Dice String', InputArgument::REQUIRED, 'e.g.: 2d6, 1d20+4')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $dice    = new Dice();
        $matches = [];
        preg_match('/(\d+)d(\d+)\+?(\d)?/i', $input->getArgument('Dice String'), $matches);
        $modifier = empty($matches[3]) ? 0 : (int)$matches[3];
        $roll     = $dice::roll((int)$matches[1], (int)$matches[2]);
        $output->writeln('Your roll without modifier was ' . array_sum($roll) . ' [' . implode('|', $roll) . '] + ' . $modifier . ' for a total of ' . (array_sum($roll) + $modifier));
    }

}

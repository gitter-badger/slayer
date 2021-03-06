<?php

namespace Bootstrap\Console;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class MakeConsoleCommand extends SlayerCommand
{
    protected $name = 'make:console';

    protected $description = 'Generate a new console';

    public function slash()
    {
        $arg_name = ucfirst($this->input->getArgument('name'));

        $stub = file_get_contents(__DIR__ . '/stubs/makeConsole.stub');
        $stub = str_replace('{consoleName}', $arg_name, $stub);

        $file_name = $arg_name . 'ConsoleCommand.php';
        chdir(config()->path->consoleDir);
        $this->comment('Crafting Console...');

        if (file_exists($file_name)) {
            $this->error('   Console already exists!');
        } else {
            file_put_contents($file_name, $stub);
            $this->info('   Console has been created!');
        }
    }

    protected function arguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'Console name to be used'],
        ];
    }

}
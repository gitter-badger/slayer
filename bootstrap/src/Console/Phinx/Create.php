<?php

namespace Bootstrap\Console\Phinx;

class Create extends \Phinx\Console\Command\Create
{
    protected function configure()
    {
        parent::configure();

        $this->setName('phinx:create');
    }
}
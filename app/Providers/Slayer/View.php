<?php

namespace App\Providers\Slayer;

use Bootstrap\Services\Service\ServiceProvider;
use Bootstrap\Support\Phalcon\Mvc\View as PhalconView;
use Bootstrap\Laravel\Blade\BladeAdapter;
use Phalcon\Mvc\View\Engine\Volt as PhalconVoltEngine;

class View extends ServiceProvider
{
    protected $_alias = 'view';

    protected $_shared = false;

    public function register()
    {
        $view = new PhalconView();
        $view->setViewsDir(config()->path->viewsDir);

        $view->registerEngines([

            '.volt' => 
                function ($view, $di) {
                    $volt = new PhalconVoltEngine($view, $di);

                    $volt->setOptions([
                        'compiledPath' => config()->path->storageViewDir,
                        'compiledSeparator' => '_',
                    ]);

                    $compiler = $volt->getCompiler();

                    # others
                    $compiler->addFunction('env', 'env');
                    $compiler->addFunction('echo_pre', 'echo_pre');
                    $compiler->addFunction('csrf_field', 'csrf_field');
                    $compiler->addFunction('dd', 'dd');
                    $compiler->addFunction('config', 'config');

                    # facade
                    $compiler->addFunction('security', 'security');
                    $compiler->addFunction('tag', 'tag');
                    $compiler->addFunction('route', 'route');
                    $compiler->addFunction('response', 'response');
                    $compiler->addFunction('view', 'view');
                    $compiler->addFunction('config', 'config');
                    $compiler->addFunction('url', 'url');
                    $compiler->addFunction('request', 'request');

                    # paths
                    $compiler->addFunction('base_uri', 'base_uri');

                    return $volt;
                },

            '.phtml' => 
                'Phalcon\Mvc\View\Engine\Php',
        ]);

      return $view;
    }

}
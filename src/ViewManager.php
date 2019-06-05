<?php

namespace App;

use Twig;

class ViewManager
{

    private $twig;

    public function __construct()
    {
        $loader = new \Twig\Loader\FileSystemLoader(dirname(__DIR__).'\templates');

        $this -> twig = new \Twig\Enviroment($loader, [
            'cache' => dirname(__DIR__).'\cache\views'
        ]);
    }

    public function render ($view, $args = [])
    {
        if ($args !=null)
        {
            extract($args, EXTR_SKIP);
        }
        $file = dirname(__DIR__)."/templates/".$view;
        if (is_readeable($file))
        {
            require $file;
        } else {
                    throw new \InvalidArgumentException();
                }
    }

    public function renderTemplate ($template, $args=[])
        {
            echo $this -> twig -> render($template, $args);
        }
}
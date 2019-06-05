<?php

namespace App;
use DI\Container;
use App\config\Config;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\Common\Annotations\AnnotationRegistry;

class DoctrineManager {

    private $container;
    private $em;

    public function __construct(Container $container)
    {
        $this -> container = $container;
        $dbconfig = Config::getDB();
        $path = [
            dirname(__DIR__).'\models\Entities',
            dirname(__DIR__).'\models\Repositories'
        ];
        $isDevMode = true;
        $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode, null, null, false);
        AnnotationRegistry::registerLoader('class_exists');
        $this -> em = EntityManager::create($dbconfig, $config);
    }
}
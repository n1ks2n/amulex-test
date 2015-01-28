<?php
/**
 * User: Nikita Pimoshenko <nikita.pimoshenko@yandex.ru>
 * Date: 28.01.15
 * Time: 19:18
 */
class Application
{
    const MAIN_CONFIG_FILE_PATH = '/../config/main.php';

    /**
     * @var Routing $routing
     */
    private $routing;

    public function __construct()
    {
        try {
            $this->includeCoreFiles();
            $this->initRouting();
        } catch(Exception $e) {
            $e->__toString();
        }
    }

    protected function includeCoreFiles()
    {
        if (!file_exists(__DIR__.self::MAIN_CONFIG_FILE_PATH)) {
            throw new Exception('Check configuration file /config/main.php.');
        } else {
            $mainConfig = require_once __DIR__.self::MAIN_CONFIG_FILE_PATH;
            foreach ($mainConfig as $value) {
                foreach ($value as $includePaths) {
                    if (strpos($includePaths, '.php', strlen($includePaths) - 4) === false) {
                        preg_match('/^[\/a-zA-Z\/.]+/', $includePaths, $match);
                        if (!is_dir(__DIR__.'/../'.$match[0])) {
                            throw new Exception('Check directory '.$match.' existence.');
                        } else {
                            foreach( glob(__DIR__.'/../'.$match[0].'*.php') as $file) {
                                include $file;
                            }
                        }
                    } else {
                        include __DIR__.'/../'.$includePaths;
                    }
                }
            }
        }
    }

    public function initRouting()
    {
        $this->routing = new Routing();
    }

    public function run()
    {
        try{
            $this->routing->findRoute();
        } catch(Exception $e) {
            echo $e->__toString();
        }
    }
} 
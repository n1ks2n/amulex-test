<?php
/**
 * User: Nikita Pimoshenko <nikita.pimoshenko@yandex.ru>
 * Date: 28.01.15
 * Time: 18:39
 */

class DataBaseModel 
{
    const CONFIG_FILE_PATH = '/../config/db.php';

    protected $dbLink;

    public function __construct()
    {
        $config = require __DIR__ . self::CONFIG_FILE_PATH;
        $this->dbLink = mysql_connect($config['host'], $config['user'], $config['password']);
        mysql_select_db($config['dbname'],$this->dbLink);
    }
} 
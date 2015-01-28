<?php
/**
 * User: Nikita Pimoshenko <nikita.pimoshenko@yandex.ru>
 * Date: 28.01.15
 * Time: 19:11
 */

class Controller 
{
    public function render($template, $data = array())
    {
        if(!file_exists(__DIR__.'/../../templates/'.$template.'.php'))
            throw new Exception("Template {$template} not found in /templates directory. Check it's existence");

        foreach($data as $key => $value)
        {
            $$key = $value;
        }

        require_once __DIR__.'/../../templates/'.$template.'.php';
        require_once __DIR__.'/../../templates/layout.php';
    }


    public function renderPartial($template, $data = array())
    {
        if(!file_exists(__DIR__.'/../../templates/'.$template.'.php'))
            throw new Exception("Template {$template} not found in /templates directory. Check it's existence");

        foreach($data as $key => $value)
        {
            $$key = $value;
        }

        require_once __DIR__.'/../../templates/'.$template.'.php';
    }

    public function defaultError(Exception $e)
    {
        $message = $e->__toString();
        require_once __DIR__.'/../templates/error.php';
        require_once __DIR__.'/../templates/layout.php';
    }
} 
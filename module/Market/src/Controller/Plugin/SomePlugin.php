<?php 
namespace Market\Controller\Plugin;

use Zend\Mvc\Controller\Plugin\AbstractPlugin;

class SomePlugin extends AbstractPlugin
{
    public function getSomething()
    {
        return 'something';
    }
}
<?php 
namespace Market\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public $categories;
    
    public function indexAction()
    {
        $userLoggedin = true;
        
        if (!$userLoggedin) {
            //return $this->redirect()->toRoute('home');
        }
        
        /*
         * Lab: Using a Custom Controller Plugin
         */
        $pluginResult = $this->somePlugin()->getSomething();
        
        return new ViewModel([
            'pluginResult' => $pluginResult,
            'categories' => $this->categories,
        ]);
    }
    
    public function setCategories(array $categories)
    {
        $this->categories = $categories;
    }
}
?>
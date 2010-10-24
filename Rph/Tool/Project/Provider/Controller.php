<?php
require_once 'Zend/Tool/Project/Provider/Controller.php';
require_once 'Zend/Tool/Project/Provider/Model.php';
require_once 'Zend/Tool/Project/Provider/DbTable.php';
require_once 'Zend/Tool/Project/Provider/Form.php';

class Rph_Tool_Project_Provider_Controller
	extends Zend_Tool_Project_Provider_Controller
{
	protected $_resourceName;    
	protected $_moduleName;
	
	public function getName()
    {
        // provider name
        return 'Scaffold';
    }
 
    public function create($resourceName, $module = null)
    {
	parent::create($resourceName . 's', true, $module);
	$this->_resourceName = $resourceName;
	$this->_moduleName = $module;
	
	$modelProvider = new Zend_Tool_Project_Provider_Model();
	$modelProvider->setRegistry($this->_registry);
	$modelProvider->create($this->_resourceName, $this->_moduleName);
	
	$dbTableProvider = new Zend_Tool_Project_Provider_DbTable();
	$dbTableProvider->setRegistry($this->_registry);
	$dbTableProvider->create($this->_resourceName, $this->_resourceName . 's', $this->_moduleName);

	$formProvider = new Zend_Tool_Project_Provider_Form();
	$formProvider->setRegistry($this->_registry);
	$formProvider->create($this->_resourceName, $this->_moduleName);

        $response = $this->_registry->getResponse();
        
        try {
			$controllerResource = self::createResource($this->_loadedProfile, $resourceName, $module);
			
			//index created on superclass::create
			$this->_createAction('new');
			$this->_createAction('edit');
			$this->_createAction('destroy');

               /* $testControllerResource = Zend_Tool_Project_Provider_Test::createApplicationResource(
					$this->_loadedProfile, $name, 'update', $module);
			 	$response->appendContent('Creating a controller test file at ' . 
					$testControllerResource->getContext()->getPath());
                $testControllerResource->create();*/
 

        } catch (Exception $e) {
            $response->setException($e);
            return;
        }
    }
	
	function _createAction($actionName)
	{
		$response = $this->_registry->getResponse();		

		$indexActionResource = Zend_Tool_Project_Provider_Action::createResource(
					$this->_loadedProfile, $actionName, $this->_resourceName . 's',
					$this->_moduleName);
		$response->appendContent("Creating an $actionName action method in controller " . 
					$this->_resourceName);                
                $indexActionResource->create();


        $indexActionViewResource = Zend_Tool_Project_Provider_View::createResource(
					$this->_loadedProfile, $actionName, $this->_resourceName . 's',
					$this->_moduleName);
		$response->appendContent("Creating a view script for the $actionName action method at " . 
					$indexActionViewResource->getContext()->getPath());
        $indexActionViewResource->create();
	}
	
}

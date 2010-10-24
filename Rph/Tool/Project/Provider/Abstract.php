<?php
require_once 'Zend/Tool/Project/Provider/Abstract.php';

class Rph_Tool_Project_Provider_Abstract
    extends Zend_Tool_Project_Provider_Abstract
{

    /**
     * constructor
     */
    public function __construct()
    {
        parent::__construct();

        // load My Context elements
        $contextRegistry = Zend_Tool_Project_Context_Repository::getInstance();
        $contextRegistry->addContextsFromDirectory(
            dirname(dirname(__FILE__)) . '/Context/My/', 'Rph_Tool_Project_Context_My_'
        );
    }
}

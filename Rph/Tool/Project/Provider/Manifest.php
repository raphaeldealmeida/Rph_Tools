<?php
require_once realpath(dirname(__FILE__)) . '/RphProvider.php';
require_once realpath(dirname(__FILE__)) . '/Controller.php';

class Rph_Tool_Project_Provider_Manifest
    implements Zend_Tool_Framework_Manifest_ProviderManifestable
{
    /**
     * Returns the list of all available providers
     *
     * @return array
     */
    public function getProviders()
    {
        return array(
                new Rph_Tool_Project_Provider_RphProvider,
		new Rph_Tool_Project_Provider_Controller
        );
    }
}


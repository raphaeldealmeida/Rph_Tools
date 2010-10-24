<?php
require_once 'Rph/Tool/Project/Provider/Abstract.php';
//require_once 'Zend/Tool/Framework/Provider/Pretendable.php';


class Rph_Tool_Project_Provider_RphProvider
    extends Rph_Tool_Project_Provider_Abstract
//    extends Zend_Tool_Project_Provider_Abstract
    implements Zend_Tool_Framework_Provider_Pretendable
{
    public function getName()
    {
        // provider name
        return 'Rph';
    }

    public function say()
    {
        echo "Hello!";
    }

    public function create($name = "base")
    {
        // load project profile
        $profile = $this->_loadProfile(self::NO_PROFILE_THROW_EXCEPTION);
        // search projectDirectory information
        $profileSearchParams = array('projectDirectory');
        $projectDirectory   = $profile->search($profileSearchParams);
        
        if (!($projectDirectory instanceof Zend_Tool_Project_Profile_Resource)) {
            throw new Zend_Tool_Project_Provider_Exception(
                'A project directory was not found'
                );
        }
 
        /* ... do project stuff here */
        /* write custom data to project profile and create myth directory */
        $mythDirectory   = $projectDirectory->search(array('mythDirectory'));
        if (!($mythDirectory instanceof Zend_Tool_Project_Profile_Resource)) {
            $mythDirectory = $projectDirectory->createResource('mythDirectory', array('filesystemName' => 'myth')); echo 'aqui';
            $mythDirectory -> create();
        }
        
        /* write new MythClass */
        /*@var Zend_Tool_Project_Profile_Resource $newMyth*/
        $newMyth = $mythDirectory->createResource(
            'mythFile', 
            array('mythName' => $name)
            );
 
        $newMyth->create();
        $this->_storeProfile();
    }
}


<?php
require_once 'Zend/Tool/Project/Context/Filesystem/Directory.php';

class Rph_Tool_Project_Context_My_MythDirectory extends Zend_Tool_Project_Context_Filesystem_Directory
{
    /**
     * @var string
     */
    protected $_filesystemName = 'myth';

    public function getName()
    {
        return 'MythDirectory';
    }
}

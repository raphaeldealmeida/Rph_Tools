<?php
class Rph_Tool_Project_Context_My_MythFile extends Zend_Tool_Project_Context_Zf_AbstractClassFile
{
    protected $_mythName = 'Base';

    protected $_filesystemName = 'mythName';

    public function init()
    {
        $this->_mythName = $this->_resource->getAttribute('mythName');
        $this->_filesystemName = ucfirst($this->_mythName) . '.php';
        parent::init();
    }

    public function getPersistentAttributes()
    {
        return array(
            'mythName' => $this->getMythName()
            );
    }

    public function getName()
    {
        return 'MythFile';
    }

    public function getMythName()
    {
        return $this->_mythName;
    }

    public function getContents()
    {

        $className = 'Myth_'.ucfirst(strtolower($this->_mythName));

        $codeGenFile = new Zend_CodeGenerator_Php_File(array(
            'fileName' => $this->getPath(),
            'classes' => array(
                new Zend_CodeGenerator_Php_Class(array(
                    'name' => $className,
                    'methods' => array(
                        new Zend_CodeGenerator_Php_Method(array(
                            'name' => '__construct',
                            'body' => '/* Myth Here ... */',
                            ))
                        )

                    ))
                )
            ));
        return $codeGenFile->generate();
    }
}

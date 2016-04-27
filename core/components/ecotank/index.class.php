<?php

/**
 * Class ecotankMainController
 */
abstract class ecotankMainController extends modExtraManagerController
{
    /** @var ecotank $ecotank */
    public $ecotank;


    /**
     * @return void
     */
    public function initialize()
    {
        $corePath = $this->modx->getOption('ecotank_core_path', null,
            $this->modx->getOption('core_path') . 'components/ecotank/');
        require_once $corePath . 'model/ecotank/ecotank.class.php';

        $this->ecotank = new ecotank($this->modx);
        $this->ecotank->initialize($this->modx->context->key);

        $this->ecotank->Tools->addFilesController($this, array(
            'css'    => true,
            'config' => true,
            'tools'  => true,
        ));

        parent::initialize();
    }


    /**
     * @return array
     */
    public function getLanguageTopics()
    {
        return array('ecotank:default');
    }


    /**
     * @return bool
     */
    public function checkPermissions()
    {
        return true;
    }
}


/**
 * Class IndexManagerController
 */
class IndexManagerController extends ecotankMainController
{

    /**
     * @return string
     */
    public static function getDefaultController()
    {
        return 'main';
    }
}
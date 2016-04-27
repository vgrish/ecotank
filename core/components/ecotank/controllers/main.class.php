<?php

require_once dirname(dirname(__FILE__)) . '/index.class.php';

class ControllersMainManagerController extends ecotankMainController
{

    public static function getDefaultController()
    {
        return 'main';
    }

}

class ecotankMainManagerController extends ecotankMainController
{

    public function getPageTitle()
    {
        return $this->modx->lexicon('ecotank') . ' :: ' . $this->modx->lexicon('ecotank_main');
    }

    public function getLanguageTopics()
    {
        return array('ecotank:default');
    }

    public function loadCustomCssJs()
    {

        $this->ecotank->Tools->addFilesController($this, array(
            'main'    => true,
            'tank'    => true,
            'biotank' => true,
            'unitank' => true,
            'microb'  => true,
            'pogreb'  => true,
        ));

        $script = 'Ext.onReady(function() {
			MODx.add({ xtype: "ecotank-panel-main"});
		});';
        $this->addHtml("<script type='text/javascript'>{$script}</script>");

        $this->modx->invokeEvent('ecotankOnManagerCustomCssJs', array('controller' => &$this, 'page' => 'main'));

    }

    public function getTemplateFile()
    {
        return $this->ecotank->config['templatesPath'] . 'main.tpl';
    }

}

// MODX 2.3
class ControllersMgrMainManagerController extends ControllersMainManagerController
{

    public static function getDefaultController()
    {
        return 'main';
    }

}

class ecotankMgrMainManagerController extends ecotankMainManagerController
{

}

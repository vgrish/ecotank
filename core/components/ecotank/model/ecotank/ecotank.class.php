<?php

/**
 * The base class for ecotank.
 */
class ecotank
{
    /** @var modX $modx */
    public $modx;
    /** @var mixed|null $namespace */
    public $namespace = 'ecotank';
    /** @var array $config */
    public $config = array();
    /** @var array $initialized */
    public $initialized = array();
    /** @var Tools $Tools */
    public $Tools;


    /**
     * @param modX  $modx
     * @param array $config
     */
    function __construct(modX &$modx, array $config = array())
    {
        $this->modx =& $modx;

        $corePath = $this->getOption('core_path', $config,
            $this->modx->getOption('core_path', null, MODX_CORE_PATH) . 'components/ecotank/');
        $assetsPath = $this->getOption('assets_path', $config,
            $this->modx->getOption('assets_path', null, MODX_ASSETS_PATH) . 'components/ecotank/');
        $assetsUrl = $this->getOption('assets_url', $config,
            $this->modx->getOption('assets_url', null, MODX_ASSETS_URL) . 'components/ecotank/');
        $connectorUrl = $assetsUrl . 'connector.php';

        $this->config = array_merge(array(
            'namespace'      => $this->namespace,
            'assetsBasePath' => MODX_ASSETS_PATH,
            'assetsBaseUrl'  => MODX_ASSETS_URL,

            'assetsUrl'    => $assetsUrl,
            'cssUrl'       => $assetsUrl . 'css/',
            'jsUrl'        => $assetsUrl . 'js/',
            'imagesUrl'    => $assetsUrl . 'images/',
            'connectorUrl' => $connectorUrl,

            'corePath'     => $corePath,
            'modelPath'    => $corePath . 'model/',
            'handlersPath' => $corePath . 'handlers/',

            'chunksPath'     => $corePath . 'elements/chunks/',
            'templatesPath'  => $corePath . 'elements/templates/mgr/',
            'chunkSuffix'    => '.chunk.tpl',
            'snippetsPath'   => $corePath . 'elements/snippets/',
            'processorsPath' => $corePath . 'processors/'
        ), $config);

        $this->modx->addPackage('ecotank', $this->getOption('modelPath'));
        $this->modx->lexicon->load('ecotank:default');
        $this->namespace = $this->getOption('namespace', $config, 'ecotank');

    }

    /**
     * @param       $n
     * @param array $p
     */
    public function __call($n, array$p)
    {
        echo __METHOD__ . ' says: ' . $n;
    }

    /**
     * @param       $key
     * @param array $config
     * @param null  $default
     *
     * @return mixed|null
     */
    public function getOption($key, $config = array(), $default = null, $skipEmpty = false)
    {
        $option = $default;
        if (!empty($key) AND is_string($key)) {
            if ($config != null AND array_key_exists($key, $config)) {
                $option = $config[$key];
            } elseif (array_key_exists($key, $this->config)) {
                $option = $this->config[$key];
            } elseif (array_key_exists("{$this->namespace}_{$key}", $this->modx->config)) {
                $option = $this->modx->getOption("{$this->namespace}_{$key}");
            }
        }
        if ($skipEmpty AND empty($option)) {
            $option = $default;
        }

        return $option;
    }


    /**
     * Initializes component into different contexts.
     *
     * @param string $ctx The context to load. Defaults to web.
     * @param array  $scriptProperties
     *
     * @return boolean
     */
    public function initialize($ctx = 'web', $scriptProperties = array())
    {
        $this->config = array_merge($this->config, $scriptProperties, array('ctx' => $ctx));
        $this->modx->error->reset();
        if (!$this->Tools) {
            $this->loadTools();
        }
        if (!empty($this->initialized[$ctx])) {
            return true;
        }

        //$this->modx->log(1, print_r($this->config, 1));

        switch ($ctx) {
            case 'mgr':
                break;
            default:
                if (!defined('MODX_API_MODE') OR !MODX_API_MODE) {
                    $config = $this->modx->toJSON(array(
                        'assetsBaseUrl' => $this->getOption('assetsBaseUrl', $this->config),
                        'assetsUrl'     => $this->getOption('assetsUrl', $this->config),
                        'actionUrl'     => $this->getOption('actionUrl', $this->config)
                    ));

                    $script = "<script type=\"text/javascript\">paymentsystemConfig={$config}</script>";
                    if (!isset($this->modx->jscripts[$script])) {
                        $this->modx->regClientStartupScript($script, true);
                    }

                    $this->initialized[$ctx] = true;

                }
                break;
        }

        return true;
    }

    /**
     * Loads an instance of Tools
     *
     * @return boolean
     */
    public function loadTools()
    {
        if (!is_object($this->Tools) OR !($this->Tools instanceof ecotankToolsInterface)) {
            $toolsClass = $this->modx->loadClass('tools.Tools', $this->config['handlersPath'], true, true);
            if ($derivedClass = $this->getOption('class_tools_handler', null, '')) {
                if ($derivedClass = $this->modx->loadClass('tools.' . $derivedClass, $this->config['handlersPath'], true, true)) {
                    $toolsClass = $derivedClass;
                }
            }
            if ($toolsClass) {
                $this->Tools = new $toolsClass($this->modx, $this->config);
            }
        }

        return !empty($this->Tools) AND $this->Tools instanceof ecotankToolsInterface;
    }

}
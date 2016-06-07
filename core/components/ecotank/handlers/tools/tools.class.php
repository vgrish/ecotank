<?php


interface ecotankToolsInterface
{


    /**
     * @param       $key
     * @param array $config
     * @param null  $default
     * @param bool  $skipEmpty
     *
     * @return mixed
     */
    public function getOption($key, $config = array(), $default = null, $skipEmpty = false);

    /**
     * @param       $message
     * @param array $placeholders
     *
     * @return mixed
     */
    public function lexicon($message, $placeholders = array());


    /**
     * @param array $data
     * @param array $options
     *
     * @return mixed
     */
    public function setCache($data = array(), $options = array());

    /**
     * @param array $options
     *
     * @return mixed
     */
    public function getCache($options = array());

    /**
     * @param array $options
     *
     * @return mixed
     */
    public function clearCache($options = array());

    /**
     * @param array $options
     *
     * @return mixed
     */
    public function getCacheOptions($options = array());

    /**
     * @param array $options
     *
     * @return mixed
     */
    public function getCacheKey($options = array());

    /**
     * @param string $message
     * @param array  $data
     * @param array  $placeholders
     *
     * @return mixed
     */
    public function failure($message = '', $data = array(), $placeholders = array());

    /**
     * @param string $message
     * @param array  $data
     * @param array  $placeholders
     *
     * @return mixed
     */
    public function success($message = '', $data = array(), $placeholders = array());

    /**
     * @param modManagerController $controller
     * @param array                $opts
     *
     * @return mixed
     */
    public function addFilesController(modManagerController $controller, array $opts = array());

}

/**
 * Class Tools
 */
class Tools implements ecotankToolsInterface
{

    /** @var modX $modx */
    protected $modx;
    /** @var ecotank $ecotank */
    protected $ecotank;
    /** @var $namespace */
    protected $namespace;
    /** @var array $config */
    public $config = array();

    /**
     * @param $modx
     * @param $config
     */
    public function __construct($modx, &$config)
    {
        $this->modx = $modx;
        $this->config =& $config;

        $corePath = $this->modx->getOption('ecotank_core_path', null,
            $this->modx->getOption('core_path', null, MODX_CORE_PATH) . 'components/ecotank/');
        /** @var ecotank $ecotank */
        $this->ecotank = $this->modx->getService(
            'ecotank',
            'ecotank',
            $corePath . 'model/ecotank/',
            array(
                'core_path' => $corePath
            )
        );

        $this->namespace = $this->ecotank->namespace;
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
        return $this->ecotank->getOption($key, $config, $default, $skipEmpty);
    }

    /** @inheritdoc} */
    public function lexicon($message, $placeholders = array())
    {
        return $this->ecotank->lexicon($message, $placeholders);
    }

    /**
     * Sets data to cache
     *
     * @param mixed $data
     * @param mixed $options
     *
     * @return string $cacheKey
     */
    public function setCache($data = array(), $options = array())
    {
        return $this->ecotank->setCache($data, $options);
    }

    /**
     * Returns data from cache
     *
     * @param mixed $options
     *
     * @return mixed
     */
    public function getCache($options = array())
    {
        return $this->ecotank->getCache($options);
    }


    /**
     * @param array $options
     *
     * @return bool
     */
    public function clearCache($options = array())
    {
        return $this->ecotank->clearCache($options);
    }

    /**
     * Returns array with options for cache
     *
     * @param $options
     *
     * @return array
     */
    public function getCacheOptions($options = array())
    {
        return $this->ecotank->getCacheOptions($options);
    }

    /**
     * Returns key for cache of specified options
     *
     * @var mixed $options
     * @return bool|string
     */
    public function getCacheKey($options = array())
    {
        return $this->ecotank->getCacheKey($options);
    }

    /** @inheritdoc} */
    public function failure($message = '', $data = array(), $placeholders = array())
    {
        return $this->ecotank->failure($message, $data, $placeholders);
    }

    /** @inheritdoc} */
    public function success($message = '', $data = array(), $placeholders = array())
    {
        return $this->ecotank->success($message, $data, $placeholders);
    }

    /**
     * @param modManagerController $controller
     * @param array                $opts
     */
    public function addFilesController(modManagerController $controller, array $opts = array())
    {
        $controller->addLexiconTopic('ecotank:default');

        $config = $this->config;

        $objects = array();
        foreach (array('resource') as $key) {
            if (isset($config[$key]) AND is_object($config[$key]) AND $config[$key] instanceof xPDOObject) {
                /** @var $objects xPDOObject[] */
                $objects[$key] = $config[$key];
                unset($config[$key]);
            }
        }

        $config['connector_url'] = $this->config['connectorUrl'];

        if (!empty($opts['css'])) {
            $controller->addCss($this->config['cssUrl'] . 'mgr/main.css');
            $controller->addCss($this->config['cssUrl'] . 'mgr/bootstrap.buttons.css');
        }

        if (!empty($opts['config'])) {
            $controller->addHtml("<script type='text/javascript'>ecotank.config={$this->modx->toJSON($config)}</script>");
        }

        if (!empty($opts['tools'])) {
            $controller->addJavascript($this->config['jsUrl'] . 'mgr/ecotank.js');
            $controller->addJavascript($this->config['jsUrl'] . 'mgr/misc/tools.js');
            $controller->addJavascript($this->config['jsUrl'] . 'mgr/misc/combo.js');
        }

        if (!empty($opts['main'])) {
            $controller->addLastJavascript($this->config['jsUrl'] . 'mgr/main/main.panel.js');
        }

        if (!empty($opts['tank'])) {
            $controller->addLastJavascript($this->config['jsUrl'] . 'mgr/tank/tank.window.js');
            $controller->addLastJavascript($this->config['jsUrl'] . 'mgr/tank/tank.grid.js');
        }

        if (!empty($opts['biotank'])) {
            $controller->addLastJavascript($this->config['jsUrl'] . 'mgr/biotank/biotank.window.js');
            $controller->addLastJavascript($this->config['jsUrl'] . 'mgr/biotank/biotank.grid.js');
        }

        if (!empty($opts['unitank'])) {
            $controller->addLastJavascript($this->config['jsUrl'] . 'mgr/unitank/unitank.window.js');
            $controller->addLastJavascript($this->config['jsUrl'] . 'mgr/unitank/unitank.grid.js');
        }

        if (!empty($opts['microb'])) {
            $controller->addLastJavascript($this->config['jsUrl'] . 'mgr/microb/microb.window.js');
            $controller->addLastJavascript($this->config['jsUrl'] . 'mgr/microb/microb.grid.js');
        }

        if (!empty($opts['pogreb'])) {
            $controller->addLastJavascript($this->config['jsUrl'] . 'mgr/pogreb/pogreb.window.js');
            $controller->addLastJavascript($this->config['jsUrl'] . 'mgr/pogreb/pogreb.grid.js');
        }

        if (!empty($opts['kesson'])) {
            $controller->addLastJavascript($this->config['jsUrl'] . 'mgr/kesson/kesson.window.js');
            $controller->addLastJavascript($this->config['jsUrl'] . 'mgr/kesson/kesson.grid.js');
        }

    }


    /**
     * @param        $array
     * @param string $delimiter
     *
     * @return array
     */
    public function explodeAndClean($array, $delimiter = ',')
    {
        $array = explode($delimiter, $array);     // Explode fields to array
        $array = array_map('trim', $array);       // Trim array's values
        $array = array_keys(array_flip($array));  // Remove duplicate fields
        $array = array_filter($array);            // Remove empty values from array
        return $array;
    }

    /**
     * @param        $array
     * @param string $delimiter
     *
     * @return array|string
     */
    public function cleanAndImplode($array, $delimiter = ',')
    {
        $array = array_map('trim', $array);       // Trim array's values
        $array = array_keys(array_flip($array));  // Remove duplicate fields
        $array = array_filter($array);            // Remove empty values from array
        $array = implode($delimiter, $array);

        return $array;
    }

    /**
     * @param array  $array
     * @param string $prefix
     *
     * @return array
     */
    public function flattenArray(array $array = array(), $prefix = '')
    {
        $outArray = array();
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $outArray = $outArray + $this->flattenArray($value, $prefix . $key . '.');
            } else {
                $outArray[$prefix . $key] = $value;
            }
        }

        return $outArray;
    }

}
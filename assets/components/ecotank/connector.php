<?php
// For debug
ini_set('display_errors', 1);
ini_set('error_reporting', -1);

$productionConfig = dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php';
$developmentConfig = dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/config.core.php';
if (file_exists($productionConfig)) {
    /** @noinspection PhpIncludeInspection */
    require_once $productionConfig;
} else {
    /** @noinspection PhpIncludeInspection */
    require_once $developmentConfig;
}
/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'config/' . MODX_CONFIG_KEY . '.inc.php';
/** @noinspection PhpIncludeInspection */
require_once MODX_CONNECTORS_PATH . 'index.php';
/** @var ecotank $ecotank */
$ecotank = $modx->getService('ecotank', 'ecotank', $modx->getOption('ecotank_core_path', null,
        $modx->getOption('core_path') . 'components/ecotank/') . 'model/ecotank/');
$modx->lexicon->load('ecotank:default');

// handle request
$corePath = $modx->getOption('ecotank_core_path', null, $modx->getOption('core_path') . 'components/ecotank/');
$path = $modx->getOption('processorsPath', $ecotank->config, $corePath . 'processors/');
$modx->request->handleRequest(array(
    'processors_path' => $path,
    'location'        => '',
));
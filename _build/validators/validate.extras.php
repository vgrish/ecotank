<?php

/** @var $modx modX */
if (!$modx = $object->xpdo AND !$object->xpdo instanceof modX) {
    return true;
}

/** @var $options */
switch ($options[xPDOTransport::PACKAGE_ACTION]) {
    case xPDOTransport::ACTION_INSTALL:
    case xPDOTransport::ACTION_UPGRADE:

        $tmp = $modx->getObject('transport.modTransportProvider', array('service_url:LIKE' => '%rstore.pro%'));
        if (!$tmp) {
            $tmp = $modx->newObject('transport.modTransportProvider');
            $tmp->fromArray(array(
                'name'        => 'rstore.pro',
                'service_url' => 'http://rstore.pro/extras/',
                'description' => 'Repository of rstore.pro',
            ), '', true, true);
            $tmp->save();
        }
        break;
    case xPDOTransport::ACTION_UNINSTALL:
        break;
}

return true;
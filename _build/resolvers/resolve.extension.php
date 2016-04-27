<?php

/** @var $modx modX */
if (!$modx = $object->xpdo AND !$object->xpdo instanceof modX) {
    return true;
}

/** @var $options */
switch ($options[xPDOTransport::PACKAGE_ACTION]) {
    case xPDOTransport::ACTION_INSTALL:
    case xPDOTransport::ACTION_UPGRADE:
        $modx->addExtensionPackage('ecotank', '[[++core_path]]components/ecotank/model/');
        break;
    case xPDOTransport::ACTION_UNINSTALL:
        $modx->removeExtensionPackage('ecotank');
        break;
}
return true;
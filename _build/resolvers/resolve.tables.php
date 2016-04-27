<?php

/** @var $modx modX */
if (!$modx = $object->xpdo AND !$object->xpdo instanceof modX) {
    return true;
}

/** @var $options */
switch ($options[xPDOTransport::PACKAGE_ACTION]) {
    case xPDOTransport::ACTION_INSTALL:
    case xPDOTransport::ACTION_UPGRADE:
        $modelPath = $modx->getOption('ecotank_core_path', null,
                $modx->getOption('core_path') . 'components/ecotank/') . 'model/';
        $modx->addPackage('ecotank', $modelPath);

        $manager = $modx->getManager();
        $objects = array(
            'ecotankTank',
            'ecotankBioTank',
            'ecotankUniTank',
            'ecotankMicrob',
            'ecotankPogreb'
        );
        foreach ($objects as $tmp) {
            $manager->createObjectContainer($tmp);
        }

        $level = $modx->getLogLevel();
        $modx->setLogLevel(xPDO::LOG_LEVEL_FATAL);
        $manager->addField('ecotankTank', 'ico', array('after' => 'image'));
        $modx->setLogLevel($level);

        break;

    case xPDOTransport::ACTION_UNINSTALL:
        break;
}

return true;

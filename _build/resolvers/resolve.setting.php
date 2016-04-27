<?php

/** @var $modx modX */
if (!$modx = $object->xpdo AND !$object->xpdo instanceof modX) {
    return true;
}

/** @var $options */
switch ($options[xPDOTransport::PACKAGE_ACTION]) {
    case xPDOTransport::ACTION_INSTALL:
    case xPDOTransport::ACTION_UPGRADE:

        /* core */
        if (!$tmp = $modx->getObject('modSystemSetting', array('key' => 'friendly_urls'))) {
            $tmp = $modx->newObject('modSystemSetting');
        }
        $tmp->fromArray(array(
            'namespace' => 'core',
            'area'      => 'furls',
            'xtype'     => 'combo-boolean',
            'value'     => '1',
            'key'       => 'friendly_urls',
        ), '', true, true);
        $tmp->save();

        if (!$tmp = $modx->getObject('modSystemSetting', array('key' => 'friendly_urls_strict'))) {
            $tmp = $modx->newObject('modSystemSetting');
        }
        $tmp->fromArray(array(
            'namespace' => 'core',
            'area'      => 'furls',
            'xtype'     => 'combo-boolean',
            'value'     => '1',
            'key'       => 'friendly_urls_strict',
        ), '', true, true);
        $tmp->save();

        if (!$tmp = $modx->getObject('modSystemSetting', array('key' => 'use_alias_path'))) {
            $tmp = $modx->newObject('modSystemSetting');
        }
        $tmp->fromArray(array(
            'namespace' => 'core',
            'area'      => 'furls',
            'xtype'     => 'combo-boolean',
            'value'     => '1',
            'key'       => 'use_alias_path',
        ), '', true, true);
        $tmp->save();


        if (!$tmp = $modx->getObject('modSystemSetting', array('key' => 'friendly_alias_translit'))) {
            $tmp = $modx->newObject('modSystemSetting');
        }
        $tmp->fromArray(array(
            'namespace' => 'core',
            'area'      => 'furls',
            'xtype'     => 'textfield',
            'value'     => 'russian',
            'key'       => 'friendly_alias_translit',
        ), '', true, true);
        $tmp->save();


        $alias = '404';
        $tid = $modx->getOption('site_start');
        if ($resource = $modx->getObject('modResource', array('alias' => $alias))) {
            $tid = $resource->get('id');
        }
        if (!$tmp = $modx->getObject('modSystemSetting', array('key' => 'error_page'))) {
            $tmp = $modx->newObject('modSystemSetting');
        }
        $tmp->fromArray(array(
            'namespace' => 'core',
            'area'      => 'site',
            'xtype'     => 'textfield',
            'value'     => $tid,
            'key'       => 'error_page',
        ), '', true, true);
        $tmp->save();


        /* contact */
        if (!$tmp = $modx->getObject('modSystemSetting', array('key' => 'ecotank_postal'))) {
            $tmp = $modx->newObject('modSystemSetting');
            $tmp->fromArray(array(
                'namespace' => 'ecotank',
                'area'      => 'ecotank_contact',
                'xtype'     => 'textfield',
                'value'     => '601900',
                'key'       => 'ecotank_postal',
            ), '', true, true);
            $tmp->save();
        }
        if (!$tmp = $modx->getObject('modSystemSetting', array('key' => 'ecotank_phone'))) {
            $tmp = $modx->newObject('modSystemSetting');
            $tmp->fromArray(array(
                'namespace' => 'ecotank',
                'area'      => 'ecotank_contact',
                'xtype'     => 'textfield',
                'value'     => '+7(910)-093-00-01',
                'key'       => 'ecotank_phone',
            ), '', true, true);
            $tmp->save();
        }
        if (!$tmp = $modx->getObject('modSystemSetting', array('key' => 'ecotank_phone2'))) {
            $tmp = $modx->newObject('modSystemSetting');
            $tmp->fromArray(array(
                'namespace' => 'ecotank',
                'area'      => 'ecotank_contact',
                'xtype'     => 'textfield',
                'value'     => '+7(900)-590-73-97',
                'key'       => 'ecotank_phone2',
            ), '', true, true);
            $tmp->save();
        }
        if (!$tmp = $modx->getObject('modSystemSetting', array('key' => 'ecotank_email'))) {
            $tmp = $modx->newObject('modSystemSetting');
            $tmp->fromArray(array(
                'namespace' => 'ecotank',
                'area'      => 'ecotank_contact',
                'xtype'     => 'textfield',
                'value'     => 'email.mail.ru',
                'key'       => 'ecotank_email',
            ), '', true, true);
            $tmp->save();
        }
        if (!$tmp = $modx->getObject('modSystemSetting', array('key' => 'ecotank_city'))) {
            $tmp = $modx->newObject('modSystemSetting');
            $tmp->fromArray(array(
                'namespace' => 'ecotank',
                'area'      => 'ecotank_contact',
                'xtype'     => 'textfield',
                'value'     => 'г. Ковров',
                'key'       => 'ecotank_city',
            ), '', true, true);
            $tmp->save();
        }
        if (!$tmp = $modx->getObject('modSystemSetting', array('key' => 'ecotank_addr'))) {
            $tmp = $modx->newObject('modSystemSetting');
            $tmp->fromArray(array(
                'namespace' => 'ecotank',
                'area'      => 'ecotank_contact',
                'xtype'     => 'textfield',
                'value'     => '3-й проезд Перова поля, д. 9, корп. 11, офис 1',
                'key'       => 'ecotank_addr',
            ), '', true, true);
            $tmp->save();
        }
        if (!$tmp = $modx->getObject('modSystemSetting', array('key' => 'ecotank_works'))) {
            $tmp = $modx->newObject('modSystemSetting');
            $tmp->fromArray(array(
                'namespace' => 'ecotank',
                'area'      => 'ecotank_contact',
                'xtype'     => 'textfield',
                'value'     => 'с 9:00 до 18:00, кроме Сб. и Вс. ',
                'key'       => 'ecotank_works',
            ), '', true, true);
            $tmp->save();
        }

        break;

    case xPDOTransport::ACTION_UNINSTALL:
        break;
}

return true;
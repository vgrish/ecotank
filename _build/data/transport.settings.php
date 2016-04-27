<?php

$settings = array();

$tmp = array(

    'assets_path' => array(
        'value' => '{base_path}assets/components/ecotank/',
        'xtype' => 'textfield',
        'area'  => 'ecotank_main',
    ),
    'assets_url'  => array(
        'value' => '/assets/components/ecotank/',
        'xtype' => 'textfield',
        'area'  => 'ecotank_main',
    ),
    'core_path'   => array(
        'value' => '{base_path}core/components/ecotank/',
        'xtype' => 'textfield',
        'area'  => 'ecotank_main',
    ),
    

);

foreach ($tmp as $k => $v) {
    /* @var modSystemSetting $setting */
    $setting = $modx->newObject('modSystemSetting');
    $setting->fromArray(array_merge(
        array(
            'key'       => 'ecotank_' . $k,
            'namespace' => PKG_NAME_LOWER,
        ), $v
    ), '', true, true);

    $settings[] = $setting;
}

unset($tmp);
return $settings;

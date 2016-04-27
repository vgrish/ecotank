<?php
$templates = array();

$tmp = array(
    'etMain' => array('file' => 'main'),
);


foreach ($tmp as $k => $v) {
    /* @avr modSnippet $snippet */
    $template = $modx->newObject('modTemplate');
    $template->fromArray(array(
        'id'           => 0,
        'templatename' => $k,
        'description'  => @$v['description'],
        'content'      => file_get_contents($sources['source_core'] . '/elements/templates/web/' . $v['file'] . '.tpl'),
        'static'       => BUILD_TEMPLATE_STATIC,
        'source'       => 1,
        'static_file'  => 'core/components/' . PKG_NAME_LOWER . '/elements/templates/web/' . $v['file'] . '.tpl',
    ), '', true, true);

    $templates[] = $template;
}

unset($tmp);
return $templates;
<?php

/** @var $modx modX */
if (!$modx = $object->xpdo AND !$object->xpdo instanceof modX) {
    return true;
}

/** @var $options */
switch ($options[xPDOTransport::PACKAGE_ACTION]) {
    case xPDOTransport::ACTION_INSTALL:
    case xPDOTransport::ACTION_UPGRADE:

        $sources['source_core'] = MODX_CORE_PATH . 'components/ecotank/';

        /* Главная */
        $alias = 'index';
        $parent = 0;
        $templateId = 0;
        if ($template = $modx->getObject('modTemplate', array('templatename' => 'etMain'))) {
            $templateId = $template->get('id');
        }

        if (!$resource = $modx->getObject('modResource', array('alias' => $alias))) {
            $resource = $modx->newObject('modResource');
        }
        $resource->fromArray(array(
            'class_key'    => 'modDocument',
            'menuindex'    => 0,
            'pagetitle'    => 'Септики - для дома и дачи',
            'alias'        => $alias,
            'uri'          => '/',
            'uri_override' => 1,
            'published'    => 1,
            'hidemenu'     => 0,
            'richtext'     => 0,
            'parent'       => $parent,
            'template'     => $templateId,
            'content'      => 'главная',
            'description'  => 'Спецпредложение: Доставка по Владимирской, Ивановской и Нижегородской области в подарок!!!',
            'introtext'    => 'Модели самой популярной серии септиков ТАНК® не имеют аналогов среди продукции других
			российских производителей, И СЕГОДНЯ НОСЯТ ЗВАНИЕ “НАРОДНЫЙ СЕПТИК 1”. Здесь на официальном сайте
			производителя септика Танк Вы найдете полную информацию о технологических особенностях и преимуществах наших
			моделей, что позволит вам самостоятельно выбрать автономную канализацию под ваши требования и нужды.'
    ));
        $resource->save();

        /* Служебное */
        $alias = 'service';
        $parent = 0;
        $templateId = 0;
        if (!$resource = $modx->getObject('modResource', array('alias' => $alias))) {
            $resource = $modx->newObject('modResource');
        }
        $resource->fromArray(array(
            'class_key'    => 'modDocument',
            'menuindex'    => 100,
            'pagetitle'    => 'Служебное',
            'alias'        => $alias,
            'uri'          => $alias . '/',
            'uri_override' => 1,
            'published'    => 0,
            'hidemenu'     => 0,
            'richtext'     => 0,
            'parent'       => $parent,
            'template'     => $templateId,
            'content'      => ''
        ));
        $resource->save();


        /* robots.txt */
        $alias = 'robots';
        $parent = 0;
        $templateId = 0;
        if ($resource = $modx->getObject('modResource', array('alias' => 'service'))) {
            $parent = $resource->get('id');
        }
        if (!$resource = $modx->getObject('modResource', array('alias' => $alias))) {
            $resource = $modx->newObject('modResource');
        }
        $resource->fromArray(array(
            'class_key'    => 'modDocument',
            'menuindex'    => 0,
            'pagetitle'    => $alias,
            'alias'        => $alias,
            'uri'          => $alias . '.txt',
            'uri_override' => 1,
            'published'    => 1,
            'hidemenu'     => 1,
            'richtext'     => 0,
            'parent'       => $parent,
            'template'     => $templateId,

            'searchable'   => 0,
            'content_type' => 3,
            'contentType'  => 'text/plain',

            'content' => preg_replace(array('/^\n/', '/[ ]{2,}|[\t]/'), '', "
                User-agent: *
                Disallow: /core/
                Disallow: /connectors/
                Disallow: /inc/
                Disallow: /manager/
                Disallow: /yandex/
                Disallow: /webstat/
                Clean-param: hauth_action *
                Host: {$modx->getOption('http_host')}
                Sitemap: {$modx->getOption('site_url')}sitemap
            ")
        ));
        $resource->save();

        /* sitemap */
        $alias = 'sitemap';
        $parent = 0;
        $templateId = 0;
        if ($resource = $modx->getObject('modResource', array('alias' => 'service'))) {
            $parent = $resource->get('id');
        }
        if (!$resource = $modx->getObject('modResource', array('alias' => $alias))) {
            $resource = $modx->newObject('modResource');
        }
        $resource->fromArray(array(
            'class_key'    => 'modDocument',
            'menuindex'    => 1,
            'pagetitle'    => $alias,
            'alias'        => $alias,
            'uri'          => $alias,
            'uri_override' => 1,
            'published'    => 1,
            'hidemenu'     => 1,
            'richtext'     => 0,
            'parent'       => $parent,
            'template'     => $templateId,

            'searchable'   => 0,
            'content_type' => 2,
            'contentType'  => 'text/xml',

            'content' => preg_replace(array('/^\n/', '/[ ]{2,}|[\t]/'), '', "
                <?xml version=\"1.0\" encoding=\"UTF-8\"?>
                <urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">
                    <url>
                        <loc>{$modx->getOption('site_url')}{$alias}</loc>
                    </url>
                </urlset>
            ")
        ));
        $resource->save();

        /* 404 */
        $alias = '404';
        $parent = 0;
        $templateId = 0;
        if ($resource = $modx->getObject('modResource', array('alias' => 'service'))) {
            $parent = $resource->get('id');
        }
        if (!$resource = $modx->getObject('modResource', array('alias' => $alias))) {
            $resource = $modx->newObject('modResource');
        }
        $resource->fromArray(array(
            'class_key'    => 'modDocument',
            'menuindex'    => 1,
            'pagetitle'    => $alias,
            'alias'        => $alias,
            'uri'          => $alias,
            'uri_override' => 1,
            'published'    => 1,
            'hidemenu'     => 1,
            'richtext'     => 0,
            'parent'       => $parent,
            'template'     => $templateId,
            'content'      => preg_replace(array('/^\n/', '/[ ]{2,}|[\t]/'), '', "
                <p>404 страница не найдена</p>
                <p><a href=\"[[~[[++site_start]]]]\">Перейти на главную</a></p>
            ")
        ));
        $resource->save();

        break;
    case xPDOTransport::ACTION_UNINSTALL:
        break;
}

return true;
<?php

/** @var $modx modX */
if (!$modx = $object->xpdo AND !$object->xpdo instanceof modX) {
    return true;
}

/** @var $options */
switch ($options[xPDOTransport::PACKAGE_ACTION]) {
    case xPDOTransport::ACTION_INSTALL:
    case xPDOTransport::ACTION_UPGRADE:

        /* танк */
        $cls = 'ecotankUniTank';

        if (!$model = $modx->getObject($cls, array('model' => 'ТАНК УНИВЕРСАЛ-2'))) {
            $model = $modx->newObject($cls);
            $model->set('rank', $modx->getCount($cls));
        }
        $model->fromArray(array(
            'model'            => 'ТАНК УНИВЕРСАЛ-2',
            'image'            => 'assets/components/ecotank/inc/img/elements/uni/tankuni2_big.png',
            'ico'              => 'assets/components/ecotank/inc/img/elements/uni/tankuni2_small.png',
            'number_of_users'  => '4-6',
            'size'             => '2200х900х1850',
            'volume'           => 2200,
            'power'            => 800,
            'weight'           => 85,
            'price'            => 28700,
            'old_price'        => 0,
            'installing_price' => 33800,
            'discount'         => '',

            'description' => 'НОВИНКА 2015 г.',

            'main'   => 1,
            'active' => 1,

            'content' => 'Септик ТАНК® УНИВЕРСАЛ сочетает в себе все лучшие характеристики бестселлера продаж - моделей популярной модели ТАНК® - с высочайшей технологичностью и возможностью эффективного подбора оптимальной для покупателя конфигурации очистного сооружения.<br><br>

Основное отличие септиков серии ТАНК® УНИВЕРСАЛ заключается в его конструктивной простоте и гибкости оснащения под нужды владельца. Исходя из количества эксплуатирующих автономную канализацию людей, корпус септика данной серии, подобно детскому конструктору легко дополняется нужным количеством вспомогательных секций, соединяемых специальными фильтрами в единую систему. <br><br>Таким образом, получается фильтрующий резервуар необходимого объема.',
        ));
        $model->save();

        if (!$model = $modx->getObject($cls, array('model' => 'ТАНК УНИВЕРСАЛ-2.5'))) {
            $model = $modx->newObject($cls);
            $model->set('rank', $modx->getCount($cls));
        }
        $model->fromArray(array(
            'model'            => 'ТАНК УНИВЕРСАЛ-2.5',
            'image'            => 'assets/components/ecotank/inc/img/elements/uni/tankuni2_big.png',
            'ico'              => 'assets/components/ecotank/inc/img/elements/uni/tankuni2_small.png',
            'number_of_users'  => '6-8',
            'size'             => '2200х1200х1850',
            'volume'           => 2500,
            'power'            => 1000,
            'weight'           => 85,
            'price'            => 31700,
            'old_price'        => 0,
            'installing_price' => 38800,
            'discount'         => '',

            'description' => 'НОВИНКА 2015 г.',
            'content'     => '',

            'main'   => 0,
            'active' => 1,
        ));
        $model->save();


        if (!$model = $modx->getObject($cls, array('model' => 'ТАНК УНИВЕРСАЛ-3'))) {
            $model = $modx->newObject($cls);
            $model->set('rank', $modx->getCount($cls));
        }
        $model->fromArray(array(
            'model'            => 'ТАНК УНИВЕРСАЛ-3',
            'image'            => 'assets/components/ecotank/inc/img/elements/uni/tankuni2_big.png',
            'ico'              => 'assets/components/ecotank/inc/img/elements/uni/tankuni2_small.png',
            'number_of_users'  => '6-10',
            'size'             => '2400х1200х1850',
            'volume'           => 3000,
            'power'            => 1200,
            'weight'           => 85,
            'price'            => 36700,
            'old_price'        => 0,
            'installing_price' => 42800,
            'discount'         => '',

            'description' => 'НОВИНКА 2015 г.',
            'content'     => '',

            'main'   => 0,
            'active' => 1,
        ));
        $model->save();

        break;
    case xPDOTransport::ACTION_UNINSTALL:
        break;
}

return true;
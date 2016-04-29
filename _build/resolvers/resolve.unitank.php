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

        if (!$model = $modx->getObject($cls, array('model' => 'ТАНК УНИВЕРСАЛ-1'))) {
            $model = $modx->newObject($cls);
            $model->set('rank', $modx->getCount($cls));
        }
        $model->fromArray(array(
            'model'            => 'ТАНК УНИВЕРСАЛ-1',
            'image'            => 'assets/components/ecotank/inc/img/elements/uni/tankuni1_big.png',
            'ico'              => 'assets/components/ecotank/inc/img/elements/uni/tankuni1_small.png',
            'number_of_users'  => '1-2',
            'size'             => '800х1200х1850',
            'volume'           => 1000,
            'power'            => 400,
            'weight'           => 87,
            'price'            => 22000,
            'old_price'        => 0,
            'installing_price' => 17000,
            'discount'         => '30',

            'description' => 'НОВИНКА 2015 г.',

            'main'   => 1,
            'active' => 1,

            'content' => 'Септик ТАНК® УНИВЕРСАЛ сочетает в себе все лучшие характеристики бестселлера продаж - моделей популярной модели ТАНК® - с высочайшей технологичностью и возможностью эффективного подбора оптимальной для покупателя конфигурации очистного сооружения.<br><br>

Основное отличие септиков серии ТАНК® УНИВЕРСАЛ заключается в его конструктивной простоте и гибкости оснащения под нужды владельца. Исходя из количества эксплуатирующих автономную канализацию людей, корпус септика данной серии, подобно детскому конструктору легко дополняется нужным количеством вспомогательных секций, соединяемых специальными фильтрами в единую систему. <br><br>Таким образом, получается фильтрующий резервуар необходимого объема.',
        ));
        $model->save();

        if (!$model = $modx->getObject($cls, array('model' => 'ТАНК УНИВЕРСАЛ-1.5'))) {
            $model = $modx->newObject($cls);
            $model->set('rank', $modx->getCount($cls));
        }
        $model->fromArray(array(
            'model'            => 'ТАНК УНИВЕРСАЛ-1.5',
            'image'            => 'assets/components/ecotank/inc/img/elements/uni/tankuni1_big.png',
            'ico'              => 'assets/components/ecotank/inc/img/elements/uni/tankuni1_small.png',
            'number_of_users'  => '2-3',
            'size'             => '1200х1200х18500',
            'volume'           => 1500,
            'power'            => 600,
            'weight'           => 107,
            'price'            => 25000,
            'old_price'        => 0,
            'installing_price' => 18000,
            'discount'         => '',

            'description' => 'НОВИНКА 2015 г.',

            'main'   => 0,
            'active' => 1,

            'content' => 'Септик ТАНК® УНИВЕРСАЛ сочетает в себе все лучшие характеристики бестселлера продаж - моделей популярной модели ТАНК® - с высочайшей технологичностью и возможностью эффективного подбора оптимальной для покупателя конфигурации очистного сооружения.<br><br>

Основное отличие септиков серии ТАНК® УНИВЕРСАЛ заключается в его конструктивной простоте и гибкости оснащения под нужды владельца. Исходя из количества эксплуатирующих автономную канализацию людей, корпус септика данной серии, подобно детскому конструктору легко дополняется нужным количеством вспомогательных секций, соединяемых специальными фильтрами в единую систему. <br><br>Таким образом, получается фильтрующий резервуар необходимого объема.',
        ));
        $model->save();


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
            'price'            => 33700,
            'old_price'        => 0,
            'installing_price' => 19800,
            'discount'         => '',

            'description' => 'НОВИНКА 2015 г.',

            'main'   => 0,
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
            'price'            => 36700,
            'old_price'        => 0,
            'installing_price' => 22800,
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
            'price'            => 41700,
            'old_price'        => 0,
            'installing_price' => 25800,
            'discount'         => '',

            'description' => 'НОВИНКА 2015 г.',
            'content'     => '',

            'main'   => 0,
            'active' => 1,
        ));
        $model->save();

        if (!$model = $modx->getObject($cls, array('model' => 'ТАНК УНИВЕРСАЛ-4'))) {
            $model = $modx->newObject($cls);
            $model->set('rank', $modx->getCount($cls));
        }
        $model->fromArray(array(
            'model'            => 'ТАНК УНИВЕРСАЛ-4',
            'image'            => 'assets/components/ecotank/inc/img/elements/uni/tankuni4_big.png',
            'ico'              => 'assets/components/ecotank/inc/img/elements/uni/tankuni4_ico.png',
            'number_of_users'  => '10-12',
            'size'             => '3200х1200х1850',
            'volume'           => 4000,
            'power'            => 1600,
            'weight'           => 275,
            'price'            => 60000,
            'old_price'        => 0,
            'installing_price' => 30800,
            'discount'         => '',

            'description' => 'НОВИНКА 2015 г.',
            'content'     => '',

            'main'   => 0,
            'active' => 1,
        ));
        $model->save();

        if (!$model = $modx->getObject($cls, array('model' => 'Инфильтратор'))) {
            $model = $modx->newObject($cls);
            $model->set('rank', 100);
        }
        $model->fromArray(array(
            'model'            => 'Инфильтратор',
            'image'            => '',
            'ico'              => 'assets/components/ecotank/inc/img/elements/demo/septik-tank-infiltrator_ico.png',
            'number_of_users'  => '-',
            'size'             => '1800х800х400',
            'volume'           => 0,
            'power'            => 400,
            'weight'           => 18,
            'price'            => 5000,
            'old_price'        => 0,
            'installing_price' => 0,
            'discount'         => '',

            'description' => 'серия ЭКОНОМ',
            'content'     => '',

            'main'   => 0,
            'active' => 1,
            'type'   => 1
        ));
        $model->save();

        break;
    case xPDOTransport::ACTION_UNINSTALL:
        break;
}

return true;
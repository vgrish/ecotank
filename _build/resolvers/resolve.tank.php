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
        $cls = 'ecotankTank';

        if (!$model = $modx->getObject($cls, array('model' => 'Септик ТАНК-1'))) {
            $model = $modx->newObject($cls);
            $model->set('rank', $modx->getCount($cls));
        }
        $model->fromArray(array(
            'model'            => 'Септик ТАНК-1',
            'image'            => 'assets/components/ecotank/inc/img/elements/tank/septik-tank-1_big.png',
            'ico'              => 'assets/components/ecotank/inc/img/elements/tank/septik-tank-1_small.png',
            'number_of_users'  => '1-3',
            'size'             => '1200х1000х1700',
            'volume'           => 1200,
            'power'            => 600,
            'weight'           => 85,
            'price'            => 18000,
            'old_price'        => 34900,
            'installing_price' => 23000,
            'discount'         => '30%',

            'description' => 'серия ЭКОНОМ',

            'main'   => 1,
            'active' => 1,

            'content' => 'Септики ТАНК® предназначены для обустройства автономной канализации для жилья и других сфер жизнедеятельности
             при условии их временной или постоянной эксплуатации.
              Монтаж септиков этой серии возможно производить в любое время года независимо от температуры воздуха.
               Он годится для оснащения локальных очистных сооружений, как на только обустраиваемом, 
               так и на уже эксплуатируемом земельном участке. Септики ТАНК®,
                на протяжении многих лет успешного использования тысячами покупателей, 
                зарекомендовали себя, как воплощение исключительного качества, простоты и надежности в эксплуатации.
                
                Энергонезависимый трехкамерный отстойник с почвенной дофильтрацией ТАНК® имеет прочный и надежный литой корпус (средняя толщина стенок 15-16 мм).
                 Реализация очистного сооружения в трехкамерном корпусе обеспечивает ему дополнительную степень очистки и тем самым 
                 увеличивает срок службы дренажа.',

        ));
        $model->save();

        if (!$model = $modx->getObject($cls, array('model' => 'Септик ТАНК-2'))) {
            $model = $modx->newObject($cls);
            $model->set('rank', $modx->getCount($cls));
        }
        $model->fromArray(array(
            'model'            => 'Септик ТАНК-2',
            'image'            => 'assets/components/ecotank/inc/img/elements/tank/septik-tank-2_big.gif',
            'ico'              => 'assets/components/ecotank/inc/img/elements/tank/septik-tank-2_small.png',
            'number_of_users'  => '3-4',
            'size'             => '1800х1200х1700',
            'volume'           => 2000,
            'power'            => 800,
            'weight'           => 130,
            'price'            => 29000,
            'old_price'        => 50500,
            'installing_price' => 32000,
            'discount'         => '30%',

            'description' => 'серия ЭКОНОМ',
            'content'     => '',

            'main'   => 0,
            'active' => 1,
        ));
        $model->save();

        if (!$model = $modx->getObject($cls, array('model' => 'Септик ТАНК-2.5'))) {
            $model = $modx->newObject($cls);
            $model->set('rank', $modx->getCount($cls));
        }
        $model->fromArray(array(
            'model'            => 'Септик ТАНК-2.5',
            'image'            => 'assets/components/ecotank/inc/img/elements/tank/septik-tank-2_5_big.png',
            'ico'              => 'assets/components/ecotank/inc/img/elements/tank/septik-tank-2_5_small.png',
            'number_of_users'  => '4-5',
            'size'             => '2030х1200х1850',
            'volume'           => 2500,
            'power'            => 1000,
            'weight'           => 140,
            'price'            => 33000,
            'old_price'        => 58300,
            'installing_price' => 38000,
            'discount'         => '30%',

            'description' => 'серия ЭКОНОМ',
            'content'     => '',

            'main'   => 0,
            'active' => 1
        ));
        $model->save();

        if (!$model = $modx->getObject($cls, array('model' => 'Септик ТАНК-3'))) {
            $model = $modx->newObject($cls);
            $model->set('rank', $modx->getCount($cls));
        }
        $model->fromArray(array(
            'model'            => 'Септик ТАНК-3',
            'image'            => 'assets/components/ecotank/inc/img/elements/tank/septik-tank-3_big.png',
            'ico'              => 'assets/components/ecotank/inc/img/elements/tank/septik-tank-3_small.png',
            'number_of_users'  => '5-6',
            'size'             => '2200х1200х2000',
            'volume'           => 3000,
            'power'            => 1200,
            'weight'           => 150,
            'price'            => 37000,
            'old_price'        => 70000,
            'installing_price' => 42000,
            'discount'         => '30%',

            'description' => 'серия ЭКОНОМ',
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
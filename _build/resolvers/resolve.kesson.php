<?php

/** @var $modx modX */
if (!$modx = $object->xpdo AND !$object->xpdo instanceof modX) {
    return true;
}

/** @var $options */
switch ($options[xPDOTransport::PACKAGE_ACTION]) {
    case xPDOTransport::ACTION_INSTALL:
    case xPDOTransport::ACTION_UPGRADE:

        /* микроб */
        $cls = 'ecotankKesson';

        $name = 'Тритон-К мини - новинка';
        if (!$model = $modx->getObject($cls, array('model' => $name))) {
            $model = $modx->newObject($cls);
            $model->set('rank', $modx->getCount($cls));
        }
        $model->fromArray(array(
            'model'            => $name,
            'image'            => 'assets/components/ecotank/inc/img/elements/kesson/kesson.jpg',
            'ico'              => '',
            'number_of_users'  => 0,
            'size'             => '960х2280',
            'volume'           => 1100,
            'weight'           => 85,
            'price'            => 25500,
            'old_price'        => 35500,
            'installing_price' => 15000,
            'discount'         => '30%',

            'description' => '',

            'main'   => 1,
            'active' => 1,

            'content' => '
Корпус кессона изготовлен на современном оборудовании путём ротоформования,  что полностью исключает возможность протечки. 
<br>Существенно упрощен монтаж модернизированного Кессона К-1, 
Не потребуется заливать бетонную подушку, достаточно лишь выровнять дно котлована песком.
<br>
Дно нового корпуса Кессона выполнено с воздушными карманами. При заполнении бетонным раствором, воздушные карманы не позволяют корпусу всплыть и 
препятствуют деформации дна Кессона при высоких грунтовых водах.
<br>
Новый корпус кессона разработан с учетом возможности размещения в нем гидроаккумуляторных баков и другого дополнительного оборудования.
  ',

        ));
        $model->save();

        $name = 'Тритон-К 1 - новинка';
        if (!$model = $modx->getObject($cls, array('model' => $name))) {
            $model = $modx->newObject($cls);
            $model->set('rank', $modx->getCount($cls));
        }
        $model->fromArray(array(
            'model'            => $name,
            'image'            => '',
            'ico'              => '',
            'number_of_users'  => 0,
            'size'             => '1430х2100',
            'volume'           => 1800,
            'weight'           => 130,
            'price'            => 27500,
            'old_price'        => 37500,
            'installing_price' => 19000,
            'discount'         => '30%',

            'description' => '',
            'content'     => '',

            'main'   => 0,
            'active' => 1,
        ));
        $model->save();


        $name = 'Тритон-К 2';
        if (!$model = $modx->getObject($cls, array('model' => $name))) {
            $model = $modx->newObject($cls);
            $model->set('rank', $modx->getCount($cls));
        }
        $model->fromArray(array(
            'model'            => $name,
            'image'            => '',
            'ico'              => '',
            'number_of_users'  => 0,
            'size'             => '1500х2500',
            'volume'           => 3500,
            'weight'           => 220,
            'price'            => 71000,
            'old_price'        => 82000,
            'installing_price' => 25000,
            'discount'         => '30%',

            'description' => '',
            'content'     => '',

            'main'   => 0,
            'active' => 1,
        ));
        $model->save();


        $name = 'Тритон-К 3';
        if (!$model = $modx->getObject($cls, array('model' => $name))) {
            $model = $modx->newObject($cls);
            $model->set('rank', $modx->getCount($cls));
        }
        $model->fromArray(array(
            'model'            => $name,
            'image'            => '',
            'ico'              => '',
            'number_of_users'  => 0,
            'size'             => '2000х2500',
            'volume'           => 6500,
            'weight'           => 300,
            'price'            => 114000,
            'old_price'        => 130000,
            'installing_price' => 35000,
            'discount'         => '30%',

            'description' => '',
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
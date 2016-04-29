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
        $cls = 'ecotankMicrob';

        if (!$model = $modx->getObject($cls, array('model' => 'МИКРОБ 450'))) {
            $model = $modx->newObject($cls);
            $model->set('rank', $modx->getCount($cls));
        }
        $model->fromArray(array(
            'model'            => 'МИКРОБ 450',
            'image'            => 'assets/components/ecotank/inc/img/elements/microb/septik_microb_450_big.png',
            'ico'              => 'assets/components/ecotank/inc/img/elements/microb/septik_microb_450_small.png',
            'number_of_users'  => 0,
            'size'             => '810х1430',
            'volume'           => 450,
            'power'            => 150,
            'weight'           => 35,
            'price'            => 10700,
            'old_price'        => 15600,
            'installing_price' => 8000,
            'discount'         => '30%',

            'description' => '',

            'main'   => 1,
            'active' => 1,

            'content' => 'Септик МИКРОБ - это абсолютно новая серия минисептиков для комфортного проживания в небольших пространствах, например, дачных и гостевых домиках, для бань, а так же временного проживания в момент строительства, и в качестве ливневой канализации.<br><br>

Корпус септика МИКРОБ и инфильтратора (который служит приемником сточных вод из септика и распределяет их на поле фильтрации) достаточно прочный, выполнен из полиэтилена низкого давления, температурный режим до -30С.

МИКРОБ выпускается модельным рядом, состоящим из 4 септиков различного объема. При этом даже самая маленькая модель МИКРОБА способна обеспечивать нормальную работу автономной системы канализации для дачного домика или иного сооружения при постоянной эксплуатации мини-септика одним человеком и редкими увеличениями сточной нагрузки (например, в случае приезда гостей на выходные).',

        ));
        $model->save();

        if (!$model = $modx->getObject($cls, array('model' => 'МИКРОБ 600'))) {
            $model = $modx->newObject($cls);
            $model->set('rank', $modx->getCount($cls));
        }
        $model->fromArray(array(
            'model'            => 'МИКРОБ 600',
            'image'            => 'assets/components/ecotank/inc/img/elements/microb/septik_microb_600_big.png',
            'ico'              => 'assets/components/ecotank/inc/img/elements/microb/septik_microb_600_small.png',
            'number_of_users'  => 0,
            'size'             => '910х1430',
            'volume'           => 600,
            'power'            => 200,
            'weight'           => 42,
            'price'            => 13200,
            'old_price'        => 19500,
            'installing_price' => 10000,
            'discount'         => '30%',

            'description' => '',
            'content'     => '',

            'main'   => 0,
            'active' => 1,
        ));
        $model->save();

        if (!$model = $modx->getObject($cls, array('model' => 'МИКРОБ 750'))) {
            $model = $modx->newObject($cls);
            $model->set('rank', $modx->getCount($cls));
        }
        $model->fromArray(array(
            'model'            => 'МИКРОБ 750',
            'image'            => 'assets/components/ecotank/inc/img/elements/microb/septik_microb_750_big.png',
            'ico'              => 'assets/components/ecotank/inc/img/elements/microb/septik_microb_750_small.png',
            'number_of_users'  => 0,
            'size'             => '1010х1430',
            'volume'           => 750,
            'power'            => 250,
            'weight'           => 48,
            'price'            => 14700,
            'old_price'        => 22500,
            'installing_price' => 12000,
            'discount'         => '30%',

            'description' => '',
            'content'     => '',

            'main'   => 0,
            'active' => 1,
        ));
        $model->save();

        if (!$model = $modx->getObject($cls, array('model' => 'МИКРОБ 900'))) {
            $model = $modx->newObject($cls);
            $model->set('rank', $modx->getCount($cls));
        }
        $model->fromArray(array(
            'model'            => 'МИКРОБ 900',
            'image'            => 'assets/components/ecotank/inc/img/elements/microb/septik_microb_900_big.png',
            'ico'              => 'assets/components/ecotank/inc/img/elements/microb/septik_microb_900_small.png',
            'number_of_users'  => 0,
            'size'             => '1110х1430',
            'volume'           => 900,
            'power'            => 300,
            'weight'           => 54,
            'price'            => 15200,
            'old_price'        => 24000,
            'installing_price' => 14000,
            'discount'         => '30%',

            'description' => '',
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
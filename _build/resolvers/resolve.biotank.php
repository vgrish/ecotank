<?php

/** @var $modx modX */
if (!$modx = $object->xpdo AND !$object->xpdo instanceof modX) {
    return true;
}

/** @var $options */
switch ($options[xPDOTransport::PACKAGE_ACTION]) {
    case xPDOTransport::ACTION_INSTALL:
    case xPDOTransport::ACTION_UPGRADE:

        /* био танк */
        $cls = 'ecotankBioTank';

        if (!$model = $modx->getObject($cls, array('model' => 'БИОТАНК-4 сам*', 'type' => 1))) {
            $model = $modx->newObject($cls);
            $model->set('rank', $modx->getCount($cls));
        }
        $model->fromArray(array(
            'model'            => 'БИОТАНК-4 сам*',
            'image'            => 'assets/components/ecotank/inc/img/elements/bio/septik_biotank4_big.png',
            'ico'              => 'assets/components/ecotank/inc/img/elements/bio/septik_biotank4_small.png',
            'number_of_users'  => '1-4',
            'size'             => '1200х1000х2105',
            'volume'           => 0,
            'power'            => 800,
            'weight'           => 110,
            'price'            => 56500,
            'old_price'        => 61500,
            'installing_price' => 20700,
            'discount'         => '30%',

            'description' => 'Серия САМ - самотёчный',

            'main'   => 1,
            'active' => 1,
            'type'   => 1,

            'content' => 'Септик БИОТАНК®<br><br> - долгожданная новинка энергозависимого септика для частных домов постоянного проживания,
             которая отличается компактностью и простотой конструкции.<br><br>
                Бесперебойная работа септика БИОТАНК® обеспечивается компрессором, 
                подключив который в систему электропитания, Вы получите эффективную и надежную работу системы очистки сточных вод. 
                Несмотря на требуемое электропитание, скорость разгона и время подготовки септика к работе существенно меньше, 
                чем у аналогов. <br><br>Кроме того, он устойчив к отключениям, перебоям электроэнергии и переработке мусора при 
                умеренном попадании отходов в септик. ',

        ));
        $model->save();

        if (!$model = $modx->getObject($cls, array('model' => 'БИОТАНК-4 пр**', 'type' => 1))) {
            $model = $modx->newObject($cls);
            $model->set('rank', $modx->getCount($cls));
        }
        $model->fromArray(array(
            'model'            => 'БИОТАНК-4 пр**',
            'image'            => 'assets/components/ecotank/inc/img/elements/bio/septik_biotank4_big.png',
            'ico'              => 'assets/components/ecotank/inc/img/elements/bio/septik_biotank4_small.png',
            'number_of_users'  => '1-4',
            'size'             => '1200х1000х2105',
            'volume'           => 0,
            'power'            => 800,
            'weight'           => 110,
            'price'            => 61500,
            'old_price'        => 79500,
            'installing_price' => 22100,
            'discount'         => '30%',

            'description' => 'Серия ПР - принудительный выброс воды (с установленным насосом)',
            'content'     => '',

            'main'   => 0,
            'active' => 1,
            'type'   => 1,
        ));
        $model->save();


        if (!$model = $modx->getObject($cls, array('model' => 'БИОТАНК-6 сам*', 'type' => 1))) {
            $model = $modx->newObject($cls);
            $model->set('rank', $modx->getCount($cls));
        }
        $model->fromArray(array(
            'model'            => 'БИОТАНК-6 сам*',
            'image'            => 'assets/components/ecotank/inc/img/elements/bio/septik_biotank6_big.png',
            'ico'              => 'assets/components/ecotank/inc/img/elements/bio/septik_biotank6_small.png',
            'number_of_users'  => '4-6',
            'size'             => '1200х1000х2415',
            'volume'           => 0,
            'power'            => 1200,
            'weight'           => 130,
            'price'            => 66000,
            'old_price'        => 79500,
            'installing_price' => 25000,
            'discount'         => '30%',

            'description' => 'Серия САМ - самотёчный',
            'content'     => '',

            'main'   => 0,
            'active' => 1,
            'type'   => 1,
        ));
        $model->save();


        if (!$model = $modx->getObject($cls, array('model' => 'БИОТАНК-6 пр**', 'type' => 1))) {
            $model = $modx->newObject($cls);
            $model->set('rank', $modx->getCount($cls));
        }
        $model->fromArray(array(
            'model'            => 'БИОТАНК-6 пр**',
            'image'            => 'assets/components/ecotank/inc/img/elements/bio/septik_biotank6_big.png',
            'ico'              => 'assets/components/ecotank/inc/img/elements/bio/septik_biotank6_small.png',
            'number_of_users'  => '4-6',
            'size'             => '1200х1000х2415',
            'volume'           => 0,
            'power'            => 1200,
            'weight'           => 130,
            'price'            => 71000,
            'old_price'        => 70500,
            'installing_price' => 27100,
            'discount'         => '30%',

            'description' => 'Серия ПР - принудительный выброс воды (с установленным насосом)',
            'content'     => '',

            'main'   => 0,
            'active' => 1,
            'type'   => 1,
        ));
        $model->save();


        if (!$model = $modx->getObject($cls, array('model' => 'БИОТАНК-8 сам*', 'type' => 1))) {
            $model = $modx->newObject($cls);
            $model->set('rank', $modx->getCount($cls));
        }
        $model->fromArray(array(
            'model'            => 'БИОТАНК-8 сам*',
            'image'            => 'assets/components/ecotank/inc/img/elements/bio/septik_biotank8_big.png',
            'ico'              => 'assets/components/ecotank/inc/img/elements/bio/septik_biotank8_small.png',
            'number_of_users'  => '6-8',
            'size'             => '1500х1000х2415',
            'volume'           => 0,
            'power'            => 1600,
            'weight'           => 150,
            'price'            => 91200,
            'old_price'        => 0,
            'installing_price' => 30100,
            'discount'         => '',

            'description' => 'Серия САМ - самотёчный',
            'content'     => '',

            'main'   => 0,
            'active' => 1,
            'type'   => 1,
        ));
        $model->save();


        if (!$model = $modx->getObject($cls, array('model' => 'БИОТАНК-8 пр**', 'type' => 1))) {
            $model = $modx->newObject($cls);
            $model->set('rank', $modx->getCount($cls));
        }
        $model->fromArray(array(
            'model'            => 'БИОТАНК-8 пр**',
            'image'            => 'assets/components/ecotank/inc/img/elements/bio/septik_biotank8_big.png',
            'ico'              => 'assets/components/ecotank/inc/img/elements/bio/septik_biotank8_small.png',
            'number_of_users'  => '6-8',
            'size'             => '1500х1000х2415',
            'volume'           => 0,
            'power'            => 1600,
            'weight'           => 150,
            'price'            => 97000,
            'old_price'        => 0,
            'installing_price' => 35000,
            'discount'         => '',

            'description' => 'Серия ПР - принудительный выброс воды (с установленным насосом)',
            'content'     => '',

            'main'   => 0,
            'active' => 1,
            'type'   => 1,
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

        /* --------------------------------------------------------------------------- */

        if (!$model = $modx->getObject($cls, array('model' => 'БИОТАНК 3 сам*', 'type' => 2))) {
            $model = $modx->newObject($cls);
            $model->set('rank', $modx->getCount($cls));
        }
        $model->fromArray(array(
            'model'            => 'БИОТАНК 3 сам*',
            'image'            => 'assets/components/ecotank/inc/img/elements/uni/tankuni2_big.gif',
            'ico'              => 'assets/components/ecotank/inc/img/elements/bio/septik-bio-3.png',
            'number_of_users'  => '3',
            'size'             => '1200х800х1850',
            'volume'           => 1000,
            'power'            => 600,
            'weight'           => 105,
            'price'            => 46500,
            'old_price'        => 51700,
            'installing_price' => 16100,
            'discount'         => '30%',

            'description' => 'Серия САМ - самотёчный',

            'main'    => 1,
            'active'  => 1,
            'type'    => 2,
            'content' => 'Септик БИОТАНК® <br><br>- долгожданная новинка энергозависимого септика для частных домов постоянного проживания,
             которая отличается компактностью и простотой конструкции.<br><br>
                Бесперебойная работа септика БИОТАНК® обеспечивается компрессором, 
                подключив который в систему электропитания, Вы получите эффективную и надежную работу системы очистки сточных вод. 
                Несмотря на требуемое электропитание, скорость разгона и время подготовки септика к работе существенно меньше, 
                чем у аналогов. <br><br>Кроме того, он устойчив к отключениям, перебоям электроэнергии и переработке мусора при 
                умеренном попадании отходов в септик. ',
        ));
        $model->save();

        if (!$model = $modx->getObject($cls, array('model' => 'БИОТАНК 3 пр**', 'type' => 2))) {
            $model = $modx->newObject($cls);
            $model->set('rank', $modx->getCount($cls));
        }
        $model->fromArray(array(
            'model'            => 'БИОТАНК 3 пр**',
            'image'            => '',
            'ico'              => 'assets/components/ecotank/inc/img/elements/bio/septik-bio-3.png',
            'number_of_users'  => '3',
            'size'             => '1200х800х1850',
            'volume'           => 1000,
            'power'            => 600,
            'weight'           => 105,
            'price'            => 51500,
            'old_price'        => 57700,
            'installing_price' => 17100,
            'discount'         => '30%',

            'description' => 'Серия ПР - принудительный выброс воды (с установленным насосом)',
            'content'     => '',

            'main'   => 0,
            'active' => 1,
            'type'   => 2,
        ));
        $model->save();

        if (!$model = $modx->getObject($cls, array('model' => 'БИОТАНК 4 сам*', 'type' => 2))) {
            $model = $modx->newObject($cls);
            $model->set('rank', $modx->getCount($cls));
        }
        $model->fromArray(array(
            'model'            => 'БИОТАНК 4 сам*',
            'image'            => '',
            'ico'              => 'assets/components/ecotank/inc/img/elements/bio/septik-bio-4a.png',
            'number_of_users'  => '4',
            'size'             => '1200х1200х1850',
            'volume'           => 1500,
            'power'            => 800,
            'weight'           => 128,
            'price'            => 56500,
            'old_price'        => 64700,
            'installing_price' => 19100,
            'discount'         => '30%',

            'description' => 'Серия САМ - самотёчный',
            'content'     => '',

            'main'   => 0,
            'active' => 1,
            'type'   => 2,
        ));
        $model->save();

        if (!$model = $modx->getObject($cls, array('model' => 'БИОТАНК 4 пр**', 'type' => 2))) {
            $model = $modx->newObject($cls);
            $model->set('rank', $modx->getCount($cls));
        }
        $model->fromArray(array(
            'model'            => 'БИОТАНК 4 пр**',
            'image'            => '',
            'ico'              => 'assets/components/ecotank/inc/img/elements/bio/septik-bio-4a.png',
            'number_of_users'  => '4',
            'size'             => '1200х1200х1850',
            'volume'           => 1500,
            'power'            => 800,
            'weight'           => 128,
            'price'            => 61500,
            'old_price'        => 71100,
            'installing_price' => 20100,
            'discount'         => '30%',

            'description' => 'Серия ПР - принудительный выброс воды (с установленным насосом)',
            'content'     => '',

            'main'   => 0,
            'active' => 1,
            'type'   => 2,
        ));
        $model->save();


        if (!$model = $modx->getObject($cls, array('model' => 'БИОТАНК 6 сам*', 'type' => 2))) {
            $model = $modx->newObject($cls);
            $model->set('rank', $modx->getCount($cls));
        }
        $model->fromArray(array(
            'model'            => 'БИОТАНК 6 сам*',
            'image'            => '',
            'ico'              => 'assets/components/ecotank/inc/img/elements/bio/septik-bio-2.png',
            'number_of_users'  => '6',
            'size'             => '2400х800х1850',
            'volume'           => 2000,
            'power'            => 1200,
            'weight'           => 140,
            'price'            => 68100,
            'old_price'        => 0,
            'installing_price' => 21100,
            'discount'         => '',

            'description' => 'Серия САМ - самотёчный',
            'content'     => '',

            'main'   => 0,
            'active' => 1,
            'type'   => 2,
        ));
        $model->save();

        if (!$model = $modx->getObject($cls, array('model' => 'БИОТАНК 6 пр**', 'type' => 2))) {
            $model = $modx->newObject($cls);
            $model->set('rank', $modx->getCount($cls));
        }
        $model->fromArray(array(
            'model'            => 'БИОТАНК 6 пр**',
            'image'            => '',
            'ico'              => 'assets/components/ecotank/inc/img/elements/bio/septik-bio-2.png',
            'number_of_users'  => '6',
            'size'             => '2400х800х1850',
            'volume'           => 2000,
            'power'            => 1200,
            'weight'           => 140,
            'price'            => 72100,
            'old_price'        => 0,
            'installing_price' => 22100,
            'discount'         => '',

            'description' => 'Серия ПР - принудительный выброс воды (с установленным насосом)',
            'content'     => '',

            'main'   => 0,
            'active' => 1,
            'type'   => 2,
        ));
        $model->save();


        if (!$model = $modx->getObject($cls, array('model' => 'БИОТАНК 8 сам*', 'type' => 2))) {
            $model = $modx->newObject($cls);
            $model->set('rank', $modx->getCount($cls));
        }
        $model->fromArray(array(
            'model'            => 'БИОТАНК 8 сам*',
            'image'            => '',
            'ico'              => 'assets/components/ecotank/inc/img/elements/bio/septik-bio-2.png',
            'number_of_users'  => '8',
            'size'             => '2000х1200х1850',
            'volume'           => 2500,
            'power'            => 1600,
            'weight'           => 150,
            'price'            => 74300,
            'old_price'        => 0,
            'installing_price' => 25100,
            'discount'         => '',

            'description' => 'Серия САМ - самотёчный',
            'content'     => '',

            'main'   => 0,
            'active' => 1,
            'type'   => 2,
        ));
        $model->save();

        if (!$model = $modx->getObject($cls, array('model' => 'БИОТАНК 8 пр**', 'type' => 2))) {
            $model = $modx->newObject($cls);
            $model->set('rank', $modx->getCount($cls));
        }
        $model->fromArray(array(
            'model'            => 'БИОТАНК 8 пр**',
            'image'            => '',
            'ico'              => 'assets/components/ecotank/inc/img/elements/bio/septik-bio-8pr_hit.png',
            'number_of_users'  => '8',
            'size'             => '2000х1200х1850',
            'volume'           => 2500,
            'power'            => 1600,
            'weight'           => 150,
            'price'            => 79000,
            'old_price'        => 98000,
            'installing_price' => 28100,
            'discount'         => '',

            'description' => 'Серия ПР - принудительный выброс воды (с установленным насосом)',
            'content'     => '',

            'main'   => 0,
            'active' => 1,
            'type'   => 2,
        ));
        $model->save();

        if (!$model = $modx->getObject($cls, array('model' => 'БИОТАНК 10 сам*', 'type' => 2))) {
            $model = $modx->newObject($cls);
            $model->set('rank', $modx->getCount($cls));
        }
        $model->fromArray(array(
            'model'            => 'БИОТАНК 10 сам*',
            'image'            => '',
            'ico'              => 'assets/components/ecotank/inc/img/elements/bio/septik-bio-2.png',
            'number_of_users'  => '10',
            'size'             => '2400х1200х1850',
            'volume'           => 3000,
            'power'            => 2000,
            'weight'           => 160,
            'price'            => 80000,
            'old_price'        => 0,
            'installing_price' => 30000,
            'discount'         => '',

            'description' => 'Серия САМ - самотёчный',
            'content'     => '',

            'main'   => 0,
            'active' => 1,
            'type'   => 2,
        ));
        $model->save();

        if (!$model = $modx->getObject($cls, array('model' => 'БИОТАНК 10 пр**', 'type' => 2))) {
            $model = $modx->newObject($cls);
            $model->set('rank', $modx->getCount($cls));
        }
        $model->fromArray(array(
            'model'            => 'БИОТАНК 10 пр**',
            'image'            => '',
            'ico'              => 'assets/components/ecotank/inc/img/elements/bio/septik-bio-10pr_hit.png',
            'number_of_users'  => '10',
            'size'             => '2400х1200х1850',
            'volume'           => 3000,
            'power'            => 2000,
            'weight'           => 160,
            'price'            => 85000,
            'old_price'        => 0,
            'installing_price' => 35100,
            'discount'         => '',

            'description' => 'Серия ПР - принудительный выброс воды (с установленным насосом)',
            'content'     => '',

            'main'   => 0,
            'active' => 1,
            'type'   => 2,
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
            'type'   => 2
        ));
        $model->save();

        break;
    case xPDOTransport::ACTION_UNINSTALL:
        break;
}

return true;
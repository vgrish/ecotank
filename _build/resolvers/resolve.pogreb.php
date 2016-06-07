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
        $cls = 'ecotankPogreb';

        if (!$model = $modx->getObject($cls, array('model' => 'Погреб 1500х2300', 'type' => 1))) {
            $model = $modx->newObject($cls);
            $model->set('rank', $modx->getCount($cls));
        }
        $model->fromArray(array(
            'model'            => 'Погреб 1500х2300',
            'image'            => 'assets/components/ecotank/inc/img/elements/pogreb/pogreb_circle.png',
            'ico'              => '',
            'number_of_users'  => '',
            'size'             => '1500х2300',
            'volume'           => 3.5,
            'price'            => 59000,
            'old_price'        => 80000,
            'installing_price' => 24500,
            'discount'         => '30%',

            'description' => '',

            'main'   => 1,
            'active' => 1,
            'type'   => 1,

            'content' => 'Пластиковый погреб «Тритон»<br><br> применяется в качестве подземного помещения расположенного под домом, гаражом и другими техническими помещениями.
 Погреб изготавливается из листового полиэтилена методом экструзионной сварки. <br><br>Погреб из полиэтилена полностью герметичен и не подвержен коррозии. Срок службы более 50 лет.<br><br>
  Возможно изготовление погреба по Вашим размерам.

',
        ));
        $model->save();

        if (!$model = $modx->getObject($cls, array('model' => 'Погреб 1800х2300', 'type' => 1))) {
            $model = $modx->newObject($cls);
            $model->set('rank', $modx->getCount($cls));
        }
        $model->fromArray(array(
            'model'            => 'Погреб 1800х2300',
            'number_of_users'  => '',
            'size'             => '1800х2300',
            'volume'           => 5.1,
            'price'            => 73000,
            'old_price'        => 100000,
            'installing_price' => 35700,
            'discount'         => '30%',

            'description' => '',
            'content'     => '',

            'main'   => 0,
            'active' => 1,
            'type'   => 1,
        ));
        $model->save();

        if (!$model = $modx->getObject($cls, array('model' => 'Погреб 2000х2300', 'type' => 1))) {
            $model = $modx->newObject($cls);
            $model->set('rank', $modx->getCount($cls));
        }
        $model->fromArray(array(
            'model'            => 'Погреб 2000х2300',
            'number_of_users'  => '',
            'size'             => '2000х2300',
            'volume'           => 6.3,
            'price'            => 87000,
            'old_price'        => 120000,
            'installing_price' => 44100,
            'discount'         => '30%',

            'description' => 'ХИТ ПРОДАЖ!',
            'content'     => '',

            'main'   => 0,
            'active' => 1,
            'type'   => 1,
        ));
        $model->save();

        if (!$model = $modx->getObject($cls, array('model' => 'Погреб 2200х2300', 'type' => 1))) {
            $model = $modx->newObject($cls);
            $model->set('rank', $modx->getCount($cls));
        }
        $model->fromArray(array(
            'model'            => 'Погреб 2200х2300',
            'number_of_users'  => '',
            'size'             => '2200х2300',
            'volume'           => 7.6,
            'price'            => 101000,
            'old_price'        => 140000,
            'installing_price' => 53000,
            'discount'         => '30%',

            'description' => '',
            'content'     => '',

            'main'   => 0,
            'active' => 1,
            'type'   => 1,
        ));
        $model->save();

        if (!$model = $modx->getObject($cls, array('model' => 'Погреб 2400х2300', 'type' => 1))) {
            $model = $modx->newObject($cls);
            $model->set('rank', $modx->getCount($cls));
        }
        $model->fromArray(array(
            'model'            => 'Погреб 2400х2300',
            'number_of_users'  => '',
            'size'             => '2400х2300',
            'volume'           => 9.1,
            'price'            => 115000,
            'old_price'        => 160000,
            'installing_price' => 63000,
            'discount'         => '30%',

            'description' => '',
            'content'     => '',

            'main'   => 0,
            'active' => 1,
            'type'   => 1,
        ));
        $model->save();


        /* --------------------------------------------------------------------------- */

        if (!$model = $modx->getObject($cls, array('model' => 'Погреб 1200х1200х1500', 'type' => 2))) {
            $model = $modx->newObject($cls);
            $model->set('rank', $modx->getCount($cls));
        }
        $model->fromArray(array(
            'model'            => 'Погреб 1200х1200х1500',
            'image'            => 'assets/components/ecotank/inc/img/elements/pogreb/pogreb.png',
            'number_of_users'  => '',
            'size'             => '1200х1200х1500',
            'volume'           => 2.16,
            'price'            => 48000,
            'old_price'        => 65000,
            'installing_price' => 23100,
            'discount'         => '30%',

            'description' => '',

            'main'   => 1,
            'active' => 1,
            'type'   => 2,

            'content' => 'Пластиковый погреб «Тритон»<br><br> применяется в качестве подземного помещения расположенного под домом, гаражом и другими техническими помещениями.
 Погреб изготавливается из листового полиэтилена методом экструзионной сварки. <br><br>Погреб из полиэтилена полностью герметичен и не подвержен коррозии. Срок службы более 50 лет.<br><br>
  Возможно изготовление погреба по Вашим размерам.

',
        ));
        $model->save();

        if (!$model = $modx->getObject($cls, array('model' => 'Погреб 1200х1200х1750', 'type' => 2))) {
            $model = $modx->newObject($cls);
            $model->set('rank', $modx->getCount($cls));
        }
        $model->fromArray(array(
            'model'            => 'Погреб 1200х1200х1750',
            'number_of_users'  => '',
            'size'             => '1200х1200х1750',
            'volume'           => 2.5,
            'price'            => 53000,
            'old_price'        => 72000,
            'installing_price' => 26600,
            'discount'         => '30%',

            'description' => '',
            'content'     => '',

            'main'   => 0,
            'active' => 1,
            'type'   => 2,
        ));
        $model->save();

        if (!$model = $modx->getObject($cls, array('model' => 'Погреб 1500х1500х1750', 'type' => 2))) {
            $model = $modx->newObject($cls);
            $model->set('rank', $modx->getCount($cls));
        }
        $model->fromArray(array(
            'model'            => 'Погреб 1500х1500х1750',
            'number_of_users'  => '',
            'size'             => '1500х1500х1750',
            'volume'           => 4,
            'price'            => 66000,
            'old_price'        => 90000,
            'installing_price' => 42600,
            'discount'         => '30%',

            'description' => '',
            'content'     => '',

            'main'   => 0,
            'active' => 1,
            'type'   => 2,
        ));
        $model->save();

        if (!$model = $modx->getObject($cls, array('model' => 'Погреб 1500х1500х2000', 'type' => 2))) {
            $model = $modx->newObject($cls);
            $model->set('rank', $modx->getCount($cls));
        }
        $model->fromArray(array(
            'model'            => 'Погреб 1500х1500х2000',
            'number_of_users'  => '',
            'size'             => '1500х1500х2000',
            'volume'           => 4.5,
            'price'            => 73000,
            'old_price'        => 101000,
            'installing_price' => 47600,
            'discount'         => '30%',

            'description' => '',
            'content'     => '',

            'main'   => 0,
            'active' => 1,
            'type'   => 2,
        ));
        $model->save();

        if (!$model = $modx->getObject($cls, array('model' => 'Погреб 2000х1500х1750', 'type' => 2))) {
            $model = $modx->newObject($cls);
            $model->set('rank', $modx->getCount($cls));
        }
        $model->fromArray(array(
            'model'            => 'Погреб 2000х1500х1750',
            'number_of_users'  => '',
            'size'             => '2000х1500х1750',
            'volume'           => 5.3,
            'price'            => 85000,
            'old_price'        => 118000,
            'installing_price' => 48600,
            'discount'         => '30%',

            'description' => '',
            'content'     => '',

            'main'   => 0,
            'active' => 1,
            'type'   => 2,
        ));
        $model->save();

        if (!$model = $modx->getObject($cls, array('model' => 'Погреб 2000х1500х2000', 'type' => 2))) {
            $model = $modx->newObject($cls);
            $model->set('rank', $modx->getCount($cls));
        }
        $model->fromArray(array(
            'model'            => 'Погреб 2000х1500х2000',
            'number_of_users'  => '',
            'size'             => '2000х1500х2000',
            'volume'           => 6,
            'price'            => 92000,
            'old_price'        => 128000,
            'installing_price' => 54600,
            'discount'         => '30%',

            'description' => '',
            'content'     => '',

            'main'   => 0,
            'active' => 1,
            'type'   => 2
        ));
        $model->save();

        if (!$model = $modx->getObject($cls, array('model' => 'Погреб 2000х2000х2000', 'type' => 2))) {
            $model = $modx->newObject($cls);
            $model->set('rank', $modx->getCount($cls));
        }
        $model->fromArray(array(
            'model'            => 'Погреб 2000х2000х2000',
            'number_of_users'  => '',
            'size'             => '2000х2000х2000',
            'volume'           => 7.92,
            'price'            => 111000,
            'old_price'        => 155000,
            'installing_price' => 56600,
            'discount'         => '30%',

            'description' => 'ХИТ ПРОДАЖ!',
            'content'     => '',

            'main'   => 0,
            'active' => 1,
            'type'   => 2,
        ));
        $model->save();

        if (!$model = $modx->getObject($cls, array('model' => 'Погреб 2600х1800х2000', 'type' => 2))) {
            $model = $modx->newObject($cls);
            $model->set('rank', $modx->getCount($cls));
        }
        $model->fromArray(array(
            'model'            => 'Погреб 2600х1800х2000',
            'number_of_users'  => '',
            'size'             => '2600х1800х2000',
            'volume'           => 9.36,
            'price'            => 118000,
            'old_price'        => 165000,
            'installing_price' => 65600,
            'discount'         => '30%',

            'description' => '',
            'content'     => '',

            'main'   => 0,
            'active' => 1,
            'type'   => 2,
        ));
        $model->save();

        if (!$model = $modx->getObject($cls, array('model' => 'Погреб 4000х2000х2000', 'type' => 2))) {
            $model = $modx->newObject($cls);
            $model->set('rank', $modx->getCount($cls));
        }
        $model->fromArray(array(
            'model'            => 'Погреб 4000х2000х2000',
            'number_of_users'  => '',
            'size'             => '4000х2000х2000',
            'volume'           => 16,
            'price'            => 185000,
            'old_price'        => 260000,
            'installing_price' => 112000,
            'discount'         => '30%',

            'description' => '',
            'content'     => '',

            'main'   => 0,
            'active' => 1,
            'type'   => 2,
        ));
        $model->save();

        break;
    case xPDOTransport::ACTION_UNINSTALL:
        break;
}

return true;
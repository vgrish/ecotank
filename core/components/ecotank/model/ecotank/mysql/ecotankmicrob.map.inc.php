<?php
$xpdo_meta_map['ecotankMicrob']= array (
  'package' => 'ecotank',
  'version' => '1.1',
  'table' => 'ecotank_microbs',
  'extends' => 'xPDOSimpleObject',
  'fields' => 
  array (
    'model' => '',
    'image' => NULL,
    'ico' => NULL,
    'number_of_users' => '',
    'size' => '',
    'volume' => 0,
    'power' => 0,
    'weight' => 0,
    'price' => 0,
    'old_price' => 0,
    'installing_price' => 0,
    'discount' => 0,
    'rank' => 0,
    'main' => 1,
    'active' => 1,
    'properties' => NULL,
    'description' => '',
    'content' => '',
  ),
  'fieldMeta' => 
  array (
    'model' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '100',
      'phptype' => 'string',
      'null' => false,
      'default' => '',
    ),
    'image' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '255',
      'phptype' => 'string',
      'null' => true,
    ),
    'ico' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '255',
      'phptype' => 'string',
      'null' => true,
    ),
    'number_of_users' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '100',
      'phptype' => 'string',
      'null' => false,
      'default' => '',
    ),
    'size' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '100',
      'phptype' => 'string',
      'null' => false,
      'default' => '',
    ),
    'volume' => 
    array (
      'dbtype' => 'decimal',
      'precision' => '12,2',
      'phptype' => 'float',
      'null' => true,
      'default' => 0,
    ),
    'power' => 
    array (
      'dbtype' => 'decimal',
      'precision' => '12,2',
      'phptype' => 'float',
      'null' => true,
      'default' => 0,
    ),
    'weight' => 
    array (
      'dbtype' => 'decimal',
      'precision' => '12,2',
      'phptype' => 'float',
      'null' => true,
      'default' => 0,
    ),
    'price' => 
    array (
      'dbtype' => 'decimal',
      'precision' => '12,2',
      'phptype' => 'float',
      'null' => true,
      'default' => 0,
    ),
    'old_price' => 
    array (
      'dbtype' => 'decimal',
      'precision' => '12,2',
      'phptype' => 'float',
      'null' => true,
      'default' => 0,
    ),
    'installing_price' => 
    array (
      'dbtype' => 'decimal',
      'precision' => '12,2',
      'phptype' => 'float',
      'null' => true,
      'default' => 0,
    ),
    'discount' => 
    array (
      'dbtype' => 'decimal',
      'precision' => '12,2',
      'phptype' => 'float',
      'null' => true,
      'default' => 0,
    ),
    'rank' => 
    array (
      'dbtype' => 'tinyint',
      'precision' => '1',
      'phptype' => 'integer',
      'attributes' => 'unsigned',
      'null' => true,
      'default' => 0,
    ),
    'main' => 
    array (
      'dbtype' => 'tinyint',
      'precision' => '1',
      'phptype' => 'boolean',
      'attributes' => 'unsigned',
      'null' => false,
      'default' => 1,
    ),
    'active' => 
    array (
      'dbtype' => 'tinyint',
      'precision' => '1',
      'phptype' => 'boolean',
      'attributes' => 'unsigned',
      'null' => false,
      'default' => 1,
    ),
    'properties' => 
    array (
      'dbtype' => 'text',
      'phptype' => 'json',
      'null' => true,
    ),
    'description' => 
    array (
      'dbtype' => 'text',
      'phptype' => 'text',
      'null' => true,
      'default' => '',
    ),
    'content' => 
    array (
      'dbtype' => 'text',
      'phptype' => 'text',
      'null' => true,
      'default' => '',
    ),
  ),
  'indexes' => 
  array (
    'model' => 
    array (
      'alias' => 'model',
      'primary' => false,
      'unique' => false,
      'type' => 'BTREE',
      'columns' => 
      array (
        'model' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
    'main' => 
    array (
      'alias' => 'main',
      'primary' => false,
      'unique' => false,
      'type' => 'BTREE',
      'columns' => 
      array (
        'main' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
    'active' => 
    array (
      'alias' => 'active',
      'primary' => false,
      'unique' => false,
      'type' => 'BTREE',
      'columns' => 
      array (
        'active' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
  ),
);

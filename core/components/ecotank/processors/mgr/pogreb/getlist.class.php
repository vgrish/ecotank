<?php

/**
 * Get a list of ecotankPogreb
 */
class modecotankPogrebGetListProcessor extends modObjectGetListProcessor
{
    public $objectType = 'ecotankPogreb';
    public $classKey = 'ecotankPogreb';
    public $defaultSortField = 'rank';
    public $defaultSortDirection = 'ASC';
    public $languageTopics = array('default', 'ecotank');
    public $permission = '';

    /** {@inheritDoc} */
    public function beforeQuery()
    {
        if (!$this->checkPermissions()) {
            return $this->modx->lexicon('access_denied');
        }

        return true;
    }

    /**
     * @param xPDOQuery $c
     *
     * @return xPDOQuery
     */
    public function prepareQueryBeforeCount(xPDOQuery $c)
    {

        /*$class = $this->getProperty('class');
        if ($class) {
            $c->where(array('class' => $class));
        }*/

        $id = $this->getProperty('id');
        if (!empty($id) AND $this->getProperty('combo')) {
            $q = $this->modx->newQuery($this->objectType);
            $q->where(array('id!=' => $id));
            $q->select('id');
            $q->limit($this->getProperty('limit') - 1);
            $q->prepare();
            $q->stmt->execute();
            $ids = $q->stmt->fetchAll(PDO::FETCH_COLUMN, 0);
            $ids = array_merge_recursive(array($id), $ids);
            $c->where(array(
                "{$this->objectType}.id:IN" => $ids
            ));
        }

        $active = $this->getProperty('active');
        if ($active != '') {
            $c->where("{$this->objectType}.active={$active}");
        }

        $type = $this->getProperty('type');
        if ($type != '') {
            $c->where("{$this->objectType}.type={$type}");
        }

        $query = trim($this->getProperty('query'));
        if ($query) {
            $c->where(array(
                'model:LIKE'          => "%{$query}%",
                'OR:description:LIKE' => "%{$query}%",
            ));
        }

        return $c;
    }

    /** {@inheritDoc} */
    public function outputArray(array $array, $count = false)
    {
        if ($this->getProperty('addall')) {
            $array = array_merge_recursive(array(
                array(
                    'id'   => 0,
                    'name' => $this->modx->lexicon('ecotank_all')
                )
            ), $array);
        }
        if ($this->getProperty('novalue')) {
            $array = array_merge_recursive(array(
                array(
                    'id'   => 0,
                    'name' => $this->modx->lexicon('ecotank_no')
                )
            ), $array);
        }

        return parent::outputArray($array, $count);
    }

    /**
     * @param xPDOObject $object
     *
     * @return array
     */
    public function prepareRow(xPDOObject $object)
    {
        $icon = 'icon';
        $array = $object->toArray();
        $array['actions'] = array();

        // Edit
        $array['actions'][] = array(
            'cls'    => '',
            'icon'   => "$icon $icon-edit green",
            'title'  => $this->modx->lexicon('ecotank_action_update'),
            'action' => 'update',
            'button' => true,
            'menu'   => true,
        );

        // sep
        $array['actions'][] = array(
            'cls'    => '',
            'icon'   => '',
            'title'  => '',
            'action' => 'sep',
            'button' => false,
            'menu'   => true,
        );

        if (!$array['active']) {
            $array['actions'][] = array(
                'cls'    => '',
                'icon'   => "$icon $icon-toggle-off red",
                'title'  => $this->modx->lexicon('ecotank_action_turnon'),
                'action' => 'active',
                'button' => true,
                'menu'   => true,
            );
        } else {
            $array['actions'][] = array(
                'cls'    => '',
                'icon'   => "$icon $icon-toggle-on green",
                'title'  => $this->modx->lexicon('ecotank_action_turnoff'),
                'action' => 'inactive',
                'button' => true,
                'menu'   => true,
            );
        }

        // sep
        $array['actions'][] = array(
            'cls'    => '',
            'icon'   => '',
            'title'  => '',
            'action' => 'sep',
            'button' => false,
            'menu'   => true,
        );
        // Remove
        $array['actions'][] = array(
            'cls'    => '',
            'icon'   => "$icon $icon-trash-o red",
            'title'  => $this->modx->lexicon('ecotank_action_remove'),
            'action' => 'remove',
            'button' => true,
            'menu'   => true,
        );

        return $array;
    }

}

return 'modecotankPogrebGetListProcessor';
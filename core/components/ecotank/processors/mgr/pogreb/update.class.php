<?php

/**
 * Update an ecotankPogreb
 */
class modecotankPogrebUpdateProcessor extends modObjectUpdateProcessor
{
    public $objectType = 'ecotankPogreb';
    public $classKey = 'ecotankPogreb';
    public $languageTopics = array('ecotank');
    public $permission = '';

    /** {@inheritDoc} */
    public function beforeSave()
    {
        if (!$this->checkPermissions()) {
            return $this->modx->lexicon('access_denied');
        }

        return true;
    }

    /** {@inheritDoc} */
    public function beforeSet()
    {
        $id = (int)$this->getProperty('id');
        if (empty($id)) {
            return $this->modx->lexicon('ecotank_err_ns');
        }

        $model = trim($this->getProperty('model'));
        if (empty($model)) {
            $this->modx->error->addField('model', $this->modx->lexicon('ecotank_err_ae'));
        }
        $type = trim($this->getProperty('type'));
        if (empty($type)) {
            $this->modx->error->addField('type', $this->modx->lexicon('ecotank_err_ae'));
        }

        if ($this->modx->getCount($this->classKey, array(
            'model' => $model,
            'type'  => $type,
            'id:!=' => $id
        ))
        ) {
            $this->modx->error->addField('model', $this->modx->lexicon('ecotank_err_ae'));
        }

        return parent::beforeSet();
    }
}

return 'modecotankPogrebUpdateProcessor';

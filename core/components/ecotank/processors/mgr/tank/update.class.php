<?php

/**
 * Update an ecotankTank
 */
class modecotankTankUpdateProcessor extends modObjectUpdateProcessor
{
    public $objectType = 'ecotankTank';
    public $classKey = 'ecotankTank';
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
        $model = trim($this->getProperty('model'));
        if (empty($id)) {
            return $this->modx->lexicon('ecotank_err_ns');
        }

        if (empty($model)) {
            $this->modx->error->addField('model', $this->modx->lexicon('ecotank_err_ae'));
        }
        if ($this->modx->getCount($this->classKey, array(
            'model' => $model,
            'id:!=' => $id
        ))
        ) {
            $this->modx->error->addField('model', $this->modx->lexicon('ecotank_err_ae'));
        }

        return parent::beforeSet();
    }
}

return 'modecotankTankUpdateProcessor';

<?php

/**
 * Create an ecotankPogreb
 */
class modecotankPogrebCreateProcessor extends modObjectCreateProcessor
{
	public $objectType = 'ecotankPogreb';
	public $classKey = 'ecotankPogreb';
	public $languageTopics = array('ecotank');
	public $permission = '';

	/** {@inheritDoc} */
	public function beforeSet()
	{
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
			'type'  => $type
		))
		) {
			$this->modx->error->addField('model', $this->modx->lexicon('ecotank_err_ae'));
		}

		return parent::beforeSet();
	}

	/** {@inheritDoc} */
	public function beforeSave()
	{
		$this->object->fromArray(array(
			'rank'     => $this->modx->getCount($this->classKey)
		));

		return parent::beforeSave();
	}

}

return 'modecotankPogrebCreateProcessor';
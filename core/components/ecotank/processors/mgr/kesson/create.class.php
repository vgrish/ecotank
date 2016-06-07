<?php

/**
 * Create an ecotankKesson
 */
class modecotankKessonCreateProcessor extends modObjectCreateProcessor
{
	public $objectType = 'ecotankKesson';
	public $classKey = 'ecotankKesson';
	public $languageTopics = array('ecotank');
	public $permission = '';

	/** {@inheritDoc} */
	public function beforeSet()
	{
		$model = trim($this->getProperty('model'));
		if (empty($model)) {
			$this->modx->error->addField('model', $this->modx->lexicon('ecotank_err_ae'));
		}
		if ($this->modx->getCount($this->classKey, array(
			'model'  => $model
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

return 'modecotankKessonCreateProcessor';
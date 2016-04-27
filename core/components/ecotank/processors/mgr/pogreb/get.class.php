<?php

/**
 * Get an ecotankPogreb
 */
class modecotankPogrebGetProcessor extends modObjectGetProcessor
{
	public $objectType = 'ecotankPogreb';
	public $classKey = 'ecotankPogreb';
	public $languageTopics = array('ecotank');
	public $permission = '';

	/** {@inheritDoc} */
	public function process()
	{
		if (!$this->checkPermissions()) {
			return $this->failure($this->modx->lexicon('access_denied'));
		}

		return parent::process();
	}

}

return 'modecotankPogrebGetProcessor';
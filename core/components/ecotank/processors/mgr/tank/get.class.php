<?php

/**
 * Get an ecotankTank
 */
class modecotankTankGetProcessor extends modObjectGetProcessor
{
	public $objectType = 'ecotankTank';
	public $classKey = 'ecotankTank';
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

return 'modecotankTankGetProcessor';
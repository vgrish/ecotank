<?php

/**
 * Get an ecotankUniTank
 */
class modecotankUniTankGetProcessor extends modObjectGetProcessor
{
	public $objectType = 'ecotankUniTank';
	public $classKey = 'ecotankUniTank';
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

return 'modecotankUniTankGetProcessor';
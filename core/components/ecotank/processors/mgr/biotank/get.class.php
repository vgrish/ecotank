<?php

/**
 * Get an ecotankBioTank
 */
class modecotankBioTankGetProcessor extends modObjectGetProcessor
{
	public $objectType = 'ecotankBioTank';
	public $classKey = 'ecotankBioTank';
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

return 'modecotankBioTankGetProcessor';
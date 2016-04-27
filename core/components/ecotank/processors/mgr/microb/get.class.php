<?php

/**
 * Get an ecotankMicrob
 */
class modecotankMicrobGetProcessor extends modObjectGetProcessor
{
	public $objectType = 'ecotankMicrob';
	public $classKey = 'ecotankMicrob';
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

return 'modecotankMicrobGetProcessor';
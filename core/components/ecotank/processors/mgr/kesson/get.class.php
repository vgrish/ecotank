<?php

/**
 * Get an ecotankKesson
 */
class modecotankKessonGetProcessor extends modObjectGetProcessor
{
	public $objectType = 'ecotankKesson';
	public $classKey = 'ecotankKesson';
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

return 'modecotankKessonGetProcessor';
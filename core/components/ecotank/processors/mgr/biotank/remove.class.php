<?php

/**
 * Remove a ecotankBioTank
 */
class modecotankBioTankRemoveProcessor extends modObjectRemoveProcessor
{
	public $classKey = 'ecotankBioTank';
	public $languageTopics = array('ecotank');
	public $permission = '';

	/** {@inheritDoc} */
	public function initialize()
	{
		if (!$this->modx->hasPermission($this->permission)) {
			return $this->modx->lexicon('access_denied');
		}
		return parent::initialize();
	}

	/** {@inheritDoc} */
	public function beforeRemove()
	{
	/*	if (!$this->object->get('editable')) {
			$this->failure($this->modx->lexicon('ecotank_err_lock'));
		}*/
		return parent::beforeRemove();
	}
}

return 'modecotankBioTankRemoveProcessor';
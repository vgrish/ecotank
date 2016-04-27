<?php


class modEcoTankTypeGetListProcessor extends modObjectProcessor
{
    public $languageTopics = array('ecotank');

    /** {@inheritDoc} */
    public function process()
    {
        $class = $this->getProperty('class');

        switch ($class) {
            case 'ecotankBioTank':
                $array = array(
                    0 => array(
                        'name'  => $this->modx->lexicon('ecotank_vertical'),
                        'value' => '1'
                    ),
                    1 => array(
                        'name'  => $this->modx->lexicon('ecotank_horizontal'),
                        'value' => '2'
                    ),
                );

                break;
            case 'ecotankPogreb':
                $array = array(
                    0 => array(
                        'name'  => $this->modx->lexicon('ecotank_cylindrical'),
                        'value' => '1'
                    ),
                    1 => array(
                        'name'  => $this->modx->lexicon('ecotank_rectangular'),
                        'value' => '2'
                    ),
                );

                break;
            default:
                $array = array();
                break;
        }


        $query = $this->getProperty('query');
        if (!empty($query)) {
            foreach ($array as $k => $format) {
                if (stripos($format['name'], $query) === false) {
                    unset($array[$k]);
                }
            }
            sort($array);
        }

        return $this->outputArray($array);
    }

    /** {@inheritDoc} */
    public function outputArray(array $array, $count = false)
    {
        if ($this->getProperty('addall')) {
            $array = array_merge_recursive(array(
                array(
                    'name'  => $this->modx->lexicon('ecotank_all'),
                    'value' => ''
                )
            ), $array);
        }

        return parent::outputArray($array, $count);
    }

}

return 'modEcoTankTypeGetListProcessor';
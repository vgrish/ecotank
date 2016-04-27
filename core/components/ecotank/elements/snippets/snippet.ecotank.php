<?php
/** @var array $scriptProperties */
/** @var ecotank $ecotank */
if (!$ecotank = $modx->getService('ecotank', 'ecotank', $modx->getOption('ecotank_core_path', null, $modx->getOption('core_path') . 'components/ecotank/') . 'model/ecotank/', $scriptProperties)) {
	return 'Could not load ecotank class!';
}

// Do your snippet code here. This demo grabs 5 items from our custom table.
$tpl = $modx->getOption('tpl', $scriptProperties, 'Item');
$sortby = $modx->getOption('sortby', $scriptProperties, 'name');
$sortdir = $modx->getOption('sortbir', $scriptProperties, 'ASC');
$limit = $modx->getOption('limit', $scriptProperties, 5);
$outputSeparator = $modx->getOption('outputSeparator', $scriptProperties, "\n");
$toPlaceholder = $modx->getOption('toPlaceholder', $scriptProperties, false);

// Build query
$c = $modx->newQuery('ecotankItem');
$c->sortby($sortby, $sortdir);
$c->limit($limit);
$items = $modx->getIterator('ecotankItem', $c);

// Iterate through items
$list = array();
/** @var ecotankItem $item */
foreach ($items as $item) {
	$list[] = $modx->getChunk($tpl, $item->toArray());
}

// Output
$output = implode($outputSeparator, $list);
if (!empty($toPlaceholder)) {
	// If using a placeholder, output nothing and set output to specified placeholder
	$modx->setPlaceholder($toPlaceholder, $output);

	return '';
}
// By default just return output
return $output;

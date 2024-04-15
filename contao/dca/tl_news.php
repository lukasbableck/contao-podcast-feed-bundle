<?php

use Contao\CoreBundle\DataContainer\PaletteManipulator;

$GLOBALS['TL_DCA']['tl_news']['fields']['podcast'] = [
	'exclude' => true,
	'inputType' => 'checkbox',
	'eval' => ['submitOnChange' => true, 'tl_class' => 'w50 clr'],
	'sql' => "char(1) NOT NULL default ''",
];
$GLOBALS['TL_DCA']['tl_news']['fields']['podcastFile'] = [
	'exclude' => true,
	'inputType' => 'fileTree',
	'eval' => ['filesOnly' => true, 'fieldType' => 'radio', 'tl_class' => 'w50 clr', 'mandatory' => true, 'extensions' => 'mp3'],
	'sql' => 'binary(16) NULL',
];
$GLOBALS['TL_DCA']['tl_news']['fields']['podcastAuthor'] = [
	'exclude' => true,
	'inputType' => 'text',
	'eval' => ['tl_class' => 'w50 clr', 'maxlength' => 255],
	'sql' => "varchar(255) NOT NULL default ''",
];
$GLOBALS['TL_DCA']['tl_news']['fields']['podcastSubtitle'] = [
	'exclude' => true,
	'inputType' => 'text',
	'eval' => ['tl_class' => 'w50 clr', 'maxlength' => 255],
	'sql' => "varchar(255) NOT NULL default ''",
];
$GLOBALS['TL_DCA']['tl_news']['fields']['podcastSummary'] = [
	'exclude' => true,
	'inputType' => 'textarea',
	'eval' => ['tl_class' => 'clr', 'rte' => 'tinyMCE'],
	'sql' => "text NOT NULL default ''",
];
$GLOBALS['TL_DCA']['tl_news']['fields']['podcastSeason'] = [
	'exclude' => true,
	'inputType' => 'text',
	'eval' => ['tl_class' => 'w50 clr'],
	'sql' => "varchar(255) NOT NULL default ''",
];
$GLOBALS['TL_DCA']['tl_news']['fields']['podcastEpisode'] = [
	'exclude' => true,
	'inputType' => 'text',
	'eval' => ['tl_class' => 'w50'],
	'sql' => "varchar(255) NOT NULL default ''",
];
$GLOBALS['TL_DCA']['tl_news']['fields']['podcastEpisodeType'] = [
	'exclude' => true,
	'inputType' => 'select',
	'options' => ['full', 'trailer', 'bonus'],
	'reference' => &$GLOBALS['TL_LANG']['tl_news']['podcastEpisodeTypes'],
	'eval' => ['tl_class' => 'w50 clr', 'includeBlankOption' => true, 'chosen' => true, 'mandatory' => true],
	'sql' => "varchar(255) NOT NULL default ''",
];
$GLOBALS['TL_DCA']['tl_news']['fields']['podcastBlock'] = [
	'exclude' => true,
	'inputType' => 'checkbox',
	'eval' => ['tl_class' => 'w50 clr'],
	'sql' => "char(1) NOT NULL default ''",
];
$GLOBALS['TL_DCA']['tl_news']['fields']['podcastExplicit'] = [
	'exclude' => true,
	'inputType' => 'select',
	'options' => &$GLOBALS['TL_LANG']['podcast']['explicit_options'],
	'eval' => ['tl_class' => 'w50 clr', 'includeBlankOption' => true, 'chosen' => true],
	'sql' => "varchar(255) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_news']['palettes']['__selector__'][] = 'podcast';
$GLOBALS['TL_DCA']['tl_news']['subpalettes']['podcast'] = 'podcastFile,podcastAuthor,podcastSubtitle,podcastSummary,podcastSeason,podcastEpisode,podcastEpisodeType,podcastBlock,podcastExplicit';

PaletteManipulator::create()
	->addLegend('podcast_legend', 'enclosure_legend', PaletteManipulator::POSITION_AFTER)
	->addField('podcast', 'podcast_legend', PaletteManipulator::POSITION_APPEND)
	->applyToPalette('default', 'tl_news')
	->applyToPalette('internal', 'tl_news')
	->applyToPalette('article', 'tl_news')
	->applyToPalette('external', 'tl_news')
;

<?php

use Contao\CoreBundle\DataContainer\PaletteManipulator;

$GLOBALS['TL_DCA']['tl_page']['fields']['podcastFile'] = [
	'exclude' => true,
	'inputType' => 'fileTree',
	'eval' => ['filesOnly' => true, 'fieldType' => 'radio', 'tl_class' => 'w50 clr', 'mandatory' => true, 'extensions' => 'mp3'],
	'sql' => 'binary(16) NULL',
];
$GLOBALS['TL_DCA']['tl_page']['fields']['podcastAuthor'] = [
	'exclude' => true,
	'inputType' => 'text',
	'eval' => ['tl_class' => 'w50 clr'],
	'sql' => "varchar(255) NOT NULL default ''",
];
$GLOBALS['TL_DCA']['tl_page']['fields']['podcastSubtitle'] = [
	'exclude' => true,
	'inputType' => 'text',
	'eval' => ['tl_class' => 'w50 clr'],
	'sql' => "varchar(255) NOT NULL default ''",
];
$GLOBALS['TL_DCA']['tl_page']['fields']['podcastSummary'] = [
	'exclude' => true,
	'inputType' => 'text',
	'eval' => ['tl_class' => 'w50 clr'],
	'sql' => "varchar(255) NOT NULL default ''",
];
$GLOBALS['TL_DCA']['tl_page']['fields']['podcastSeason'] = [
	'exclude' => true,
	'inputType' => 'text',
	'eval' => ['tl_class' => 'w50 clr'],
	'sql' => "varchar(255) NOT NULL default ''",
];
$GLOBALS['TL_DCA']['tl_page']['fields']['podcastEpisode'] = [
	'exclude' => true,
	'inputType' => 'text',
	'eval' => ['tl_class' => 'w50'],
	'sql' => "varchar(255) NOT NULL default ''",
];
$GLOBALS['TL_DCA']['tl_page']['fields']['podcastEpisodeType'] = [
	'exclude' => true,
	'inputType' => 'select',
	'options' => ['full', 'trailer', 'bonus'],
	'reference' => &$GLOBALS['TL_LANG']['tl_news']['podcastEpisodeTypes'],
	'eval' => ['tl_class' => 'w50 clr', 'includeBlankOption' => true, 'chosen' => true, 'mandatory' => true],
	'sql' => "varchar(255) NOT NULL default ''",
];
$GLOBALS['TL_DCA']['tl_page']['fields']['podcastBlock'] = [
	'exclude' => true,
	'inputType' => 'checkbox',
	'eval' => ['tl_class' => 'w50 clr'],
	'sql' => "char(1) NOT NULL default ''",
];
$GLOBALS['TL_DCA']['tl_page']['fields']['podcastExplicit'] = [
	'exclude' => true,
	'inputType' => 'select',
	'options' => &$GLOBALS['TL_LANG']['podcast']['explicit_options'],
	'eval' => ['tl_class' => 'w50 clr', 'includeBlankOption' => true, 'chosen' => true],
	'sql' => "varchar(255) NOT NULL default ''",
];

PaletteManipulator::create()
	->addLegend('podcast_legend', 'title_legend', PaletteManipulator::POSITION_AFTER)
	->addField('podcastFile', 'podcast_legend', PaletteManipulator::POSITION_APPEND)
	->addField('podcastAuthor', 'podcast_legend', PaletteManipulator::POSITION_APPEND)
	->addField('podcastSubtitle', 'podcast_legend', PaletteManipulator::POSITION_APPEND)
	->addField('podcastSummary', 'podcast_legend', PaletteManipulator::POSITION_APPEND)
	->addField('podcastSeason', 'podcast_legend', PaletteManipulator::POSITION_APPEND)
	->addField('podcastEpisode', 'podcast_legend', PaletteManipulator::POSITION_APPEND)
	->addField('podcastEpisodeType', 'podcast_legend', PaletteManipulator::POSITION_APPEND)
	->addField('podcastBlock', 'podcast_legend', PaletteManipulator::POSITION_APPEND)
	->addField('podcastExplicit', 'podcast_legend', PaletteManipulator::POSITION_APPEND)
	->applyToPalette('default', 'tl_news')
	->applyToPalette('internal', 'tl_news')
	->applyToPalette('article', 'tl_news')
	->applyToPalette('external', 'tl_news');
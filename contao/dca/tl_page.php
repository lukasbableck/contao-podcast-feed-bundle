<?php

use Contao\CoreBundle\DataContainer\PaletteManipulator;
use Contao\System;

$GLOBALS['TL_DCA']['tl_page']['fields']['podcastFeed'] = [
	'exclude' => true,
	'inputType' => 'checkbox',
	'search' => true,
	'eval' => ['tl_class' => 'w50 clr'],
	'sql' => "char(1) NOT NULL default ''",
];
$GLOBALS['TL_DCA']['tl_page']['fields']['podcastSubtitle'] = [
	'exclude' => true,
	'inputType' => 'text',
	'eval' => ['tl_class' => 'w50 clr'],
	'sql' => "varchar(255) NOT NULL default ''",
];
$GLOBALS['TL_DCA']['tl_page']['fields']['podcastImage'] = [
	'exclude' => true,
	'inputType' => 'fileTree',
	'eval' => ['filesOnly' => true, 'fieldType' => 'radio', 'tl_class' => 'w50 clr', 'mandatory' => true, 'extensions' => 'jpg,jpeg,png'],
	'sql' => 'binary(16) NULL',
];
$GLOBALS['TL_DCA']['tl_page']['fields']['podcastAuthor'] = [
	'exclude' => true,
	'inputType' => 'text',
	'eval' => ['tl_class' => 'w50 clr'],
	'sql' => "varchar(255) NOT NULL default ''",
];
$GLOBALS['TL_DCA']['tl_page']['fields']['podcastOwnerName'] = [
	'exclude' => true,
	'inputType' => 'text',
	'eval' => ['tl_class' => 'w50'],
	'sql' => "varchar(255) NOT NULL default ''",
];
$GLOBALS['TL_DCA']['tl_page']['fields']['podcastCountry'] = [
	'exclude' => true,
	'inputType' => 'select',
	'options' => System::getContainer()->get('contao.intl.countries')->getCountries(),
	'eval' => ['tl_class' => 'w50 clr'],
	'sql' => "varchar(255) NOT NULL default ''",
];
$GLOBALS['TL_DCA']['tl_page']['fields']['podcastCategory'] = [
	'exclude' => true,
	'inputType' => 'select',
	'options' => ['Arts' => [
		'Books', 'Design', 'Fashion & Beauty', 'Food', 'Performing Arts', 'Visual Arts',
	], 'Business' => [
		'Careers', 'Entrepreneurship', 'Investing', 'Management', 'Marketing', 'Non-Profit',
	], 'Comedy' => [
		'Comedy Interviews', 'Improv', 'Stand-Up',
	], 'Education' => [
		'Courses', 'How To', 'Language Learning', 'Self-Improvement',
	], 'Fiction' => [
		'Comedy Fiction', 'Drama', 'Science Fiction',
	], 'Government' => [], 'History' => [], 'Health & Fitness' => [
		'Alternative Health', 'Fitness', 'Medicine', 'Mental Health', 'Nutrition', 'Sexuality',
	], 'Kids & Family' => [
		'Education for Kids', 'Parenting', 'Pets & Animals', 'Stories for Kids',
	], 'Leisure' => [
		'Animation & Manga', 'Automotive', 'Aviation', 'Crafts', 'Games', 'Hobbies', 'Home & Garden', 'Video Games',
	], 'Music' => [
		'Music Commentary', 'Music History', 'Music Interviews',
	], 'News' => [
		'Business News', 'Daily News', 'Entertainment News', 'News Commentary', 'Politics', 'Sports News', 'Tech News',
	], 'Religion & Spirituality' => [
		'Buddhism', 'Christianity', 'Hinduism', 'Islam', 'Judaism', 'Religion', 'Spirituality',
	], 'Science' => [
		'Astronomy', 'Chemistry', 'Earth Sciences', 'Life Sciences', 'Mathematics', 'Natural Sciences', 'Nature', 'Physics', 'Social Sciences',
	], 'Society & Culture' => [
		'Documentary', 'Personal Journals', 'Philosophy', 'Places & Travel', 'Relationships',
	], 'Sports' => [
		'Baseball', 'Basketball', 'Cricket', 'Fantasy Sports', 'Football', 'Golf', 'Hockey', 'Rugby', 'Running', 'Soccer', 'Swimming', 'Tennis', 'Volleyball', 'Wilderness', 'Wrestling',
	], 'Technology' => [], 'True Crime' => [], 'TV & Film' => [
		'After Shows', 'Film History', 'Film Interviews', 'Film Reviews', 'TV Reviews',
	],
	],
	'eval' => ['tl_class' => 'w50 clr', 'includeBlankOption' => true, 'chosen' => true, 'mandatory' => true],
	'sql' => "varchar(255) NOT NULL default ''",
];
$GLOBALS['TL_DCA']['tl_page']['fields']['podcastExplicit'] = [
	'exclude' => true,
	'inputType' => 'select',
	'options' => &$GLOBALS['TL_LANG']['tl_page']['podcastExplicits'],
	'eval' => ['tl_class' => 'w50 clr', 'mandatory' => true],
	'sql' => "varchar(255) NOT NULL default ''",
];
$GLOBALS['TL_DCA']['tl_page']['fields']['podcastBlock'] = [
	'exclude' => true,
	'inputType' => 'checkbox',
	'eval' => ['tl_class' => 'w50'],
	'sql' => "char(1) NOT NULL default ''",
];
$GLOBALS['TL_DCA']['tl_page']['fields']['podcastType'] = [
	'exclude' => true,
	'inputType' => 'select',
	'options' => &$GLOBALS['TL_LANG']['tl_page']['podcastTypes'],
	'eval' => ['tl_class' => 'w50'],
	'sql' => "varchar(255) NOT NULL default ''",
];
$GLOBALS['TL_DCA']['tl_page']['fields']['podcastLink'] = [
	'exclude' => true,
	'inputType' => 'pageTree',
	'eval' => ['fieldType' => 'radio', 'tl_class' => 'w50'],
	'sql' => "int(10) unsigned NOT NULL default '0'",
];

$GLOBALS['TL_DCA']['tl_page']['palettes']['__selector__'][] = 'podcastFeed';
$GLOBALS['TL_DCA']['tl_page']['subpalettes']['podcastFeed'] = 'podcastFeed,podcastSubtitle,podcastImage,podcastAuthor,podcastOwnerName,podcastCountry,podcastCategory,podcastExplicit,podcastBlock,podcastType,podcastLink';

PaletteManipulator::create()
	->addLegend('podcastFeed_legend', 'feed_legend', PaletteManipulator::POSITION_AFTER)
	->addField('podcastFeed', 'podcastFeed_legend', PaletteManipulator::POSITION_APPEND)
	->applyToPalette('news_feed', 'tl_page');

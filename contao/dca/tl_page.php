<?php

use Contao\CoreBundle\DataContainer\PaletteManipulator;
use Contao\System;

$GLOBALS['TL_DCA']['tl_page']['fields']['podcastFeed'] = [
	'exclude' => true,
	'inputType' => 'checkbox',
	'search' => true,
	'eval' => ['tl_class' => 'w50 clr', 'submitOnChange' => true],
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
	'eval' => ['tl_class' => 'w50 clr', 'includeBlankOption' => true, 'chosen' => true, 'mandatory' => true],
	'sql' => "varchar(255) NOT NULL default ''",
];
$GLOBALS['TL_DCA']['tl_page']['fields']['podcastCategory'] = [
	'exclude' => true,
	'inputType' => 'select',
	'options' => ['Arts' => [
		'Arts' => 'Arts',
		'Arts:Books' => 'Books',
		'Arts:Design' => 'Design',
		'Arts:Fashion & Beauty' => 'Fashion & Beauty',
		'Arts:Food' => 'Food',
		'Arts:Performing Arts' => 'Performing Arts',
	], 'Business' => [
		'Business' => 'Business',
		'Business:Careers' => 'Careers',
		'Business:Entrepreneurship' => 'Entrepreneurship',
		'Business:Investing' => 'Investing',
		'Business:Management' => 'Management',
		'Business:Marketing' => 'Marketing',
		'Business:Non-Profit' => 'Non-Profit',
	], 'Comedy' => [
		'Comedy' => 'Comedy',
		'Comedy:Comedy Interviews' => 'Comedy Interviews',
		'Comedy:Improv' => 'Improv',
		'Comedy:Stand-Up' => 'Stand-Up',
	], 'Education' => [
		'Education' => 'Education',
		'Education:Courses' => 'Courses',
		'Education:How To' => 'How To',
		'Education:Language Learning' => 'Language Learning',
		'Education:Self-Improvement' => 'Self-Improvement',
	], 'Fiction' => [
		'Fiction' => 'Fiction',
		'Fiction:Comedy Fiction' => 'Comedy Fiction',
		'Fiction:Drama' => 'Drama',
		'Fiction:Science Fiction' => 'Science Fiction',
	], 'Government' => [
		'Government' => 'Government',
	], 'History' => [
		'History' => 'History',
	], 'Health & Fitness' => [
		'Health & Fitness' => 'Health & Fitness',
		'Health & Fitness:Alternative Health' => 'Alternative Health',
		'Health & Fitness:Fitness' => 'Fitness',
		'Health & Fitness:Medicine' => 'Medicine',
		'Health & Fitness:Mental Health' => 'Mental Health',
		'Health & Fitness:Nutrition' => 'Nutrition',
		'Health & Fitness:Sexuality' => 'Sexuality',
	], 'Kids & Family' => [
		'Kids & Family' => 'Kids & Family',
		'Kids & Family:Education for Kids' => 'Education for Kids',
		'Kids & Family:Parenting' => 'Parenting',
		'Kids & Family:Pets & Animals' => 'Pets & Animals',
		'Kids & Family:Stories for Kids' => 'Stories for Kids',
	], 'Leisure' => [
		'Leisure' => 'Leisure',
		'Leisure:Animation & Manga' => 'Animation & Manga',
		'Leisure:Automotive' => 'Automotive',
		'Leisure:Aviation' => 'Aviation',
		'Leisure:Crafts' => 'Crafts',
		'Leisure:Games' => 'Games',
		'Leisure:Hobbies' => 'Hobbies',
		'Leisure:Home & Garden' => 'Home & Garden',
		'Leisure:Video Games' => 'Video Games',
	], 'Music' => [
		'Music' => 'Music',
		'Music:Music Commentary' => 'Music Commentary',
		'Music:Music History' => 'Music History',
		'Music:Music Interviews' => 'Music Interviews',
	], 'News' => [
		'News' => 'News',
		'News:Business News' => 'Business News',
		'News:Daily News' => 'Daily News',
		'News:Entertainment News' => 'Entertainment News',
		'News:News Commentary' => 'News Commentary',
		'News:Politics' => 'Politics',
		'News:Sports News' => 'Sports News',
		'News:Tech News' => 'Tech News',
	], 'Religion & Spirituality' => [
		'Religion & Spirituality' => 'Religion & Spirituality',
		'Religion & Spirituality:Buddhism' => 'Buddhism',
		'Religion & Spirituality:Christianity' => 'Christianity',
		'Religion & Spirituality:Hinduism' => 'Hinduism',
		'Religion & Spirituality:Islam' => 'Islam',
		'Religion & Spirituality:Judaism' => 'Judaism',
		'Religion & Spirituality:Religion' => 'Religion',
		'Religion & Spirituality:Spirituality' => 'Spirituality',
	], 'Science' => [
		'Science' => 'Science',
		'Science:Astronomy' => 'Astronomy',
		'Science:Chemistry' => 'Chemistry',
		'Science:Earth Sciences' => 'Earth Sciences',
		'Science:Life Sciences' => 'Life Sciences',
		'Science:Mathematics' => 'Mathematics',
		'Science:Natural Sciences' => 'Natural Sciences',
		'Science:Nature' => 'Nature',
		'Science:Physics' => 'Physics',
		'Science:Social Sciences' => 'Social Sciences',
	], 'Society & Culture' => [
		'Society & Culture' => 'Society & Culture',
		'Society & Culture:Documentary' => 'Documentary',
		'Society & Culture:Personal Journals' => 'Personal Journals',
		'Society & Culture:Philosophy' => 'Philosophy',
		'Society & Culture:Places & Travel' => 'Places & Travel',
		'Society & Culture:Relationships' => 'Relationships',
	], 'Sports' => [
		'Sports' => 'Sports',
		'Sports:Baseball' => 'Baseball',
		'Sports:Basketball' => 'Basketball',
		'Sports:Cricket' => 'Cricket',
		'Sports:Fantasy Sports' => 'Fantasy Sports',
		'Sports:Football' => 'Football',
		'Sports:Golf' => 'Golf',
		'Sports:Hockey' => 'Hockey',
		'Sports:Rugby' => 'Rugby',
		'Sports:Running' => 'Running',
		'Sports:Soccer' => 'Soccer',
		'Sports:Swimming' => 'Swimming',
		'Sports:Tennis' => 'Tennis',
		'Sports:Volleyball' => 'Volleyball',
		'Sports:Wilderness' => 'Wilderness',
		'Sports:Wrestling' => 'Wrestling',
	], 'Technology' => [
		'Technology' => 'Technology',
	], 'True Crime' => [
		'True Crime' => 'True Crime',
	], 'TV & Film' => [
		'TV & Film' => 'TV & Film',
		'TV & Film:After Shows' => 'After Shows',
		'TV & Film:Film History' => 'Film History',
		'TV & Film:Film Interviews' => 'Film Interviews',
		'TV & Film:Film Reviews' => 'Film Reviews',
		'TV & Film:TV Reviews' => 'TV Reviews',
	],
	],
	'eval' => ['tl_class' => 'w50 clr', 'includeBlankOption' => true, 'chosen' => true, 'mandatory' => true],
	'sql' => "varchar(255) NOT NULL default ''",
];
$GLOBALS['TL_DCA']['tl_page']['fields']['podcastExplicit'] = [
	'exclude' => true,
	'inputType' => 'select',
	'options' => &$GLOBALS['TL_LANG']['podcast']['explicit_options'],
	'eval' => ['tl_class' => 'w50 clr', 'mandatory' => true],
	'sql' => "varchar(255) NOT NULL default ''",
];
$GLOBALS['TL_DCA']['tl_page']['fields']['podcastType'] = [
	'exclude' => true,
	'inputType' => 'select',
	'options' => &$GLOBALS['TL_LANG']['tl_page']['podcastTypes'],
	'eval' => ['tl_class' => 'w50'],
	'sql' => "varchar(255) NOT NULL default ''",
];
$GLOBALS['TL_DCA']['tl_page']['fields']['podcastBlock'] = [
	'exclude' => true,
	'inputType' => 'checkbox',
	'eval' => ['tl_class' => 'w50'],
	'sql' => "char(1) NOT NULL default ''",
];
$GLOBALS['TL_DCA']['tl_page']['fields']['podcastLink'] = [
	'exclude' => true,
	'inputType' => 'pageTree',
	'eval' => ['fieldType' => 'radio', 'tl_class' => 'w50 clr'],
	'sql' => "int(10) unsigned NOT NULL default '0'",
];

$GLOBALS['TL_DCA']['tl_page']['palettes']['__selector__'][] = 'podcastFeed';
$GLOBALS['TL_DCA']['tl_page']['subpalettes']['podcastFeed'] = 'podcastSubtitle,podcastImage,podcastAuthor,podcastOwnerName,podcastCountry,podcastCategory,podcastExplicit,podcastType,podcastBlock,podcastLink';

PaletteManipulator::create()
	->addLegend('podcastFeed_legend', 'feed_legend', PaletteManipulator::POSITION_AFTER)
	->addField('podcastFeed', 'podcastFeed_legend', PaletteManipulator::POSITION_APPEND)
	->applyToPalette('news_feed', 'tl_page')
;

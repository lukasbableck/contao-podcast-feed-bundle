<?php
namespace LukasBableck\ContaoPodcastFeedBundle\ContaoManager;

use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use LukasBableck\ContaoPodcastFeedBundle\ContaoPodcastFeedBundle;

class Plugin implements BundlePluginInterface {
	public function getBundles(ParserInterface $parser): array {
		return [BundleConfig::create(ContaoPodcastFeedBundle::class)->setLoadAfter([ContaoNewsBundle::class])];
	}
}

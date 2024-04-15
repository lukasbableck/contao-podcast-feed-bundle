<?php
namespace LukasBableck\ContaoPodcastFeedBundle\EventListener;

use Contao\NewsBundle\Event\FetchArticlesForFeedEvent;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;

#[AsEventListener(priority: 100)]
class FetchArticlesForFeedListener {
	public function __invoke(FetchArticlesForFeedEvent $event): void {
		if ($event->getPageModel()->podcastFeed) {
			$page = $event->getPageModel();

			$feed = $event->getFeed();
			$feed->addNS('itunes', 'http://www.itunes.com/dtds/podcast-1.0.dtd');
			$feed->addNS('spotify', 'http://www.spotify.com/ns/rss');
			$feed->addNS('googleplay', 'http://www.google.com/schemas/play-podcasts/1.0');
			$feed->addNS('podcast', 'https://podcastindex.org/namespace/1.0');

			if ($page->podcastSubtitle) {
				$feed->set('itunes:subtitle', $page->podcastSubtitle);
			}
			if ($page->podcastImage) {
				$image = FilesModel::findByUuid(StringUtil::binToUuid($page->podcastImage));
				if ($image) {
					$path = $event->getBaseURL().'/'.$image->path;
					$feed->set('itunes:image');
					$feed->setLogo($path);
				}
			}
			if ($page->podcastAuthor) {
				$feed->set('itunes:author', $page->podcastAuthor);
			}
			if ($page->podcastOwnerName) {
				$owner = $feed->newElement();
				$owner->setName('itunes:owner');
				$name = $feed->newElement();
				$name->setName('itunes:name');
				$name->setValue($page->podcastOwnerName);
				$owner->addElement($name);
				$feed->addElement($owner);
			}
			if ($page->podcastCountry) {
				$feed->set('spotify:countryOfOrigin', $page->podcastCountry);
			}
			if ($page->podcastCategory) {
				$feed->set('category', $page->podcastCategory);

				$categories = $page->podcastCategory;
				$categories = explode(':', $categories);
				$parentCategory = null;
				foreach ($categories as $category) {
					$cat = $feed->newElement();
					$cat->setName('itunes:category');
					$cat->setAttribute('text', $category);
					if ($parentCategory) {
						$parentCategory->addElement($cat);
					} else {
						$feed->addElement($cat);
					}
				}
			}
			if ($page->podcastExplicit) {
				$feed->set('itunes:explicit', $page->podcastExplicit);
			}
			if ($page->podcastBlock) {
				$feed->set('itunes:block', 'yes');
			}
			if ($page->podcastType) {
				$feed->set('itunes:type', $page->podcastType);
			}
			if ($page->podcastLink) {
				$link = PageModel::findByPk($page->podcastLink);
				if ($link) {
					$feed->set('link', $link->getAbsoluteUrl());
				}
			}
		}
	}
}
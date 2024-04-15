<?php
namespace LukasBableck\ContaoPodcastFeedBundle\EventListener;

use Contao\FilesModel;
use Contao\NewsBundle\Event\TransformArticleForFeedEvent;
use Contao\StringUtil;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;

#[AsEventListener(priority: -100)]
class TransformArticleForFeedListener {
	public function __invoke(TransformArticleForFeedEvent $event): void {
		if ($event->getPageModel()->podcastFeed) {
			if (!($item = $event->getItem())) {
				return;
			}
			$feed = $event->getFeed();

			$image = $event->getArticle()->singleSRC;
			if ($image) {
				$image = FilesModel::findByUuid(StringUtil::binToUuid($image));
				if ($image) {
					$item->set('itunes:image', $event->getBaseURL().'/'.$image->path);
				}
			}

			$item->set('itunes:author', $feed->getValue('itunes:author'));
			$item->set('itunes:block', $feed->getValue('itunes:block'));
			$item->set('itunes:explicit', $feed->getValue('itunes:explicit'));

			// TODO: Add missing tags
		}
	}
}

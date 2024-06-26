<?php
namespace LukasBableck\ContaoPodcastFeedBundle\EventListener;

use Contao\FilesModel;
use Contao\NewsBundle\Event\TransformArticleForFeedEvent;
use Contao\StringUtil;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;

#[AsEventListener(priority: -200)]
class TransformArticleForFeedListener {
	public function __invoke(TransformArticleForFeedEvent $event): void {
		if ($event->getPageModel()->podcastFeed) {
			if (!($item = $event->getItem())) {
				return;
			}

			$feed = $event->getFeed();
			$article = $event->getArticle();

			$item->set('itunes:title', htmlentities($item->getTitle()));

			$image = $article->image;
			if ($article->addImage && $image) {
				$image = FilesModel::findByUuid(StringUtil::binToUuid($image));
				if ($image) {
					$imageElement = $item->newElement();
					$imageElement->setName('itunes:image');
					$imageElement->setAttribute('href', $event->getBaseURL().'/'.$image->path);
					$item->addElement($imageElement);
				}
			}

			if ($article->podcastAuthor) {
				$item->set('itunes:author', $article->podcastAuthor);
			} elseif ($feed->getValue('itunes:author')) {
				$item->set('itunes:author', $feed->getValue('itunes:author'));
			}
			if ($article->podcastBlock) {
				$item->set('itunes:block', 'yes');
			}
			if ($article->podcastExplicit) {
				$item->set('itunes:explicit', $article->podcastExplicit);
			} elseif ($feed->getValue('itunes:explicit')) {
				$item->set('itunes:explicit', $feed->getValue('itunes:explicit'));
			}
			if ($article->podcastSeason) {
				$item->set('itunes:season', $article->podcastSeason);
			}
			if ($article->podcastEpisode) {
				$item->set('itunes:episode', $article->podcastEpisode);
			}
			if ($article->podcastEpisodeType) {
				$item->set('itunes:episodeType', $article->podcastEpisodeType);
			}
			if ($article->podcastSubtitle) {
				$item->set('itunes:subtitle', strip_tags($article->podcastSubtitle));
			}
			if ($article->podcastSummary) {
				$item->set('itunes:summary', strip_tags($article->podcastSummary));
			}
			if ($article->podcastFile) {
				$file = FilesModel::findByUuid(StringUtil::binToUuid($article->podcastFile));
				if ($file) {
					$path = $file->getAbsolutePath();
					$media = $item->newMedia();
					$media->setUrl($event->getBaseURL().'/'.$file->path);
					$media->setType(mime_content_type($path));
					$media->setLength(filesize($path));
					$item->addMedia($media);

					$getID3 = new \getID3();
					$file = $getID3->analyze($path);
					$item->set('itunes:duration', $file['playtime_string']);
				}
			}
			if ($article->podcastGUID) {
				$guid = $item->newElement();
				$guid->setName('guid');
				$guid->setAttribute('isPermaLink', 'false');
				$guid->setValue($article->podcastGUID);
				$item->addElement($guid);
			}
		}
	}
}

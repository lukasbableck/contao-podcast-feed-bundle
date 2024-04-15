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

			$image = $article->image;
			if ($article->addImage && $image) {
				$image = FilesModel::findByUuid(StringUtil::binToUuid($image));
				if ($image) {
					$item->set('itunes:image', $event->getBaseURL().'/'.$image->path);
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
				$item->set('itunes:subtitle', $article->podcastSubtitle);
			}
			if ($article->podcastSummary) {
				$item->set('itunes:summary', $article->podcastSummary);
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
		}
	}
}

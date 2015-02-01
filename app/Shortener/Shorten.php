<?php namespace Pngn\Shortener;

use Pngn\Repositories\LinkRepositoryInterface as LinkRepository;
use Pngn\Exceptions\NoPageTitleException;

class Shorten implements ShortenInterface {

	/**
	 * @var Pngn\Repositories\LinkRepositoryInterface
	 */
	public $LinkRepository;

	/**
	 * @param LinkRepository $LinkRepository
	 */
	public function __construct(LinkRepository $LinkRepository)
	{
		$this->LinkRepository = $LinkRepository;
	}

	public function make($new)
	{
		try
		{
			$new['title'] = $this->fetchTitle($new['url']);
		}

		catch (NoPageTitleException $e) {
			$new['title'] = $new['url'];
		}

		//Generate hash here.
		//$new['hash'] = 

		$this->LinkRepository->create($new);
	}

	public function byUrl($url)
	{
		$link = $this->LinkRepository->byUrl($url);
	}

	public function byHash($hash)
	{
		$link = $this->LinkRepository->byHash($hash);
	}

	private function fetchTitle($url)
	{
		try {
			$doc = new \DomDocument();
			@$doc->loadHTMLFile($url);
			$path = new \DOMXPath($doc);
			return $path->query('//title')->item(0)->nodeValue;
		}
		catch (\ErrorException $e) {
			throw new NoPageTitleException;
		}
	}
}
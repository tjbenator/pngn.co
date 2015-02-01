<?php namespace Pngn\Shortener;

interface ShortenInterface {

	public function make($input);

	public function byUrl($url);

	public function byHash($hash);
}
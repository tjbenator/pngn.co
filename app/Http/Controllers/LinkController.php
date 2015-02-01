<?php namespace Pngn\Http\Controllers;

use Pngn\Http\Requests;
use Pngn\Http\Controllers\Controller;
use Pngn\Shortener\ShortenInterface;
use Pngn\Http\Requests\CreateLinkRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class LinkController extends Controller {

	protected $Shorten;

	public function __construct(ShortenInterface $Shorten)
	{
		$this->Shorten = $Shorten;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('home');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateLinkRequest $request)
	{
		$this->Shorten->make($request->all());
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  string  $hash
	 * @return Response
	 */
	public function show($hash)
	{
		$this->Shorten->byHash($hash);
	}
}

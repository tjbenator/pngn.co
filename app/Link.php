<?php namespace Pngn;

use Illuminate\Database\Eloquent\Model;

class Link extends Model {
	protected $table = 'Links';
	protected $fillable = ['title', 'hash', 'url'];
}

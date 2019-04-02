<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model {

	protected $fillable = [
		'published_at','post_title','content'
	];
}
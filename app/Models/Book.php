<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

	public $timestamps = false;

	protected $fillable = [
		'name', 'year'
	];

	public function authors()
	{
		return $this->belongsToMany(Author::class, 'books_authors');
	}
}

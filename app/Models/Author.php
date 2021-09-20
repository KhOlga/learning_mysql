<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

	public $timestamps = false;

	protected $fillable = [
		'name', 'age'
	];

	public function books()
	{
		return $this->belongsToMany(Book::class, 'books_authors');
	}
}

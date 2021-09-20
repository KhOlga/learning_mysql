<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
{
/*
SELECT
	authors.author_id AS AuthorID,
	authors.name AS Author,
	COUNT(books.book_id) AS BooksNumber
FROM authors
JOIN books_authors
ON books_authors.author_id = authors.author_id
JOIN books
ON books.book_id = books_authors.book_id
GROUP BY authors.author_id
HAVING COUNT(books.book_id) > 100
;
*/
	//Первый выбирает всех авторов, у которых книг больше 100
	public function superAuthors()
	{
		$authors = DB::table('authors')
			->join('books_authors', 'authors.author_id', '=', 'books_authors.author_id')
			->join('books', 'books.book_id', '=', 'books_authors.book_id')
			->select('authors.author_id AS AuthorID', 'authors.name AS Author')
			->groupBy('authors.author_id')
			->havingRaw('COUNT(books.book_id) > ?', [100])
			->limit(10)
			->get();

		return response()->json($authors);
	}

/*
SELECT
	authors.author_id AS AuthorID,
	authors.name AS Author,
	authors.age AS Age,
	books.year AS Year
FROM authors
JOIN books_authors
ON books_authors.author_id = authors.author_id
JOIN books
ON books.book_id = books_authors.book_id
WHERE year BETWEEN 1998 AND 2010
AND age > 30
;
*/
	//Третий выбирает всех авторов, чей возраст старше 30 лет
	// и есть книги, написанные в период 1998-2010 годов
	public function oldSchool()
	{
		$authors = DB::table('authors')
			->join('books_authors', 'authors.author_id', '=', 'books_authors.author_id')
			->join('books', 'books.book_id', '=', 'books_authors.book_id')
			->select('authors.author_id AS AuthorID', 'authors.name AS Author', 'authors.age AS Age', 'books.year AS Year')
			->whereBetween('year', [1998, 2010])
			->where('age', '>' , 30)
			//->having('age', '>' , 30)
			->limit(10)
			->get();

		return response()->json($authors);
	}
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    //Второй выбирает всех книги, у которых год выпуска старше 2000 г
	public function oldBooks()
	{
		$books = DB::table('books')
			->select('book_id AS BookID ', 'name AS Title', 'year AS PublicationYear')
			->where('year', '>', 2000)
			//->limit(100)
			->get();

		return response()->json($books);
	}
}

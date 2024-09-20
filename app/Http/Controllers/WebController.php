<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use DB;

class WebController extends Controller
{
  public function index()
  {
    $books = Book ::latest()
      ->orderByRaw('(id)desc LIMIT 8')
      ->get();

  $latestBook = Book ::latest()
    ->orderByRaw('(id)desc LIMIT 1')
    ->get();

    $bookCount = DB::table('books')->count('id');
    $newBookCount = DB::table('books')->where('type', 1 )->count('id');
    $usedBookCount = DB::table('books')->where('type', 0 )->count('id');
    $userCount = DB::table('users')->count('id');

    return view('welcome', compact('books','latestBook', 'bookCount', 'newBookCount', 'usedBookCount', 'userCount' ));
  }
}

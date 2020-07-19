<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $authors = Author::select('id','name')
                    ->with('articles:id,title,description,author_id')
                    ->withCount('articles')
                    ->orderBy('articles_count', 'desc')
                    ->having('articles_count', '>', 0)
                    ->get();
        
        return view('home', compact('authors'));
    }
}

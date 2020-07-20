<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Relations\HasMany;

class HomeController extends Controller
{
    /**
     * Display the home page.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request): View
    {
        $q = Author::select('id','name')
                    ->with(['articles' => function(HasMany $query) {
                    	$query->approved()->select('id', 'title', 'description', 'is_approved', 'author_id');
                    }]);

        if ($request->user()) {
        	$q->thisAuthorFirst($request->user());
        }

        $authors = $q->popularFirst()
        			->get();
        
        return view('articles.index', compact('authors'));
    }
}

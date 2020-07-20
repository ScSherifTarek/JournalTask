<?php

use App\Author;
use App\Article;
use Illuminate\Database\Seeder;

class AuthorsWithArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Author::class, 3)
           ->create()
           ->each(function(Author $author, int $index) {
    			$articles = factory(Article::class, $index + 3)->make()->toArray();
           		$author->articles()->createMany($articles);
           });
    }
}

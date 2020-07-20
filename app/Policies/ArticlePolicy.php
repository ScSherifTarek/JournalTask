<?php

namespace App\Policies;

use App\Article;
use App\Author;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticlePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Author  $author
     * @param  \App\Article  $article
     * @return mixed
     */
    public function update(Author $author, Article $article)
    {
        return $author->isAdmin() || $article->isWrittenBy($author);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Author  $author
     * @param  \App\Article  $article
     * @return mixed
     */
    public function delete(Author $author, Article $article)
    {
        return $author->isAdmin();
    }

    /**
     * Determine whether the user can approve the model.
     *
     * @param  \App\Author  $author
     * @param  \App\Article  $article
     * @return mixed
     */
    public function approve(Author $author, Article $article)
    {
        return $author->isAdmin();
    }
}
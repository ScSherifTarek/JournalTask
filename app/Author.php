<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Author extends User
{
    /**
     * Every user may have one or more articles
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function articles(): HasMany
    {
        return $this->hasMany(Article::class, 'author_id', 'id');
    }

    /**
     * Check if the current author is an admin
     * 
     * @return boolean
     */
    public function isAdmin(): bool
    {
    	return $this->role == 'admin';
    }

    /**
     * Make this author an admin
     * 
     * @return boolean
     */
    public function makeAdmin(): bool
    {
    	$this->role = 'admin';
    	return $this->save();
    }

    /**
     * Scope a query to order authors by popularity.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePopularFirst(Builder $query): Builder
    {
        return $query->withCount('articles')
                    ->orderBy('articles_count', 'desc')
                    ->having('articles_count', '>', 0);
    }

    /**
     * Scope a query to order authors by popularity.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeThisAuthorFirst(Builder $query, Author $author): Builder
    {
        return $query->orderBy(DB::raw('id = '.DB::connection()->getPdo()->quote($author->getKey())), 'DESC');
    }
}

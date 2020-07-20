<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
	/**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'articles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description',
    ];

    /**
     * Every user may have one or more articles
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class, 'author_id', 'id', 'users');
    }

    /**
     * Is the given author my author
     * @param  \App\Author  $author
     * @return boolean
     */
    public function isWrittenBy(Author $author): bool
    {
        return $this->author_id === $author->getKey();
    }
}

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
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'description' => 'string',
        'is_approved' => 'boolean',
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

    /**
     * Check if this article is approved
     * @return boolean
     */
    public function isApproved(): bool
    {
        return $this->is_approved;
    }

    /**
     * Check if this article is approved
     * @return boolean
     */
    public function approve(): bool
    {
        $this->is_approved = True;
        return $this->save();
    }
}

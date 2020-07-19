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
     * Every user may have one or more articles
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class, 'author_id', 'id', 'users');
    }
}

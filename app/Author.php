<?php

namespace App;

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
        return $this->hasMany(Article::class);
    }
}

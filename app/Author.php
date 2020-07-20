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
}

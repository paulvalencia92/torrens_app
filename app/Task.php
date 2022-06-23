<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Task extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function scopeFromUser(Builder $builder)
    {
        return $builder
            ->where("user_id", auth()->id());

    }
}

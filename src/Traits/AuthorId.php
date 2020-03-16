<?php

namespace LaravelEssencial\Traits;

trait AuthorId
{
    protected static function bootAuthorId()
    {
        static::creating(function ($model) {
            
            if (\Auth::check()) 
            $model->author_id = \Auth::id();                     
            
        });
    }
}
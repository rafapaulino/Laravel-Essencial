<?php

namespace LaravelEssencial\Traits;
use Illuminate\Support\Str;

trait Slug
{
    protected static function bootSlug()
    {
        static::creating(function ($model) {
            
            $title = Str::substr($model->title, 0, 40);
            $slug = Str::slug($title, '-');
            $total = self::slugTotal($slug);

            if( $total > 0 ) {
                $slug = $slug . '-' . intval($total + 1);
            }

            $model->slug = $slug; 
        });
    }

    protected static function slugTotal($slug)
    {
        return self::where('slug', $slug)->count();
    }
}
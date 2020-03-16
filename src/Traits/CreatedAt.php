<?php

namespace LaravelEssencial\Traits;

trait CreatedAt
{
    protected static function bootCreatedAt()
    {
        static::creating(function ($model) {
            $model->created_at = date("Y-m-d H:i:s",time());
        });
    }
}
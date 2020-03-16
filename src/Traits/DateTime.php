<?php 

namespace LaravelEssencial\Traits;
use Carbon\Carbon;

trait DateTime
{
    public function setDateAttribute($value)
    {
        if (!is_null($value) && !is_object($value) && trim($value) !== "" && strpos($value, "/") !== false)
        $this->attributes['date'] = Carbon::createFromFormat('d/m/Y H:i:s', $value)->toDateTimeString(); 
        else 
        $this->attributes['date'] = $value;
    }

    public function getDateAttribute($value)
    {
        if (!is_null($value) && trim($value) !== "")
        return Carbon::parse(trim($value))->format('d/m/Y H:i:s');
        else
        return '';
    } 

    public function scopeDate($query, $value)
    {
        if(trim($value) != "") {
            return $query->where('date', '=', $value);
        }
        return $query;
    }
}
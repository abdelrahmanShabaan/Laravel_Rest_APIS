<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table = "categories";
    protected $fillable = [
        'name_ar','name_en','active','created_at','update_at'
    ];
    public $timestamps = false;


    public function scopeSelection($query)
    {
        return $query->select('id', 'name_' . app()->getLocale() . ' as name');
    }

}

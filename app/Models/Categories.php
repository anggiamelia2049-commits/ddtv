<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'description'];

    public function videos()
    {
        return $this->hasMany(Videos::class, 'category_id', 'id');
    }

    public function flyers()
    {
        return $this->hasMany(Flyers::class, 'category_id', 'id');
    }

    public function banners()
    {
        return $this->hasMany(Banners::class, 'category_id', 'id');
    }

    public function runningText()
    {
        return $this->hasMany(Runningtext::class, 'category_id', 'id');
    }
}

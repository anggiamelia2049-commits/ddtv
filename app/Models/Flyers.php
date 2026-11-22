<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flyers extends Model
{
    protected $table ='flyers';
    protected $primaryKey = 'id';
    protected $fillable = ['category_id', 'title', 'image', 'status'];

     public function category()
     {
         return $this->belongsTo(Categories::class, 'category_id', 'id');
     }
}

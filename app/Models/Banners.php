<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class banners extends Model
{
    protected $table ='banners';
    protected $primaryKey ='id';
    protected $fillable = ['category_id', 'title', 'image', 'status'];

     public function category()
 {
     return $this->belongsTo(Categories::class, 'category_id', 'id');
 }
    }

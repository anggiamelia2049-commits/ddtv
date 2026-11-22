<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RunningText extends Model
{
    protected $table ='runningtext';
    protected $primaryKey ='id';
    protected $fillable = ['category_id', 'text_content', 'status'];

     public function category()
 {
     return $this->belongsTo(Categories::class, 'category_id', 'id');
 }
}

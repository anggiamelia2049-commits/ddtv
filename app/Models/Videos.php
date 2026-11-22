<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Videos extends Model
{
    protected $table = 'videos';
    protected $fillable = ['category_id', 'title', 'video_file', 'status'];

    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id', 'id');
    }
}

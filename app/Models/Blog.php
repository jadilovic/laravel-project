<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'naziv',
        'opis',
        'slika',
        'category_id'
    ];

    public function category() {
        return $this->hasOne(BlogCategory::class, 'id', 'category_id');
    }

    public function comments() {
        return $this->hasMany(BlogComment::class);
    }

    public function blog() {
        return $this->belongsTo(Blog::class);
    }
}

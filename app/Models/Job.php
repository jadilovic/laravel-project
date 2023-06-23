<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
     protected $fillable = [
        'naziv',
        'opis',
        'slika',
        'category_id'
        // Add more fields as needed
    ];

    public function category() {
        return $this->hasOne(JobCategory::class, 'id', 'category_id');
    }
}

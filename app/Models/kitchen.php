<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kitchen extends Model
{
    use HasFactory;
    protected $table = 'kitchen';
    protected $fillable = [
        'name',
        'description',
        'image',
        'price',
        'category',
        'cost',
        'quantity',
        'sold',
        'status',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sessions extends Model
{
    protected $table = 'user_sessions';
    protected $fillable = [
        'user_id',
        'card_id',
        'total_time',
        'created_at',
        'updated_at',
        'end_time',
        'total_price',
        'start_time',
    ];
    use HasFactory;
}

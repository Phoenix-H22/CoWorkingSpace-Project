<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class generated_ids extends Model
{
    use HasFactory;
    protected $table = 'generated_ids';
    protected $fillable = [
        'id',
        'type',
        'generated_id',
        'status',
        'used_by',
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}

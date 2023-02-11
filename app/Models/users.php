<?php

namespace App\Models;

use App\Support\Address;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class users extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'role',
    ];

    public function password(): Attribute{
        return Attribute::make(
        set: fn($value) => bcrypt($value)
        );
    }







}

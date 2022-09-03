<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oauth extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "provider_id",
        "provider_name",
        "probider_token",
        "provider_refresh_token"
    ];
}

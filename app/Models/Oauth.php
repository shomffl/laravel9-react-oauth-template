<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oauth extends Model
{
    use HasFactory;

    protected $fillable = [
        "id",
        "user_id",
        "provider_id",
        "provider_name",
        "provider_token",
        "provider_refresh_token"
    ];

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

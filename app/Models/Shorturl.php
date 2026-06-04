<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shorturl extends Model
{
    protected $fillable = [

        'company_id',
        'user_id',
        'original_url',
        'short_code',
        'hit_count',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}

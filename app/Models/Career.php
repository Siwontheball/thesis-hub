<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    /** @use HasFactory<\Database\Factories\CareerFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status',
        'industry',
        'organization',
        'job_title',
        'graduation_year',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}

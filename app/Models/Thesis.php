<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thesis extends Model
{
    /** @use HasFactory<\Database\Factories\ThesisFactory> */
    use HasFactory;

    protected $fillable = [
      'user_id',
      'title',
      'abstract',
      'keywords',
      'published_year',
      'pdf_path',
      'advisor',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}

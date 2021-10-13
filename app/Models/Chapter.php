<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'chapter_number',
        'season_id'
    ];

    public function season() 
    {
        return $this->belongsTo(Season::class);
    }

}

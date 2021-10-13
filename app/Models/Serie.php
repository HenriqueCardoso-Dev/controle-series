<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'series';

    protected $fillable = [
        'id',
        'name'
    ];

    public function seasons()
    {
        return $this->hasMany(Season::class);
    }
}

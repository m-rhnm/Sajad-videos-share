<?php

namespace App\Models;

use App\Models\Video;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Headline extends Model
{
    use HasFactory;
    public $guarded = [];
    public function vidoes()
    {
        return $this->hasMany(Video::class);
    }
}

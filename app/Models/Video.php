<?php

namespace App\Models;

use App\Models\Headline;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;

class Video extends Model
{
    use HasFactory;
    protected $table = 'videos';
    
    protected $demo_url;
    public $guarded = [];
    public function headline()
    {
        return $this->belongsTo(Headline::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getVideoUrlAttribute()
    {
       // var_dump($this->demo_url);
       return Storage::url($this->demo_url);
    }
}

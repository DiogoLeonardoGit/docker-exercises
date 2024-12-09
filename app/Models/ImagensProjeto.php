<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagensProjeto extends Model
{
    use HasFactory;

    protected $fillable = ['project_id', 'path', 'alt_text'];

    public function projeto()
    {
        return $this->belongsTo(Projeto::class);
    }
}
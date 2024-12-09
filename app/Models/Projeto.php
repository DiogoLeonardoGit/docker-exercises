<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'technologies',
        'languages',
        'link'
    ];

    public function images()
    {
        return $this->hasMany(ImagensProjeto::class);
    }

    public function files()
    {
        return $this->hasMany(FilesProjeto::class);
    }
}

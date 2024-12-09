<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilesProjeto extends Model
{
    use HasFactory;

    protected $fillable = ['project_id', 'path', 'name'];

    public function projeto()
    {
        return $this->belongsTo(Projeto::class);
    }
}

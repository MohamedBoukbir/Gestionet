<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
    use HasFactory;
    protected $fillable = [
        'filiere',
        'module',
        'semestre',
        'cours_name',
        'cours_body',
    ];
    public function readCours()
{
    return $this->hasMany(ReadCours::class, 'cours_id');
}
}

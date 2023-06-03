<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class readCours extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'cours_id',
        
    ];
    public function user( )
    {
   return $this->belongsTo(User::class);
        # code...
    }
    public function cours( )
    {
   return $this->belongsTo(Cours::class);
        # code...
    }


}

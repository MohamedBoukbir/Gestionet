<?php

namespace App\Models;

use App\Models\User;
use App\Models\Cours;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'comment_body',
        'user_id',
        'cours_id',
    ];

    
    public function user( )
    {
        return $this->belongsTo(User::class);
    }
    public function cours( )
    {
        return $this->belongsTo(Cours::class);
    }
}

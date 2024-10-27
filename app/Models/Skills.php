<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skills extends Model
{
    use HasFactory;
    protected $fillable = [
        'skill',
        'percent',
        'user_id',
    ];
    public function user()  {
        return $this->belongsTo(User::class);
    }
}

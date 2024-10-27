<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experiences extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'from',
        'to',
        'user_id',
    ];
    public function user()  {
        return $this->belongsTo(User::class);
    }
}

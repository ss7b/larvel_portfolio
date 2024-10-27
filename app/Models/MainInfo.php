<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainInfo extends Model
{
    use HasFactory;
    protected $fillable = [
        'firstName',
        'lastName',
        'description',
        'image',
        'user_id',
    ];

    public function user()  {
        return $this->belongsTo(User::class);
    }

}
